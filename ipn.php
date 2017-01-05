<?php
/**
 * Created by Sevio Solutions.
 * User: Denis DIMA
 * Product: perfectmoney-ipn
 * Date: 04.01.2017
 * Time: 17:38
 * All rights and copyrights are owned by Sevio Solutions®
 */


define("PASSWORD_ACCOUNT", "7048706");

if (!isset($_POST['PAYMENT_ID']) || !isset($_POST['PAYEE_ACCOUNT']) || !isset($_POST['PAYMENT_AMOUNT']) || !isset($_POST['PAYMENT_UNITS']) || !isset($_POST['PAYMENT_BATCH_NUM']) || !isset($_POST['PAYER_ACCOUNT']) || !isset($_POST['TIMESTAMPGMT'])) {
    header("Location: cancel.php");
    exit();
}

$amount = $_POST['PAYMENT_AMOUNT'];
$alternatePhraseHash = strtoupper(md5(PASSWORD_ACCOUNT));
$hash = $_POST['PAYMENT_ID'] . ':' . $_POST['PAYEE_ACCOUNT'] . ':' . $_POST['PAYMENT_AMOUNT'] . ':' . $_POST['PAYMENT_UNITS'] . ':' . $_POST['PAYMENT_BATCH_NUM'] . ':' . $_POST['PAYER_ACCOUNT'] . ':' . $alternatePhraseHash . ':' . $_POST['TIMESTAMPGMT'];
$hash2 = strtoupper(md5($hash));

if($hash2 != $_POST['V2_HASH']){
    echo ("Hash mismatch");
    file_get_contents("HASH");
    exit;
}

file_put_contents("test.txt",$_POST);
exit;
$pending = "Pending";

$sqlcheck1 = "SELECT * FROM payments WHERE Hash = '$hash' AND Status = '$pending'";
$rescheck1 = mysql_query($sqlcheck1);
if (mysql_num_rows($rescheck1) != 0) {
    if ($hash2 == $_POST['V2_HASH']) {
        echo "Hash2 = V2_HASH";
        $method = "Uploaded funds";
        $completed = "Completed";
        $today = date('Y-m-d');
        $type = "Perfect Money";
        $addfunds = "UPDATE balance SET Balance = Balance + '$sum' WHERE User = '$uploader'";
        $addhistory = "INSERT INTO bank (User,Amount,Method,Transdate,Type,Status) VALUES ('$me','$sum','$method','$today','$type','$status')";
        $updatepayment = "UPDATE payments SET Status = '$completed' WHERE Hash = '$hash' AND User = '$uploader'";
        mysql_query($addfunds);
        mysql_query($addhistory);
        mysql_query($updatepayment);
        header("bank.php");
        exit();
    }
    if ($hash2 != $_POST['V2_HASH']) {
        echo "hash2 != V2_HASH";
        header("location:error.php?id=2");
        exit();
    }
}
file_put_contents("test.txt", "merge");
