<?php
//start session 
session_start();
//classes
include 'classes.php';
//database connection
include 'dbConnect.php';
?>
<!DOCTYPE html>
<html lang="en">

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
    <title>Josnem Schools</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- ALL VERSION CSS -->
    <link rel="stylesheet" href="css/versions.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">
    <!--favicon-->
<link rel="apple-touch-icon" sizes="57x57" href="icons/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="icons/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="icons/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="icons/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="icons/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="icons/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="icons/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="icons/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="icons/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="icons/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="icons/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="icons/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="icons/favicon-16x16.png">
<link rel="manifest" href="icons/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
    <!--favicon-->

    <!-- Modernizer for Portfolio -->
    <script src="js/modernizer.js"></script>
    <style type="text/css">
        /**gallery images**/
.gal-wrapper{
    margin-bottom: 10px;

}
.gal-img{
max-width: 100%;
height: auto;
margin-top: 5px;
border-radius: 4px;
}
.gal-img img{
    padding: 0px;
    margin: 0px;
    vertical-align: middle;
    border-style: none;
    width: 100%;
    height: auto;
}

.gal-desc{
  text-align: center;
  font-style: italic;
  background: #d6aa24;
  font-size: 18px;
  letter-spacing: 2px;
  border-radius: 4px;
}
.m-section-title{
    font-weight: 300px;
    text-align: center;
    font-size: 30px;
    text-transform: uppercase;
    font-family: all;
    text-decoration: underline;
    text-decoration-color: #ff1919;  

}
.section-wrapper{
    position: relative;
    display: flex;

}
.section-wrapper figure img{
    width: 150px;
    height: 150px;
    border-radius: 100px;
    align-items: flex-start;
}
.section-wrapper p{
    font-size: 18px;
    align-items: flex-end;

}

/*display in one column in mobile view*/
@media (max-width: 500px){
.section-wrapper{
    position: relative;
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-left: 9px;
    margin-right: 9px;

}
.section-wrapper figure img{
    width: 120px;
    height: 120px;
    border-radius: 100px;
    
}
}
@media screen{
    .section-wrapper p{
    font-size: 25px;
    
}
.navbar-brand img{
    width: 120px;
    height: 100px;
    border-radius: 5px;
}
.result-img img{
max-width: 400px;
height: auto;
}
}

.result-img{
display: flex;
justify-content: center;
padding: 8px;
}
.result-img img{
    border-radius: 2px;
    border: none;
}
.result-title{
    font-size: 25px;
    text-decoration: underline;
    font-weight: 300px;
    text-transform: uppercase;

}
.bg-red{
    background: rgba(255,0,0,0.9);
}
button.bg-red:hover{
    background: rgba(255,0,0,0.6);
}
.dropdown-item{
    text-transform: uppercase;
}

#receipt_preview{
   display: flex;
   align-items: center;
   justify-content: center; 
}
div.receipt_preview img{
    width: 100%;
    height: 300px;
}

.validate{
    display:block;
    color:red;
    margin-left: 2px;
}
    </style>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>