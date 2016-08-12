<?php include'header.php';?>
<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="index.php">Home</a> / Add Property</span>
    <h2>Add Property</h2>
</div>
</div>
<!-- banner -->


<div class="container">	
<div class="spacer">	
<div class="row register">	
<div class="col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 ">		

<style>
#well{width:40%; height:250px;   padding-right: 26px;
  top: -60px;
  float:right}
</style>


 <script src="administrator/js/jquery-1.9.1.min.js"></script>

<script type="text/javascript" src="administrator/js/jquery.validate.min.js"></script>

<script type="text/javascript">
(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            //form validation rules
            $("#property").validate({
                rules: {
					pname: "required", 
          add: "required",
          pdetail: "required",
          price: "required",
           bedroom: "required",
		   livingroom: "required",
		   parking : "required",
		   kitchen : "required",
		   lat: "required",
		   long: "required",
		   
            
            },
                 messages: { 
				pname : "Please Enter Full Name",
           add: "Please Enter Full Address",
           pdetail: "Please Enter Property Detail",
           price: "Please Enter Price",
           bedroom: "Please Enter Numbers Of Bedrooms ",
		   livingroom : "Please Enter Numbers Of Livingrooms",
		   parking : "Please Enter Numbers Of Parkings",
           kitchen : "Please Enter Numbers Of Kitchen",
		   lat : "Please Enter Latitude", 
		   long : "Please Enter Longitude",
			     },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        }
    }

    //when the dom has loaded setup form validation rules
    $(D).ready(function(cash) {
        JQUERY4U.UTIL.setupFormValidation();
    });

})(jQuery, window, document);
</script>
<style>

#property label.error {
    color: #FB3A3A;
    display: inline-block;
    margin: 4px 0 5px 20px;
    padding: 0;
    text-align: left;
    width: 100%;
	clear:both;
}
</style>



		
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
    
        	<form action="addpropertydb.php" method="post" enctype="multipart/form-data" id="property" >
				 <label>Property Title</label>
	            <input type="text" class="form-control" placeholder="Property Title" name="pname">
             
               	<label>Proerty For</label>
                <select class="form-control" name="pfor">
                <option value="Buy">Buy</option>
                <option value="Sale">Sale</option>
                <option value="Rent">Rent</option>
                </select>
                <label>Proerty Type</label>
                <select class="form-control" name="ptype">
                <option value="Apartment">Apartment</option>
                <option value="Building">Building</option>
                <option value="Office Space">Office Space</option>
                </select>
             
             
             
             <label>Property Description</label>
                <textarea placeholder="" name="pdetail" class="form-control">
              </textarea>
                  <script>                             
                     CKEDITOR.replace( 'pdetail' );
              </script>   
                <label>Property Address</label>
                <textarea class="form-control" placeholder="Address" name="add"></textarea>
                <input type="hidden" name="agent_id" value="<?php echo $_SESSION['AGENT']['id']; ?>">
                <label>Price</label>
                <input type="text" class="form-control"  name="price" placeholder="Price">
                 <label>Bed Rooms</label>
               	<input type="text" class="form-control"  name="bedroom" placeholder="Bed Rooms">
                 <label>Living Rooms</label>
                <input type="text" class="form-control"  name="livingroom" placeholder="Living Rooms">
                <label>Parking</label>
                <input type="text" class="form-control"  name="parking" placeholder="Parking">
                 <label>Kitchen</label>
                <input type="text" class="form-control"  name="kitchen" placeholder="Kitchen">
         
               <label>Map Latitude</label>
               <input type="text" name="lat" placeholder="Latitude" class="form-control">
               <label>Map Longitude</label>
               <input type="text" name="long" placeholder="Longitude" class="form-control">
           
          
   
               
               <label>Property Images</label> 
               
               <input type="file" name="catalog_image[]" id="catalog_image" value="<?php echo $cata_row['catalog_image'];?>" class="text-long"/>
 <?php if(isset($_GET['id'])){
 	
	while($catalog_image_row=mysql_fetch_array($catalog_image_result))
	{
 ?>
<img src="images/thumb/<?php echo $catalog_image_row['catalog_image'];?>">

<a href="delete.php?id=<?php echo $catalog_image_row['id'];?>&catalog_id=<?php echo $catalog_row['id'];?>" onclick="return confirm('Are you sure you want to delete this catalog ?');" ><i class="icon-remove"></i></a>
<?php }
	}
?>   
						
<p id="addcontainer"></p>
<p id="add_field">
<span style="color:#0066CC; font-weight:bold; cursor:pointer;">&raquo; Add more images.....</span> 
</p>
 
               
               
               
                <button type="submit" class="btn btn-success" name="Submit">Add Property</button>
               


                
        </div>
  
</div>
</div>
</div>
</div>
</form>
<?php include'footer.php';?>