<?php include'header.php';?>

<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="#">Home</a> / Register</span>
    <h2>Register</h2>
</div>
</div>
<!-- banner -->


<div class="container">	
<div class="spacer">	
<div class="row register">	
  <div class="col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 ">		

<?php
if(isset($_POST['task']) && ($_POST['task']) == 'edit_profile' )
{
	editagent();
		
}

elseif(isset($_POST['task']) && ($_POST['task']) == 'chaneg_password')
{
	change_password();	
}
else
{
	adduser();
}
?>

                
   </div>
  
</div>
</div>
</div>

<?php include'footer.php';?>