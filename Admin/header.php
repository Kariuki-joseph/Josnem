<?php
//start session 
session_start();
//check for login
if (!isset($_SESSION['admin']) && !isset($_SESSION['bursar']) && !isset($_SESSION['user'])) {
    $_SESSION['error']='You must login to access the requested page.';
    //redirect to login
    header('Location:Login/');
}
//classes
include '../classes.php';
//create users
if(isset($_SESSION['admin'])){
    $currentUser = $_SESSION['admin'];
    //instantiate admin user
    $admin = new User($_SESSION['admin']);
}elseif (isset($_SESSION['bursar'])) {
    $currentUser = $_SESSION['bursar'];
    //instantiate busar user
    $busar = new User($_SESSION['bursar']);
}else{
    $currentUser = $_SESSION['user'];
    //instantiate a regular user
    $user = new User($_SESSION['user']);
}
//instantiate the logged in user
$currentUser = new User($currentUser);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Josnem Schools</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>