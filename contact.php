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
            $("#contact").validate({
                rules: {
											  name: "required",
											  email: "required",
											  number: "required",
											  msg: "required",
            
            },
                 messages: { 
											   name: "Please Enter Full Name",
											   email: "Please Enter Email Address",
											   number: "Please Enter Contact Number",
											   msg: "Please Enter Full Meaages",
           
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

#contact label.error {
    color: #FB3A3A;
    display: inline-block;
    margin: 4px 0 5px 20px;
    padding: 0;
    text-align: left;
    width: auto;
}
</style>



<?php include'header.php';

 $data = get_contact_detail();
 
?>
<style>
#well{width:100%; height:300px}
</style>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=false&key=AIzaSyCXRZzkQH67zC5r2ytu8vqBThNl0dZVhwU"></script> 
    <script>
function initialize() {
  var myLatlng = new google.maps.LatLng(<?php echo $data['latitude'];?>,<?php echo $data['longitude'];?>);
  var mapOptions = {
    zoom: 10,
    center: myLatlng
  }
  var map = new google.maps.Map(document.getElementById('well'), mapOptions);

  var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
      title: '<?php echo $data['title']; ?>'
  });
}

google.maps.event.addDomListener(window, 'load', initialize);

    </script>
 
<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="index.php">Home</a> / Contact Us</span>
    <h2>Contact Us</h2>
</div>
</div>
<!-- banner -->


<div class="container">
<div class="spacer">
<div class="row contact">
  <div class="col-lg-6 col-sm-6 ">
<form id="contact" class="form-horizontal" method="post" action="sendmail.php" enctype="multipart/form-data">
	<?php 
	 $add3 = get_address3();
	?>		
            <input type="hidden" name="task" value="adminmail" />
            <input type="hidden" name="aemail" value="<?php echo $add3['value']; ?>" >
             <input name="name" type="text" class="form-control" placeholder="Full Name">
                <input name="email" type="text" class="form-control" placeholder="Email Address">
                <input name="number" type="text" class="form-control" placeholder="Contact Number">
                <textarea name="msg" rows="6" class="form-control" placeholder="Message"></textarea>
      <button type="submit" class="btn btn-success" name="Submit">Send Message</button>
</form>

                
        </div>
  <div class="col-lg-6 col-sm-6 ">
  <div class="well" >
  <div id="well"></div>
  
<!--  <iframe width="100%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Pulchowk,+Patan,+Central+Region,+Nepal&amp;aq=0&amp;oq=pulch&amp;sll=37.0625,-95.677068&amp;sspn=39.371738,86.572266&amp;ie=UTF8&amp;hq=&amp;hnear=Pulchowk,+Patan+Dhoka,+Patan,+Bagmati,+Central+Region,+Nepal&amp;ll=27.678236,85.316853&amp;spn=0.001347,0.002642&amp;t=m&amp;z=14&amp;output=embed"></iframe>


  -->
</div>
  </div>
</div>
</div>
</div>

<?php include'footer.php';?>