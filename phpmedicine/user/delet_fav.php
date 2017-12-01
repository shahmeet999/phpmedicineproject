<?php
$fid=$_REQUEST["fid"];
include '../database.php';


$cnt=new database();
$res=$cnt->delete_fav($fid);
/*
$con=mysql_connect("localhost","root","");
mysql_select_db("medicine",$con);
$res=mysql_query("delete from order_tbl where order_id='$id'",$con);
*/
if($res==1)
{
	header('location:allfav.php');
}

?>