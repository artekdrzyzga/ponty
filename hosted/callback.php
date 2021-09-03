<?php
if (isset($_POST['PaRes']) || isset($_POST['PaREQ']) || isset($_POST['StatusCode']) || isset($_GET['CrossReference'])  || isset($_POST['DirectCallback'])) {
//If none of the above variables have been set - then the request is not from the payzone gateway
    //Include the main payzone files, and set the base variables
    include_once 'incs/payzone.php';

    switch ($integrationtype) {
        case 'hosted':
            //validate the transaction and passes back the $hashdigest for further checks, $transactionresult object and $errors
            //validate also returns a boolean response - true for validated, false for error
            $validated = $PayzoneHelper::validateResponseHosted($_GET, $_POST, $hashdigest, $transactionresult, $errors);
            if ($validated) {
                //This is just a dummy function - this would usually the be merchatns CMS/ DB or Order system
                $saved = passToMerchantSystem($transactionresult);
            }
            //End of hosted
            break;
        case 'transparent':
            //If PaRes has been sent, then 3D secure has been processed and returned for authentication / hash checks
            if (isset($_POST['PaRes'])) {
                $transactiondatetime = date('Y-m-d H:i:s P');
                $crossreference = $_POST['MD']; // MD returned is the cross reference ID
                $pares = $_POST['PaRes'];
                $processing = true; //manually override hash validation to send hashdigest into form for submission
                $validated = false; //manually override hash validation to send hashdigest into form for submission
                $stringtohash = $PayzoneHelper::generateStringToHash_Transparent3dSecure($crossreference, $transactiondatetime, $pares);
                $hashdigest = $PayzoneHelper::generateHashDigest($stringtohash, $presharedkey, $hashmethod);
                $errors = ""; //manually override hash validation to send hashdigest into form for submission
            } else {
                //validate the transaction and passes back the $hashdigest for further checks, $transactionresult object and $errors
                //validate also returns a boolean response - true for validated, false for error
                $validated = $PayzoneHelper::validateResponseTransparent($_POST, $hashdigest, $transactionresult, $errors);
            }
            if ($validated) {
                //This is just a dummy func tion - this would usually the be merchatns CMS/ DB or Order system
                $saved = passToMerchantSystem($transactionresult);
            }
            //End of transparent
            break;
            case 'direct':
                    //validate the transaction and passes back the $hashdigest for further checks, $transactionresult object and $errors
                    //validate also returns a boolean response - true for validated, false for error
                    $validated = $PayzoneHelper::validateResponseDirect($_POST, $hashdigest, $transactionresult, $errors);
                    if ($validated) {
                        //This is just a dummy function - this would usually the be merchatns CMS/ DB or Order system
                        $saved = passToMerchantSystem($transactionresult);
                    }
            break;

        default:
            # code...
            break;
    }

} else {
    exit("No variables sent"); //manually exit page as none of the expected variables were sent

}
?>
<head>
  <meta charset="utf-8">
  <title>Payzone</title>
</head>
<body>
<?php

if ($validated || isset($processing)) {
    //Check if transaction is validated and the response sent from the server matches the expected response
    //$validated will be true if the hash matches, false if the hash check failed
    //$processing will only be set for instances where a Hash is not required, i.e. 3d secure auth processing
    switch ($integrationtype) {
        case 'hosted':
            if($resultdeliverymethod ==='SERVER'){
                //SERVER method is selected, the the transaction results will need to retrieved from the merchatns sytem rather than MMS
                ?>
                <h3>Response from SERVER needs data to be saved & accessed from the merchants sytem</h3>
                <h3>The transaction response object below will be empty by default as there is save / retrieve functonality in this demo code base</h3>
                <?php
            }
                 // the validation transaction will need to display the response
                 include_once 'incs/partials/response.tpl';
            
            break;
        case 'transparent':
            if( (isset($_POST['PaRes']) || isset($_POST['PaREQ']))){
                //PaRes + PaReq are values sent for 3D secure auth - if either are set then present the 3d secure template
                include_once 'incs/partials/transparent-3dsecure.tpl';
            }else{
                //if no PaRes or PaReq are sent, then the validation transaction will need to display the response
                include_once 'incs/partials/response.tpl';
            }
            break;
        case 'direct':
            if( (isset($_POST['PaRes']) || isset($_POST['PaREQ']))){
                //PaRes + PaReq are values sent for 3D secure auth - if either are set then present the 3d secure template
                include_once 'incs/partials/direct-3dsecure.tpl';
            }else{
                //if no PaRes or PaReq are sent, then the validation transaction will need to display the response
                include_once 'incs/partials/response.tpl';
            }
            break;
        default:
            # code...
            break;
    }
    

}
?>
<div class='error-container'>
<?php
if ($errors) {
    //If there is information passed in the $errors array, loop through and show the details
    ?>
        <h1>Error Occured:</h1>
<?php
foreach ($errors as $error) {
        ?>
            <p>Error : <?=$error?></p>
<?php
}
}
?>
</div>
</body>
</html>