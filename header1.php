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


if(strpos( $_SERVER['REQUEST_URI'] , 'justLogin.php' ))
{
  $title = 'Find properties for sale and properties, flat shares, houses, apartments and rooms for rent in London';
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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">



<link rel="stylesheet" href="assets/style.css"/>

<!-- disabled deprecated jquery -->
<!--<script src="js/jquery-1.9.1.min.js"></script>-->

<!--updated jquery and added migrate plugin -->
<script src="https://code.jquery.com/jquery-3.0.0.js"></script>
<script src="https://code.jquery.com/jquery-migrate-3.0.0.js"></script>
<script src="assets/bootstrap/js/bootstrap.js"></script>

<script src="js/bootstrap-checkbox.min.js" defer></script>
<script src="assets/script.js"></script>

<script type="text/javascript">


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

<script type="text/javascript"> 
// ready function for checkbox
$(document).ready(function() {
    //grab values for true or false
    var forsale = $('input#forsale').is('checked');
    var torent = $('input#torent').is('checked');
    console.log('for sale is: ' + forsale);
    console.log('to rent is: ' + torent);

   


  // enable bootstrap-checkbox via js
  //set default to rent true and sale false
  $('input#torent').prop('checked', true);
  $('input#forsale').prop('checked', false);

  $(':checkbox').checkboxpicker().change(function() {



  });     //checkbox

  





});     //ready function for checkbox
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

          <li class="home"><a href="index.php">ukRightMove.co.uk</a>
            <span class="desc"> Properties, flats and rooms for sale, and to rent</span></li>

             <?php
             
                        if(isset($_SESSION['AGENT']) && ($_SESSION['AGENT'] != ''))    {
            ?>

                        <li class="<?php if(strpos( $_SERVER['REQUEST_URI'] , 'justLogin.php' )){echo 'active'; }?> ">
                          <a href="justLogin.php">Members</a></li>

            <?php
                        }

            ?>
                        
          <li class="<?php if(strpos( $_SERVER['REQUEST_URI'] , 'buy.php' )){echo 'active'; }?> "><a href="buy.php">Buy</a></li>
          <li class="<?php if(strpos( $_SERVER['REQUEST_URI'] , 'rent.php' )){echo 'active'; }?> "><a href="rent.php">Rent</a></li>
          <li class="<?php if(strpos( $_SERVER['REQUEST_URI'] , 'about.php' )){echo 'active'; }?> "><a href="about.php">Rooms</a></li>
          <li class="<?php if(strpos( $_SERVER['REQUEST_URI'] , 'agents.php' )){echo 'active'; }?> " ><a href="agents.php">Agents</a></li>
        <li class="<?php if(strpos( $_SERVER['REQUEST_URI'] , 'contact.php' )){echo 'active'; }?> "><a href="contact.php">Contact us</a></li>
       
    


         <?php


       if(isset($_SESSION['AGENT']) && ($_SESSION['AGENT'] != ''))    {



         ?>

      <li><a href = "javascript:void(0)" onclick = "createlightbox()" ><img id="userprofile" 
                                src="images/agents/<?php echo $_SESSION['AGENT']['image']; ?>" height="30" width="30"></a>
                
                        <div id="light" class="white_content">
                
                              <ul >
                                      <li><a href="justLogin.php">Members</li>
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


else   {

  ?>
              <li class=""><a href=""  data-toggle="modal" data-target="#loginpop">Login</a></li>

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
<?php

     if (strpos( $_SERVER['REQUEST_URI'] , 'justLogin.php' ))  {

?>
           <!-- justLogin.php  -->


 <?php            

} else {

?>

                  <!-- Header Starts -->
                  <!--  entire  search area -->
                  <div id="memberbannerhome"> 
                        <?php
                              $logo = get_logo();
                        ?>
                            
                
                                      <div class="container searchbanner">  
                                            <div class="greaterlondonhome">
                                              <h1>Find your perfect home</h1>
                                                  <h3>Search properties for sale and to rent in London</h3>
                                                  
                                            </div>   <!--  end of div greaterlondonhome -->
                                            
                                            <div class="searchbarheader">
                                                <div class="row">
                                                    <div class="col-lg-8 col-sm-6">
                                                          <form action="buysalerent.php" method="post" id="headerform">
                                                                  
                                                                  <div class="input-group">    
                                                                      <input name="key" type="text" class="form-control" 
                                                                             placeholder="e.g. Cannary Wharf', 'NW3', 'E12', 'Camden station'">
                                                                            <div class="input-group-btn">
                                                                                  <input type="hidden" name="search" value="search">
                                                                                  <button class="btn btn-success membersearchbutton" type="button" onclick="window.location.href='buysalerent.php'">Find now!</button>
                                                                            </div> <!--  end of div input group btn -->
                                                                  </div>  <!--  end of div input-group -->

                                                                  <div class="allmemoptions">                
                                                                            <!-- bootstrap-checkbox buttons -->
                                                                             <div class="col-lg-2 col-sm-2">
                                                                                      <div class="torent">To Rent:
                                                                                                 <input type="checkbox" id="torent" data-group-cls="btn-group-justified">
                                                                                      </div>  <!--  end of div form-group -->
                                                                            </div>  <!--  end of div col-lg2 -->
                  
                                                                             <div class="col-lg-2 col-lg-offset-1 col-sm-2 col-lg-offset-1">
                                                                                      <div class="forsale">For Sale:
                                                                                                 <input type="checkbox" id="forsale" data-group-cls="btn-group-justified">
                                                                                      </div>  <!--  end of div form-group -->
                                                                            </div>  <!--  end of div col-lg2 -->
                                                                         
                                                                  </div> <!--  end of div allmemoptions -->            
                                                                       

                                              <!-- disable options go in advance search option
                                              
                                                                          <div class="col-lg-3 col-sm-4 memberoption">
                                                                              <select class="form-control" name="price">
                                                                                <option value="">Price</option>
                                                                                <option value="60000 AND 80000"><?php echo currency; ?>60,000 - <?php echo currency; ?>80,000</option>
                                                                                <option value="80000 AND 100000"><?php echo currency; ?>80,000 - <?php echo currency; ?>100,000</option>
                                                                                <option value="100000 AND 120000"><?php echo currency; ?>100,000 - <?php echo currency; ?>120,000</option>
                                                                                <option value="120000 AND 150000"><?php echo currency; ?>120,000 - <?php echo currency; ?>150,000</option>
                                                                                <option value="150000 AND 200000"><?php echo currency; ?>150,000 - <?php echo currency; ?>200,000</option>
                                                                                <option value="200000 AND 250000"><?php echo currency; ?>200,000 - <?php echo currency; ?>250,000</option>
                                                                                <option value="250000 AND 300000"><?php echo currency; ?>250,000 - <?php echo currency; ?>300,000</option>
                                                                                <option value="300000"><?php echo currency; ?>300,000 - above</option>
                                                                              </select>
                                                                          </div>  <!- end of div col-lg-3 -->
<!--
                                                                        <div class="col-lg-3 col-sm-4 memberoption">
                                                                              <select class="form-control" name="type">
                                                                                <option value="">Property Type</option>
                                                                                <option value="Houses">Houses</option>
                                                                                <option value="Apartment">Flats/ Apartments</option>
                                                                                <option value="Rooms">Rooms</option>
                                                                              </select>
                                                                        </div>   <!-  end of div col-lg-3-->
 <!--                                                                   </div>   <!-  end of div allmemoptions -->        
 
                                                      </form>
                                                    </div>    <!--  end of div col-lg-8 -->  
                                                 

                                                 
                                                        <?php
                                                          if(($_SESSION['AGENT'] == ''))
                                                          {
                                                          ?>
                                                        <div class="col-lg-3 col-sm-6 searchlogin ">  
                                                        <p>Join now and be the first to see new properties.</p>
                                                        <button class="btn btn-info"   data-toggle="modal" data-target="#loginpop">Login</button>
                                                          <?php
                                                          }
                                                          ?>



                                                    
                                                    </div> <!--  end of div searchlogin -->
                                                  </div>  <!--  end of div row -->
                                                </div> <!--  end of div searchbarheader -->
                                              
                                              </div>   <!--  end of div container -->





                                     </div>    <!---  end of div memberbannerhome  -->         


                                             
                                  

                                  <?php
                                  }

                                  ?>



         
