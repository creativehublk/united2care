<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// include_once '../app/global/url.php';
// include_once ROOT_PATH.'/app/global/sessions.php';
// include_once ROOT_PATH.'/app/global/Gvariables.php';
// include_once ROOT_PATH.'/db/db.php';

require ROOT_PATH.'assets/PHPMailer/src/Exception.php';
require ROOT_PATH.'assets/PHPMailer/src/PHPMailer.php';
require ROOT_PATH.'assets/PHPMailer/src/SMTP.php';


class Emails{

  public $con,$db,$mail;
  private $config;
  public $maildetails,$whichMail;

  public static $replyEmail = 'info@creativehub.lk';

  public function __construct($con,$db,$mail){
    $this->con = $con;
    $this->db = $db;
    $this->mail = $mail;
  } // constructor

  private function sendInfoMail($details){

    $this->maildetails = $details; // array of details

    $subject = $this->maildetails['subject'];
    $body = $this->maildetails['body'];
    $to = $this->maildetails['to'];
    $cc = $this->maildetails['cc'];
    $bcc = $this->maildetails['bcc'];
    $title = $this->maildetails['title'];
    $reply_to = $this->maildetails['reply_to'];

    $result = 0;
    $message = "Mail sent failed";

    //Server settings
    try {
      // $this->mail->IsSMTP();
      $this->mail->CharSet = 'UTF-8';

      // $this->mail->Host = 'mail.goodsale.lk';// Specify main and backup server
      // $this->mail->SMTPAuth = true;// Enable SMTP authentication
      // $this->mail->Username = 'info@goodsale.lk';// SMTP username
      // $this->mail->Password = 'saleiro123';// SMTP password
      // $this->mail->SMTPSecure = 'ssl';// Enable encryption, 'ssl' also accepted
      // $this->mail->Port       = 465; 

      $this->mail->From = 'info@creativehub.lk';
      $this->mail->setFrom($this->mail->From,$title);

      foreach($to as $value){
        $this->mail->addAddress($value);// Add a recipient
      }
      
      foreach($cc as $value){
        $this->mail->addCC($value);
      }

      foreach($bcc as $value){
        $this->mail->addBCC($value);
      }
      
      $this->mail->addReplyTo($reply_to);

      //Content
      $this->mail->isHTML(true);
      $this->mail->Subject = $subject;
      $this->mail->Body    = $body;
      // $this->mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

      $this->mail->send();

      $result = 1;
      $message = "Mail has been sent successfully";

    } catch (Exception $e) {

      echo 'Message could not be sent. Mailer Error: ', $this->mail->ErrorInfo;

    } 

      return array('result'=>$result,'message'=>$message);

  } // sendHelpMail


  private function configureMail($mailDetails,$whichMail){

    $this->mailDetails = $mailDetails;
    $this->whichMail = $whichMail;

    if($this->whichMail == "info"){
      // send through help mail

      $mes = Emails::sendInfoMail($this->mailDetails);

    }

    return $mes;

  }//configureMail


