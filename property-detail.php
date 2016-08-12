<?php include'header.php';?>
<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="index.php">Home</a> / Property Details </span>
    <h2>Property Details</h2>
</div>
</div>
<!-- banner -->


<div class="container">
<div class="properties-listing spacer">

<div class="row">
<div class="col-lg-3 col-sm-4 hidden-xs">

<div class="hot-properties hidden-xs">
<h4>Recent Properties</h4>
<?php
 $recent = get_recent_property();
		  while($recent_property = mysql_fetch_assoc($recent))
		  {
         ?>
         <div class="row">
                <div class="col-lg-4 col-sm-5"><img src="images/properties/<?php echo $recent_property['pimage']; ?>" class="img-responsive img-circle" alt="properties"></div>
                <div class="col-lg-8 col-sm-7">
                  <h5><a href="property-detail.php?pid=<?php echo $recent_property['pid']; ?>"><?php echo $recent_property['ptitle']; ?></a></h5>
                  <p class="price"><?php echo currency; ?><?php echo $recent_property['pprice']; ?></p> </div>
              </div>

          <?php
		  }
		  
		  ?>
        

</div>



<div class="advertisement">
  <h4>Advertisements</h4>
  <?php
  $add_sel = get_add();
  
  while($add_ar = mysql_fetch_assoc($add_sel))
  {
  ?>
  
 
  <a href="<?php echo $add_ar['link']; ?>" target="_blank" ><img src="images/advertisements/<?php echo $add_ar['img']; ?>" class="img-responsive" alt="advertisement">
</a>&nbsp;&nbsp; 	<?php
     }
    ?>
</div>

</div>
 <?php $data = get_property_selected($_GET['pid']);
 $sel = get_proerty_images($_GET['pid']);
 $agent = get_agent_detail($data['aid']);
 ?>
<div class="col-lg-9 col-sm-8 ">


<div class="row">
  <div class="col-lg-8">
  <div class="property-images">
<h2><?php echo stripslashes($data['ptitle']); ?></h2>
   
       <!-- Slider Starts -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators hidden-xs">
      <?php
	  $i = mysql_num_rows($sel);
	  for($i ; $i>0 ; $i--)
		{
			if($i == 0)
			{
			?>
            <li data-target="#myCarousel" data-slide-to="<?php echo $i; ?>"  class="active"></li>
            <?php	
			}
			else
			{
				?>
				<li data-target="#myCarousel" data-slide-to="<?php echo $i; ?>"  class=""></li>
				<?php
            }
		}
?>
        </ol> 
	    
      <div class="carousel-inner">
        <!-- Item 1 -->
		  <?php
		$i = 0;
		 while($images = mysql_fetch_assoc($sel))
		{
		 if($i  == 0)
		{
			?>
			<div class="item active">
			<?php	
		}
		else
		{
			?>
			<div class="item">
            <?php
		}
		?>
        <img src="images/properties/<?php echo $images['image']; ?>" class="properties" alt="properties" />
        </div>
        <?php
		$i++;
		}
      ?>
     
        
     
      
        
        
        
        
        
      </div>
<a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div>
<!-- #Slider Ends -->

   
   
  </div>
  



  <div class="spacer"><h4><span class="glyphicon glyphicon-th-list"></span> Property Details</h4>
     
      

  <?php echo stripslashes($data['pdetail']); ?>
  </div>

<style>
#well{width:100%;   padding-right: 26px;
  top: -60px;
  float:right;
  height:350px ;}
  #map{  margin-bottom: 76px;}
</style>

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=false&key=AIzaSyCXRZzkQH67zC5r2ytu8vqBThNl0dZVhwU"></script> 

    <script>
function initialize() {
  var myLatlng = new google.maps.LatLng('<?php echo $data['plat']; ?>','<?php echo $data['plong']; ?>');
  var mapOptions = {
    zoom: 15,
    center: myLatlng
  }
  var map = new google.maps.Map(document.getElementById('well'), mapOptions);

  var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
      title: '<?php echo $data['ptitle']; ?>'
  });
}

google.maps.event.addDomListener(window, 'load', initialize);

    </script>

  <div><h4 id="map"><span class="glyphicon glyphicon-map-marker"></span> Location</h4>
 </div>
 <div id="well"></div>
  

  </div>
  <div class="col-lg-4">
  <div class="col-lg-12  col-sm-6">
<div class="property-info">
<p class="price"><?php echo currency; ?><?php echo $data['pprice']; ?></p>
  <p class="area"><span class="glyphicon glyphicon-map-marker"></span> <?php echo $data['paddress']; ?></p>
  
  <div class="profile">
  <span class="glyphicon glyphicon-user"></span> Agent Details
  <p><?php echo $agent['name']; ?><br><?php echo $agent['phone']; ?></p>
  </div>
</div>

    <h6><span class="glyphicon glyphicon-home"></span> Amenities</h6>
    <div class="listing-detail">
    <span data-toggle="tooltip" data-placement="bottom" data-original-title="Bedrooms"><?php echo $data['bedroom']; ?></span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Living Room"><?php echo $data['livingroom']; ?></span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Parking"><?php echo $data['parking']; ?></span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Kitchen"><?php echo $data['kitchen']; ?></span> </div>

</div>
<div class="col-lg-12 col-sm-6 ">
<div class="enquiry">
  <h6><span class="glyphicon glyphicon-envelope"></span> Email Agent</h6>
  <form role="form" method="post" action="sendmail.php">
                <input type="text" class="form-control" required name="name" placeholder="your name"/>
                <input type="email" class="form-control" required name="email" placeholder="your email"/>
                <input type="text" class="form-control" required name="number" placeholder="mobile number"/>
                <textarea rows="6" class="form-control" required name="query" placeholder="Whats on your mind?"></textarea>
                <input type="hidden" name="pid" value="<?php echo $data['pid']; ?>">
                <input  type="hidden" name="aemail" value="<?php echo $agent['email']; ?>">
      <button type="submit" class="btn btn-primary" name="Submit">Send Message</button>
      </form>
 </div>         
</div>
  </div>
</div>
</div>
</div>
</div>
</div>

<?php include'footer.php';?>