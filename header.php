<?php error_reporting(0); 
 
  $filename = 'administrator/includes/db_connection.php';
 
 
 
 include('function.php');
 
 
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php
$title = 'ukRightMove.co.uk';
 
if(strpos( $_SERVER['REQUEST_URI'] , 'index.php' ))
{
	$title = "London&#039;s properties website for properties for sale and properties, apartments, and rooms for rent";
}
if(strpos( $_SERVER['REQUEST_URI'] , 'about.php' ))
{
	$title = 'We got Rooms - Flat shares and Rooms for Rent in London';
}

if(strpos( $_SERVER['REQUEST_URI'] , 'agents.php' ))
{
	$title = 'Find estate agents and lettings agents in London';
}

if(strpos( $_SERVER['REQUEST_URI'] , 'contact.php' ))
{
	$title = 'Interested in how ukRightMove can support the growth of your business? Have any questions? Contact us using
                   the links below';
}

if(strpos( $_SERVER['REQUEST_URI'] , 'buysalerent.php' ))
{
	//$title = 'Buy, Sale & Rent';
	
	if(isset($_GET['sort']))
		{
			
		
		if($_GET['sort'] == 'Buy')
		{
			$title = 'Properties for Sale in London - Find Flats and houses for Sale in London';
		}
		
		if($_GET['sort'] == 'Rent')
		{
			$title = 'Property to Rent inLondon - Flats and Houses for Rent - Rent a property';
		}
		
		if($_GET['sort'] == 'Sale')
		{
			$title = 'Properties for Sale in London - Find Flats and houses for Sale in London';
		}
		}
		if(isset($_POST['search']) && ($_POST['search']) == 'search' )
		{
			$title = 'Search';
		
		}
		if(isset($_GET['task']) && ($_GET['task']) == 'all' )
		{
			$title = 'All Properties';
		
		}

}

if(strpos( $_SERVER['REQUEST_URI'] , 'property-detail.php' ))
{
	$title = 'Property Details';
}

if(strpos( $_SERVER['REQUEST_URI'] , 'edit_profile.php' ))
{
	$title = 'Edit Profile';
}

if(strpos( $_SERVER['REQUEST_URI'] , 'addproperty.php' ))
{
	$title = 'Add Property';
}

if(strpos( $_SERVER['REQUEST_URI'] , 'viewproperty.php' ))
{
	$title = 'View Properties';
}

if(strpos( $_SERVER['REQUEST_URI'] , 'properties_edit.php' ))
{
	$title = 'Edit Property';
}

if(strpos( $_SERVER['REQUEST_URI'] , 'cpass.php' ))
{
	$title = 'Change Password';
}

if(strpos( $_SERVER['REQUEST_URI'] , 'register.php' ))
{
	$title = 'Join now';
}
	
 ?>
<title><?php echo $title; ?> </title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css" />
<link rel="stylesheet" href="assets/style.css"/>

<!-- disabled deprecated jquery -->
<!--<script src="js/jquery-1.9.1.min.js"></script>-->

<!--updated jquery and added migrate plugin -->
<script src="https://code.jquery.com/jquery-3.0.0.js"></script>
<script src="https://code.jquery.com/jquery-migrate-3.0.0.js"></script>



<script src="assets/bootstrap/js/bootstrap.js"></script>
<script src="assets/script.js"></script>
<script language="javascript">


$(document).ready(function(){
    $("#get_links").click(function(){
        $("#hideuser").toggle();
    });
});
</script>

</script>
<!-- Owl stylesheet -->
<link rel="stylesheet" href="assets/owl-carousel/owl.carousel.css">
<link rel="stylesheet" href="assets/owl-carousel/owl.theme.css">
<script src="assets/owl-carousel/owl.carousel.js"></script>
<!-- Owl stylesheet -->

<!-- slitslider -->
<link rel="stylesheet" type="text/css" href="assets/slitslider/css/style.css" />
<link rel="stylesheet" type="text/css" href="assets/slitslider/css/custom.css" />
<link rel="shortcut icon" type="image/x-icon" href="images/real.png">
<script type="text/javascript" src="assets/slitslider/js/modernizr.custom.79639.js"></script>
<script type="text/javascript" src="assets/slitslider/js/jquery.ba-cond.min.js"></script>
<script type="text/javascript" src="assets/slitslider/js/jquery.slitslider.js"></script>
<!-- slitslider -->

    <style type="text/css">
    
       
    </style>
    <script type="text/javascript" language="javascript">
    function createlightbox()
    {
        document.getElementById('light').style.display='block';
        document.getElementById('fade').style.display='block'
    }
    function closelightbox()
    {
        document.getElementById('light').style.display='none';
        document.getElementById('fade').style.display='none'
    }
    </script>


