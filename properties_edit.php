<?php include'header.php';?>
<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="#">Home</a> / Edit Property</span>
    <h2>Edit Property</h2>
</div>
</div>
<!-- banner -->
<?php
if(isset($_POST['pid']) && isset($_POST['pid']) !=  '')
{
	editproperty();	
	$_SESSION['msg1'] = "Edit Properties Successfully";
 	
	//header('Location:properties_edit.php?properties_id='.$_POST['pid']);
      header( "Location:viewproperty.php");  
      exit;
	
}

if(isset($_GET['dpid']))
{
	$detail = get_image_detail($_GET['dpid']);
	$_SESSION['msg1'] = "Delete Image Successfully";

}


		$data  =	gat_properties_detail($_GET['properties_id']);


?>

<div class="container">	
<div class="spacer">	
<div class="row register">	
<div class="col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 ">		
		
<script src="js/gallery.js" type="text/javascript"></script>
<script type="text/javascript">
var count = 1;
$(function(){
	$('p#add_field').click(function(){
		count += 1;
		if(count <=10)
		{
		$('#addcontainer').append(
				
				'<label style="padding-top:5px;">Select Image ' + count + '</label>  <input id="catalog_image' + count + '" name="catalog_image[]' + '" value="" type="file" /><p />' );
		}
		else
		{
			alert("Maximum 10 images you can add..");
		}
	});
});
   </script>    
   <script type="text/javascript" src="administrator/ckeditor/ckeditor.js"></script>
 <div class="box-content">
          <p style="color:#990000; font-size:14px;" align="center">
					<?php if(isset($_SESSION['msg1'])){ 
						?>
						
            <div class="alert alert-success">
							<button type="button" class="close" data-dismiss="alert">×</button>
							<?php echo $_SESSION['msg1'] ; ?>
						</div>
            	    <?php unset($_SESSION['msg1']);		
							
					}?>
    
        	<form action="properties_edit.php" method="post" enctype="multipart/form-data" >
				 <label>Property Title</label>
	            <input type="text" class="form-control" placeholder="Property Title" name="ptitle" value="<?php echo stripslashes($data['ptitle']); ?>">
             
               	<label>Property For</label>
                <select class="form-control" name="pfor">
                <option value="Buy" <?php if($data['pfor']=="Buy"){?>selected<?php }?> >Buy</option>
                <option value="Sale" <?php if($data['pfor']=="Sale"){?>selected<?php }?> >Sale</option>
                <option value="Rent" <?php if($data['pfor']=="Rent"){?>selected<?php }?> >Rent</option>
                </select>
                <label>Property Type</label>
                <select class="form-control" name="ptype">
                <option value="Apartment" <?php if($data['ptype']=="Apartment"){?>selected<?php }?> >Apartment</option>
                <option value="Building" <?php if($data['ptype']=="Building"){?>selected<?php }?>>Building</option>
                <option value="Office Space" <?php if($data['ptype']=="Office Space"){?>selected<?php }?>>Office Space</option>
                </select>
             
               <input type="hidden" name="pid" value="<?php echo $data['pid']; ?>">
             
             <label>Property Description  remove some features - test to make sure right input uploaded</label>
                <textarea placeholder="" name="pdetail" class="form-control">
                <?php echo stripslashes($data['pdetail']); ?>
              </textarea>
                  <script>                             
                     CKEDITOR.replace( 'pdetail' );
              </script>   
                <label>Property Address</label>

                <textarea class="form-control"  name="add"><?php echo $data['paddress']; ?> </textarea>
                    <input type="hidden" name="agent_id" value="<?php echo $_SESSION['AGENT']['id']; ?>">
                
                <label>Price</label>
                    <input type="text" class="form-control"  name="pprice"  value="<?php echo $data['pprice']; ?>" >
                 
                 <label>Bed Rooms -- Only number or will break layout - will come back to this</label>
               	    <input type="text" class="form-control"  name="bedroom" value="<?php echo $data['bedroom']; ?>" >
                 
                 <label>Living Rooms -- Only number or will break layout - will come back to this</label>
                    <input type="text" class="form-control"  name="livingroom" value="<?php echo $data['livingroom']; ?>">
                
                <label>Parking -- Only number or will break layout - will come back to this</label>
                    <input type="text" class="form-control"  name="parking" value="<?php echo $data['parking']; ?>">
                
                <label>Kitchen -- Only number or will break layout - will come back to this</label>
                    <input type="text" class="form-control"  name="kitchen" value="<?php echo $data['kitchen']; ?>">
              
              <label>Map Latitude</label>
               <input type="text" name="lat" value="<?php echo $data['plat']; ?>" class="form-control">
               <label>Map Longitude</label>
               <input type="text" name="long" value="<?php echo $data['plong']; ?>" class="form-control">
            <label>Property Images</label> 
               
                            
                                           <input type="file" name="catalog_image[]" id="catalog_image" value="<?php echo $cata_row['catalog_image'];?>" class="text-long"/>
 <?php if(isset($_GET['id'])){
 	
	while($catalog_image_row=mysql_fetch_array($catalog_image_result))
	{
 ?>
<?php }
	}
?>   
						
<p id="addcontainer"></p>
<p id="add_field">
<span style="color:#0066CC; font-weight:bold; cursor:pointer;">&raquo; Add more images.....</span> 
</p>
                            
                             
                              <?php
                              $sel = Get_image($_GET['properties_id']);
							  while($image = mysql_fetch_assoc($sel))
							  {
							  ?>

						<img src="images/properties/<?php echo $image['image']; ?>" height="150" width="150" >
                        <a href="properties_edit.php?properties_id=<?php echo $_GET['properties_id']; ?>&dpid=<?php echo $image['image_id']; ?>"><img src="images/delete.jpg" height="16" width="16"></a>	 
								<?php
							  }
                                ?>
                                            
 <p></p>
 
 
               
               
               
                <button type="submit" class="btn btn-success" name="Submit">Edit Property</button>
               
</form>

                
        </div>
  
</div>
</div>
</div>
</div>
</form>

<?php include'footer.php';?>