
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
<?php

$id=$_REQUEST["uid"];

$con=mysql_connect('localhost','root','');
mysql_select_db('medicine',$con);
$sql="select o.*,p.* from order_tbl as o,product_tbl as p where p.product_id=o.product_id and o.order_id=$id";
$res=mysql_query($sql,$con);

while($row=mysql_fetch_assoc($res))
{
	$nm=$row["product_name"];
	
	
	$qty=$row["quantity"];
	$pri=$row["product_price"];

}	


 ?>



	<div class="container"> 
			         
		<div class="register">
		  	  <form enctype="" action="" method="post"> 
				 <div class="  register-top-grid">
					<h1 style="color:#F97E76;">Update Quantity Form</h1>

				  <div>
					<b><span style="color: black;font-size:15px;">Product Name<label>*</label></span></b>
					<input type="text" class="form-control" style="width: 550px; height: 40px;"  value="<?php echo $nm; ?>"    readonly> 
				  </div>
				  <hr/>
					
				  <div>
					<b><span style="color: black;font-size:15px;">Product Price<label>*</label></span></b>
					<input type="text" class="form-control" style="width: 550px; height: 40px;" name="txtuname" value="<?php echo $pri; ?>"    readonly> 
				  </div>
				  <hr/>
				    
					
				
  <div>
								
				  <div>
					<b><span style="color: black;font-size:15px;">Quantity<label>*</label></span></b>
					
				<select name="txtqty" class="form-control" autocomplete="off" style="width: 550px; height: 40px;">
<option value="1" <?php if($qty=="1"){echo 'selected';} ?>>1</option>
<option value="2" <?php if($qty=="2"){echo 'selected';} ?>>2</option>
<option value="3" <?php if($qty=="3"){echo 'selected';} ?>>3</option>
<option value="4" <?php if($qty=="4"){echo 'selected';} ?>>4</option>
<option value="5" <?php if($qty=="5"){echo 'selected';} ?>>5</option>
<option value="6" <?php if($qty=="6"){echo 'selected';} ?>>6</option>
<option value="7" <?php if($qty=="7"){echo 'selected';} ?>>7</option>
<option value="8" <?php if($qty=="8"){echo 'selected';} ?>>8</option>
<option value="9" <?php if($qty=="9"){echo 'selected';} ?>>9</option>
<option value="10" <?php if($qty=="10"){echo 'selected';} ?>>10</option>
<option value="11" <?php if($qty=="11"){echo 'selected';} ?>>11</option>
<option value="12" <?php if($qty=="12"){echo 'selected';} ?>>12</option>
<option value="13" <?php if($qty=="13"){echo 'selected';} ?>>13</option>
<option value="14" <?php if($qty=="14"){echo 'selected';} ?>>14</option>
<option value="15" <?php if($qty=="15"){echo 'selected';} ?>>15</option>
<option value="16" <?php if($qty=="16"){echo 'selected';} ?>>16</option>
<option value="17" <?php if($qty=="17"){echo 'selected';} ?>>17</option>
<option value="18" <?php if($qty=="18"){echo 'selected';} ?>>18</option>
<option value="19" <?php if($qty=="19"){echo 'selected';} ?>>19</option>


</select>
					</div>
					
					<hr/>
					
					
					
					
								
				  <div>
					
				  
				  
					
					 <div class="clearfix"> </div>
					  
					 </div>
				<div class="clearfix"> </div>
				<div class="register-but">
					   <input class="acount-btn" type="submit" name="btnsub" value="Update">
					   <input type="submit" class="acount-btn" name="btncan" value="Cancle">
					   
				</div>
<?php

if(isset($_POST["btnsub"]))
{
$q=$_POST["txtqty"];

$t=$pri*$q;


$con=mysql_connect('localhost','root','');
mysql_select_db('medicine',$con);
$res1=mysql_query("update order_tbl set quantity='$q',total_price='$t' where order_id=$id",$con);
if($res1==1)
{
		header('location:cart_display.php');
}

}

if(isset($_POST["btncan"]))
{
	header('location:cart_display.php');
	
}
?>

</form>
</body>
</html>