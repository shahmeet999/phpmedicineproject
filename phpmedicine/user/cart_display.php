
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
    if (parseInt(val) <= 0 || isNaN(val) ) {
        alert("Please enter numbers only");
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

$cnt=new database();
$res=$cnt->count_display($eid);

$cntt=mysql_num_rows($res);


?>		
<h1 align="center">Your Cart Item (<?php  if($cntt==0){ echo "Empty"; }
else{ echo $cntt; } ?>)</h1>
<table class="table table-striped">
		<th>Product Photo</th>
		<th>Product Name</th>
		
		<th>Product Price</th>
		<th>Order Date</th>
		<th>Quantity</th>
		<th>Total</th>
<th>Action</th>
<?php


$cnt1=new database();	
$res1=$cnt1->product_join_cart($eid);

$cntt=mysql_num_rows($res1);
$i=0;
while($row=mysql_fetch_array($res1,MYSQL_ASSOC))
{
	
	$id=$row["order_id"];
   
	echo "<tr><td>";
	echo     '<img src="../images/'.$row["product_img"].'" alt="..." style="height: 145px;width: 194px;"></td>';
    echo "<td>". $row["product_name"]."</td>";
    echo "<td>". $row["product_price"]."</td>";
    echo "<td>". $row["order_date"]."</td>";
//	echo "<td>". $row["qty"]."</td>";
echo '<form method="post" id="'.$i.'" name="'.$i.'" action="">
';

//<input type="text"  name="quty" value="'.$row["quantity"].'" id="test" size="3" min="1" maxlength="3" />
//echo '<td><label>'.$row["quantity"].'</label>
//<a href="up_quantity.php?uid='.$row["order_id"].'"><input name="upbtn" value="Update Quantity" class="acount-btn" type="button"></button></td></a>';  
   // echo "<td>".$t=($row["amount"]*$row["qty"])</a>."</td>";o
   
echo '<td><input type="text"  name="quty'.$i.'" value="'.$row["quantity"].'" id="test" size="3" min="1" maxlength="3" />';
echo '<input name="upbtn'.$i.'" value="update quantity" class="acount-btn" type="submit"></button></td>';  
   // echo "<td>".$t=($row["amount"]*$row["qty"])."</td>";

	
   $p=$row["product_price"];
   
   $pid=$row["product_id"];
		
		$id=$row["order_id"];
   
//echo "qty is ".$q; 
  
	//echo "ans is ".$t; 
 

 
if(isset($_POST["upbtn".$i]))	
	{
		$q=$_POST["quty".$i];

		$t=$p*$q;
		if($q==0 || $q==" ")
		{
			echo "<script>";
			echo "alert('Quantity field can not be empty');";
			echo "</script>";
			
		}
		else{
		$con=mysql_connect("localhost","root","");
		mysql_select_db("medicine",$con);
		$res=mysql_query("update order_tbl set quantity='$q',total_price='$t' where order_id=$id");
		if($res==1)
		{
			header('location:cart_display.php');
		}
		}
	}

 

 
	
	echo "<td>". $row["total_price"]."</td>";
	
  echo '<td><a href="delet_cart.php?id='.$row["order_id"].'"><button type="button" class="btn btn-default btn-lg">
  <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> 
</button>
</a></td>';
    echo "</tr>";
	echo "</form>";

	$i=$i+1;
	
}


/*
 if(isset($_POST["upbtn0"]))	
	{
		$q=$_POST["quty"];

		$t=$p*$q;	
		echo "total".$t;
		$con=mysql_connect("localhost","root","");
		mysql_select_db("medicine",$con);
		$res=mysql_query("update order_tbl set quantity='$q',total_price='$t' where order_id='$id and product_id='$pid'");
		if($res==1)
		{
			header('location:cart_display.php');
		}
		
	}

*/

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
<td>
<a href="user_profile.php" name="con" class="btn btn-primary" role="button" style="background-color: orangered;
width: 205px;
height: 42px;
font-size: larger;" >Continue Shopping</a>

</td>
<td>
<?php

if($cntt==0)
{
echo '<a href="cartpage.php" name="chek" class="btn btn-primary" role="button" style="background-color: orangered;
width: 105px;
height: 42px;
font-size: larger;" disabled >Check_Out</a>';
}
else
{
	
		$con=mysql_connect('localhost','root','');
    mysql_select_db('medicine',$con);
	$res4=mysql_query("select p.*,o.* from product_tbl as p,order_tbl as o where p.product_id=o.product_id and p.category_id in(11,12) and o.status='cart'",$con);
	$count=mysql_num_rows($res4);
	if($count>=1)
	{
echo '<a href="cartpage.php" name="chek" class="btn btn-primary" role="button" style="background-color: orangered;
width: 105px;
height: 42px;
font-size: larger;" enabled >Check_Out</a>';
	}
	else
	{
				echo '<a href="general_pro.php" name="chek" class="btn btn-primary" role="button" style="background-color: orangered;
			width: 105px;
			height: 42px;
			font-size: larger;" enabled >Check_Out</a>';

	}
}
?>
<!--<input  type="submit" name="btnchk" value="checkout" style="background-color: orangered;">
  <span class="glyphicon glyphicon-ok"     aria-hidden="true"></span> Check out
</button>
-->
</td>

<td></td>		
		</tr>

</div>
</div>
</div>

		</table>
		<div class="row">
<div class="col-md-12">
		<?php
	
	include 'footer.php';
	
	?>
	</div>
	</div>
</body>
</html>