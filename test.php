<?php
include 'classes.php';
$payment = new Payment();
echo ($payment->getBalance($payment->getAmtToBePaid("Bus fare"),$payment->getTotalAmtPaid(123,"Bus fare")));
?>