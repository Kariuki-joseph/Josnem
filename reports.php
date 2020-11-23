<?php
include 'classes.php';
include 'dbConnect.php';
if (isset($_GET['getAll'])) {
	//get values
	$pymt = htmlentities($_GET['pymt']);
	$condition = $_GET['cnd'];
	$amount = htmlentities($_GET['amt']);
	
$students = new Student1();
$payment = new Payment();
$query = $students->getAllStudents();
$count = 0;
$reportsArr = [];
while ($row = mysqli_fetch_array($query)) {
	$adm = $row['adm'];
	$total = $payment->getAmtToBePaid($pymt);
	$paid = $payment->getTotalAmtPaid($adm,$pymt);
	$bal = $payment->getBalance($total,$paid);
	$report = new Report();
	$report->setName($row['name']);
	$report->setClass($row['class']);
	$report->setAdm($row['adm']);
	$report->setBalance($bal);
	//add the items to the array
	array_push($reportsArr, $report);
$count++;
}
?>
<table cellpadding="5px" border="2px" width="100%" class="mt-3" id="tblResults">
	<tr><th>Name</th> <th>Adm</th> <th>Class</th> <th>Balance</th></tr>
<?php
for ($i=0; $i<$count; $i++) { 
	?>
<tr><td><?php echo $reportsArr[$i]->getName();?></td> <td><?php echo $reportsArr[$i]->getAdm();?></td> <td><?php echo $reportsArr[$i]->getClass();?></td> <td><?php echo $reportsArr[$i]->getBalance();?></td></tr>
	<?php
}
?>
</table>
<?php
}
elseif (isset($_GET['getOne'])) {
	
}
elseif (isset($_GET['getWithTotal'])) {
	
}
?>