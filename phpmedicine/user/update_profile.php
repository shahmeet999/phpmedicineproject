<?php
session_start();


?>

<?php


	$id=$_SESSION["uname"];
	$name=$_POST["txtuname"];
	$add=$_POST["txtadd"];
	$zip=$_POST["txtzip"];
	$mob=$_POST["txtno"];
	$area=$_POST["txtcity"];
	$ship=$_POST["txtship"];
	
	$con=mysql_connect('localhost','root','');
    mysql_select_db('medicine',$con);
    $res=mysql_query("update user_tbl set user_name='$name',address='$add',area='$area',zipcode='$zip',mobile_no='$mob',ship_address='$ship' where email_id='$id'",$con);
	
	

if ($res==1)
{
	header('location:view_profile.php');
}
else
{
	echo '<script type="text/javascript">';
 echo "alert('Not updated');";
   echo "</script>";
	
}



?>