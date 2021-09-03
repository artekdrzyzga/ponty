<h1>Example Cart</h1>
<form class="payzone-form" id="payzone-payment-form" name="payzone-payment-form" target="_self" method="POST" action="./process.php">
    <!-- OrderDetails -->
    <section>
        <h3>Order Details</h3>
        <label>Amount
            <input type="text" name="Amount" value="<?= $amt ?>">
        </label>
        <label>CurrencyCode
            <input type="text" name="CurrencyCode" value="<?= $currencycode ?>">
        </label>
        <label>TransactionDateTime
            <input type="text" name="TransactionDateTime" value="<?= $transactiondatetime ?>">
        </label>
        <label>TransactionType
            <input type="text" name="TransactionType" value="<?= $transactiontype ?>">
        </label>
        <label>OrderID
            <input type="text" name="OrderID" value="<?= $orderid ?>">
        </label>
        <label>OrderDescription
            <input type="text" name="OrderDescription" value="<?= $orderdesc ?>">
        </label>
    </section>

    <!-- Customer details -->
    <section>
        <h3>Customer Details</h3>
        </label>
        <label>CustomerName
            <input type="text" name="CustomerName" value="<?= $customername ?>">
        </label>
        <label>Address1
            <input type="text" name="Address1" value="<?= $address1 ?>">
        </label>
        <label>Address2
            <input type="text" name="Address2" value="<?= $address2 ?>">
        </label>
        <label>Address3
            <input type="text" name="Address3" value="<?= $address3 ?>">
        </label>
        <label>Address4
            <input type="text" name="Address4" value="<?= $address4 ?>">
        </label>
        <label>City
            <input type="text" name="City" value="<?= $city ?>">
        </label>
        <label>State
            <input type="text" name="State" value="<?= $state ?>">
        </label>
        <label>PostCode
            <input type="text" name="PostCode" value="<?= $postcode ?>">
        </label>
        <label>CountryCode
            <input type="text" name="CountryCode" value="<?= $countrycode ?>">
        </label>
    </section>
    <?php
    if ($integrationtype === 'transparent' || $integrationtype === 'direct' ) {
        ?>
        <!-- Card details -->
        <section>
            <h3>Card Details</h3>
            <label>CardName
                <input type="text" name="CardName" value="<?= $cardname ?>">
            </label>
            <label>CardNumber
                <input type="text" name="CardNumber" value="<?= $cardnumber ?>">
            </label>
            <label>CV2
                <input type="text" name="CV2" value="<?= $cv2 ?>">
            </label>
            <label>ExpiryDateMonth
                <input type="text" name="ExpiryDateMonth" value="<?= $expirydatemonth ?>">
            </label>
            <label>ExpiryDateYear
                <input type="text" name="ExpiryDateYear" value="<?= $expirydateyear ?>">
            </label>
        </section>
    <?php
    }
    ?>
    <!-- Nav details -->
    <section class='w-100'>
        <input type="submit" value="submit">
    </section>
</form>