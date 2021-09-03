<?php
//Include the main payzone files, and set the base variables
include_once('incs/payzone.php');
if ($resultdeliverymethod === "SERVER") {
    //Check if the communication with this page is from the Payzone Server - or redirected after successful transaction
    if (!isset($_GET['CrossReference'])) {

        //If CrossReference is NOT set - then the call is coming directly from the SERVER method from Payzone
        //The response needs to be validated and then recorded in the Merchant system - the gateway will
        //redirect the user to the callbackurl page once the gateway has a received a response that the transaction
        //is processed
        
        //validate the transaction and passes back the $hashdigest for further checks, $transactionresult object and $errors
        //validate also returns a boolean response - true for validated, false for error
        $validated = $PayzoneHelper::validateResponseHostedServer($_POST, $hashdigest, $transactionresult, $errors);
        $PayzoneHelper::Logger($_POST, "_POST");
        $PayzoneHelper::Logger($_GET, "_GET");
        if ($validated) {
            $saved = passToMerchantSystem($transactionresult);
            $saved = true; //manually set saved status - this would typically be a response from a function to save the transaction
            // response in the merchants system - below is an overview of some methods that provide the key information needed to
            // record the transaction
        }
        if ($validated && $saved) {
            //echo back the status code (0 for successfully recorded) and message to the gateway to let the gateway know that the results have been received and processed
            echo("StatusCode=0&Message=Transaction Recorded");
        } else {
            //if the transaction was not recorded and validated correctly, send a non 0 StatusCode to direct the gateway to show the results on the gateway
            echo("StatusCode=5&Message=Transaction Recording Failed");
        }
    }
    else{
        
    $PayzoneHelper::Logger("Server Response Callback Page hit without SERVER method being set", "Hosted - SERVER ");
    }

} else {
    $PayzoneHelper::Logger('error', 'Unknown Result Delivery Method selected');
}
