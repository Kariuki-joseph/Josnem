<?php
//start session 
session_start();
//db connection 
include '../dbConnect.php';
if (isset($_POST['register'])) {
//get form values
$username = mysqli_real_escape_string($conn,$_POST['username']);
$email = mysqli_real_escape_string($conn,$_POST['email']);
$phone = mysqli_real_escape_string($conn,$_POST['phone']);
$password = mysqli_real_escape_string($conn,$_POST['password']);
$cPassword = mysqli_real_escape_string($conn,$_POST['cPassword']);
//encrypt password
$hashedPass = hash('md5', $password);

$sql = "INSERT INTO users(username, email,phone,password) VALUES('$username','$email','$phone','$hashedPass')";

$query = mysqli_query($conn,$sql);
if ($query) {
	//set session
	$_SESSION['loggedInUser'] = $email;
	header('Location:../index.php');
}else{
	$_SESSION['error']= 'Registration unsuccessful. Plese try again.';
	header('Location:register.php');
}

}
?>