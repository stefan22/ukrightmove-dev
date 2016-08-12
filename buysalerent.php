
<?php include'header.php';?>
<?php
if(isset($_GET['sort']))
{
//$sel = get_property_sort($_GET['sort']);
	$sort = $_GET['sort'];
	$sql =mysql_query("select * from property_detail where  status= 1 && pfor = '$sort'");
	
	$rec_count = mysql_num_rows($sql);
	$rec_limit = 4;
	
	
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
	$new = $rec_count / $rec_limit ;

	$left_rec = $rec_count - ($page * $rec_limit);

	$sql2 = "select * from property_detail where  status= 1 && pfor = '$sort' LIMIT $offset, $rec_limit";
	
	$sel = mysql_query($sql2)or die(mysql_error());
	//return $sel;


if($_GET['sort'] == 'Buy')
{
	$title = 'Buy';
}

if($_GET['sort'] == 'Rent')
{
	$title = 'Rent';
}

if($_GET['sort'] == 'Sale')
{
	$title = 'Sale';
}
}
if(isset($_POST['search']) && ($_POST['search']) == 'search' )
{
	$sel = 	get_property_search();
}
if(isset($_GET['task']) && ($_GET['task']) == 'all' )
{
	$title = 'All Properties';
	
	$sql =mysql_query("select * from property_detail where  status = '1'");
	
	$rec_count = mysql_num_rows($sql);
	$rec_limit = 4;
	
	
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
	$sql = "select * from property_detail where  status = '1' LIMIT $offset, $rec_limit";
	$sel = mysql_query($sql)or die(mysql_error());	
	



}
?>


<style>
.properties {
    margin-top: 25px;
    font-size: 21px;
    text-align: center;
    animation: fadein 4s;
    -moz-animation: fadein 4s; /* Firefox */
    -webkit-animation: fadein 4s; /* Safari and Chrome */
    -o-animation: fadein 4s; /* Opera */
}
@keyframes fadein {
    from {
        opacity:0;
    }
    to {
        opacity:1;
    }
}
@-moz-keyframes fadein { /* Firefox */
    from {
        opacity:0;
    }
    to {
        opacity:1;
    }
}
@-webkit-keyframes fadein { /* Safari and Chrome */
    from {
        opacity:0;
    }
    to {
        opacity:1;
    }
}
@-o-keyframes fadein { /* Opera */
    from {
        opacity:0;
    }
    to {
        opacity: 1;
    }
}
</style>
<div class="inside-banner">
      <div class="container"> <span class="pull-right"><a href="index.php">Home</a> / <?php echo $title; ?></span>
    <h2><?php echo $title; ?></h2>
  </div>
    </div>
<!-- banner -->

<div class="container">
      <div class="properties-listing spacer">
    <div class="row">
          <div class="col-lg-3 col-sm-4 ">
        <div class="search-form">
        <h4><span class="glyphicon glyphicon-search"></span> Search for</h4>
        <form action="buysalerent.php" method="post" >
              <input name="key" type="text" class="form-control" placeholder="Search of Properties">
              <div class="row">
            <div class="col-lg-5">
                  <select class="form-control" name="for">
                <option value="">For</option>
                <option value="Buy">Buy</option>
                <option value="Rent">Rent</option>
                <option value="Sale">Sale</option>
              </select>
                </div>
            <div class="col-lg-7">
                  <select class="form-control" name="price">
                <option value="">Price</option>
                <option value="150000 AND 200000"><?php echo currency; ?>150,000 - <?php echo currency; ?>200,000</option>
                <option value="200000 AND 250000"><?php echo currency; ?>200,000 - <?php echo currency; ?>250,000</option>
                <option value="250000 AND 300000"><?php echo currency; ?>250,000 - <?php echo currency; ?>300,000</option>
                <option value="300000"><?php echo currency; ?>300,000 - above</option>
              </select>
                </div>
          </div>
              <div class="row">
            <div class="col-lg-12">
                  <select class="form-control" name="type">
                <option value="">Property Type</option>
                <option value="Apartment">Apartment</option>
                <option value="Building">Building</option>
                <option value="Office Space">Office Space</option>
              </select>
                </div>
          </div>
              <input type="hidden" name="search" value="search">
              <button class="btn btn-primary">Find Now</button>
              </div>
            </form>
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
                  <p class="price"><?php echo currency; ?><?php echo $recent_property['pprice']; ?></p>
                </div>
          </div>
              <?php
			 
		  }
		  ?>
            </div>
      </div>
          <div class="col-lg-9 col-sm-8">
        <div class="sortby clearfix">
              <div class="pull-left result"></div>
              <div class="pull-right"> </div>
            </div>
        <div class="row">
              <?php
