<?php 
include 'classes.php';

//get values
//$class = htmlentities($_GET['class']);
$adm = htmlentities($_GET['adm']);
$password = htmlentities($_GET['password']);

$result = new Result();
if (mysqli_num_rows($result->login($adm,$password))>0) {

	$student = new Student($adm);

$slip = new Slip($student->getName(),$student->getClass(),$student->getAdm(),$student->getResultSlip());

//echo json
echo json_encode($slip);

}else{
	echo "Invalid login details. Please try again";
}


?>