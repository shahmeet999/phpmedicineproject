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
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--fonts-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<!--//fonts-->


<link href="../Content/bootstrap.css" rel="stylesheet"/>
<script src="../Scripts/jquery-1.9.1.js"></script>
<script src="../Scripts/bootstrap.js"></script>


<script src="../js/jquery.min.js"></script>
<!--script-->
</head>
<body> 

<?php
include '../database.php';
include 'user_header.php';

?>
</br>
</br>
<div class="container">
<div class="row">
<div class="col-md-12">

	<form action="" method="post" class="form-horizontal">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Enter Your Question</label>
    <div class="col-sm-10">
      <textarea class="form-control" name="addquestion" cols="5" rows="5" placeholder="Enter Your Question" required></textarea>
    </div>
  </div>
  <!--
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          <input type="checkbox"> Remember me
        </label>
      </div>
    </div>
  </div>-->
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="btnsub" class="btn btn-success">Put Question</button>
    </div>
  </div>
  <?php 
if(isset($_POST["btnsub"]))
{
$que=$_POST["addquestion"];
$eid=$_SESSION["uname"];
$obj1=new database();
$res=$obj1->put_question($que,$eid);
if($res==1)
{
	header('location:user_profile.php');
}
else{
	//echo '<script type="text/javascript">alert("meet");</script>';
}
}
?>
</form>

</div>
</div>
</div>


<div class="container">
<div class="row">
<div class="col-md-12">

<h1 align="center">---------FAQ---------</h1>
<?php
$eid=$_SESSION["uname"];

$obj1=new database();
$res1=$obj1->question_display($eid);
//$con=mysql_connect('localhost','root','');
  //     mysql_select_db('medicine',$con);
    //  $res=mysql_query("select q.*,u.* from question_tbl as q,user_tbl as u  where q.email_id=u.email_id and question_status='accept' order by question_id desc ",$con);
	

while($row=mysql_fetch_assoc($res1))
{
		echo "<hr>";
		echo '<div class="panel panel-default">
		
  <div class="panel-heading"><h3>Question : '.$row["question"].'</h3></div>
  <div class="panel-body">
    Answer : '.$row["answer"].'
	</div>
	<br>
	<div class="panel-body" style="margin-left:700px;margin-top:-50px;">
	
User name='.$row["user_name"].'
<br>

	</div>
  
</div> </hr>';
}
	?>	

</form>
</div>	
</div>
</div>
<?php


include 'footer.php';


?>
</body>
</html>