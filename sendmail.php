<?php
include('header.php'); 
if(isset($_POST['task']) && ($_POST['task']) ==  'adminmail')
{
	sendmail();
	$_SESSION['msg'] = "Thanks For Enquiry We Are  Contact Shortly";
	header( "Location:contact.php");
}
elseif(isset($_POST['task']) && ($_POST['task']) ==  'addNewsletter')
{
	addmail();
	//$_SESSION['msg'] = "Thanks For Subscribe";
	header( "Location:index.php");
}
else
{
	sendmail();
	$_SESSION['msg'] = "Thanks For Enquiry We Are  Contact Shortly";
	$id = $_POST['pid'];
	header( "Location:property-detail.php?pid=$id");

	
}


?>