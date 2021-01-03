<?php
include 'classes.php';
$payment = new Payment();
echo ($payment->getBalance($payment->getAmtToBePaid("Bus fare"),$payment->getTotalAmtPaid(123,"Bus fare")));
?>

//get values
	$pymt = htmlentities($_GET['pymt']);
	$condition = $_GET['cnd'];
	$amount = htmlentities($_GET['amt']);
$payment = new Payment();
//filter payments based on a condition
$query = $payment->getSummary($pymt,$condition,$amount);
?>
<table cellpadding="5px" border="2px" width="100%" class="mt-3" id="tblResults">
<thead>
    <tr>
        <th>Name</th>
        <th>Adm No.</th>
        <th>Class</th>
        <th>Amount</th>
     </tr>
</thead>
<tbody>
    <?php
    while ($row = mysqli_fetch_array($query)) {
    $student = new Student($row['adm']);
	$pays = $payment->getTotalAmtPaid($row['adm'],$pymt);
	$paymentSummary = new PaymentSummary($row['adm'],$pymt,$pays);
	//filter by students who have paid a certain amt of fees
	$amt = mysqli_fetch_array($paymentSummary->getSummary($row['adm'],$pymt,$condition,$amount));

	?>
<tr>
    <td><?php echo $student->getName();?></td>
    <td><?php echo $student->getAdm();?></td>
    <td><?php echo $student->getClass();?></td>
    <td>Ksh. <?php echo $amt['amount'];?>.00</td>
</tr>
<?php
}
?>
</tbody>
</table>
<?php