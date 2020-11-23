<?php
include('classes.php');
//get the form data
$adm = htmlentities($_GET['adm']);
$name = htmlentities($_GET['name']);
$amt = htmlentities($_GET['amt']);
$class = htmlentities($_GET['class']);

$payment = new feeUpload();
if ($payment->insert($adm,$name,$amt,$class)) {
	echo "Payment submitted succcessfully. Thank you";
}else{
	echo "Unable to submit your payment details. Please try again";
}

?>