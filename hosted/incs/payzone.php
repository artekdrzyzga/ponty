<?php
/**
Payzone Payment Gateway
* ========================================
* Web:   http://payzone.co.uk
* Email:  online@payzone.com
* Authors: Payzone, Keith Rigby
*/
namespace Payzone;
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (count(get_included_files()) == 1) {
    exit("Direct access not permitted.");
}
//Load payzone module classes
include_once('payzone/Class.Helper.php');
include_once('payzone/Class.TransactionResult.php');
include_once('payzone/Class.Debug.php');
include_once('payzone/Class.Constants.php');
$PayzoneHelper = new Helper;
$PayzoneDebug = new Debug;

//Load Demo Admin data - these settings would usually be loaded from the Admin / backend of the integration
include_once('demo-admin.php');

//Global Config
$PayzoneHelper->setDebugMode($debugmode);
$PayzoneHelper->setIntegrationMethod($integrationtype);//
//Merchant Details
$PayzoneHelper->setMerchantId($merchantid);
$PayzoneHelper->setMerchantPassword($merchantpassword);
$PayzoneDebug->setMerchantId($merchantid);
$PayzoneDebug->setMerchantPassword($merchantpassword);
$PayzoneHelper->setPresharedKey($presharedkey);
$PayzoneHelper->setHashMethod($hashmethod);  //ALLOWS SHA1, MD5, HMACSHA1, HMACSHA256, HMACSHA512
//Transaction settings
$PayzoneHelper->setResultDeliveryMethod($resultdeliverymethod); // Allows SERVER, SERVER_PULL or POST
$PayzoneHelper->setTransactionType($transactiontype);// Allows PREAUTH or SALE
$PayzoneHelper->setCallbackUrl($callbackurl);
$PayzoneHelper->setProcessUrl($processurl);
$PayzoneHelper->setServerResultUrl($serverresulturl);
//Transaction Config variables
$echoavs=  $PayzoneHelper::getEchoAvs();
$echocv2=  $PayzoneHelper::getEchoCv2();
$echothreed=  $PayzoneHelper::getEchoThreed();
$echocardtype=  $PayzoneHelper::getEchoCardType();
$cv2mandatory= $PayzoneHelper::getCv2Mandatory();
$address1mandatory=  $PayzoneHelper::getAddress1Mandatory();
$citymandatory=  $PayzoneHelper::getCityMandatory();
$postcodemandatory=  $PayzoneHelper::getPostcodeMandatory();
$statemandatory=  $PayzoneHelper::getStateMandatory();
$countrymandatory=  $PayzoneHelper::getCountryMandatory();
$serverresulturl= $PayzoneHelper::getServerResultUrl();
$paymentformsdisplaysresult=  $PayzoneHelper::getPaymentFormsDisplaysResult();
$serverresulturlcookievariables=  $PayzoneHelper::getServerResultUrlCookieVariables();
$serverresulturlformvariables=  $PayzoneHelper::getServerResultUrlFormVariables();
$serverresulturlquerystringvariables=  $PayzoneHelper::getServerResultUrlQueryStringVariables();

