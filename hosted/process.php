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
//include_once('incs/demo-cart.php');
switch ($integrationtype) {
    case 'hosted':
        //Generate the string to hash from the demo cart payment variables
        $StringToHash = $PayzoneHelper::generateStringToHash_HostedForm(
            $_POST['Amount'],
            $_POST['CurrencyCode'],
            $_POST['OrderID'],
            $transactiontype,
            $_POST['TransactionDateTime'],
            $_POST['OrderDescription'],
            $_POST['CustomerName'],
            $_POST['Address1'],
            $_POST['Address2'],
            $_POST['Address3'],
            $_POST['Address4'],
            $_POST['City'],
            $_POST['State'],
            $_POST['PostCode'],
            $_POST['CountryCode']
        );
        break;
    case 'transparent':
        //Generate the string to hash from the demo cart payment variables
        $StringToHash = $PayzoneHelper::generateStringToHash_TransparentForm(
            $_POST['Amount'],
            $_POST['CurrencyCode'],
            $_POST['OrderID'],
            $transactiontype,
            $_POST['TransactionDateTime'],
            $_POST['OrderDescription']
        );
        break;
    case 'direct':
        if (!isset($_POST['PaRes']) && !isset($_POST['PaReq'])  ){
            //Generate the string to hash from the demo cart payment variables
            $StringToHash = $PayzoneHelper::generateStringToHash_DirectForm(
                $_POST['Amount'],
                $_POST['CurrencyCode'],
                $_POST['OrderID'],
                $transactiontype,
                $_POST['TransactionDateTime'],
                $_POST['OrderDescription']
            );
            //Process direct API Transaction
            $processed = $PayzoneHelper->processDirectTransaction($transactionResult,$errorMsg); 
        }else if (isset($_POST['PaRes'])){
            $StringToHash = $PayzoneHelper::generateStringToHash_Direct3d(
                $_POST['MD'],
                $_POST['PaRes']
            );
            $processed = $PayzoneHelper->processDirect3DTransaction($transactionResult,$errorMsg,$_POST['MD'],$_POST['PaRes']); 
        } else{
            $processed =false;
        }
        break;
}
//Generate hash digest from the string to hash
$HashDigest = $PayzoneHelper::generateHashDigest($StringToHash, $presharedkey, $hashmethod);
?>
<head>
  <meta charset="utf-8">
  <title>Payzone</title>
</head>

<body>
  <?php
switch ($integrationtype) {
    case 'hosted':
        //include payment form for hosted payment form method
        include_once('incs/partials/hosted-paymentform.tpl');
        break;
    case 'transparent':
        //include payment form for transparent redirect method
        include_once('incs/partials/transparent-paymentform.tpl');
        break;
    case 'direct':
    if ($processed){
        //Process transaction
        if ($transactionResult->getStatusCode() === '3'){
            include_once('incs/partials/direct-3dsecure.tpl');
        }else{
            include_once('incs/partials/direct-paymentform.tpl');
        
        }
    }
     
        break;
}
?>
</body>

</html>