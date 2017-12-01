<?php 
session_start();
?>
<?php
include '../database.php';

$pid=$_REQUEST["pid"];
$email=$_SESSION["uname"];
echo $email;

$obj=new database();
$res2=$obj->checkcart($email,$pid);

if($res2==0){
		
$obj2=new database();
$res1=$obj2->view_product($pid);
while($row=mysql_fetch_array($res1))
{
	$amt=$row["product_price"];
}
$date=date("d/m/y");
echo $date;
$qty=1;
$flag="cart";
$productprice=$amt*$qty;
echo $productprice;
$res3=new database();
$res=$res3->wishlist_add($date,$qty,$pid,$email,$amt,$flag,$productprice);

if($res==1)
{
header('location:user_profile.php');
}
else
{
	echo 'not ';
}
}
else{
	
	echo '<script language=javascript>
	alert("The product is already added");
	window.location.href="user_profile.php"
	</script>';
}
?>