<?php

session_start();
?>
<!DOCTYPE html>
<html>
<head>



<title>Jay Jalaram MEDICINES</title>

<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!--theme-style-->
<link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />	
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<link href="../Content/bootstrap.css" rel="stylesheet"/>
<script src="../Scripts/jquery-1.9.1.js"></script>
<script src="../Scripts/bootstrap.js"></script>


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

<form action="" method="post">

	<div class="container">
			<div class="row">
				<h2>Terms & Condition </h2>
				<h3><p>
					<ol type="1">

						<li>Only Cash On Deliver (COD) is available.</li>

						</br>

						<li>We can deliver product in some areas as per our selling policy. </li>

						</br>

						<li>To purchase medicine from our website you must upload the prescription 
							of a certified Doctor otherwise we will not deliver the product. </li>

						</br>

						<li>You must be show the original copy of prescription which you will
							upload for the order. </li>

						</br>

						<li>You should first sign up for our website than you must be verify your email address than you can able to log in to our website .</li>

						</br>
						
						
						<li>Return policy is only on medicines* , it is not on other products and if you want to return the medicines you should have to bring the bill when you come at the shop. </li>

					</ol>
				</p></h3>
			</div>
	</div>	
	
	<?php 
include 'footer.php';
	?>			
</body>
</html>