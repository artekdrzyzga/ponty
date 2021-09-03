<?php
$testcards = json_decode(file_get_contents(__DIR__."/partials/test-cards.json"), true);
$testcard=$testcards["test1"];

//OrderDetails
$amt = rand(0,9999);
$orderid = 'Order-'.rand(0,999);
$currencycode = '826';
$transactiondatetime = date('Y-m-d H:i:s P');
$orderdesc = 'Order description ';

//Customer Details
$customername = $testcard["customername"];
$address1 = $testcard["address1"];
$address2 = $testcard["address2"];
$address3 = $testcard["address3"];
$address4 = $testcard["address4"];
$city = $testcard["city"];
$state = $testcard["state"];
$postcode = $testcard["postcode"];
$countrycode =$testcard["countrycode"];

//Card Detilas
$cardname =$testcard["cardname"];
$cardnumber = $testcard["cardnumber"];
$cv2 = $testcard["cv2"];
$expirydatemonth = $testcard["expirydatemonth"];
$expirydateyear = $testcard["expirydateyear"];

