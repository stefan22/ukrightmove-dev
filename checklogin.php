<?php
ob_start();
include('header.php'); 

$username= mysql_real_escape_string($_POST['email']);
$password= mysql_real_escape_string($_POST['pass']);
 
$authUser = User($username,$password);
 
header( "Location:justLogin.php");
exit;	


?> 