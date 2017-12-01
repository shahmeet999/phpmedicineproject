<?php 
$code=$_REQUEST["id"];
require_once("database.php");
$obj=new database();
$count=$obj->getuserbycode($code);

if($count==1)
{
	$obj=new database();

	$cnt=$obj->activateuser($code);
	
	
		header('Location:login.php');
	
}
else
{
//echo "invalid";

	echo '<script type="text/javascript">';
 echo "alert('Invalid');";
   echo "</script>";
	


}

?>