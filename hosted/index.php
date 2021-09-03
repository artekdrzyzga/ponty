<?PHP
   // 10UgXtT4L8JcZRpXWSNt
   
// 10UgXtT4L8JcZRpXWSNt
$key = '9GXwHNVC87VqsqNM';
$url = 'https://gw1.tponlinepayments.com/paymentform/';

// https://gw1.tponlinepayments.com/paymentform/

// const DEFAULT_HOSTED_URL       = 'https://gw1.tponlinepayments.com/paymentform/';
//    const DEFAULT_DIRECT_URL       = 'https://gw1.tponlinepayments.com/direct/';
//    const DEFAULT_MERCHANT_ID      = '119837';
//    const DEFAULT_SECRET           = '9GXwHNVC87VqsqNM'; 


// https://gw1.tponlinepayments2.com:4430
// "https://gw1.tponlinepayments2.com:4430"


if (!isset($_POST['responseCode'])) {

    $req = array(
        'merchantID' => '119837',
        'action' => 'SALE',
        'type' => 1,
        'countryCode' => 826,
        'currencyCode' => 826,
        'amount' => 100,
        'orderRef' => 'Test purchase',
        'transactionUnique' => uniqid(),
        'redirectURL' => ($_SERVER['HTTPS'] == 'on' ? 'https' : 'http') . '://' .
$_SERVER['HTTP_HOST'] . $SERVER['REQUEST_URI'],        
    );


        $req['signature'] = createSignature($req, $key);

        echo '<form action="' . htmlentities($url) . '" method="post">' . PHP_EOL;
        
        foreach ($req as $field => $value) {
            echo ' <input type="hidden" name="' . $field . '" value="' .
            htmlentities($value) . '">' . PHP_EOL; 
        }
   
       echo '  <input type="submit" value="Pay Now">' . PHP_EOL;
       echo '</form>' . PHP_EOL;

    } else {

     $res = $_POST;
     
     $signature = null;
     if (isset($res['signature'])) {
        $signature = $res['signature'];
        unset($res['signature']);
     }


     if (!$signature || $signature !== createSignature($res, $key)) {
        die('Sorry, the signature check failed');
     }   


     if ($res['responseCode'] === "0") {
        echo "<p> Thank you for your payment.</p>";
     } else  {
         echo "<p> Failed to take payment: " . htmlentities($res['responseMessage']) .
      "</p>";
    }   


}
 


    function createSignature(array $data, $key) { // Sort by field name
        ksort($data);
        // Create the URL encoded signature string
        $ret = http_build_query($data, '', '&');
        // Normalise all line endings (CRNL|NLCR|NL|CR) to just NL (%0A)
        $ret = str_replace(array('%0D%0A', '%0A%0D', '%0D'), '%0A', $ret);
        // Hash the signature string and the key together
        return hash('SHA512', $ret . $key); }

       // $hashed = hash("sha512", $password);



?>