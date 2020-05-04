<?php include_once '../app/global/url.php' ?>
<?php include_once ROOT_PATH.'/app/global/sessions.php' ?>
<?php include_once ROOT_PATH.'/app/global/Gvariables.php' ?>
<?php include_once ROOT_PATH.'/db/db.php' ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<?php

if($_SERVER['REQUEST_METHOD'] == "GET"){

    if(isset($_GET['donate_money']) && isset($_GET['paynow']) ){
        
        $amount = (int)trim($_POST['amount']);

        $first_name = $_POST['name'];
        $last_name = '';
        $email = $_POST['email'];
        $phone = $_POST['mobile_no'];
        $address = $_POST['door_no'];
        $city = $_POST['city'];
        $country = $_POST['state'];

        if( $amount > 50 ){

            $referenceNo = 'DONT'.rand();
            $PurchaseAmt = $amount; // should be 12 digit including decimal two points


            $merchant_id = 212250;

            $order_id = $referenceNo; // generated for merchant
            $items = rand();// Invoice No
            $currency = 'LKR';
            $amount = $PurchaseAmt;

            $return_url = URL.'account/view_order.php?order_no='.$referenceNo.'&email='.$email.'&response=success';
            $cancel_url = URL.'account/view_order.php?order_no='.$referenceNo.'&email='.$email.'&response=failed';
            $notify_url = URL.'account/response.php';
            
            ?>


            <form method="post" id="pay_now_form" action="https://www.payhere.lk/pay/checkout">   

                <input type="hidden" name="merchant_id" value="<?php echo $merchant_id ?>">    <!-- Replace your Merchant ID -->
                <input type="hidden" name="return_url" value="<?php echo $return_url ?>">
                <input type="hidden" name="cancel_url" value="<?php echo $cancel_url ?>">
                <input type="hidden" name="notify_url" value="<?php echo $notify_url ?>">  

                
                <input type="hidden" name="order_id" value="<?php echo $order_id ?>">
                <input type="hidden" name="items" value="<?php echo $items ?>"><br>
                <input type="hidden" name="currency" value="<?php echo $currency ?>">
                <input type="hidden" name="amount" value="<?php echo $amount ?>">

                
                <input type="hidden" name="first_name" value="<?php echo $first_name ?>">
                <input type="hidden" name="last_name" value="<?php echo $last_name ?>"><br>
                <input type="hidden" name="email" value="<?php echo $email ?>">
                <input type="hidden" name="phone" value="<?php echo $phone ?>"><br>
                <input type="hidden" name="address" value="<?php echo $address ?>">
                <input type="hidden" name="city" value="<?php echo $city ?>">
                <input type="hidden" name="country" value="<?php echo $country ?>"><br><br> 

            </form> 
            
            <script>
                $('#pay_now_form').submit();
            </script>

            <?php
            }// check payment is made or not

        
    } // isset 


} // request method

?>

