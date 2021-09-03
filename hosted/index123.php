<?php
/**
 Notes
* This page is an example of a usual cart form  
* this form will usually POST the information over to the payzone 
* form to process the payment
 */
?>
<!doctype html>
<html lang="en">
<?php
include_once('incs/demo-cart.php');//include dummy cart data
include_once('incs/demo-admin.php');//include dummy admin data
?>
<head>
  <meta charset="utf-8">
  <title>Payzone</title>
  <link rel="stylesheet" type="text/css" href='/incs/style.css' />
</head>
<body>
<?php
//include payment cart demo
include_once('incs/partials/cart.tpl');
?>
</body>

</html>