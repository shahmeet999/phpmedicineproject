<?php
session_start();
?>

<?php
$email=$_SESSION["uname"];
$pass1=mysql_real_escape_string($_POST["txtold"]);
$pass2=mysql_real_escape_string($_POST["txtnew"]);
$pass3=$_POST["txtnewre"];

$enc_pass=md5($pass1);
$con=mysql_connect('localhost','root','');
mysql_select_db('medicine',$con);
$res=mysql_query("select * from user_tbl where email_id='$email'",$con);
while($row=mysql_fetch_array($res,MYSQL_ASSOC))
{
  $pass=$row["password"];
}
if($pass==$enc_pass)
{
	if($pass2==$pass3)
	{
		
		$enc_new_pass=md5($pass2);
		$con=mysql_connect('localhost','root',''); 
        mysql_select_db('medicine',$con);
		$res=mysql_query("update user_tbl set password='$enc_new_pass' where email_id='$email'",$con);
		
		if($res==1)
		{
			header('location:view_profile.php');
		}
	
	}
	else
	{
	//	echo "retype new password";
		echo '<script type="text/javascript">';
 echo "alert('Please Re-type new password');";
echo "window.location = 'update_password.php';";
 
   echo "</script>";

	
	}
}

else
{
//	echo "old password is wrong";
	echo '<script type="text/javascript">';
 echo "alert('Old password is wrong');";
echo "window.location = 'update_password.php';";
  

 echo "</script>";


}
?>