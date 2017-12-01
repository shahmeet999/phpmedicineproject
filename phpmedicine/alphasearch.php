
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
<!--script-->
</head>
<body> 

<?php
include 'database.php';
include 'header.php';

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

<!---->

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
			
			$x=$_GET['letter'];
		$obj=new database();
		$res=$obj->alphabetic_search($x);
		$cnt=mysql_num_rows($res);	
			
			?>
		
				<div class="products">
	   		     	<h5 class="latest-product"><?php echo "Total products are ".$cnt; ?></h5>	
	   		     	  <a class="" href=""><span> </span></a> 		     
	   		     </div>
<div class="panel panel-default">
  <div class="panel-body">
    <div class="row">
		

	<?php
	//require 'database.php';
	//$obj=new database();
			
if(isset($_GET['letter']))
{
//$con=mysql_connect('localhost','root','');
  //  mysql_select_db('medicine',$con);
  //include 'database.php';

    $ch=$_GET['letter'];
	$obj=new database();
	$res=$obj->alphabetic_search($ch);
	//$res=mysql_query("select * from product_tbl where product_name LIKE '$ch%'");

	while($row=mysql_fetch_array($res))
  {
	
 echo' <div class="col-sm-6 col-md-4">';
   echo  '<div class="thumbnail" style="height: 450px;">';
     echo ' <img src="images/'.$row["product_img"].'"  style="height: 145px;"></img>';
 echo    '<div class="caption">
        <h3 style="font-size:16px">'.$row["product_name"].'</h3>
  <h3 >'.$row["product_price"].'</h3>
               
        <p><a href="single.php?id='.$row["product_id"].'"><button type="button" style="width: 200px;" name="btnbuy" class="btn btn-default btn-lg">
  <span class="glyphicon glyphicon-buy" aria-hidden="true"></span> Preview
</button></a>
<a href="login.php"><button type="button" style="width: 200px; background:#323A45; color:white; " name="btncar" class="btn btn-default btn-lg">
  <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Add to cart
</button></a>
</p>

	  </div>
    </div>
  </div>
  ';  
	  
  }
	
}	
?>				
</div>
</div>
</div>


<?php

include 'sidebar.php';

?>	   		    



<?php

include 'footer.php';
?>	
	</body>
	</html>