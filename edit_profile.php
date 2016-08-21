
<?php include'header.php';?>
<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="index.php">Home</a> / Edit Profile</span>
    <h2>Edit Profile</h2>
</div>
</div>
<!-- banner -->


<div class="container">	
<div class="spacer">	
<div class="row register">	
<div class="col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 ">	
 <?php
		$data  =	gat_agent_detail();
		//print_r($data);

                        







?>  

               <p style="color:#990000; font-size:14px;" align="center">
					
					
		        <?php if(isset($_SESSION['msg1'])){ 
					
		        ?>
		
	        </p>
						
                <div class="alert alert-success">
                
			<button type="button" class="close" data-dismiss="alert">×
			
			</button>
							
							
			<?php echo $_SESSION['msg1'] ; 
			
			?>
						
	        </div>
	        
                <?php 
      	            unset($_SESSION['msg1']);		
							
        	}?>
        	
        	
         
	
<form action="adduser.php" method="post" enctype="multipart/form-data" >
				<input type="hidden" name="task" value="edit_profile">
                <label>Full Name</label>
                <input type="text" class="form-control" placeholder="Full Name" name="name" value="<?php echo $data['name']; ?>">
                <label>Email</label>
                <input type="text" class="form-control" placeholder="Enter Email" readonly name="email" value="<?php echo $data['email']; ?>" >
				<label>Address</label>
                <textarea rows="3" class="form-control" placeholder="Address" name="add"><?php echo $data['address'] ; ?></textarea>
      			<label>Description</label>
                <textarea rows="4" class="form-control" placeholder="description" name="description"><?php echo stripslashes(br2nl($memberDesc)) ; ?></textarea>
                                                                                                                                                        
                
                <label>Image</label>
                   <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                            
                            <input type="hidden" name="old_image" value="<?php echo $data['image']; ?>">
                          
                <input type="file" name="agent_image">
                <img src="images/agents/<?php echo $data['image'] ; ?>" height="150" width="250">
                
                <label id="clear">Phone Number</label>
                <input type="text" class="form-control" placeholder="Enter Phone Number" name="phone" value="<?php echo $data['phone'] ; ?>">
                <button type="submit" class="btn btn-success" name="Submit">Update Profile</button>
               


                
        </div>
  
</div>
</div>
</div>
</form>

<?php include'footer.php';?>