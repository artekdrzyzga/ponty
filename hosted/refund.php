<!doctype html>
<html lang="en">
<?php
/**
Notes
* Include the main payzone files, and set the base variables
* This file includes a the demo-admin.php file, which contains
* the functionality normally sitting with the admin side of
* the cart / order system
*
* 1) The options / config settings - these are hard coded
*    vars to be passed to the $PayzoneHelper object, these would
*    usually be saved in the admin system for the card / order system
* 2) A transaction saving dummy function, with a switch statement
*    for the various transaction outcomes, the cart / order system
*    can be called from this function to record / process the order
*/
include_once('incs/payzone.php');
//Demo transaction data - this information would usually be sent from
//the cart / order system, for testing this is set as static vars

$crossreference="191029140059476402445645";
$amount="8901";
$orderid="Order-536";


if (isset($_POST['CrossReference'])){
    $crossreference=$_POST['CrossReference'];
    $amount=$_POST['Amount'];
    $orderid=$_POST['OrderID'];
    $processed = $PayzoneHelper->processRefundTransaction($transactionResult, $errorMsg,$crossreference, $amount,$orderid); 
}
?>
<head>
  <meta charset="utf-8">
  <title>Payzone</title>
</head>

<body>
  <?php
  if (!isset($_POST['CrossReference'])){
        //include refund form if nothing has been posted already
        include_once('incs/partials/refund-form.tpl');
    }else{
            
    var_dump($transactionResult);

}
?>
</body>

</html>