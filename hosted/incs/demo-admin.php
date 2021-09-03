<?php
//This file + these variables would usually
//be a direct call to the ADMIN option /
//setting getter function rather than a static
//list of
include_once('payzone/Class.Constants.php');
$debugmode = false;

//Merchant details
$merchantid = '137531';
$merchantpassword = 'Androulla1@';
$presharedkey = '10UgXtT4L8JcZRpXWSNt';

//Transaction details
$integrationtype = Payzone\INTEGRATION_TYPE::HOSTED; // hosted , transparent direct
$hashmethod = Payzone\HASH_METHOD::SHA1;
$resultdeliverymethod = Payzone\RESULT_DELIVERY_METHOD::POST;
$transactiontype = Payzone\TRANSACTION_TYPE::SALE;

if(isset($PayzoneHelper)){
$callbackurl = $PayzoneHelper->getSiteUrl().'/callback.php';
$processurl = $PayzoneHelper->getSiteUrl().'/process.php';
$serverresulturl =$PayzoneHelper->getSiteUrl().'/callback-server.php';
}
/**
Demo admin function for saving the transaction to the merchants system
 *
 */
function passToMerchantSystem($transactionresult)
{

    //$ORderID = $_POST['OrderId']
    /** The $transactionresult object has several get methods to get the various transaction details returned from the gateway
     * See below methods and descriptions for these methods
     * $transactionresult->getOrderId() //return the OrderID sent from the merchants system for the transaction
     * $transactionresult->getCrossReference() //return CrossReference the unique transaction reference
     * $transactionresult->getMessage() //return the Message from the gateway, this contains the authcode / decline reason etc
     * $transactionresult->getStatusCode() //return the StatusCode from the gateway, outcomes listed below
     *          0 - Transaction Succesful
     *          3 - 3D secure required
     *          5 - Transaction Declined
     *          20- Duplicate Transaction
     *          30- Unknown error occured
     * $transactionresult->getPreviousMessage() //as above but for previous / duplicate transaction
     * $transactionresult->getPreviousStatusCode() //as above but for previous / duplicate transaction
     * $transactionresult->getTransactionOutcome() //return human readable outcome (i.e Successful, Declined, Duplicate)
     * $transactionresult->getTransactionOutcomeDetail() //return human readable outcome (i.e Failed on CV2 code, passed on Address Verification etc)
     *
     * See the incs/payzone/Class.TransactionResult.php file for further methods
     *
     */

    //THe below switch statement allows for custom handling of the transaction response, for success / decline etc
    switch ($transactionresult->getStatusCode()) {
        case Payzone\RESPONSE_CODE::SUCCESSFUL: //Transaction Successful
            break;
        case Payzone\RESPONSE_CODE::DECLINED: //Transaction Declined
            break;
        case Payzone\RESPONSE_CODE::DUPLICATE: //Duplicate Transaction
            //$transactionresult->getPreviousMessage() //as above but for previous / duplicate transaction
            //$transactionresult->getPreviousStatusCode() //as above but for previous / duplicate transaction
            break;
        case Payzone\RESPONSE_CODE::ERROR: //Unknown Error
        default:
            break;
    }
    return true; //return true to spoof saving to the database for merchant demo
}
