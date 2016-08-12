<?php include'header.php';?>

<!-- banner -->
<div class="inside-banner">
  <div class="container"> <span class="pull-right"><a href="index.php">Home</a> / Rooms</span>
    <h2>We got Rooms!</h2>
  </div>
</div>
<!-- banner -->

<div class="container">
  <div class="spacer">
    <div class="row">
      <div class="col-lg-8  col-lg-offset-2">
        <?php $data = get_about_contant(); 
	 ?>
        <img src="images/<?php echo $data['image']; ?>" class="img-responsive thumbnail"  alt="realestate"> <?php echo stripslashes($data['contant']); ?> </div>
    </div>
  </div>
</div>
<?php include'footer.php';?>