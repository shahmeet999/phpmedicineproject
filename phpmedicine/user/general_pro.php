
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
<script type="text/javascript">
$(document).ready(function(){
//alert("hii");
$("#test").keyup(function() {
    var val = $("#test").val();
    if (parseInt(val) < 0 || isNaN(val)) {
        alert("please enter valid values");
        $("#test").val("");
        $("#test").focus();
    }
});
});

</script>
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

$eid=$_SESSION["uname"];

//$cnt=new database();
//$res=$cnt->history_count($eid);
$con=mysql_connect('localhost','root','');
    mysql_select_db('medicine',$con);
	$res=mysql_query("select * from order_tbl where email_id='$eid' and status='cart'",$con);

	
	
$cntt=mysql_num_rows($res);


?>	
<form method="post">	
<h1 align="center">Your Order Summary (<?php  if($cntt==0){ echo "Empty"; }
else{ echo $cntt; } ?>)</h1>
<table class="table table-striped">
		<th>Product Photo</th>
		<th>Product Name</th>
		
		<th>Product Price</th>
		<th>Order Date</th>
		<th>Quantity</th>
		<th>Total</th>
<?php


//$cnt1=new database();	
//$res1=$cnt1->product_join_history($eid);
	$res1=mysql_query("select p.*,o.* from product_tbl as p,order_tbl as o where p.product_id=o.product_id and o.email_id='$eid' and o.status='cart' order by o.order_id desc ",$con);
	


while($row=mysql_fetch_array($res1,MYSQL_ASSOC))
{
	echo "<tr><td>";
	echo     '<img src="../images/'.$row["product_img"].'" alt="..." style="height: 145px;"></td>';
    echo "<td>". $row["product_name"]."</td>";
    echo "<td>". $row["product_price"]."</td>";
    echo "<td>". $row["order_date"]."</td>";
//	echo "<td>". $row["qty"]."</td>";
    echo "<td>". $row["quantity"]."</td>";
    echo "<td>". $row["total_price"]."</td>";

	

}

?>
		

<?php



//$cnt=new database();
//$res=$cnt->final_amount_history_page($eid);

	$res2=mysql_query("select sum(total_price) as 'total_amount' from order_tbl where email_id='$eid' and status='cart'",$con);
	
while($row=mysql_fetch_assoc($res2))
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

		
<div>
</div>
</div>
		</table>
<a href="cart_display.php" name="chek" class="btn btn-primary" role="button" style="background-color: orangered;
width: 300px;
height: 42px;
font-size: larger;">Want to Update Cart ?</a>

  <button type="submit" class="btn btn-success"  style="background-color: #5cb85c;
width: 300px;
height: 42px;
font-size: larger;" name="btnins" value="insert">Cash on Delivery</button>
    
<?php


if(isset($_POST["btnins"]))
{
   
   $con=mysql_connect("localhost","root","");
   mysql_select_db("medicine",$con);
   $res=mysql_query("select * from order_tbl where email_id='$eid' and status='cart'",$con);
   $nt=mysql_num_rows($res);
   if($nt>0)
   {
    
  
$con=mysql_connect("localhost","root","");
mysql_select_db("medicine",$con);
$res=mysql_query("update order_tbl set status='buy' where email_id='$eid'",$con);

  header('location:plac_ord.php');
	
	




}
else
{
	echo "<script>";
	echo "alert('Your cart is empty so you cant place the order' );";
	echo "</script>";
	
}

}
?>



	
<?php
	
	include 'footer.php';
	
	?>
	</form>
</body>
</html>