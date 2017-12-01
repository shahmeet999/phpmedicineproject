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

<style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
      }
    </style>
	
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB6S9Zli4v_L0pYZbOpDuk1k6fFX0JMqTA&callback=initMap">
    </script>

<script>

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }

}

function showPosition(position) {

    var x=position.coords.latitude 
    var y=position.coords.longitude;
	
	initialize(x,y);
}
function initialize() {

  var mapProp = {
  
    center:new google.maps.LatLng(22.996170,72.599586),
    zoom:18,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
var map=new google.maps.Map(document.getElementById("googleMap"), mapProp);
		
		var labels = 'Jay Jalaram Medicine';
var labelIndex = 3;
		var marker = new google.maps.Marker({
          position: {lat: 22.996170, lng: 72.599586},
          map: map,
		   label: "Jay Jalaram Medicine",
          title: 'Jay Jalaram Medicine'
	

		  });
  
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>


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
<body onload="getLocation()"> 

<?php
include '../database.php';
include 'user_header.php';

?>

<form action="" method="post">

	<div class="container">
	<h2>Location on Map </h2>
	<div class="col-md-3">
	<div id="googleMap"style="width:500px;height:500px;"></div>
</div>      	  

	<div class="col-md-9">
	<h2 style="margin-left: 669px;margin-top: -35px;">Contact: 9825181177 </h2>
		  <div class="account_grid">
		   
			   <div class=" login-right" style="height:100px">
			  	
				<p><h2>Feedback Form</h2></p>
	
	<form>
				  
				  <br/>
				  
				  <div>
					<b><span style="color: black;font-size:15px;">Give Feedback<label>*</label></span></b>
					<textarea style="width: 550px; height: 40px;" name="txtpass" placeholder="Enter Your feedback" required></textarea> 
					
				  </div>
				  <input type="submit" value="Post Feedback" style="margin-top: 18px;" name="btnlogin">
				 <?php 
				 if(isset($_POST["btnlogin"]))
				 {
					 $eid=$_SESSION["uname"];
				//	$eid=$_POST["txtid"];
				echo $eid;
					$pass=$_POST["txtpass"];
					$con=mysql_connect("localhost","root","");
					mysql_select_db("medicine",$con);
					$res=mysql_query("insert into feedback_tbl values('$eid','$pass')");
				 if($res==1)
				 {
					 header('location:user_profile.php');	
				 }
				 }
				 ?>
				 
			    </form>
			   </div>	
	</div>		   
 </div>	
	</div>		   

	<h3 align="center">If Any Query Mail Us at :jayjalarammedicine@gmail.com</h3>
	
	
	<div class="row">
	<div class="col-md-12">
	
	<?php
	
	include 'footer.php';
	?>
	</div>
	</div>
		<!--   	  
	</div>-->

	
	
	<!---->
</body>
</html>