</head>

<body >
<div id="fade" class="black_overlay"  onclick = "closelightbox()"></div>
<!-- Header Starts -->
<div class="navbar-wrapper">
  <div class="navbar-inverse" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse"> 
          <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> 
          <span class="icon-bar"></span> </button>
      </div>
      
      <!-- Nav Starts -->
      <div class="navbar-collapse  collapse">
        <ul class="nav navbar-nav navbar-right">


           <li class="<?php if(strpos( $_SERVER['REQUEST_URI'] , 'buy.php' )){echo 'active'; }?> "><a href="buy.php">Buy</a></li>
            <li class="<?php if(strpos( $_SERVER['REQUEST_URI'] , 'rent.php' )){echo 'active'; }?> "><a href="rent.php">Rent</a></li>

          <li class="<?php if(strpos( $_SERVER['REQUEST_URI'] , 'about.php' )){echo 'active'; }?> "><a href="about.php">Rooms</a></li>
          <li class="<?php if(strpos( $_SERVER['REQUEST_URI'] , 'agents.php' )){echo 'active'; }?> " ><a href="agents.php">Agents</a></li>
  	    <li class="<?php if(strpos( $_SERVER['REQUEST_URI'] , 'contact.php' )){echo 'active'; }?> "><a href="contact.php">Contact us</a></li>
       
		


         <?php
		   if(isset($_SESSION['AGENT']) && ($_SESSION['AGENT'] != ''))
		  {
		 ?>
		  		<li><a href = "javascript:void(0)" onclick = "createlightbox()" ><img id="userprofile" 
                                src="images/agents/<?php echo $_SESSION['AGENT']['image']; ?>" height="30" width="30"></a>
                
                <div id="light" class="white_content">
                
                <ul >
                <li><a href="edit_profile.php">Edit Profile</a></li>
                <li><a href="addproperty.php">Add Property</a></li>
                <li><a href="viewproperty.php">View Properties</a></li>
                <li><a href="cpass.php">Change Password</a></li>
                <li><a href="logout.php">Logout</a></li>
                
                </ul>
                
                </div>
                </li>
 <?php		
		  
		  
		  
		  }
else{
	?>
        <li class=""><a href=""  data-toggle="modal" data-target="#loginpop">Login</a></li>
    	<!--<li class="<?php if(strpos( $_SERVER['REQUEST_URI'] , 'register.php' )){echo 'active'; }?> "><a href="register.php">Join now</a></li>-->
    <?php
}
		  
  ?>
          
        </ul>
      </div>
      <!-- #Nav Ends --> 
      
    </div>
  </div>
</div>
	<div class="box-content">
          <p style="color:#990000; font-size:14px;" align="center">
					<?php if(isset($_SESSION['msg'])){ 
						?>
						
            <div class="alert alert-success">
							<button type="button" class="close" data-dismiss="alert">×</button>
							<?php echo $_SESSION['msg'] ; ?>
						</div>
            	    <?php unset($_SESSION['msg']);		
							
					}?>
           
<!-- #Header Starts -->

<div class="container"> 
  <?php
  $logo = get_logo();
  ?>
  <!-- Header Starts -->
  <div class="header"> <a href="index.php"><img src="images/logo/<?php echo $logo['value']; ?>" alt="Logo Image" height="100" width="300"></a>
    <ul class="pull-right">
       <!--<li style="color:#646a5b;font-size:20px;padding-bottom:20px; line-height:30px;">
       Search properties for Sale and to Rent in London:</li>-->	
      
      <!-- <li><a href="buysalerent.php?sort=Buy">Buy</a></li> -->
      
      <li><a href="buysalerent.php?sort=Sale">For sale</a></li>
      <li><a href="buysalerent.php?sort=Rent">To rent</a></li>
    </ul>
  </div>
  <!-- #Header Starts --> 
</div>
