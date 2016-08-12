<?php include'header.php';?>
<?php
	if(isset($_GET['properties_id']))
	{
 		
	
//	$detail = get_image_detail($_GET['properties_id']);
	
	Delete('property_detail','pid='.$_GET['properties_id'].'');
	
	Delete('p_image','p_id='.$_GET['properties_id'].'');
 
	$_SESSION['amsg']="Properties Delete Successfuly";
		header( "Location:viewproperty.php");

		exit;
 
	}


$id = $_SESSION['AGENT']['id'];
$sql =mysql_query("select * from property_detail where aid = $id ");
	
	$rec_count = mysql_num_rows($sql);
	$rec_limit = 6;
	
	
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
?>
<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="index.php">Home</a> / View Properties</span>
    <h2>View Properties</h2>
</div>
</div>
<!-- banner -->


<div class="container">
<div class="spacer agents">

<div class="row">
  <div class="col-lg-8  col-lg-offset-2 col-sm-12">
 <div class="row">
	<?php while($data = mysql_fetch_assoc($sel))
	{
		?>
     <div class="col-lg-4 col-sm-6" id="agent_property">
            <div class="properties">
                  <div class="image-holder"><img src="images/properties/<?php echo $data['pimage']; ?>" class="img-responsive" alt="properties">
                <div class="status sold"><?php echo $data['ptype']; ?></div>
              </div>
                  <h4><a href="property-detail.php?pid=<?php echo $data['pid']; ?>"><?php echo $data['ptitle']; ?></a></h4>
                  <p class="price">Price:<?php echo currency; ?><?php echo $data['pprice']; ?></p>
                
               <a class="btn btn-primary" href="properties_edit.php?properties_id=<?php echo $data['pid']; ?>">edit</a>
       		  <label class="space"></label>    
             <a class="btn btn-primary" href="viewproperty.php?properties_id=<?php echo $data['pid']; ?>">Delete</a>
              <label class="space"></label>
                 </div>
      					
          </div>   
      <?php
	}
	

	?>
    </div>
    	<?php
        if( $left_rec > $rec_limit &&   $page != 0   )
			{
			
			   $last = $page - 2;
			   echo "<a class=\"pagination_button\" href=\"viewproperty.php?page=$last\">Previous</a> ";
			   echo "<a class=\"pagination_button\" href=\"viewproperty.php?page=$page\">Next</a>";
			}
			if( $page == 0 )
			{ //if($left_rec <= 0)
			  //{ 
			   echo "<a class=\"pagination_button\" href=\"viewproperty.php?page=$page\">Next</a>";
			  //}
			}
			if($left_rec <= $rec_limit && $page != 0) 
			{
			   $last = $page - 2;
			   echo "<a class=\"pagination_button\" href=\"viewproperty.php?page=$last\">Previous</a>";
			}
			?>  
     
  </div>
</div>


</div>
</div>

<?php include'footer.php';?>