<?php include_once '../app/global/url.php' ?>
<?php include_once ROOT_PATH.'/app/global/sessions.php' ?>
<?php include_once ROOT_PATH.'/app/global/Gvariables.php' ?>
<?php include_once ROOT_PATH.'/db/db.php' ?>

<?php require_once ROOT_PATH.'mail/mails.php'; ?>
<?php


if($_SERVER['REQUEST_METHOD']){

    if( (isset($_POST['merchant_id'])) && (isset($_POST['order_id'])) && (isset($_POST['payhere_amount'])) && (isset($_POST['payhere_currency'])) && (isset($_POST['status_code'])) && (isset($_POST['md5sig'])) ){
    
        $merchant_id      = $_POST['merchant_id'];
        $order_id         = $_POST['order_id'];
        $transaction_ref  = $_POST['payment_id'];
        $payhere_amount   = $_POST['payhere_amount'];
        $payhere_currency = $_POST['payhere_currency'];
        $status_code      = $_POST['status_code'];
        $md5sig        = $_POST['md5sig'];

        $method           = $_POST['method'];
        $status_message   = $_POST['status_message'];

        $merchant_secret = '8X3c32OFJ9m4fTwhsZiLT94ZA1eT9PcXe8QnYaQtdq1p'; // Replace with your Merchant Secret (Can be found on your PayHere account's Settings page)
        // $merchant_secret = '8WAPtCnhegW4OZrOQE2kYn8LNKfi7zxkE4eVJrDXdATG';

        $local_md5sig = strtoupper (md5 ( $merchant_id . $order_id . $payhere_amount . $payhere_currency . $status_code . strtoupper(md5($merchant_secret)) ) );

        if (($local_md5sig === $md5sig) AND ($status_code == 2) ){
            //TODO: Update your database as payment success


            $update = mysqli_query($localhost, "UPDATE `donations` SET 
                                                `trx_payment_id` = '$transaction_ref', 
                                                `trx_payment_code` = '$status_code', 
                                                `trx_payment_message` = '$status_message',
                                                `amount` = '$payhere_amount' 
                                                WHERE `reference_no` = '$order_id' ");

        } // Checkcum End
        
    } // isset end 

} // Request Method

?>