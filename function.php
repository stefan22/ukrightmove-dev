<?php
error_reporting(E_ALL);
include('administrator/includes/db_connection.php');
ob_start();



	$sql= "select * from general_setting where key1 = 'curruncy' ";
	$sel = mysql_query($sql)or die(mysql_error());
	$data = mysql_fetch_assoc($sel);

DEFINE ('currency', $data['value']);

function adduser()
{
$email =  $_POST['email'];

$sel = mysql_query("select * from agents where email like '$email' ");
if(mysql_num_rows($sel)>0)
{

	$_SESSION['umsg'] =  "This Email Alrady Taken Please Try Other One";
	header( "Location:register.php");
}
else
{
		$name =  $_POST['name'];	
		$pass  = $_POST['pass'];
		$add = addslashes($_POST['add']);
		$descrition = addslashes($_POST['description']);
		$phone =$_POST['phone'];
		$photo = time().'_'.$_FILES['photo']['name'];
		move_uploaded_file($_FILES['photo']['tmp_name'],'images/agents/'.$photo);
		$sql = "insert into agents (name,email,pass,address,description,phone,image,dt,status) 
		values ('$name','$email','$pass','$add','$descrition','$phone','$photo',now(),'0')";
		mysql_query($sql)or die(mysql_error());
		$_SESSION['umsg'] =  "Account Create Successfully Your Account Has Been Activated Shortly By Admin";
		header( "Location:register.php");
}
}


//Delete Data, the where clause is left optional incase the user wants to delete every row!
function Delete($table_name, $where_clause='')
{
    // check for optional where clause
    $whereSQL = '';
    if(!empty($where_clause))
    {
        // check to see if the 'where' keyword exists
        if(substr(strtoupper(trim($where_clause)), 0, 5) != 'WHERE')
        {
            // not found, add keyword
            $whereSQL = " WHERE ".$where_clause;
        } else
        {
            $whereSQL = " ".trim($where_clause);
        }
    }
    // build the query
    $sql = "DELETE FROM ".$table_name.$whereSQL;
	 
    // run and return the query result resource
    return mysql_query($sql);
}



function User($username,$password)
{
	$sql = "SELECT * FROM agents where email = '".$username."' and pass = '".$password."' && status = '1' ";
	$result = mysql_query($sql);
    $row = mysql_fetch_array($result);
	$num_rows = mysql_num_rows($result);
    
	if ($num_rows > 0)
	{
        $_SESSION['AGENT'] = $row;
		          
       // header( "Location:http://viaviweb.in/php/real_estate/index.php"); 
    }
	else
	{
			$_SESSION['msg'] = "Invalid email or password";
	//		header( "Location:http://viaviweb.in/php/real_estate/index.php");
	}
   
}


function get_about_contant()
{
	$sql= "select * from about_us";
	$sel = mysql_query($sql);
	$data = mysql_fetch_assoc($sel);
	return $data;
}
function get_agent()
{
	$getdata = mysql_query("select * from agents where status = '1'");
	$rec_count = mysql_num_rows($getdata);
	$rec_limit = 2;
	

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

$sql= "select * from agents   where status = '1' LIMIT $offset, $rec_limit";
$sel = mysql_query($sql);
return $sel;

	
	
}
function  get_contact_detail()
{
	$sql= "select * from contact_us";
	$sel = mysql_query($sql);
	$data = mysql_fetch_assoc($sel);
	return $data;
}
function get_logo()
{
	$sql= "select * from general_setting where key1 = 'logo' ";
	$sel = mysql_query($sql)or die(mysql_error());
	$data = mysql_fetch_assoc($sel);
	return $data;

}
function get_fb()
{
	$sql= "select * from general_setting where key1 = 'fb' ";
	$sel = mysql_query($sql)or die(mysql_error());
	$data = mysql_fetch_assoc($sel);
	return $data;
	
	
}

function get_twitter()
{
	$sql= "select * from general_setting where key1 = 'twitter' ";
	$sel = mysql_query($sql)or die(mysql_error());
	$data = mysql_fetch_assoc($sel);
	return $data;
	
	
}

