<?php
//Create & submit the 3D Secure request form - if PaREQ is set as as POST'd variable then the 
//acquirer has requested 3D Secure authentication.
//Set form to automatically submit
if ($transactionResult->getStatusCode() === '3' ){
?>
<form id="PayzonePaReqForm" name="PayzonePaReqForm" method="post" action='<?= $transactionResult->getAcsUrl() ?>' target="ACSFrame" >
    <input type="hidden" name="PaReq" value="<?= $transactionResult->getPaReq()?>" />
    <input type="hidden" name="MD" value="<?= $transactionResult->getCrossReference()?>" />
    <input type="hidden" name="TermUrl" value='<?= $PayzoneHelper->getSiteUrl()."process.php" ?>' />
</form>
<iframe  src='/incs/payzone/loading.svg'  id="ACSFrame" name="ACSFrame" src="" width="100%" height="400" frameborder="0"  scrolling='no'></iframe>
<script type='text/javascript'>
window.addEventListener('load', function() {
   document.PayzonePaReqForm.submit();
});
</script>
<?php
}
?>
