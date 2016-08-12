<?php include'header.php';?>
<!-- banner -->
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
            $("#register").validate({
                rules: {
                                        name: "required",
          email: "required",
          pass: "required",
          add: "",
          descrition: "",
          phone: "",
          photo: ""
           
            },
                 messages: { 
           name: "your name",
           email: "your email address",
           pass: "",
           //add: "Please Enter Full Address",
           //descrition: "Please Enter Full Description",
           //phone: "Please Enter Phone Number",
           //photo: "Please Enter Images Add 150 * 250",
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

#register label.error {
    color: #FB3A3A;
    display: inline-block;
    margin: 4px 0 5px 20px;
    padding: 0;
    text-align: left;
    width: auto;
}
</style>

<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="index.php">Home</a> / Signup</span>
    <h2>Join now</h2>
</div>
</div>
<!-- banner -->


<div class="container">	
<div class="spacer">	

<div class="row register">	
  <div class="col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 ">		
<p style="color:#990000; font-size:14px;" align="center">
					<?php if(isset($_SESSION['umsg'])){ 
						?>
						
            <div class="alert alert-success">
							<button type="button" class="close" data-dismiss="alert">×</button>
							<?php echo $_SESSION['umsg'] ; ?>
						</div>
            	    <?php unset($_SESSION['umsg']);		
							
					}?>

	<form id="register" action="adduser.php"  class="form-horizontal" method="post" action="" enctype="multipart/form-data">



                <input type="text" class="form-control" placeholder="your name" name="name">
                <input type="text" class="form-control" placeholder="your email" name="email">
                <input type="password" class="form-control" placeholder="password" name="pass">
              
                <!--<textarea rows="6" class="form-control" placeholder="Address" name="add"></textarea>
      			<textarea rows="6" class="form-control" placeholder="descriptoin" name="description"></textarea>
               
      		<input type="file" name="photo">
                
                -->
                <label>&nbsp;&nbsp;If you&prime;d rather have us give you a call:</label>
                <input type="text" class="form-control" placeholder="your mobile -optional" name="phone">
                <button type="submit" class="btn btn-success" name="Submit">Sign up</button>
    </form>   


                
        </div>
  
</div>
</div>
</div>

<?php include'footer.php';?>