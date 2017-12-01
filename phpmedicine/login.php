
<?php

session_start();

?>
<!DOCTYPE html>
<html>
<head>
<title>Jay Jalaram Medicine</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!--theme-style-->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />	
<!--//theme-style-->


<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<link href="Content/bootstrap.css" rel="stylesheet"/>
<script src="Scripts/jquery-1.9.1.js"></script>
<script src="Scripts/bootstrap.js"></script>


<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<!--fonts-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<!--//fonts-->
<script src="js/jquery.min.js"></script>
</head>
<body> 
	<!--header
	<div class="header">
		<div class="top-header">
			<div class="container">
				<div class="top-header-left">
					<ul class="support">
						<li><a href="#"><label> </label></a></li>
						<li><a href="#">24x7 live<span class="live"> support</span></a></li>
					</ul>
					<ul class="support">
						<li class="van"><a href="#"><label> </label></a></li>
						<li><a href="#">Free shipping <span class="live">on order over 500</span></a></li>
					</ul>
					<div class="clearfix"> </div>
				</div>
				<div class="top-header-right">
					<div class="down-top">		
						  <select class="in-drop">
							  <option value="English" class="in-of">English</option>
							  <option value="Japanese" class="in-of">Japanese</option>
							  <option value="French" class="in-of">French</option>
							  <option value="German" class="in-of">German</option>
							</select>
					 </div>
					<div class="down-top top-down">
						  <select class="in-drop">
						  
						  <option value="Dollar" class="in-of">Dollar</option>
						  <option value="Yen" class="in-of">Yen</option>
						  <option value="Euro" class="in-of">Euro</option>
							</select>
					 </div>
					<div class="clearfix"> </div>	
				</div>
				<div class="clearfix"> </div>		
			</div>
		</div>
		<div class="bottom-header">
			<div class="container">
				<div class="header-bottom-left">
					<div class="logo">
						<a href="index.html"><img src="images/logo.png" alt=" " /></a>
					</div>
					<div class="search">
						<input type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" >
						<input type="submit"  value="SEARCH">

					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="header-bottom-right">					
						<div class="account"><a href="login.html"><span> </span>YOUR ACCOUNT</a></div>
							<ul class="login">
								<li><a href="login.html"><span> </span>LOGIN</a></li> |
								<li ><a href="register.html">SIGNUP</a></li>
							</ul>
						<div class="cart"><a href="#"><span> </span>CART</a></div>
					<div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>	
			</div>
		</div>
	</div>
-->	<!---->

<?php
include 'database.php';
include 'header.php';


?>
<form action="" method="post">
	<div class="container">
		
      	   <div class="account_grid">
			   <div class=" login-right">
			  	<h3>REGISTERED CUSTOMERS</h3>
				<p>If you have an account with us, please log in.</p>
				<form>
				  <div>
					<b><span style="color: black;font-size:15px;">Email Address<label>*</label></span></b>
					<input type="email" style="width: 550px; height: 40px;" name="txtid"  placeholder="Enter Email Id" required> 
				  </div>
				  
				  <br/>
				  
				  <div>
					<b><span style="color: black;font-size:15px;">Password<label>*</label></span></b>
					<input type="password" style="width: 550px; height: 40px;" name="txtpass" placeholder="Enter password" required> 
				  </div>
				  <a class="forgot" href="forgetPass.php">Forgot Your Password?</a>
				  <input type="submit" value="Login" style="margin-top: 18px;" name="btnlogin">
			    </form>
			   </div>	
			    <div class=" login-left">
			  	 <h3>NEW CUSTOMERS</h3>
				 <p>By creating an account with our store, you will be able to move through the checkout process faster, view and track your orders in your account and more.</p>
				 <a class="acount-btn" href="register.php">Create an Account</a>
			   </div>
			   
			   
			   
			   
			   
			   
			   		<?php
		
if(isset($_POST["btnlogin"]))
{
	 $name=mysql_real_escape_string($_POST["txtid"]);
	  $passs=mysql_real_escape_string($_POST["txtpass"]);

	  $enc_pass=md5($passs);
  
	 
	  
//$obj=new database();
//$count=$obj->login($name,$enc_pass);
$con=mysql_connect('localhost','root','');
   mysql_select_db('medicine',$con);
   $res=mysql_query("select * from user_tbl where email_id='$name' and  password='$enc_pass' and status='true'",$con);
   $count=mysql_num_rows($res); 

	  if ($count==1) 
	{
		$obj1=new database();
		$res=$obj1->check_type($name,$enc_pass);
        //$con=mysql_connect('localhost','root','');
       //mysql_select_db('medicine',$con);
       //$res=mysql_query("select type from user_tbl where email_id='$name' and password='$passs'",$con);
   while($row=mysql_fetch_assoc($res))
   {
	   $ty=$row["type"];
	   $active=$row["status"];
   }
   if($ty=='user')
   {
       $_SESSION["uname"]=$_POST["txtid"];
		  //header('location:user/pro.php');
		  header('location:user/user_profile.php');
	}	
	else
		{
			
			if($active=='false')
			{
			echo '<script type="text/javascript">';
			echo "alert('First You should have to verify your email address than you can able to log in to our website');";
			echo "</script>";
				
			}
			else{	
			echo '<script type="text/javascript">';
 echo "alert(' enter corrcet information');";
   echo "</script>";
			//echo "<h1>Invalid</h1> ";
		}
	}
	
	}//if(count)
		else
		{
		//	$obj2=new database();
		//$res1=$obj2->login($name,$passs);
        $con=mysql_connect('localhost','root','');
       mysql_select_db('medicine',$con);
       $res=mysql_query("select status from user_tbl where email_id='$name' and password='$enc_pass'",$con);
		while($row=mysql_fetch_assoc($res))
		{
	//   $ty=$row["type"];
			$active=$row["status"];
		}
			if(@$active=='false')
			{
			echo '<script type="text/javascript">';
			echo "alert('First You should have to verify your email address than you can able to log in to our website');";
			echo "</script>";
				
			}
			else
			{
			echo '<script type="text/javascript">';
			echo "alert('Plese enter corrcet information');";
			echo "</script>";
			}
		//	echo "<h1>Invalid</h1> ";
		}
}
?>

			   
			   
			   
			   <?php
			   
			   include 'sidebar.php';
			   
			   ?>
			   
			   
			   
			   
			   <?php
	
	include 'footer.php';
	
	?>
</body>
</html>