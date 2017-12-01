
<?php
session_start();

if($_SESSION["uname"]=="")
{
	header('location:../login.php');
}

$cid=$_REQUEST["id"];
//echo $cid;
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

<form method="post">
<div class="container">

<div class="row">
<div class="col-md-12">


<?php
$eid=$_SESSION["uname"];

$cnt=new database();
$res=$cnt->count_display($eid);
$cntt=mysql_num_rows($res);


?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
<h1 align="center">Your Cart Item (<?php echo $cntt; ?>)</h1>
<table class="table table-striped">
		<th>Product Image</th>
		<th>Product Name</th>
		
		<th>Product Price</th>
		<th>Order Date</th>
		<th>Quantity</th>
		<th>Total</th>
<th>Action</th>
<?php

$cnt1=new database();	
$res1=$cnt1->product_join_cart($eid);


while($row=mysql_fetch_array($res1,MYSQL_ASSOC))
{
	echo "<tr><td>";
	echo     '<img src="../images/'.$row["product_img"].'" alt="..." style="height: 145px;"></td>';
    echo "<td>". $row["product_name"]."</td>";
    echo "<td>". $row["product_price"]."</td>";
    echo "<td>". $row["order_date"]."</td>";
	echo "<td>"?><select name="txtprice" class="form-control" onChange="window.location="quantity_update.php?id="+this.value">
<?php 
	echo '<option value="$cid" >';?><?php echo $cid;?><?php '</option>';

	echo '<option value="1" >1</option>';
echo '<option value="2" >2</option>';
echo '<option value="3">3</option>';
echo '<option value="4">4</option>';
echo '<option value="5">5</option>';
echo '</select>'."</td>";
	echo '<td>'.$cid*$row["product_price"].'</td>';
	
	echo "<td>".$row["total_price"]."</td>";

}



?>
		

<?php


$cnt=new database();
$res=$cnt->final_amount_cart_page($eid);

while($row=mysql_fetch_assoc($res))
{
	$amt=$row["total_amount"];
}



?>


<tr>
<td colspan="3"></td>
<td></td>
<td><h3>Total</h3></td>
<td><h3><?php echo $amt; ?></h3></td>
</tr>

		
<tr>
<td colspan="4"></td>
<td></td>
<td>
<a href="pay.php"  class="btn btn-primary" role="button" style="background-color: orangered;
width: 105px;
height: 42px;
font-size: larger;">Check_Out</a>
<!--<input  type="submit" name="btnchk" value="checkout" style="background-color: orangered;">
  <span class="glyphicon glyphicon-ok"     aria-hidden="true"></span> Check out
</button>
-->
</td>

		
		</tr>
<div>
</div>
</div>
		</table>

</div>
</div>
</div>
<?php
	
	include '../footer.php';
	
	?>
	</form>
</body>
</html>