<?php
include('function.php'); 

addproperty();

$_SESSION['msg1'] = "Add Property Successfully";

header( "Location:addproperty.php");
exit;	

?>