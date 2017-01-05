<?php
/**
 * Created by Sevio Solutions.
 * User: Denis DIMA
 * Product: perfectmoney-ipn
 * Date: 04.01.2017
 * Time: 17:31
 * All rights and copyrights are owned by Sevio Solutions®
 */
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payza Payment Form</title>
    <style>
        label {
            display: block;
            padding: 5px 0;
        }

        input {
            display: block;
        }
    </style>
</head>

<body>

<form action="https://perfectmoney.is/api/step1.asp" method="POST">
    <input type="hidden" name="PAYEE_ACCOUNT" value="U13705405">
    <input type="hidden" name="PAYEE_NAME" value="Sevio Solutions">
    <input type="hidden" name="PAYMENT_AMOUNT" value="0.01">
    <input type="hidden" name="PAYMENT_UNITS" value="USD">
    <input type="hidden" name="PAYMENT_ID" value="testing">
    <input type="hidden" name="STATUS_URL" value="http://www.botlist.net/perfectmoney-ipn/ipn.php">
    <input type="hidden" name="PAYMENT_URL" value="http://www.botlist.net/perfectmoney-ipn/finish.php">
    <input type="hidden" name="PAYMENT_URL_METHOD" value="POST">
    <input type="hidden" name="NOPAYMENT_URL" value="http://www.botlist.net/perfectmoney-ipn/cancel.php">
    <input type="hidden" name="NOPAYMENT_URL_METHOD" value="POST">
    <input type="hidden" name="BAGGAGE_FIELDS" value="">
    <input type="hidden" name="SUGGESTED_MEMO" value="">
    <input type="hidden" name="SUGGESTED_MEMO_NOCHANGE" value="">
    <input type="hidden" name="FORCED_PAYER_ACCOUNT" value="">
    <input type="hidden" name="AVAILABLE_PAYMENT_METHODS" value="all">
    <input type="hidden" name="INTERFACE_LANGUAGE" value="ro_RO">
    <input type="submit" name="PAYMENT_METHOD" value="Pay Now!">
</form>
</body>
</html>

