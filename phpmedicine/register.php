
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


	<script type="text/javascript">


	$(document).ready(function(){
//alert("hii");
$("#test").on('blur',function() {
    var val = $("#test").val();
	var len= $("#test").val().length;
		if(len < 10){
	    alert("Mobile number length should be 10");
    	$("#test").val("");
        $("#test").focus();
	}

   else if (parseInt(val) < 0 || isNaN(val)) {
        alert("Only numbers are allowed");
        $("#test").val("");
        $("#test").focus();
    }
});



$("#zip1").on('blur',function() {
    var val = $("#zip1").val();
	var len= $("#zip1").val().length;
	if(len < 6){
	    alert("Zipcode length should be 6");
    	 $("#zip1").val("");
        $("#zip1").focus();
    
	}
    else if (parseInt(val) < 0 || isNaN(val)) {
        alert("Only  numbers are allowed");
        $("#zip1").val("");
        $("#zip1").focus();
    
	}
});



$('#pass1').on('blur', function(){
    if(this.value.length < 4){ // checks the password value length
       alert('password should not be empty/length must be between 5 to 12');
       $('#pass1').val(""); // focuses the current field.
       
	   $('#pass1').focus(); // focuses the current field.
      // return false; // stops the execution.
    }
});






});

$(document).ready(function(e) {
    $('#btn').click(function() {
        var sEmail = $('#mail').val();
        if ($.trim(sEmail).length == 0) {
            alert('Please enter valid email address');
            e.preventDefault();
        }
        if (validateEmail(sEmail)) {
           // alert('Email is valid');
        }
        else {
            alert('Invalid Email Address');
            e.preventDefault();
        }
    });
});

function validateEmail(sEmail) {
    var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    if (filter.test(sEmail)) {
        return true;
    }
    else {
        return false;
    }
}









	