  // public mail calling function 
  public function registrationSuccessfull($config){

    $this->config = $config;
    $user_name = ucwords($this->config['name']);
    $user_email = $this->config['email'];
    $user_id = $this->config['user_id'];

    $select_recent_products = mysqli_query($this->con,"SELECT p.`name`, img.`images`
                              FROM `products` p 
                              INNER JOIN `products_images` img ON img.`products_id` = p.`id`
                              WHERE p.`active`=1
                              GROUP BY img.`products_id` ORDER BY p.`id` DESC LIMIT 0,4 ");
    

    $message = '<!DOCTYPE html>
                <html>
                <head>
                  <meta charset="utf-8" />
                  <meta http-equiv="X-UA-Compatible" content="IE=edge">
                  <title>Thanking you for joining with us!</title>
                  <meta name="viewport" content="width=device-width, initial-scale=1">
                </head>
                <body>
                  <section>
                    <div style="margin: auto; display:block; width: 100%;">
                      <table>
                        
                        <tr>
                          <td colspan="4">
                            <div style="background:#fff; padding: 10px 10px; margin-left: auto; margin-right: auto; display: block; text-align: center; width: 100%;">
                              <img src="'.URL.'assets/images/logo.PNG" alt="CreativeHub Shop" style="width: 150px">
                            </div>
                          </td>
                        </tr>
                        
                        <tr>
                          <td colspan="4">
                            <br>
                            <h4 style="text-transform: capitalize">Dear '.$user_name.'</h4>
                            <p>Thank you for joining with us!</p>
                            <p>You can now check out our products and get notified on our exclusive promotions. Shop us at <a href="https://www.creativehub.lk/">https://www.creativehub.lk/</a> with your login name '.$user_email.'. </p>
                            <br><br>
                          </td>
                        </tr>
                
                        <tr>';

                        while($fetch_recent_products = mysqli_fetch_array($select_recent_products)){

              $message .= '<td>
                              <div style="margin-left: auto; margin-right: auto; display: block; text-align: center;" >
                                <img src="'.URL.'/admin/uploads/products/thumb/'.$fetch_recent_products['images'].'" style="width: auto; height: 300px" alt="CreativeHub Shop">
                                <p>'.$fetch_recent_products['name'].'</p>
                              </div>
                          </td>';

                        }
                          
          $message .= '</tr>
                
                        <tr>
                            <td colspan="4">
                              <div style="text-align:center">
                                <br>
                                <a style="background:#231f20; color: white; border-radius: 10px; padding: 15px 40px; font-weight: 700;text-decoration: none" href="https://www.creativehub.lk//products?name=All%20Products" target="_blank">Shop Now</a>
                                <br><br>
                              </div>
                            </td>
                        </tr>
                
                        <tr>
                            <td colspan="4">
                              <div style="text-align: center">
                                <p>Feel free to query us via info@creativehub.lk or call us +94 777005877 .</p>
                                <p>To keep updated on our latest collections subscribe or follow us on</p>
                                <a href="https://www.facebook.com/creativehublk" target="_blank"><img src="https://www.creativehub.lk/assets/images/icon/facebook.png" alt="Facebook" style="width: 30px"></a>
                                <a href="https://www.instagram.com/creativehublk/" target="_blank"><img src="https://www.creativehub.lk/assets/images/icon/instagram.png" alt="Instagram" style="width: 30px"></a>
                                <br><br>
                              </div>
                            </td>
                        </tr>
                
                        <tr>
                              <td colspan="4">
                                <div style="background:#231f20; padding: 10px 10px; margin-left: auto; margin-right: auto; display: block; text-align: center; width: 100%; color: white">
                                  <p> Copyright @ '.Date("Y").' CreativeHub Shop. Please do not reply to this mail. <a href="https://www.creativehub.lk//contact-us" target="_blank" style=" color: white">GET IN TOUCH</a> </p>
                                </div>
                              </td>
                        </tr>
                
                      </table>
                    </div>
                  </section>  
                </body>
                </html>
                ';


    // Sedn mail to candidate
    $to = array($user_email);
    $cc = array();
    $bcc = array('info@creativehub.lk');
    $reply_to = Emails::$replyEmail;
    $title = 'Welcome '.$user_name.' | CreativeHub Shop';
    $subject = 'Welcome '.$user_name;
    $body = $message;

    $this->maildetails = array('subject'=>$subject,'body'=>$body,'to'=>$to,'cc'=>$cc,'bcc'=>$bcc,'title'=>$title,'reply_to'=>$reply_to);
    $mes = Emails::configureMail($this->maildetails,"info");

    return $mes;

  } //registrationSuccessfull();

  
  public function invoiceSend($config){

    $this->config = $config;
    $order_no = $this->config['order_no'];

    //check payment method is cod or other method
    //if cod dont send mail untill they pay
    // if not send mail
    // $select_user_type = mysqli_query($this->con," SELECT * FROM `orders` WHERE `order_no`='$order_no' ");
    // $fetch_user_type = mysqli_fetch_array($select_user_type);
    // $user_type = strtolower($fetch_user_type['user_type']);

    $select_order = mysqli_query($this->con,"SELECT o.*,dd.*, refShM.`name` shippingMethod
                                      FROM `orders` o 
                                      INNER JOIN `delivery_details` AS dd ON dd.`order_no` = o.`order_no` 
                                      LEFT JOIN `ref_shipping_methods` AS refShM ON refShM.`id` = dd.`shipping_method`
                                      WHERE o.`order_no`='$order_no' ");

    $fetch_order = mysqli_fetch_array($select_order);

    $user_name = $fetch_order['name'];
    // $shipping_method = $fetch_order['shippingMethod'];
    $ship_add = $fetch_order['door_no'].','.$fetch_order['city'].','.$fetch_order['state'];
    $user_email = $fetch_order['email'];

    if($fetch_order['payment_method'] == "cod"){
      $payment_method = "Cash on delivery";

    }else if( $fetch_order['payment_method'] == "card" ){

      $payment_method = "Card";

    }else{
      $payment_method = "Not Available";
    }

    $message = '
            <!DOCTYPE html>
            <html>
              <head>
                <meta charset="utf-8" />
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <title>Your Order Status!</title>
                <meta name="viewport" content="width=device-width, initial-scale=1">
              </head>
              <body>
                <section>
                  <div style="margin: auto; display:block; width: 100%;">
                    <table>
                      
                      <tr>
                        <td colspan="4">
                          <div style="background:#fff; padding: 10px 10px; margin-left: auto; margin-right: auto; display: block; text-align: center; width: 100%;">
                          <img src="'.URL.'assets/images/logo.PNG" alt="CreativeHub Community" style="width: 100px">
                          </div>
                        </td>
                      </tr>
                      
                      <tr>
                        <td colspan="4">
                          <p>Dear '.$user_name.'</p>
                          <br>
                          <p>Thank you for shopping with us!</p>
                          <p>Feel free to query us via <a href="mailto:info@creativehub.lk">info@creativehub.lk</a> or call us +94 777005877 .</p>
                          <br>
                        </td>
                      </tr>
            
                      <tr>
                        <td colspan="4">
                          <div style="background: #231f20;">
                            <h4 style="color: white; padding: 10px; margin:0">ORDER NO #'.$order_no.' INFORMATION</h4>
                          </div>
                        </td>
                      </tr>
            

                      <tr>
                        <td colspan="4">
                          <div style="margin:0; border-bottom: 1px solid #8f0d5742">
                            <p> <b>Address </b> '.$ship_add.' </p>
                          </div>
                        </td>
                      </tr>
            
                      <tr>
                        <td colspan="2">
                          <div style="margin:5px; border-bottom: 1px solid #8f0d5742">
                            <p> <b>Payment Method</b> </p>
                          </div>
                          
                        </td>
                        <td colspan="2">
            
                          <div style="margin:5px; border-bottom: 1px solid #8f0d5742">
                            <p>'.$payment_method.'</p>
                          </div>
                          
                        </td>
                      </tr>
            
                      <tr>
                        <td style="text-align: left"> <b>Products Item</b> </td>
                        <td style="text-align: left"> <b>Varient</b> </td>
                        <td style="text-align: center"> <b>QTY</b> </td>
                        <td style="text-align: right"> <b>Total</b> </td>
                      </tr>';
          
                      $select_order_items = mysqli_query($this->con,"SELECT oi.`qty`,oi.`amount`, p.`name`, p.`id` product_id ,size.`name` AS size, color.`color_code` AS color, color.`type` color_type, color.`texture` 
                                            FROM `order_items` oi 
                                            INNER JOIN `products` p ON p.`id`=oi.`product_id` 
                                            LEFT JOIN `ref_sizes` AS size ON size.`id` = oi.`size` 
                                            LEFT JOIN `ref_colors` AS color ON color.`id` = oi.`color`
                                            WHERE oi.`order_no`='$order_no' ORDER BY oi.`id` ASC ");
                      while($fetch_order_items = mysqli_fetch_array($select_order_items)){

                        $product_id = $fetch_order_items['product_id'];
                        $select_images = mysqli_query($this->con,"SELECT * FROM `products_images` WHERE `products_id`='$product_id' ORDER BY `id` ASC LIMIT 0,1 ");
                        $fetch_images = mysqli_fetch_array($select_images);
                      
            $message .= '<tr>
                          <td style="text-align: left">
                            <p>'.$fetch_order_items['name'].'</p>
                            <img src="'.URL.'admin/uploads/products/'.$fetch_images['images'].'" alt=" '.$fetch_order_items['name'].' " style="width:80px">
                          </td>';

                          if($fetch_order_items['size'] != "NA" ){

                              $message .= '<td style="text-align: left; text-transform: capitalize">
                              <p>'.$fetch_order_items['size'];
                                
                                if($fetch_order_items["color_type"] == "texture"){
                                    if($fetch_order_items['texture'] != "NA" ){
                                      $message .= '<b style="background: url('.URL.'admin/references/textures/'.$fetch_order_items['texture'].'); background-size: cover">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>';
                                    }
                                    
                                }else{
                                    if($fetch_order_items['color'] != "NA" ){
                                      $message .= '<b style="background: '.$fetch_order_items['color'].' ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>';
                                    }
                                }

                  $message .= '</p>

                            </td>';

                          }

            

          $message .= '<td style="text-align: center"> <p>'.$fetch_order_items['qty'].'</p> </td>
                          <td style="text-align: right"> <p>LKR '.number_format($fetch_order_items['amount'],2).'</p> </td>
                        </tr>';

                      }
            
          $message .= '<tr>
                        <td colspan="4" style="border-top: 1px solid #8f0d5721"></td>
                      </tr>
            
                      <tr>
                        <td></td>
                        <td style="text-align: left" colspan="2"> <b>Bag Total</b> </td>
                        <td style="text-align: right"> LKR '.number_format($fetch_order['cart_total'],2).' </td>
                      </tr>

                      <tr>
                        <td></td>
                        <td colspan="3" style="border-top: 1px solid #8f0d5721"></td>
                      </tr>

                      <tr>
                        <td></td>
                        <td style="text-align: left" colspan="2"> <b>Delivery Charges</b> </td>
                        <td style="text-align: right"> LKR '.number_format($fetch_order['delivery_charges'],2).' </td>
                      </tr>
            
                      <tr>
                        <td></td>
                        <td colspan="3" style="border-top: 1px solid #8f0d5721"></td>
                      </tr>
            
                      <tr>
                        <td></td>
                        <td style="text-align: left" colspan="2"> <b>Total</b> </td>
                        <td style="text-align: right"> LKR '.number_format($fetch_order['total'],2).' </td>
                      </tr>
            
                      <tr>
                        <td colspan="4">
                          <div style="text-align: center">
                            <br>
                            <p>Thank you! View your order at <a href="https://www.creativehub.lk/" target="_blank">creativehub.lk</a> website. </p>
                          </div>
                        </td>
                      </tr>
                      
                      <tr>
                          <td colspan="4">
                            <div style="text-align: center">
                              <p>Feel free to query us via info@creativehub.lk or call us +94 777005877 .</p>
                              <p>To keep updated on our latest collections subscribe or follow us on</p>
                                <a href="https://www.facebook.com/creativehublk" target="_blank"><img src="https://www.doublexl.lk/assets/images/icon/facebook.png" alt="Facebook" style="width: 30px"></a>
                                <a href="https://www.instagram.com/creativehublk/" target="_blank"><img src="https://www.doublexl.lk/assets/images/icon/instagram.png" alt="Instagram" style="width: 30px"></a>
                              <br><br>
                            </div>
                          </td>
                      </tr>
            
                      <tr>
                            <td colspan="4">
                              <div style="background:#231f20; padding: 10px 10px; margin-left: auto; margin-right: auto; display: block; text-align: center; width: 100%; color: white">
                                <p> Copyright @ 2019 CreativeHub. Please do not reply to this mail. <a href="https://www.creativehub.lk/contact" target="_blank" style=" color: white">GET IN TOUCH</a> </p>
                              </div>
                            </td>
                      </tr>
            
                    </table>
                  </div>
                </section>  
              </body>
            </html>
    ';

    // Sedn mail to candidate
    $to = array($user_email);
    $cc = array();
    $bcc = array('info@creativehub.lk');
    $reply_to = Emails::$replyEmail;
    $title = 'Creativehub Community Order #'.$order_no;
    $subject = 'Creativehub Community Order #'.$order_no;
    $body = $message;

    $this->maildetails = array('subject'=>$subject,'body'=>$body,'to'=>$to,'cc'=>$cc,'bcc'=>$bcc,'title'=>$title,'reply_to'=>$reply_to);
    $mes = Emails::configureMail($this->maildetails,"info");

    return $mes;

  } //invoiceSend();


  public function sendEnquiryMail($config){

    $this->config = $config;

    $message = $this->config['message'];

    // Sedn mail to ADMIN
    $to = array('info@creativehub.lk');
    $cc = array();
    $bcc = array();
    $reply_to = Emails::$replyEmail;
    $title = 'Website Enquiry';
    $subject = 'CreativeHub Shop Website Enquiry';
    $body = $message;

    $this->maildetails = array('subject'=>$subject,'body'=>$body,'to'=>$to,'cc'=>$cc,'bcc'=>$bcc,'title'=>$title,'reply_to'=>$reply_to);
    $mes = Emails::configureMail($this->maildetails,"info");

    return $mes;

  } //sendEnquiryMail

  // Artist mails
  public function registrationSuccessfullArtist($config){

    $this->config = $config;
    $user_name = ucwords($this->config['name']);
    $user_email = $this->config['email'];
    $user_id = $this->config['user_id'];

    $select_recent_products = mysqli_query($this->con,"SELECT p.`name`, img.`images`
                              FROM `products` p 
                              INNER JOIN `products_images` img ON img.`products_id` = p.`id`
                              WHERE p.`active`=1
                              GROUP BY img.`products_id` ORDER BY p.`id` DESC LIMIT 0,4 ");
    

    $message = '<!DOCTYPE html>
                <html>
                <head>
                  <meta charset="utf-8" />
                  <meta http-equiv="X-UA-Compatible" content="IE=edge">
                  <title>Thanking you for joining with us!</title>
                  <meta name="viewport" content="width=device-width, initial-scale=1">
                </head>
                <body>
                  <section>
                    <div style="margin: auto; display:block; width: 100%;">
                      <table>
                        
                        <tr>
                          <td colspan="4">
                            <div style="background:#fff; padding: 10px 10px; margin-left: auto; margin-right: auto; display: block; text-align: center; width: 100%;">
                              <img src="'.URL.'assets/images/logo.PNG" alt="CreativeHub Shop" style="width: 150px">
                            </div>
                          </td>
                        </tr>
                        
                        <tr>
                          <td colspan="4">
                            <br>
                            <h4 style="text-transform: capitalize">Dear '.$user_name.'</h4>
                            <p>Thank you for joining with us!</p>
                            <p>You can now check out our products and get notified on our exclusive promotions. Shop us at <a href="https://www.creativehub.lk/">https://www.creativehub.lk/</a> with your login name '.$user_email.'. </p>
                            <br><br>
                          </td>
                        </tr>
                
                        <tr>';

                        while($fetch_recent_products = mysqli_fetch_array($select_recent_products)){

              $message .= '<td>
                              <div style="margin-left: auto; margin-right: auto; display: block; text-align: center;" >
                                <img src="'.URL.'/admin/uploads/products/thumb/'.$fetch_recent_products['images'].'" style="width: auto; height: 300px" alt="CreativeHub Shop">
                                <p>'.$fetch_recent_products['name'].'</p>
                              </div>
                          </td>';

                        }
                          
          $message .= '</tr>
                
                        <tr>
                            <td colspan="4">
                              <div style="text-align:center">
                                <br>
                                <a style="background:#231f20; color: white; border-radius: 10px; padding: 15px 40px; font-weight: 700;text-decoration: none" href="https://www.creativehub.lk//products?name=All%20Products" target="_blank">Shop Now</a>
                                <br><br>
                              </div>
                            </td>
                        </tr>
                
                        <tr>
                            <td colspan="4">
                              <div style="text-align: center">
                                <p>Feel free to query us via info@creativehub.lk or call us +94 777005877 .</p>
                                <p>To keep updated on our latest collections subscribe or follow us on</p>
                                <a href="https://www.facebook.com/creativehublk" target="_blank"><img src="https://www.creativehub.lk/assets/images/icon/facebook.png" alt="Facebook" style="width: 30px"></a>
                                <a href="https://www.instagram.com/creativehublk/" target="_blank"><img src="https://www.creativehub.lk/assets/images/icon/instagram.png" alt="Instagram" style="width: 30px"></a>
                                <br><br>
                              </div>
                            </td>
                        </tr>
                
                        <tr>
                              <td colspan="4">
                                <div style="background:#231f20; padding: 10px 10px; margin-left: auto; margin-right: auto; display: block; text-align: center; width: 100%; color: white">
                                  <p> Copyright @ '.Date("Y").' CreativeHub Shop. Please do not reply to this mail. <a href="https://www.creativehub.lk//contact-us" target="_blank" style=" color: white">GET IN TOUCH</a> </p>
                                </div>
                              </td>
                        </tr>
                
                      </table>
                    </div>
                  </section>  
                </body>
                </html>
                ';


    // Sedn mail to candidate
    $to = array($user_email);
    $cc = array();
    $bcc = array('info@creativehub.lk');
    $reply_to = Emails::$replyEmail;
    $title = 'Welcome '.$user_name.' | CreativeHub Shop';
    $subject = 'Welcome '.$user_name;
    $body = $message;

    $this->maildetails = array('subject'=>$subject,'body'=>$body,'to'=>$to,'cc'=>$cc,'bcc'=>$bcc,'title'=>$title,'reply_to'=>$reply_to);
    $mes = Emails::configureMail($this->maildetails,"info");

    return $mes;

  } //registrationSuccessfullArtist();


  public function requestKits($config){

    $this->config = $config;

    $message = $this->config['message'];

    // Sedn mail to ADMIN
    $to = array('creativehub.lk@gmail.com');
    $cc = array();
    $bcc = array();
    $reply_to = Emails::$replyEmail;
    $title = 'New Safety Kits Request';
    $subject = 'United To Care Kits Request';
    $body = $message;

    $this->maildetails = array('subject'=>$subject,'body'=>$body,'to'=>$to,'cc'=>$cc,'bcc'=>$bcc,'title'=>$title,'reply_to'=>$reply_to);
    $mes = Emails::configureMail($this->maildetails,"info");

    return $mes;

  } //requestKits

  public function dontateKits($config){

    $this->config = $config;

    $message = $this->config['message'];

    // Sedn mail to ADMIN
    $to = array('creativehub.lk@gmail.com');
    $cc = array();
    $bcc = array();
    $reply_to = Emails::$replyEmail;
    $title = 'New Donation Request';
    $subject = 'United To Care Donation';
    $body = $message;

    $this->maildetails = array('subject'=>$subject,'body'=>$body,'to'=>$to,'cc'=>$cc,'bcc'=>$bcc,'title'=>$title,'reply_to'=>$reply_to);
    $mes = Emails::configureMail($this->maildetails,"info");

    return $mes;

  } //dontateKits


} // class end

$mail = new PHPMailer(true);
$mailObj = new Emails($con,$database,$mail);




?>