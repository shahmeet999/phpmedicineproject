<?php 
session_start();

if($_SESSION["uname"]=="")
{
	header('location:../login.php');
}

?>
<?php
include '../database.php';

$fid=$_REQUEST["fid"];
$email=$_SESSION["uname"];
//echo $email;

$obj=new database();
$res2=$obj->check_fav($email,$fid);

if($res2==0){
		
$obj2=new database();
$res1=$obj2->display_product($fid);
while($row=mysql_fetch_array($res1))
{
	$nm=$row["product_name"];
	$amt=$row["product_price"];
	
}

echo $nm;
echo $amt;

//$res3=new database();
//$res=$res3->fav_add($fid,$nm,$amt);

$con=mysql_connect('localhost','root','');
    mysql_select_db('medicine',$con);
  $res=mysql_query("insert into favourite_tbl values('NULL','$fid','$nm','$amt','$email')",$con); 
	

if($res==1)
{
header('location:user_profile.php');
}
else
{
//	echo 'not ';

	echo '<script language=javascript>
	alert("Not added to the favourite");
	window.location.href="user_profile.php"
	</script>';


}
}
else{
	
	echo '<script language=javascript>
	alert("already add");
	window.location.href="user_profile.php"
	</script>';
}
?>