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
<!--script-->





</head>
<body> 

<?php
include '../database.php';
include 'user_header.php';

?>


<div class="container">

<div class="row">
<div class="col-md-12">
<?php
include 'alphaser.php';

?>
</div>
</div>
</div>

	<div class="container">
			<div class="shoes-grid">
			<a href="register.php">
			<div class="wrap-in">
				<div class="wmuSlider example1 slide-grid">		 
				   <div class="wmuSliderWrapper">		  
					   <article style="position: absolute; width: 100%; opacity: 0;">					
						<div class="banner-matter">
						<div class="col-md-5 banner-bag">
							<img class="img-responsive " style="height:272px;" src="images/med.jpg" alt=" " />
							</div>
							<div class="col-md-7 banner-off">							
								<h2>Get register with us</h2>
								<label>FOR ALL PURCHASE <b>MEDICINES</b></label>
								<p></p>					
								<span class="on-get">Get Register</span>
							</div>
							
							<div class="clearfix"> </div>
						</div>
						
					 	</article>
					 	<article style="position: absolute; width: 100%; opacity: 0;">					
						<div class="banner-matter">
						<div class="col-md-5 banner-bag">
							<img class="img-responsive " style="height:272px;" src="images/med.jpg" alt=" " />
							</div>
							<div class="col-md-7 banner-off">							
								<h2>Get register with us</h2>
								<label>FOR ALL PURCHASE <b>MEDICINES</b></label>
								<span class="on-get">Get Register</span>
							</div>
							
							<div class="clearfix"> </div>
						</div>
						
					 	</article>
					 	<article style="position: absolute; width: 100%; opacity: 0;">					
						<div class="banner-matter">
						<div class="col-md-5 banner-bag">
							<img class="img-responsive " style="height:272px;" src="images/med.jpg" alt=" " />
							</div>
							<div class="col-md-7 banner-off">							
								<h2>Get register with us</h2>
								<label>FOR ALL PURCHASE <b>MEDICINES</b></label>
								<span class="on-get">Get Register</span>
							</div>
							
							<div class="clearfix"> </div>
						</div>
						
					 	</article>
						
					 </div>
					 </a>
	                <ul class="wmuSliderPagination">
	                	<li><a href="#" class="">0</a></li>
	                	<li><a href="#" class="">1</a></li>
	                	<li><a href="#" class="">2</a></li>
	                </ul>
					 <script src="js/jquery.wmuSlider.js"></script> 
				  <script>
	       			$('.example1').wmuSlider();         
	   		     </script> 
	            </div>
	          </div>
	           	</a>
	   	

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
<div class="row">
<div class="col-md-12">

<h2 align="center" style="color:#F97E76;">User Profile</h2>
<table class="table">
<tr>
<th>Email Id</th>
<th>Username</th>
<th>Addresss</th>
<th>Area</th>
<th>Zipcode</th>
<th>Mobile Number</th>
<th>Shipping Address</th>
<th>Action</th>
</tr>
<tr>
<td><?php echo $id;  ?></td>

<td><?php echo $name;  ?></td>

<td><?php echo $add;  ?></td>

<td><?php echo $area;  ?></td>

<td><?php echo $zip;  ?></td>

<td><?php echo $mob;  ?></td>

<td><?php echo $ship;  ?></td>

<td><a href="edit_profile.php"> <button  style="background: #323A45;color: white; "  type="button" class="btn btn-default">
            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            </button></a>
           </td>
</tr>


</table>


</div>
</div>		
	   
	<!--   	  
	</div>-->
<?php
//include 'database.php';
include 'sidebar.php';

?>	   		    
<!--
				
	
	<!----><?php
	
	include 'footer.php';
	
	?>
</body>
</html>