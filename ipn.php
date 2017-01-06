<?php
/**
 * Created by Sevio Solutions.
 * User: Denis DIMA
 * Product: perfectmoney-ipn
 * Date: 04.01.2017
 * Time: 17:38
 * All rights and copyrights are owned by Sevio Solutions®
 */


define("PASSWORD_ACCOUNT", "48h2B42qcZkNzVTEBCwUxlCdu");

if (!isset($_POST['PAYMENT_ID']) || !isset($_POST['PAYEE_ACCOUNT']) || !isset($_POST['PAYMENT_AMOUNT']) || !isset($_POST['PAYMENT_UNITS']) || !isset($_POST['PAYMENT_BATCH_NUM']) || !isset($_POST['PAYER_ACCOUNT']) || !isset($_POST['TIMESTAMPGMT'])) {
    header("Location: cancel.php");
    exit();
}

$amount = $_POST['PAYMENT_AMOUNT'];
$alternatePhraseHash = strtoupper(md5(PASSWORD_ACCOUNT));
$hash = $_POST['PAYMENT_ID'] . ':' . $_POST['PAYEE_ACCOUNT'] . ':' . $_POST['PAYMENT_AMOUNT'] . ':' . $_POST['PAYMENT_UNITS'] . ':' . $_POST['PAYMENT_BATCH_NUM'] . ':' . $_POST['PAYER_ACCOUNT'] . ':' . $alternatePhraseHash . ':' . $_POST['TIMESTAMPGMT'];
$hash2 = strtoupper(md5($hash));

if ($hash2 != $_POST['V2_HASH'])
    exit;

$method = "Uploaded funds";
$completed = "Completed";
$today = date('Y-m-d');
$type = "Perfect Money";