function get_linkdin()
{
	$sql= "select * from general_setting where key1 = 'linkdin' ";
	$sel = mysql_query($sql)or die(mysql_error());
	$data = mysql_fetch_assoc($sel);
	return $data;
	
	
}

function get_instagram()
{
	$sql= "select * from general_setting where key1 = 'instagram' ";
	$sel = mysql_query($sql)or die(mysql_error());
	$data = mysql_fetch_assoc($sel);
	return $data;
	
	
}
function get_address()
{
	$sql= "select * from general_setting where key1 = 'contact_add1' ";
	$sel = mysql_query($sql)or die(mysql_error());
	$data = mysql_fetch_assoc($sel);
	return $data;
	
}

function get_address2()
{
	$sql= "select * from general_setting where key1 = 'contact_add2' ";
	$sel = mysql_query($sql)or die(mysql_error());
	$data = mysql_fetch_assoc($sel);
	return $data;
	
}

function get_address3()
{
	$sql= "select * from general_setting where key1 = 'contact_add3' ";
	$sel = mysql_query($sql)or die(mysql_error());
	$data = mysql_fetch_assoc($sel);
	return $data;
	
}

function get_address4()
{
	$sql= "select * from general_setting where key1 = 'contact_add4' ";
	$sel = mysql_query($sql)or die(mysql_error());
	$data = mysql_fetch_assoc($sel);
	return $data;
	
}
function get_footer()
{
	$sql= "select * from general_setting where key1 = 'copyright' ";
	$sel = mysql_query($sql)or die(mysql_error());
	$data = mysql_fetch_assoc($sel);
	return $data;
	
}

function gat_agent_detail()
{	
	$id = $_SESSION['AGENT']['id'];
	$sql= "select * from agents where id = $id ";
	$sel = mysql_query($sql);
	$data = mysql_fetch_assoc($sel);
	return $data;
}
function editagent()
{	
	if($_FILES['agent_image']['name'] == '')
	{
		$image = $_POST['old_image'];
	}
	else
	{
		unlink('images/agents/'.$_POST['old_image']);
		$image =  time().'_'.$_FILES['agent_image']['name'];
		move_uploaded_file($_FILES['agent_image']['tmp_name'],'images/agents/'.$image);
	}
	$id = $_POST['id'];
	$name = $_POST['name'];
	$description = addslashes($_POST['description']);
	$phone = $_POST['phone'];
	$Address = addslashes($_POST['add']);
	$sql= "update  agents  set name='$name', description='$description',address = '$Address' , phone= '$phone', image='$image' where id = $id";
	mysql_query($sql)or die(mysql_error());
	$_SESSION["msg1"] =  "Save Changes Successfully";
	$sql1 = "SELECT * FROM agents where id= '$id' && status = '1' ";
	$result = mysql_query($sql1);
    $row = mysql_fetch_array($result);
	$num_rows = mysql_num_rows($result);
    
	if ($num_rows > 0)
	{
        $_SESSION['AGENT'] = $row;
		          
       // header( "Location:http://viaviweb.in/php/real_estate/index.php"); 
    }
		
	header( "Location:edit_profile.php");

}
function logout()
{
	$_SESSION['AGENT'] = '';
	//$_SESSION['msg'] = "Logout Successfully";
	header( "Location:index.php");
}

