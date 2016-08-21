<?php 
include'header.php';          //checklogin.php brought me here	

$data  =  gat_agent_detail();

    //print_r($data);

?>

<?php 
  //view properties page part of members area
  if(isset($_GET['properties_id']))
  {
    
  
//  $detail = get_image_detail($_GET['properties_id']);
  
  Delete('property_detail','pid='.$_GET['properties_id'].'');
  
  Delete('p_image','p_id='.$_GET['properties_id'].'');
 
  $_SESSION['amsg']="Properties Delete Successfuly";
    header( "Location:viewproperty.php");

    exit;
 
  }


$id = $_SESSION['AGENT']['id'];
$sql =mysql_query("select * from property_detail where aid = $id ");
  
  $rec_count = mysql_num_rows($sql);
  $rec_limit = 3;
  
  
  if( isset($_GET{'page'} ) )
  {
     $page = $_GET{'page'} + 1;
     $offset = $rec_limit * $page ;
  }
  else
  {
     $page = 0;
     $offset = 0;
  }
  
  $left_rec = $rec_count - ($page * $rec_limit);


$sql1 = "select * from property_detail where aid = $id LIMIT $offset, $rec_limit ";
$sel = mysql_query($sql1)or die(mysql_error());
  

//$sel = get_agents_properties();
//end of view properties page now in members area
?>




 <div class="container" id="top">
                  <div class="row">
                        <div class="col-lg-12 col-sm-12">
                              <div id="userdash">
                                      <h3>Welcome to your ukRightMove Inbox <?php  echo $data['name']; ?>. <br />
                                        <span class="smallertxt">Use it to add new properties, upload images, get in touch
                                         with potential clients and more.</span> <a class="smallertxt" href="#comehere">Below are a few tips
                                         to help you get started.</a>
                                      </h3>  
                                      
                               </div>       
                        </div> <!--  end of thanks   -->
                   </div> <!-- end of row  ----> 

                   <div class="row">
                        <div class="col-lg-12 col-sm-12" id="dashboard">
                              <div class="col-lg-4 col-sm-5">
                                    <h2>Dashboard</h2>
                              </div>
                              <div class="col-lg-7 col-lg-offset-1 col-sm-7">
                                      <div class="pull-right midgap">
                                             <ul id="usernav">
                                                  <li> <a href="edit_profile.php" type="button" class="btn btn-default">Edit Profile</a><li>
                                                  <li><a href="addproperty.php" type="button" class="btn btn-default">Add Properties</a><li>
                                                  <li><a href="cpass.php" type="button" class="btn btn-default">Change Password</a></li>
                                                  <li><a href="logout.php" type="button" class="btn btn-default">Logout</a></li>
                                              </ul>
                                      </div>
                              </div>

                        </div> <!--  end of dashboard  -->
                   </div> <!-- end of row  ----> 
                   
                   <div class="row">    
                        <div class="col-lg-3 col-sm-3 biggap" id="miniprofile">

                              <ul id="apic">
                                    <li><img src="images/agents/<?php echo $data['image']; ?>" class="img-responsive"  alt="agent name"></li>
                                    <li id="membername"><h4><?php echo $data['name']; ?></h4></li>
                                    <li id="memberdesc"><?php echo stripslashes($data['description']); ?></li>
                                    <li class="intouch"><h5>Get in touch:</h5></li>
                                    <li>Email: <a href="mailto:<?php echo $data['email']; ?>"><?php echo $data['email']; ?></a></li>
                                    <li>Mobile: <?php echo $data['phone']; ?></li>
                              </ul>      

                        </div> <!--  end of div    -->   

                        <div class="col-lg-8 col-lg-offset-1 col-sm-8" id="userMaindash">


                                <!-- view properties/ properties listings -->
                           
                              
                              <div class="row">
                                  <div class="col-lg-12  col-sm-12">
                                  <div class="row">

                                  <?php while($data = mysql_fetch_assoc($sel))
                                  
                                  {
                                  
                                  ?>

                                      <div class="col-lg-4 col-sm-6" id="agent_property">
                                              <div class="properties">
                                                      <div class="image-holder">
                                                            <img src="images/properties/<?php echo $data['pimage']; ?>" 
                                                              class="img-responsive" alt="properties">
                                                            <div class="status sold"><?php echo $data['ptype']; ?></div>
                                                      </div><!---  end of image-holder  -->
                                                      <div class="text-holder">
                                                               <h4><a href="property-detail.php?pid=<?php echo $data['pid']; ?>">
                                                                  <?php echo $data['ptitle']; ?></a>
                                                                </h4>
                                                      </div>
                                                      <div class="price-holder">
                                                                <p class="price">Price:<?php echo currency; ?><?php echo $data['pprice']; ?></p>
                                                      </div>
                                                      <div class="buttons-holder">
                                                                <a class="btn btn-primary member" href="properties_edit.php?properties_id=
                                                                <?php echo $data['pid']; ?>">edit</a>
                                                                <label class="space"></label>    
                                                                <a class="btn btn-primary member" href="viewproperty.php?properties_id=
                                                                <?php echo $data['pid']; ?>">Delete</a>
                                                                <label class="space"></label>
                                                      </div>  
                 
                                                   </div><!--  end of properties div -->
                                                </div>   <!--  end of agent_property div -->
                                  
                                  <?php
                                    }
                                    

                                  ?>
                                      </div> <!--  end of div row -->

                                      <div class="row">
                                           <div class="col-lg-10 col-lg-offset-1 col-sm-10 col-sm-offset-1 pagebox">
                                                <div class="allpages">
                                                     <span class="haveqs">Have questions? Get answers to the most frequently asked questions
                                                            below!
                                                    </span>   
                                                    <?php
                                                          if ( $left_rec > $rec_limit &&   $page != 0   )
                                                    {
                                                  
                                                      $last = $page - 2;
                                                      echo "<a class=\"pagination_button\" href=\"justLogin.php?page=$last\">Previous</a> ";
                                                      echo "<a class=\"pagination_button\" href=\"justLogin.php?page=$page\">Next</a>";
                                                  }
                                                  
                                                  if ( $page == 0 )
                                                  { //if($left_rec <= 0)
                                                    //{ 
                                                      echo "<a class=\"pagination_button\" href=\"justLogin.php?page=$page\">Next</a>";
                                                    //}
                                                  }

                                                  if ($left_rec <= $rec_limit && $page != 0) 
                                                  {
                                                      $last = $page - 2;
                                                      echo "<a class=\"pagination_button\" href=\"justLogin.php?page=$last\">Previous</a>";
                                                  }

                                                  ?>  
                                                </div> <!--  end of div allpages -->
                                               <!--  end of view properties/ properties listings -->
                                           </div>  <!--  end of div col-lg-12 -->
                                      </div>  <!--  end of row for next/previous button -->
                                     

                                       <div class="row">
                                           <div class="col-lg-12 col-sm-12 membershelp">
                                                    <h3 id="comehere">Getting Started | Choosing your location</h3>

                                                <h5>Start your property search with ukRightmove</h5>

                                                <p>In order to get started using Rightmove for your property search, you will have to specify which 
                                                location you are interested in. There are four different kinds of searches you can perform using 
                                                ukRightMove:</p>
                                                <ul>
                                                <li>Locations or areas such as Cities, Towns, Counties, Villages, for example: Bristol, Great Yarmouth, 
                                                Cornwall.</li>
                                                <li>Postcode Outcode, for example: E11, SS7, G1.</li>
                                                <li>Full Postcodes, for example: E11 4QY, L18 4PY.</li>
                                                <li>Train or Tube stations, for example: Waterloo Station, Birmingham New Street Station, Angel Tube.</li>
                                              </ul>

                                                <h5>Searching by Location or Area</h5>

                                                <p>In order to search for properties in a particular location from the Rightmove homepage:</p>
                        
                                                <ol>

                                                    <li>Enter the name of the place you are interested in into the search box.</li>
                                 
                                                    <li>Press the relevant button for properties to buy or properties for rent.</li>
                                       
                                                    <li>If the entered location matches more than one location you will have to choose the select the one 
                                                      you are interested in.</li>
                                    
                                                    <li>Enter the rest of your property criteria as explained in more detail here.</li>
                                                    
                                                 </ol>   

                                                    <p>It is better to enter only the name of the place you are interested in and leave out any names of counties
                                                    or places that place is within. For example, enter "colchester" not "colchester essex". This will give our 
                                                    search engine the best chance of matching your search.</p>


                                                <h5>How do I contact an agent?</h5>      


                                                <p>When you have spotted a property that you want to find out more about, you can phone or email the agent:</p>
                                                

                                                <ol><span class="helpback">Email an agent:</span>
                                               
                                                      <li>Click 'Request details' button or 'Contact agent' link</li>
                                                      <li>Enter in your details (you can sign in if you want us to pre-populate your saved details)</li>
                                                      <li>Click 'Send message'
                                                      <li>All done - your email is sent instantly and the agent or developer should contact you as soon 
                                                        as possible</li>
                                               </ol>



                                                <ol><span class="helpback">Phone an agent:</span>
                                                        <li>Agent's or developer's contact details are available to the left of the property details and on 
                                                          the summary listing</li>
                                              </ol>

                                                <p>Please note that all queries regarding a property on ukRightmove, should be directed to the agent marketing 
                                                the property and not ukRightmove.</p>
                                                <a class="smallertxt pull-right" href="#top">Top</a>
                                           </div>  <!--  end of div col-lg-12 for info text stuff -->
                                       </div>    <!--  end of div row for info text stuff -->
                              
                                  </div> <!--  end div col12 -->
                              </div> <!--  end of row div-->


                        </div>  <!--  end of div col-lg-8 -->
                  </div>    <!--  end of row    --> 

