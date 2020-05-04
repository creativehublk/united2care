<?php include_once '../app/global/url.php' ?>
<?php include_once ROOT_PATH.'/app/global/sessions.php' ?>
<?php include_once ROOT_PATH.'/app/global/Gvariables.php' ?>
<?php include_once ROOT_PATH.'/db/db.php' ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<?php

if($_SERVER['REQUEST_METHOD'] == "POST"){


    if(isset($_POST['donation_amount']) ){
        
        $OrderID = Date('dmY').rand();

        $amount = trim($_POST['amount']);
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $message = $_POST['note'];
        $cause_id = $_POST['cause_id'];
        
        $insert = mysqli_query($localhost, "INSERT INTO `donations` (`reference_no`, `first_name`, `last_name`, `email`, `phone`, `message`, `amount`, `cause_id`) VALUES('$OrderID', '$first_name', '$last_name', '$email', '$phone', '$message', '$amount', '$cause_id') ");

        if($insert){
            // Process to payhere Gateway

            $merchant_id = 212250;
            // $merchant_id = 1211692;
            $items = rand();// Invoice No
            $currency = 'LKR';
            $amount = number_format($amount, 2);

            $address = "Colombo, Srilanka";
            $city = "Colombo";
            $country = 'Sri Lanka';

            $return_url = URL.'status?response=success';
            $cancel_url = URL.'status?response=failed';
            $notify_url = URL.'account/response.php';
            ?>
            
            <form method="post" id="pay_now_form" action="https://www.payhere.lk/pay/checkout">   

                <input type="hidden" name="merchant_id" value="<?php echo $merchant_id ?>">    <!-- Replace your Merchant ID -->
                <input type="hidden" name="return_url" value="<?php echo $return_url ?>">
                <input type="hidden" name="cancel_url" value="<?php echo $cancel_url ?>">
                <input type="hidden" name="notify_url" value="<?php echo $notify_url ?>">  


                <input type="hidden" name="order_id" value="<?php echo $OrderID ?>">
                <input type="hidden" name="items" value="<?php echo $items ?>"><br>
                <input type="hidden" name="currency" value="<?php echo $currency ?>">
                <input type="hidden" name="amount" value="<?php echo $amount ?>">


                <input type="hidden" name="first_name" value="<?php echo $first_name ?>">
                <input type="hidden" name="last_name" value="<?php echo $last_name ?>"><br>
                <input type="hidden" name="email" value="<?php echo $email ?>">
                <input type="hidden" name="phone" value="<?php echo $phone ?>"><br>
                <input type="hidden" name="address" value="<?php echo $address ?>">
                <input type="hidden" name="city" value="<?php echo $city ?>">
                <input type="hidden" name="country" value="<?php echo $country ?>">

            </form> 

            <script>
                $('#pay_now_form').submit();
            </script>

            <?php
            
        }else{

            echo mysqli_error($localhost);

            // Failed
            ?>
            <script>
                // window.location.href = '<?php echo URL."status?order_no=0000&response=failed" ?>';
            </script>
            <?php

        }

    } // isset 


} // request method

?>