function passid_validation(passid,mx,my)
{
	var pl=passid.value.length;
	if(pl==0 ||pl>=my || pl<mx)
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
	
	include 'database.php';
	include 'header.php';
	
	
	?>
	<div class="container"> 
			         
		<div class="register">
		  	  <form enctype="multipart/form-data" action="mail1.php" method="post"> 
				 <div class="  register-top-grid">
					<h1 style="color:#F97E76;">Sign Up</h1>

					<div>
					<b><span style="color: black;font-size:15px;">Email Address<label>*</label></span></b>
					<input type="email" id="mail" class="form-control" style="width: 550px; height: 40px;" name="txtid"  placeholder="Enter Email Id" required> 
				  </div>
				  <hr/>
					
				  <div>
					<b><span style="color: black;font-size:15px;">User Name<label>*</label></span></b>
					<input type="text" class="form-control" style="width: 550px; height: 40px;" name="txtname"   placeholder="Enter User name" required> 
				  </div>
				  <hr/>
					
				    
				  <div>
					<b><span style="color: black;font-size:15px;">Password<label>*</label></span></b>
					<input type="password" class="form-control" style="width: 550px; height: 40px;" name="txtpaswd" id="pass1" placeholder="Enter password" required> 
				  </div>
				  
				  <hr/>
					
				   
				  <div>
					<b><span style="color: black;font-size:15px;">Confirm Password<label>*</label></span></b>
					<input type="password" class="form-control" style="width: 550px; height: 40px;" name="txtpass" placeholder="Enter password" required>
                
					</div>
				  <hr/>
					
				
  <div>
					<b><span style="color: black;font-size:15px;">Address<label>*</label></span></b>
                
                
				<textarea name="txtadd" col="5" class="form-control" style="width: 550px;height: 60px;" placeholder="Enter Address" required></textarea>
				
					</div>
								
					<hr/>
								
				  <div>
					<b><span style="color: black;font-size:15px;">Area<label>*</label></span></b>
					
				<select name="txtcity" class="form-control" autocomplete="off" style="width: 550px; height: 40px;">
<option value="Kankaria">Kankaria</option>
<option value="Maninagar">Maninagar</option>
<option value="Jaymala">Jaymala</option>
<option value="Isanpur">Isanpur</option>
<option value="Ghodasar">Ghodasar</option>
<option value="Dakshini">Dakshini</option>
<option value="Khokhara">Khokhara</option>
<option value="Raipur">Raipur</option>
<option value="Bhulabhai">Bhulabhai</option>


</select>
					</div>
					
					<hr/>
					
					
					
					
				  <div>
					<b><span style="color: black;font-size:15px;">Zipcode<label>*</label></span></b>
					 <input type="text" class="form-control" maxlength='6' style="width: 550px; height: 40px;" id="zip1"  name="txtzip"  placeholder="Enter zipcode number" required>
                       
					</div>
				  <hr/>
					
					
				  <div>
					<b><span style="color: black;font-size:15px;">Gender<label>*</label></span></b>
					<input type="radio"  name="txtgen" checked value="M">Male
					<br/>
					
					<br/>
					<input type="radio" name="txtgen"  value="F">Female
					</div>
				  
				  
				  <hr/>
					
				  <div>
				  <b><span style="color: black;font-size:15px;">Mobile Number<label>*</label></span></b>
					<input  type="text" id="test" class="form-control" name="txtno" maxlength="10" style="width: 550px; height: 40px;"  placeholder="Enter mobile number" required>
                   
					</div>
					
					<hr/>
					
				  <div>
					<b><span style="color: black;font-size:15px;">Captcha Code<label>*</label></span></b>
						<input  class="form-control" name="captcha_code" style="width: 550px; height: 40px;" type="text">
                     <img src="captcha_code.php" />
					</div>
					
					
					 <div class="clearfix"> </div>
					  
					 </div>
				<div class="clearfix"> </div>
				<div class="register-but">
					   <input class="acount-btn" id="btn" type="submit" name="txtsign" value="Sign up">
					   <h3><b>By clicking on sign up ,you should have to verify your email address ,than you can able to log in to our website.</b></h3>
					   
					   
					   
					   
					   
					   
			 <!--?php

			 


if(isset($_POST["txtsign"]))
{
	
	   $id=$_POST["txtid"];
   $uname=$_POST["txtname"];
   $pass=$_POST["txtpass"];
   $add=$_POST["txtadd"];
   $city=$_POST["txtcity"];
   $zip=$_POST["txtzip"];
   $gen=$_POST["txtgen"];
   
   $mob=$_POST["txtno"];
   
   
   $random_alpha = md5(rand());
   $captcha = substr($random_alpha, 0, 10);
   $code=$_POST["txtid"].$captcha;
	$temp="null";

if(count($_POST)>0) {
if($_POST["captcha_code"]==$_SESSION["captcha_code"]){	
  $pass=$_POST["txtpaswd"];
  $pass1=$_POST["txtpass"];
  
  if($pass==$pass1)
  {
	//  include 'database.php';
//$res=new  database();
//$res->signup($id,$uname,$pass,$add,$city,$zip,$gen,$mob,$temp);
/*
   $con=mysql_connect('localhost','root','');
   mysql_select_db('medicine',$con);
   $res=mysql_query("insert into user_tbl values('$id','$uname','$pass','$add','$city','$zip','$gen','$mob','$temp','user')");
  */
  $obj=new database();
  $res=$obj->insert_user($id,$uname,$pass,$add,$city,$zip,$gen,$mob,$temp); 


header('location:login.php');
  }	  
  

else
{
	/*
	echo "<h3>";
	echo "Please confirm correct password";
	echo "</h3>";
	*/
	echo '<script type="text/javascript">';
 echo "alert('Please Confirm the correct password');";
   echo "</script>";
	
}
}

else{
//echo "<h3>";
//echo "Enter Correct Captcha Code";
//echo "</h3>";


	echo '<script type="text/javascript">';
 echo "alert('Please enter the correct Capthcha code');";
   echo "</script>";
	




}
}
else if(isset($_POST["txtcancle"]))
{
	header('location:main.php');
}
/*
else{
echo "<h3>";
echo "Enter Correct Captcha Code";
echo "</h3>";

}*/
}



?>


				-->	   
					   
					   
					   
					   
					   <div class="clearfix"> </div>
				   </form>
				</div>
				<?php
	
			include 'sidebar.php';
	
				?>
	
		   </div>
		  
	<!---->
<?php


include 'footer.php';


?>
	
	</body>
</html>