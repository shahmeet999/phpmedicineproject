
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


<link href="Content/bootstrap.css" rel="stylesheet"/>
<script src="Scripts/jquery-1.9.1.js"></script>
<script src="Scripts/bootstrap.js"></script>

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
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
			  	<h1>Forget Password ?</h3>
				<p>Please Enter the email  address , we will send you the password to your email address.</p>
				<form>
				  <div>
					<b><span style="color: black;font-size:15px;">Email Address<label>*</label></span></b>
					<input type="email" style="width: 550px; height: 40px;" name="txtid"  placeholder="Enter Email Id" required> 
				  </div>
				  
				  <br/>
				  
				  <input type="submit" value="Send Password" style="margin-top: 18px;" name="btnpass">
			    </form>
			   </div>	
			    
			   
			   
			   
			   
			   
			   		<?php
		
if(isset($_POST["btnpass"]))
{
	 $name=$_POST["txtid"];
	 
	 $con=mysql_connect("localhost","root","");
	 mysql_select_db("medicine",$con);
		$res=mysql_query("select * from user_tbl where email_id='$name' and status='true'",$con);
		
	 
	 if($res==1)
	 {
		$password = substr(md5(uniqid(rand(),1)),3,10);
		$pass = md5($password); //encrypted version for database entry

$sql = mysql_query("UPDATE user_tbl SET password='$pass' WHERE email_id = '$name'")or die (mysql_error());


	 
	 			error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE);
			require_once "phpmailer/class.phpmailer.php";

				
				//$message = $captcha_code;


			// creating the phpmailer object
			$mail = new PHPMailer(true);

			// telling the class to use SMTP
			$mail->IsSMTP();

			// enables SMTP debug information (for testing) set 0 turn off debugging mode, 1 to show debug result
			$mail->SMTPDebug = 0;

			// enable SMTP authentication
			$mail->SMTPAuth = true;

			// sets the prefix to the server
			$mail->SMTPSecure = 'ssl';

			// sets GMAIL as the SMTP server
			$mail->Host = 'smtp.gmail.com';

			// set the SMTP port for the GMAIL server
			$mail->Port = 465;

			// your gmail address
			$mail->Username = 'jayjalarammedicine@gmail.com';

			// your password must be enclosed in single quotes
			$mail->Password = 'jjm@1234';

			// add a subject line
			$mail->Subject = 'New Password for the User ';

			// Sender email address and name
			$mail->SetFrom('shoppingcart606@gmail.com', 'Jay Jalaram Medicines');

			$email1=$_POST["txtid"];
			// reciever address, person you want to send
			$mail->AddAddress($email1);

			// if your send to multiple person add this line again
			//$mail->AddAddress('tosend@domain.com');

			// if you want to send a carbon copy
			//$mail->AddCC('tosend@domain.com');


			// if you want to send a blind carbon copy
			//$mail->AddBCC('tosend@domain.com');

			// add message body
			$mail->MsgHTML("Your New Password is ".$password);


			// add attachment if any
			//$mail->AddAttachment('time.png');

			try {
			    // send mail
				
				
			    $mail->Send();
			    $msg = "Mail send successfully";
			} catch (phpmailerException $e) {
			    $msg = $e->getMessage();
			} catch (Exception $e) {
			    $msg = $e->getMessage();
			}

		echo '<script>';
		echo "alert('Password sent Succesfully');";
		echo "</script>";
	}
	 else
   {
	   echo '<script>';
		echo "alert('No Email Id Exists ');";
		echo "</script>";
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