</div>   <!--  end of container    -->



<!--  Search Area Section   -->
<?php 

//get data to get name
$data  =  gat_agent_detail();

    //print_r($data);

?>


<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><img alt="some img goes here" src="#" />  <!--  im going to add an image here later--></span>
    <h2><?php echo $data['name']; ?></h2>
</div>
</div>
<!-- banner -->   
<div class="banner-search">
  <div class="container"> 
    <!-- banner -->
    <h3>Search our Large Selection of Homes for Sale, Properties to Rent, Student Accomodations and Rooms</h3>
    <div class="searchbar">
      <div class="row">
        <div class="col-lg-6 col-sm-6">
          <form action="buysalerent.php" method="post" >
            <input name="key" type="text" class="form-control" placeholder="e.g. 'Cannary Wharf', 'NW3', 'E12', 'Waterloo station'">
            <div class="row">
              <div class="col-lg-3 col-sm-3 ">
                <select class="form-control" name="for">
                
                  <option value="Buy">For Sale</option>
                  <option value="Rent">To Rent</option>
                 
                </select>
              </div>
              <div class="col-lg-3 col-sm-4">
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
              </div>
              <div class="col-lg-3 col-sm-4">
                <select class="form-control" name="type">
                  <option value="">Property Type</option>
                  <option value="Houses">Houses</option>
                  <option value="Apartment">Flats/ Apartments</option>
                  <option value="Rooms">Rooms</option>
              
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
