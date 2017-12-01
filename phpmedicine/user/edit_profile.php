
<?php

session_start();

if($_SESSION["uname"]=="")
{
	header('location:../login.php');
}

?>
<!DOCTYPE html>
<html>
<head>
<title>Jay Jalaram Medicine</title>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!--theme-style-->
<link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />	
<!--//theme-style-->


<link href="../Content/bootstrap.css" rel="stylesheet"/>
<script src="../Scripts/jquery-1.9.1.js"></script>
<script src="../Scripts/bootstrap.js"></script>

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--fonts-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<!--//fonts-->
<script src="../js/jquery.min.js"></script>


	<script type="text/javascript">
	
	function allLetter(uname)
{
	var letters=/^[A-Za-z]+$/;
	if(uname.value.match(letters))
	{
			return true;
	}
	else
	{
			uname.focus();
			
			alert('username must have alphabetic charcters only');
			return false;
	}
}





function passid_validation(passid,mx,my)
{
	var pl=passid.value.length;
	if(pl==0 || pl>=my || pl<mx)
	{
		alert("password should not be empty/length must be between "+5+" to "+12);
		passid.focus();
		return false;
	}
	return true;
}

function allnumeric(unum)
{
		var number=/^[0-9]+$/;
		if(unum.value.match(number))
		{
			return true;
		}
		else
		{
				alert('Mobile number must have numeric characters only');
				unum.focus();
				return false;
				
		}
}

function mess()
{
	alert("enter correct captcha code");

}

function allzip(uzip)
{
		var numbers=/^[0-9]+$/;
		if(uzip.value.match(numbers))
		{
			return true;
		}
		else
		{
				alert('ZIP code must have numeric characters only');
				uzip.focus();
				return false;
				
		}
}



</script>


</head>
<body> 
	<?php
	
	include '../database.php';
	include 'user_header.php';
	
	
	?>
	
	
<?php

$id=$_SESSION["uname"];

$con=mysql_connect('localhost','root','');
mysql_select_db('medicine',$con);
$res=mysql_query("select * from user_tbl where email_id='$id'",$con);

while($row=mysql_fetch_array($res,MYSQL_ASSOC))
{
	$name=$row["user_name"];
	$add=$row["address"];
	$area=$row["area"];
	$zip=$row["zipcode"];
	
	$mob=$row["mobile_no"];
    $ship=$row["ship_address"];
    

}	


 ?>

	<div class="container"> 
			         
		<div class="register">
		  	  <form enctype="multipart/form-data" action="update_profile.php" method="post"> 
				 <div class="  register-top-grid">
					<h1 style="color:#F97E76;">Edit Profile</h1>

				  <div>
					<b><span style="color: black;font-size:15px;">User Name<label>*</label></span></b>
					<input type="text" class="form-control" style="width: 550px; height: 40px;" name="txtuname" value="<?php echo $name;?>" onblur="return allLetter(txtname);"  placeholder="Enter User name" required> 
				  </div>
				  <hr/>
					
				    
					
				
  <div>
					<b><span style="color: black;font-size:15px;">Address<label>*</label></span></b>
                
                
				<textarea name="txtadd" col="5" class="form-control" style="width: 550px;height: 60px;" placeholder="Enter Address" required><?php echo $add; ?></textarea>
				
					</div>
								
					<hr/>
								
				  <div>
					<b><span style="color: black;font-size:15px;">Area<label>*</label></span></b>
					
				<select name="txtcity" class="form-control" autocomplete="off" style="width: 550px; height: 40px;">
<option value="Kankaria" <?php if($area=="Kankaria"){echo 'selected';} ?>>Kankaria</option>
<option value="Maninagar" <?php if($area=="Maninagar"){echo 'selected';}?>>Maninagar</option>
<option value="Jaymala"<?php if($area=="Jaymala"){echo 'selected';} ?>>Jaymala</option>
<option value="Isanpur" <?php if($area=="Isanpur"){echo 'selected';} ?>>Isanpur</option>
<option value="Ghodasar" <?php if($area=="Ghodasar"){echo 'selected';} ?>>Ghodasar</option>
<option value="Dakshini" <?php if($area=="Dakshini"){echo 'selected';} ?>>Dakshini</option>
<option value="Khokhara" <?php if($area=="Khokhara"){echo 'selected';} ?>>Khokhara</option>
<option value="Raipur" <?php if($area=="Raipur"){echo 'selected';} ?>>Raipur</option>
<option value="Bhulabhai" <?php if($area=="Bhulabhai"){echo 'selected';} ?>>Bhulabhai</option>


</select>
					</div>
					
					<hr/>
					
					
					
					
				  <div>
					<b><span style="color: black;font-size:15px;">Zipcode<label>*</label></span></b>
					 <input type="text" class="form-control" value="<?php echo $zip;?>" maxlength='6' style="width: 550px; height: 40px;" onblur="return allzip(txtzip);"  name="txtzip"  placeholder="Enter zipcode number" required>
                       
					</div>
				  <hr/>
					
					
				  <div>
				  <b><span style="color: black;font-size:15px;">Mobile Number<label>*</label></span></b>
					<input  type="text" class="form-control" value="<?php echo $mob;?>" name="txtno" maxlength="10" style="width: 550px; height: 40px;" onblur="return allnumeric(txtno);" placeholder="Enter mobile number" required>
                   
					</div>
					
					<hr/>
					
				  
				
  <div>
					<b><span style="color: black;font-size:15px;">Shipping Address<label>*</label></span></b>
                
                
				<textarea name="txtship" col="5" class="form-control" style="width: 550px;height: 60px;" placeholder="Enter Address" required><?php echo $ship; ?> </textarea>
				
					</div>
								
					<hr/>
								
				  <div>
					
				  
				  
					
					 <div class="clearfix"> </div>
					  
					 </div>
				<div class="clearfix"> </div>
				<div class="register-but">
					   <input class="acount-btn" type="submit" name="btnsub" value="Update">
					   <input type="submit" class="acount-btn" name="btncan" value="Cancle">
					   
				</div>
			<?php
if(isset($_POST["btncan"]))
{
	header('location:view_profile.php');
}

?>			
			  <div class="clearfix"> </div>
   </div>
								
				</form>
				   </div>
				<?php
	
	//	include 'sidebar.php';
	
				?>
	</div>
				
	<!---->
<div class="row">
<div class="col-md-12">
	<?php


include 'footer.php';


?>
	</div>
	</div>
	</body>
</html>