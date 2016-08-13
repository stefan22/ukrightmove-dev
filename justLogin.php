<?php 
include'header.php';
error_reporting(0);                             //checklogin.php brought me here	
?>


 <div class="container">
                  <div class="row">
                        <div class="col-lg-8  col-lg-offset-2 col-sm-12">

                              <h3>Thanks for creating an account. Use it to add new properties, upload images, get in touch
                                      with potential clients and more.</h3>

                                       <div class="col-lg-2 col-sm-2 ">
                                              <img src="images/agents/<?php echo $data['image']; ?>" class="img-responsive"  alt="agent name">
                                            </div>

                                            <div class="col-lg-7 col-sm-7 ">
                                              <h4><?php echo $data['name']; ?></h4>
                                              <p><?php echo stripslashes($data['description']); ?></p>
                                            </div>

                                            <div class="col-lg-3 col-sm-3 "><span class="glyphicon glyphicon-envelope"></span>
                                               <a href="mailto:<?php echo $data['email']; ?>"><?php echo $data['email']; ?></a><br>
                                              <span class="glyphicon glyphicon-earphone"></span> 
                                            
                                            <?php echo $data['phone']; ?>

                                          </div>


                        </div> <!--  end of div    -->   
                  </div>    <!--  end of row    -->    
</div>   <!--  end of container    -->



<!--  this stuff remains here   --->

<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="index.php">Home</a> / Agents</span>
    <h2>Agents</h2>
</div>
</div>
<!-- banner -->   
<div class="banner-search">
  <div class="container"> 
    <!-- banner -->
    <h3>Buy, Sale & Rent</h3>
    <div class="searchbar">
      <div class="row">
        <div class="col-lg-6 col-sm-6">
          <form action="buysalerent.php" method="post" >
            <input name="key" type="text" class="form-control" placeholder="Search of Properties">
            <div class="row">
              <div class="col-lg-3 col-sm-3 ">
                <select class="form-control" name="for">
                  <option value="">For</option>
                  <option value="Buy">Buy</option>
                  <option value="Rent">Rent</option>
                  <option value="Sale">Sale</option>
                </select>
              </div>
              <div class="col-lg-3 col-sm-4">
                <select class="form-control" name="price">
                  <option value="">Price</option>
                  <option value="150000 AND 200000"><?php echo currency; ?>150,000 - <?php echo currency; ?>200,000</option>
                  <option value="200000 AND 250000"><?php echo currency; ?>200,000 - <?php echo currency; ?>250,000</option>
                  <option value="250000 AND 300000"><?php echo currency; ?>250,000 - <?php echo currency; ?>300,000</option>
                  <option value="300000"><?php echo currency; ?>300,000 - above</option>
                </select>
              </div>
              <div class="col-lg-3 col-sm-4">
                <select class="form-control" name="type">
                  <option value="">Property Type</option>
                  <option value="Apartment">Apartment</option>
                  <option value="Building">Building</option>
                  <option value="Office Space">Office Space</option>
                </select>
              </div>
              <input type="hidden" name="search" value="search">
              <div class="col-lg-3 col-sm-4">
                <button class="btn btn-success"  onclick="window.location.href='buysalerent.php'">Find Now</button>
              </div>
            </div>
          </form>
        </div>
        <div class="col-lg-5 col-lg-offset-1 col-sm-6 ">
          <?php
		if(($_SESSION['AGENT'] == ''))
		{
		?>
          <p>Join now and be the first to see new properties.</p>
          <button class="btn btn-info"   data-toggle="modal" data-target="#loginpop">Login</button>
          <?php
		}
      ?>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- banner -->
<div class="container">
<div class="properties-listing spacer"> <a href="buysalerent.php?task=all" class="pull-right viewall">View All Listing</a>
  <h2>Featured Properties</h2>
  <div id="owl-example" class="owl-carousel">
    <?php $sel = get_property();
	 while($data = mysql_fetch_assoc($sel))
	{
	?>
    <div class="properties">
      <div class="image-holder"><img src="images/properties/<?php echo $data['pimage']; ?>" class="img-responsive" alt="properties"/>
        <div class="status sold"><?php echo $data['pfor']; ?></div>
      </div>
      <h4><a href="property-detail.php?pid=<?php echo $data['pid']; ?>"><?php echo stripslashes($data['ptitle']); ?></a></h4>
      <p class="price"><?php echo currency; ?><?php echo $data['pprice']; ?></a></p>
      <div class="listing-detail"><span data-toggle="tooltip" data-placement="bottom" data-original-title="Bed Room"><?php echo $data['bedroom']; ?></span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Living Room"><?php echo $data['livingroom']; ?></span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Parking"><?php echo $data['parking']; ?></span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Kitchen"><?php echo $data['kitchen']; ?></span> </div>
      <a class="btn btn-primary" href="property-detail.php?pid=<?php echo $data['pid']; ?>">View Details</a> </div>
    <?php
    
	}
	 
  ?>
  </div>
</div>
<div class="spacer">
  <div class="row">
    
    
    <div class="col-lg-6 col-sm-9 recent-view" style="border:1px solid #666666;height:150px;border-radius:5px;">
      <!-- <h3>About Us</h3> -->
      		
      	<h3>tba</h3>
      		
      <!--//<?php
		//$data = get_about_contant(); 
		//$string1 = addslashes($data['contant']);
		//$string2 = substr($string1, 0, 300);
       //?>
       -->
      <!--<p> <?php echo $string2 ?> <br>
        <a href="about.php">Learn More</a></p>-->
        
        
        
    </div> <!-- end of recent view --->
    
    
    
    <div class="col-lg-5 col-lg-offset-1 col-sm-3 recommended">
      <h3>Recent Properties</h3>
      <div id="myCarousel" class="carousel slide">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1" class=""></li>
          <li data-target="#myCarousel" data-slide-to="2" class=""></li>
          <li data-target="#myCarousel" data-slide-to="3" class=""></li>
        </ol>
        <!-- Carousel items -->
        <div class="carousel-inner">
          <?php
          $recent = get_recent_property();
		  $i = 0;
		  while($recent_property = mysql_fetch_assoc($recent))
		  {
         ?>
          <?php
		  if($i == 0)
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
              <div class="row">
                <div class="col-lg-4"><img src="images/properties/<?php echo $recent_property['pimage']; ?>" class="img-responsive" alt="properties"/>
                </div>
                <div class="col-lg-8">
                  <h5><a href="property-detail.php?pid=<?php echo $recent_property['pid']; ?>"><?php echo $recent_property['ptitle']; ?></a></h5>
                  <p class="price"><?php echo currency; ?><?php echo $recent_property['pprice']; ?></p>
                  <a href="property-detail.php?pid=<?php echo $recent_property['pid']; ?>" class="more">More Detail</a> 
                </div>
              </div><!--  end of row -->
            </div><!-- end of item -->
            
            <?php
		  $i++;
		  }
		  ?>
          </div> <!-- end of item active --->
        </div><!-- end of inner carousel --->
      </div> <!-- end of carousel --->
    </div> <!-- end of recommended --->
    <br/><br/>
  </div>
</div>
<?php include'footer.php';?>