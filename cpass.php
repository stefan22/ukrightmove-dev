

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
            $("#cpass").validate({
                rules: {
                                       
          old_pass: "required",
          newpass: "required",
       
           
            },
                 messages: { 
           old_pass: "Please Enter Old Password",
           newpass: "Please Enter New Password",
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

#cpass label.error {
    color: #FB3A3A;
    display: inline-block;
    margin: 4px 0 5px 20px;
    padding: 0;
    text-align: left;
    width: 100%;
}
</style>

<?php include'header.php';?>
<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="index.php">Home</a> / Chaneg Password</span>
    <h2>Chaneg Password</h2>
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
						
            <div class="alert alert-success">
							<button type="button" class="close" data-dismiss="alert">×</button>
							<?php echo $_SESSION['msg1'] ; ?>
						</div>
            	    <?php unset($_SESSION['msg1']);		
							
					}?>
          
<form action="adduser.php" method="post" enctype="multipart/form-data" id="cpass" >
				<input type="hidden" name="task" value="chaneg_password">
                <label>Enter Old Password</label>
                <input type="password" class="form-control" placeholder="" name="old_pass" value="">
                <label>Enter New Password</label>
                <input type="password" class="form-control" placeholder=""  name="newpass" value="" >
				
                <input type="hidden" name="id" value="<?php echo $_SESSION['AGENT']['id']; ?>">
                            
                          
                <button type="submit" class="btn btn-success" name="Submit">Change Password</button>
               


                
        </div>
  
</div>
</div>
</div>
</form>

<?php include'footer.php';?>