<?php
//start session 
session_start();
//db
include '../dbConnect.php';
if (isset($_POST['login'])) {
	//get form values
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$password = mysqli_real_escape_string($conn,$_POST['password']);

	//encrypt password
	$hashedPass = hash('md5', $password);
	//check if the email exists
	$sql = "SELECT * FROM users WHERE email ='$email' AND password='$hashedPass'";
	$query = mysqli_query($conn, $sql);
	
	if (mysqli_num_rows($query)>0) {
		//set sessions
		//logged in user
		$_SESSION['user']=$email;
		
		$row = mysqli_fetch_array($query);
		$status = $row['status'];
		
		if($status == 'admin'){
			$_SESSION['admin']=$email;
			header('Location:../index.php');
		}elseif ($status == 'bursar') {
			$_SESSION['bursar']=$email;
			header('Location:../index.php');
		}else{
			$_SESSION['user']=$email;
			header('Location:../index.php');
		}
	}else{
		//throw an error, redirect to login 
		$_SESSION['error'] = 'Invalid login details. Please try again';
		header('Location: index.php');
	}
}
?>