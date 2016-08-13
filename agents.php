<?php include'header.php';?>
<?php

//$sel = get_agent();
?>
<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="index.php">Home</a> / Agents</span>
    <h2>Agents</h2>
</div>
</div>
<!-- banner -->


<div class="container">
<div class="spacer agents">
<?php
	$getdata = mysql_query("select * from agents where status = '1'");
	$rec_count = mysql_num_rows($getdata);
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
	
	$sql= "select * from agents   where status = '1' LIMIT $offset, $rec_limit";
	$sel = mysql_query($sql);

?>
<div class="row">
  <div class="col-lg-8  col-lg-offset-2 col-sm-12">
	<?php while($data = mysql_fetch_assoc($sel))
	{
		?>
      <div class="row">
   
        <div class="col-lg-2 col-sm-2 ">
        	<img src="images/agents/<?php echo $data['image']; ?>" class="img-responsive"  alt="agent name">
        </div>

        <div class="col-lg-7 col-sm-7 ">
        	<h4><?php echo $data['name']; ?></h4>
        	<p><?php echo stripslashes($data['description']); ?></p>
        </div>

        <div class="col-lg-3 col-sm-3 "><span class="glyphicon glyphicon-envelope"></span>
        	 <a href="mailto:<?php echo $data['email']; ?>"><?php echo $data['email']; ?></a><br>
        	<span class="glyphicon glyphicon-earphone"></span> 
        
        <?php echo $data['phone']; ?>

      </div>

      </div>
      
      <?php
	}
			if( $left_rec > $rec_limit && $page != 0 )
			{
			
			   $last = $page - 2;
			   echo "<a class=\"pagination_button\" href=\"agents.php?page=$last\">Previous</a> |";
			   echo "<a class=\"pagination_button\" href=\"agents.php?page=$page\">Next</a>";
			}
			if( $page == 0 )
			{
			  
			   echo "<a class=\"pagination_button\" href=\"agents.php?page=$page\">Next</a>";
			}
			if($left_rec <= $rec_limit) 
			{
			   $last = $page - 2;
			   echo "<a class=\"pagination_button\" href=\"agents.php?page=$last\">Previous</a>";
			}

	?>
      <!-- agents -->
      
       <!-- agents -->
      
     
  </div>
</div>


</div>
</div>

<?php include'footer.php';?>