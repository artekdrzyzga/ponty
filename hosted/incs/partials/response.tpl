<a href='/'>Start again</a>

<h1>Transaction Response</h1>

<table>

<?php 
        if ($transactionresult->getStatusCode() === '20'){
?>
<tr>
    <td>PreviousMessage:</td>
    <td><?= $transactionresult->getPreviousMessage(); ?></td>
</tr>
 <tr>
 <td>PreviousStatusCode:</td>
 <td><?= $transactionresult->getPreviousStatusCode(); ?></td>
</tr>

<?php
}else{
?>
<tr>
<td>Message:</td>
<td><?= $transactionresult->getMessage(); ?></td>
</tr>
 <tr>
        <td>StatusCode:</td>
        <td><?= $transactionresult->getStatusCode(); ?></td>
</tr>

<?php
}
?>
<tr>
<td>CrossReference:</td>
<td><?= $transactionresult->getCrossReference(); ?></td>
</tr>
<tr>
<tr>
<td>TransactionOutcome:</td>
<td><?= $transactionresult->getTransactionOutcome(); ?></td>
</tr>
<tr>
        <td>TransactionOutcomeDetail:</td>
        <td><?= $transactionresult->getTransactionOutcomeDetail(); ?></td>
</tr>
<tr>
        <td>OrderId:</td>
        <td><?= $transactionresult->getOrderID(); ?></td>
</tr>
</table>