while($data = mysql_fetch_assoc($sel))
{
?>
              
              <!-- properties -->
              <div class="col-lg-4 col-sm-6" id="new">
            <div class="properties">
                  <div class="image-holder"><img src="images/properties/<?php echo $data['pimage']; ?>" class="img-responsive" alt="properties">
                <div class="status sold"><?php echo $data['ptype']; ?></div>
              </div>
                  <h4><a href="property-detail.php?pid=<?php echo $data['pid']; ?>"><?php echo $data['ptitle']; ?></a></h4>
                  <p class="price">Price:<?php echo currency; ?><?php echo $data['pprice']; ?></p>
                  <div class="listing-detail"><span data-toggle="tooltip" data-placement="bottom" data-original-title="Bed Room"><?php echo $data['bedroom']; ?> </span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Living Room"><?php echo $data['livingroom']; ?></span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Parking"><?php echo $data['parking']; ?></span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Kitchen"><?php echo $data['kitchen']; ?></span> </div>
                  <a class="btn btn-primary" href="property-detail.php?pid=<?php echo $data['pid']; ?>">View Details</a> </div>
          </div>
              <!-- properties -->
              <?php
}

?>
            </div>
             <?php
			 
	  if(isset($_GET['sort']) && ($_GET['sort']) == 'Rent')
	  {
		
		if( $left_rec > $rec_limit &&   $page != 0   )
			{
			
			   $last = $page - 2;
			   echo "<a class=\"pagination_button\" href=\"buysalerent.php?sort=Rent&page=$last\">Previous</a> ";
			   echo "<a class=\"pagination_button\" href=\"buysalerent.php?sort=Rent&page=$page\">Next</a>";
			}
			if( $page == 0 )
			{ if($left_rec <= 0)
			  { 
			   echo "<a class=\"pagination_button\" href=\"buysalerent.php?sort=Rent&page=$page\">Next</a>";
			  }
			}
			if($left_rec <= $rec_limit && $page != 0) 
			{
			   $last = $page - 2;
			   echo "<a class=\"pagination_button\" href=\"buysalerent.php?sort=Rent&page=$last\">Previous</a>";
			} 	  
		}
	if(isset($_GET['sort']) && ($_GET['sort']) == 'Sale')
	  {
		
		if( $left_rec > $rec_limit &&   $page != 0   )
			{
			
			   $last = $page - 2;
			   echo "<a class=\"pagination_button\" href=\"buysalerent.php?sort=Sale&page=$last\">Previous</a> ";
			   echo "<a class=\"pagination_button\" href=\"buysalerent.php?sort=Sale&page=$page\">Next</a>";
			}
			if( $page == 0 )
			{ 
			   
			   echo "<a class=\"pagination_button\" href=\"buysalerent.php?sort=Sale&page=$page\">Next</a>";
			  
			}
			if($left_rec <= $rec_limit && $page != 0) 
			{
			   $last = $page - 2;
			   echo "<a class=\"pagination_button\" href=\"buysalerent.php?sort=Sale&page=$last\">Previous</a>";
			} 
		}
	if(isset($_GET['sort']) && ($_GET['sort']) == 'Buy')
	  {
		if( $left_rec > $rec_limit &&   $page != 0   )
			{
			
			   $last = $page - 2;
			   echo "<a class=\"pagination_button\" href=\"buysalerent.php?sort=Buy&page=$last\">Previous</a> ";
			   echo "<a class=\"pagination_button\" href=\"buysalerent.php?sort=Buy&page=$page\">Next</a>";
			}
			if( $page == 0 )
			{
			 if($left_rec <= 0)
			  { 
			   echo "<a class=\"pagination_button\" href=\"buysalerent.php?sort=Buy&page=$page\">Next</a>";
			  }
			}
			if($left_rec <= $rec_limit && $page != 0) 
			{
			   $last = $page - 2;
			   echo "<a class=\"pagination_button\" href=\"buysalerent.php?sort=Buy&page=$last\">Previous</a>";
			}
			  
		}
	if(isset($_GET['task']) && ($_GET['task']) == 'all' )
	{
			
					
			if( $left_rec > $rec_limit &&   $page != 0   )
			{
			
			   $last = $page - 2;
			   echo "<a class=\"pagination_button\" href=\"buysalerent.php?task=all&page=$last\">Previous</a> ";
			   echo "<a class=\"pagination_button\" href=\"buysalerent.php?task=all&page=$page\">Next</a>";
			}
			if( $page == 0 )
			{
			 if($left_rec >= 0)
			  { 
			   echo "<a class=\"pagination_button\" href=\"buysalerent.php?task=all&page=$page\">Next</a>";
			  }
			}
			if($left_rec <= $rec_limit && $page != 0) 
			{
			   $last = $page - 2;
			   echo "<a class=\"pagination_button\" href=\"buysalerent.php?task=all&page=$last\">Previous</a>";
			}
		
	
	
	}
	
		
	  
	   ?>
  
            
      </div>
      
      
        </div>
  
  </div>
    </div>
    
   
<?php include'footer.php';?>