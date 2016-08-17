<?php
include('function.php'); 

addproperty();

$_SESSION['msg1'] = "Add Property Successfully";

header( "Location:justLogin.php");	
exit;

?>