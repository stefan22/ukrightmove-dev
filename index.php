<?php 

include 'header1.php';
error_reporting(0);
$Get_slider= get_image_slider();
$Get_slider['img'];
$str = explode(',',$Get_slider['img']);
	$i = 1;
		
				
?>

<div class="showcase">
    <div id="slider" class="sl-slider-wrapper">
          <div class="sl-slider">
            <?php 
        	
        		foreach($str as $test)
        		{
        			$slider = get_property_selected($test);
        			if($i % 2 == 0  )
        			{
        			?>
            <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25"
             data-slice1-scale="2" data-slice2-scale="2">
              <?php
        			}
        			else
        			{
        			?>
              <div class="sl-slide" data-orientation="vertical" data-slice1-rotation="10" data-slice2-rotation="-15" 
              data-slice1-scale="1.5" data-slice2-scale="1.5">
                <?php	
        			}
        			?>
                  <div class="sl-slide-inner">
                      <div class="bg-img" style="background-image:url(images/properties/<?php echo $slider['pimage']; ?>);" ></div>
                      <h2><a href="property-detail.php?pid=<?php echo $slider['pid'];  ?>"><?php echo $slider['ptitle'];  ?></a></h2>
                      <blockquote>
                              <p class="location">
                                  <span class="glyphicon glyphicon-map-marker"></span> 
                                  <?php echo $slider['paddress'];  ?>
                              </p>
                              <div class="slide-desc">
                                    <p><?php echo substr ($slider['pdetail'],0,200);  ?></p>
                              </div> 
                              <div class="slicertop">
                                    <div class="slicerbutton">
                                          <button class="btn btn-success membersearchbutton">
                                                <p><?php echo currency.' '.$slider['pprice'];  ?></p>
                                          </button>
                                   </div>   <!--  end of div slicerbutton -->
                              </div>  <!--  end of div slicer top -->     
                      </blockquote>
                  </div>
              </div>  <!--  end of div sl-slide-inner -->
              <?php
        			 $i++;
        		}
        		?>
            </div>
            <!-- /sl-slider -->
            
                  <nav id="nav-dots" class="nav-dots">
                    <?php
                      $i=0;
                      foreach($str as $test)
                      {
              			if($i  == 0 )
              			{
              			?>
                    <span class="nav-dot-current"></span>
                    <?php
                  		}
              			else
              			{
              			?>
                    <span></span>
                    <?php
                      		
              			}
              			$i++;
                      }
              		?>
                  </nav>
          </div>   <!--  end of div slider-wrapper -->
  
</div>    <!--  end of div showcase -->


<div class="londonrentinguide clearfix">
      <div class="container"> 
              <div class="row"> 
                        <div class="londonguidewrap">
                            <div class="col-lg-8 col-sm-8 guideheadline">
                                    <h3>London Renting Guide</h3>
                            </div>  <!--  end of div guideheadline-->
                            <div class="col-lg-4 col-sm-4 guidetoptip">
                                    <h6>with great renting tips</h6
                            </div>  <!--  end of div guidetoptip-->
                        </div> <!--  end of div londonguidewrap -->
              </div>
              
              <div class="row">
                        <div class="guidemain">
                                <div class="col-lg-4 col-sm-6 guide guide-one">
                                      <a href="#" title="guide-one">
                                          <img src="images/rentready/rguideone.png" alt="guide one" width="300" height="150">
                                      </a>
                                      <p>Download our London renting guide to get all the best tips 
                                            and advice for renting property in London from us.&nbsp;
                                            <a class="longuide" href="#">Read more</a>
                                          </p>
                                </div>  <!--  end of div guide-one -->
                                <div class="col-lg-4 col-sm-6 guide guide-two">
                                      <a href="#" title="guide-one">
                                          <img src="images/rentready/rguidethree.png" alt="guide one" width="300" height="150">
                                      </a>     
                                      <p>Download our London renting guide to get all the best tips 
                                            and advice for renting property in London from us.&nbsp;
                                            <a class="longuide" href="#">Read more</a>  
                                          </p>
                                </div><!--  end of div guide-two -->
                                <div class="col-lg-4 col-sm-6 guide guide-three">
                                      <a href="#" title="guide-one">
                                          <img src="images/rentready/rguidefour.png" alt="guide one" width="300" height="150">
                                      </a>
                                      <p>Download our London renting guide to get all the best tips 
                                            and advice for renting property in London from us.&nbsp;
                                            <a class="longuide" href="#">Read more</a>  
                                          </p>
                                </div><!--  end of div guide-three -->
                        </div>  <!--  end of div guidemain -->        
              </div>   <!--  end of div row-->
      </div>   <!--  end of div container -->
</div>    <!--  end of div londonrentinguide -->



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
      		
      
        
        
        
    </div> <!-- end of recent view -->
    
    
    
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
    </div> <!- end of recommended -->
    <br/><br/>
  </div>
</div>
<?php include'footer.php';?>
