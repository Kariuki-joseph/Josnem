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

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

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
    text-decoration-color: yellow;  

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

}
.bg-red{
    background: rgba(0,0,0,0.1);
}

    </style>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>