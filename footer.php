

<div class="footer">

<div class="container">



<div class="row">
            <div class="col-lg-3 col-sm-3">
                   <h4>Information</h4>
              
               	<ul class="row">
  		<li class="col-lg-12 col-sm-12 col-xs-3"><a href="index.php">Home</a></li>	            
                <li class="col-lg-12 col-sm-12 col-xs-3"><a href="about.php">Rooms</a></li>
                <li class="col-lg-12 col-sm-12 col-xs-3"><a href="agents.php">Agents</a></li>         
                <li class="col-lg-12 col-sm-12 col-xs-3"><a href="contact.php">Contact</a></li>
                <?php if((isset($_SESSION['AGENT']) == ''))
			{
			?>
        		<li class="col-lg-12 col-sm-12 col-xs-3"><a href=""  data-toggle="modal" data-target="#loginpop">Login</a></li>
    			<li class="col-lg-12 col-sm-12 col-xs-3"><a href="register.php">Join now</a></li>
    		<?php
			}
		?>
                
              
               </ul>
            </div>
            
            <div class="col-lg-3 col-sm-3">
                    <h4>Be the first</h4>
                    <p>Get instant property alerts, as soon as they become available</p>
                    <form  action="sendmail.php" method="post">
                    <input type="email" placeholder="enter your email" 
                    required="required" name="email" class="form-control">
                    
                    <input type="hidden" name="task" value="addNewsletter" />
                    
                    
                    <input type="submit" class="btn btn-success" value="Notify Me!" />
                    </form>
            </div>
            
            <div class="col-lg-3 col-sm-3">
                    <h4>Resources</h4>
                  <ul class="row"> 
                    <li class="col-lg-12 col-sm-12 col-xs-3"><a href="http://www.rightmove.co.uk/removals.html" target="_blank">Removals</a></li>
                    <li class="col-lg-12 col-sm-12 col-xs-3"><a href="http://www.rightmove.co.uk/resources/property-guides.html" target="_blank">Property Guides</a></li>
                    <li class="col-lg-12 col-sm-12 col-xs-3"><a href="http://www.rightmove.co.uk/removals.html" target="_blank">House Price Index</a></li>
                    <li class="col-lg-12 col-sm-12 col-xs-3"><a href="http://www.rightmove.co.uk/removals.html" target="_blank">Mortgages</a></li>
            	 </ul>	
            </div>

             <div class="col-lg-3 col-sm-3">
                    <h4>Contact us</h4>
                    <?php 
					  $add = get_address();
					  $add2 = get_address2();
					  $add3 = get_address3();
					  $add4 = get_address4();
					?>
                    
                    <p><b><?php echo $add['value']; ?></b><br>
                    <span class="glyphicon glyphicon-map-marker"></span><?php echo $add2['value']; ?><br />

                    <span class="glyphicon glyphicon-envelope"></span><a class="mail" style="color: #999;" href="mailto: <?php echo $add3['value']; ?>"><?php echo $add3['value']; ?></a><br>
                    <span class="glyphicon glyphicon-earphone"></span> <?php echo $add4['value']; ?></p>


                      <?php
						$fb = get_fb();
						$twitter = get_twitter();
						$linkd = get_linkdin();
						$instagram = get_instagram();
		
					 ?>
                    <a href="<?php echo $fb['value']; ?>" target="_blank"><img src="images/facebook.png" alt="facebook"></a>
                    <a href="<?php echo $twitter['value']; ?>" target="_blank"><img src="images/twitter.png" alt="twitter"></a>
                    <a href="<?php echo $linkd['value']; ?>" target="_blank"><img src="images/linkedin.png" alt="linkedin"></a>
                    <a href="<?php echo $instagram['value']; ?>" target="_blank"><img src="images/gplus.png" alt="instagram"></a>





            </div>
            
             
            
            
            
            
        </div>
        
        
        
        
        <?php
		   $footer = get_footer();

		 ?>
<p class="copyright"><?php echo $footer['value']; ?></p>


</div></div>




<!-- Modal -->
<div id="loginpop" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="row">
        <div class="col-sm-6 login">
        <h4>Login</h4>
          <form class="" role="form" action="checklogin.php" method="post">
        <div class="form-group">
          <label class="sr-only" for="exampleInputEmail2">Email address</label>
          <input type="email" class="form-control"  name="email" id="exampleInputEmail2" placeholder="Enter email">
        </div>
        <div class="form-group">
          <label class="sr-only" for="exampleInputPassword2">Password</label>
          <input type="password" name="pass" class="form-control" id="exampleInputPassword2" placeholder="Password">
        </div>
        <div class="checkbox">
      
        </div>
        <button type="submit" class="btn btn-success">Sign in</button>
      </form>          
        </div>
        <div class="col-sm-6">
          <h4>New User Sign Up</h4>
          <p>Join today and be the first to see new properties.</p>
          <button type="submit" class="btn btn-info"  onclick="window.location.href='register.php'">Join Now</button>
        </div>

      </div>
    </div>
  </div>
</div>
<!-- /.modal -->



</body>
</html>



