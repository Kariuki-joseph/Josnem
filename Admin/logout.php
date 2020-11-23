<?php
session_start();
//unset all sessions
unset($_SESSION['admin']);
unset($_SESSION['bursar']);
unset($_SESSION['user']);
unset($_SESSION['loggedInUser']);
//redirect
header('Location:Login/');
?>