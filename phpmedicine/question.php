

<!DOCTYPE html>
<html>
<head>
<title>Jay Jalaram Medicine</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!--theme-style-->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />	
<!--//theme-style-->


<link href="Content/bootstrap.css" rel="stylesheet"/>
<script src="Scripts/jquery-1.9.1.js"></script>
<script src="Scripts/bootstrap.js"></script>


<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--fonts-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<!--//fonts-->
<script src="js/jquery.min.js"></script>
<!--script-->
</head>
<body> 

<?php

include 'header.php';

?>




<div class="container">
<div class="row">
<div class="col-md-12">

<h1 align="center">---------FAQ---------</h1>
<?php

$con=mysql_connect('localhost','root','');
       mysql_select_db('medicine',$con);
      $res=mysql_query("select q.*,u.* from question_tbl as q,user_tbl as u  where q.email_id=u.email_id and question_status='accept' order by q.question_id desc ",$con);
	

while($row=mysql_fetch_assoc($res))
{
		echo "<hr>";
		echo '<div class="panel panel-default">
		
  <div class="panel-heading"><h3>Question : '.$row["question"].'</h3></div>
  <div class="panel-body">
    Answer : '.$row["answer"].'
	</div>
	<br>
	<div class="panel-body" style="margin-left:700px;margin-top:-50px;">
	
User Name='.$row["user_name"].'
<br>

	</div>
  
</div> </hr>';
}
	?>	


</div>	
</div>
</div>
<div class="row">

<?php


include 'footer.php';

?>
</div>

</body>
</html>