function change_password()
{
	$id = $_POST['id'];
	$sql = "select * from agents where id = $id";
	$sel = mysql_query($sql);
	$data = mysql_fetch_assoc($sel); 
	if($data['pass'] == $_POST['old_pass'])
	{
		$newpass  = $_POST['newpass'];
		$sel1 = "update agents set pass='$newpass' where id=$id";
		mysql_query($sel1);
		$_SESSION["msg"] =  "Password Changed Succesfully";
		header( "Location:index.php");

	}
	else
	{
		$_SESSION["msg1"] =  "Password Not Match  ";
		header( "Location:cpass.php");	
	}

	
}
function addproperty()
{
	$ptitle = addslashes($_POST['pname']);
	$pdetail = addslashes($_POST['pdetail']);
	
	$plat = $_POST['lat'];
	$plong = $_POST['long'];
	
	$price = $_POST['price'];
	$aid = $_POST['agent_id'];
	$bedroom = $_POST['bedroom'];
	$kitchen = $_POST['kitchen'];
	$parking = $_POST['parking'];
	$livingroom = $_POST['livingroom'];
	$ptype = $_POST['ptype'];
	$pfor = $_POST['pfor'];
	$address = $_POST['add'];
		//$pimage = $_FILES['catalog_image']['name'][0];
	$pimage=rand(0,99999)."_".$_FILES['catalog_image']['name'][0];
	move_uploaded_file($_FILES['catalog_image']['tmp_name'][0],"images/properties/".$pimage);
		
	$sql = "insert into property_detail 
	(ptitle,pimage,pdetail,plat,plong,pprice,aid,bedroom,kitchen,parking,livingroom,ptype,pfor,status,dt,paddress) values 
	('$ptitle','$pimage','$pdetail','$plat','$plong','$price','$aid','$bedroom','$kitchen','$parking','$livingroom','$ptype','$pfor','0',now(),'$address')";			
	$qur = mysql_query($sql)or die(mysql_error());
	$property_id=mysql_insert_id();
	$count = count($_FILES['catalog_image']['name']);
	for($i=0;$i<$count;$i++)
	{ 
		 $p_image=rand(0,99999)."_".$_FILES['catalog_image']['name'][$i];
		 move_uploaded_file($_FILES['catalog_image']['tmp_name'][$i],"images/properties/".$p_image);
		 if($i == 0 )
		 {
		 $sql = "insert into p_image (p_id,image) values ('$property_id','$pimage')";
		 mysql_query($sql);
		 }
		else
		 {
		
			$sql = "insert into p_image (p_id,image) values ('$property_id','$p_image')";
		 	mysql_query($sql);
		 }
 	}
	
}
function get_property()
{
	$sql = "select * from property_detail where status = 1 ORDER BY pid DESC  ";
	$sel = mysql_query($sql);
	return $sel;	
}
function get_recent_property()
{
	$sql = "select * from property_detail where status = 1 ORDER BY pid DESC LIMIT 4 ";
	$sel = mysql_query($sql);
	return $sel;	

}
function get_property_selected($id)
{
	$sql = "select * from property_detail where pid = $id ";
	$sel = mysql_query($sql);
	$data = mysql_fetch_assoc($sel);
	return $data;	
	
}
function get_proerty_images($id)
{
	$sql = "select * from p_image where p_id = $id ";
	$sel = mysql_query($sql)or die(mysql_error());
	return $sel;	
		
	
}
function get_agent_detail($id)
{
	$sql = "select * from agents where id = $id ";
	$sel = mysql_query($sql);
	$data = mysql_fetch_assoc($sel);
	return $data;	
	
}
function  get_agents_properties()
{
	$id = $_SESSION['AGENT']['id'];
	$sql = "select * from property_detail where aid = $id ";
	$sel = mysql_query($sql)or die(mysql_error());
	return $sel;	
}
function gat_properties_detail($id)
{
	$sql= "select * from property_detail where pid  = $id ";
	$sel = mysql_query($sql)or die(mysql_error());
	$data = mysql_fetch_assoc($sel);
	return $data;
}
function Get_image($id)
{

	$sql= "select * from p_image where p_id = $id";
	$sel = mysql_query($sql)or die(mysql_error());
	return $sel;

}
function get_image_detail($id)
{
	$sql = "select * from p_image where image_id = $id";
	$sel = mysql_query($sql)or die(mysql_error());
	$data = mysql_fetch_assoc($sel);	
	$pid =$data['p_id']; 
	$sql2 = "select * from property_detail where pid = $pid";
	$sel2 = mysql_query($sql2);
	$data2 = mysql_fetch_assoc($sel2);	

	
	if($data['image'] == $data2['pimage']) 
	{
		
		$dsql = "delete from p_image where image_id = $id";
		mysql_query($dsql);
		unlink('images/properties/'.$data['image']);
		$sql3 = "select * from p_image where p_id = $pid";
		$sel3 = mysql_query($sql3);
		$data3 = mysql_fetch_assoc($sel3);	
		if($data3['image'] == '')
		{
			$image = "";
			$sql4 = "update property_detail set pimage='$image' where pid=$pid ";
			$sel4 = mysql_query($sql4);	
		}
		else
		{
			
			$image = $data3['image'];
			$sql4 = "update property_detail set pimage='$image' where pid=$pid ";
			$sel4 = mysql_query($sql4);	
			
		}	
	}
	else
	{
		$dsql = "delete from p_image where image_id = $id";
		mysql_query($dsql);
	}
	
	
}
function editproperty()
{	
if(($_FILES['catalog_image']['name'][0]) != '')
{
	$pid = $_POST['pid'];	
	
	$ptitle = $_POST['ptitle'];
	$pdetail = $_POST['pdetail'];
	$plat = $_POST['lat'];
	$plong = $_POST['long'];
	$price = $_POST['pprice'];
//	$aid = $_POST['aid'];
	$bedroom = $_POST['bedroom'];
	$kitchen = $_POST['kitchen'];
	$parking = $_POST['parking'];
	$livingroom = $_POST['livingroom'];
	$ptype = $_POST['ptype'];
	$pfor = $_POST['pfor'];
	$address = $_POST['add'];
	$pimage=rand(0,99999)."_".$_FILES['catalog_image']['name'][0];
	move_uploaded_file($_FILES['catalog_image']['tmp_name'][0],"images/properties/".$pimage);

	$sql = "update property_detail set 
	ptitle='$ptitle',pimage='$pimage',pdetail='$pdetail',plat='$plat',plong='$plong',pprice='$price',bedroom='$bedroom',kitchen='$kitchen',parking='$parking',livingroom='$livingroom',ptype='$ptype',pfor='$pfor',paddress='$address'
 where pid = $pid	";
 	mysql_query($sql)or die(mysql_error());
 $count = count($_FILES['catalog_image']['name']);
	
		for($i=0;$i<$count;$i++)
		{ 
		 print_r($_FILES['catalog_image']['name'][$i]);
		// die();
		 $p_image=rand(0,99999)."_".$_FILES['catalog_image']['name'][$i];
		 move_uploaded_file($_FILES['catalog_image']['tmp_name'][$i],"images/properties/".$p_image);
		 if($i == 0 )
		 {
		 $sql = "insert into p_image (p_id,image) values ('$pid','$pimage')";
		 mysql_query($sql)or die(mysql_error());
		 }
		else
		 {
			$sql = "insert into p_image (p_id,image) values ('$pid','$p_image')";
		 	mysql_query($sql);
		 }
 		}
	header('Location:properties_edit.php?properties_id='.$_POST['pid']);

}
else
{
	
	$pid = $_POST['pid'];	
	$ptitle = addslashes($_POST['ptitle']);
	$pdetail = addslashes($_POST['pdetail']);
	$plat = $_POST['lat'];
	$plong = $_POST['long'];
	$price = $_POST['pprice'];
//	$aid = $_POST['aid'];
	$bedroom = $_POST['bedroom'];
	$kitchen = $_POST['kitchen'];
	$parking = $_POST['parking'];
	$livingroom = $_POST['livingroom'];
	$ptype = $_POST['ptype'];
	$pfor = $_POST['pfor'];
	$address = $_POST['add'];
//	$pimage=rand(0,99999)."_".$_FILES['catalog_image']['name'][0];
//	move_uploaded_file($_FILES['catalog_image']['tmp_name'][0],"images/properties/".$pimage);

	$sql = "update property_detail set 
	ptitle='$ptitle',pdetail='$pdetail',plat='$plat',plong='$plong',pprice='$price',bedroom='$bedroom',kitchen='$kitchen',parking='$parking',livingroom='$livingroom',ptype='$ptype',pfor='$pfor',paddress='$address'
 where pid = $pid	";
 	mysql_query($sql)or die(mysql_error());
	
	
}
	
}
function get_property_sort($sort)
{
	$sql = "select * from property_detail where  status= 1 && pfor = '$sort'";
	$sel = mysql_query($sql)or die(mysql_error());
	return $sel;
}
function get_property_search()
{
	$for = $_POST['for'];
	$key = $_POST['key'];
	$price = $_POST['price'];
	$type = $_POST['type'];
	$test = "hello";
	
	if($for == '' && $price == '' && $type == '')
	{
	
		$sql = "select * from property_detail where ptitle like '%$key%' && status = '1'";
		$sel = mysql_query($sql)or die(mysql_error());	
		return $sel;
	}
	if($price == '' && $type == '')
	{
		$sql = "select * from property_detail where ptitle like '%$key%' && pfor = '$for' && status = '1'";
		$sel = mysql_query($sql)or die(mysql_error());	
		return $sel;
	}
	if(($for == '' && $type == ''))
	{
		
		if($price == '300000' )
		{
			$sql = "select * from property_detail where ptitle like '%$key%' && pprice >  $price && status = '1'";
			$sel = mysql_query($sql)or die(mysql_error());	
			return $sel;
	
		}
		else
		{
			$sql = "select * from property_detail where ptitle like '%$key%' && pprice BETWEEN  $price && status = '1'";
			$sel = mysql_query($sql)or die(mysql_error());	
			return $sel;
		}
	}
	if($for == '' && $price == '')
	{
			$sql = "select * from property_detail where ptitle like '%$key%' && ptype =  '$type' && status = '1'";
			$sel = mysql_query($sql)or die(mysql_error());	
			return $sel;
	}
	if($price == '')
	{
			$sql = "select * from property_detail where ptitle like '%$key%' && ptype =  '$type' && pfor = '$for' && status = '1'";
			$sel = mysql_query($sql)or die(mysql_error());	
			return $sel;
	}
	if($for == '')
	{
		if($price == '300000' )
		{
			$sql = "select * from property_detail where ptitle like '%$key%' && pprice >  $price && ptype = '$type' && status = '1'" ;
			$sel = mysql_query($sql)or die(mysql_error());	
			return $sel;
	
		}
		else
		{
			$sql = "select * from property_detail where ptitle like '%$key%' && pprice BETWEEN  $price  && ptype = '$type' && status = '1'";
			$sel = mysql_query($sql)or die(mysql_error());	
			return $sel;
		}
			
	}
	if($type == '')
	{
		if($price == '300000' )
		{
			$sql = "select * from property_detail where ptitle like '%$key%' && pprice >  $price && pfor = '$for' && status = '1'" ;
			$sel = mysql_query($sql)or die(mysql_error());	
			return $sel;
	
		}
		else
		{
			$sql = "select * from property_detail where ptitle like '%$key%' && pprice BETWEEN  $price  && pfor = '$for' && status = '1'";
			$sel = mysql_query($sql)or die(mysql_error());	
			return $sel;
		}
			
	}
	if($for != '' && $price != '' && $type != '')
	{
		if($price == '300000' )
		{
			$sql = "select * from property_detail where ptitle like '%$key%' && pprice >  $price && pfor = '$for' && ptype='$type'  && status = '1'" ;
			$sel = mysql_query($sql)or die(mysql_error());	
			return $sel;
	
		}
		else
		{
			$sql = "select * from property_detail where ptitle like '%$key%' && pprice BETWEEN  $price  && pfor = '$for' && ptype='$type' && status = '1'";
			$sel = mysql_query($sql)or die(mysql_error());	
			return $sel;
		}	
	}
	
}
function sendmail()
{
	$to = $_POST['aemail'];
	$subject = ' Post Enquiry ';
	$msg ='Enquiry For  '.$_POST['pid'] . "User Name :"  .$_POST['name'].'<br>' ."User Email :"  .$_POST['email'].'<br>' ."User Contact Number :"  .$_POST['number'].'<br>' ."User Query :"  .$_POST['query'].'<br>' ;	
	mail($to,$subject,$msg,$headers);

}
function addmail()
{
	$email = $_POST['email'];
	$sql = "insert into newsletter (email) values ('$email')";
	mysql_query($sql); 	
}
function get_property_all()
{
	$sql = "select * from property_detail where  status = '1'";
	$sel = mysql_query($sql)or die(mysql_error());	
	return $sel;
}
function get_image_slider()
{
	$sql = "select * from img_slider";
	$sel = mysql_query($sql)or die(mysql_error());	
	$data = mysql_fetch_assoc($sel);
	return $data;
	
}
function get_add()
{
	$sql = "select * from ad_banner where status = '1' ";
	$sel = mysql_query($sql)or die(mysql_error());	
	return $sel;	
}

?>