<?php
session_start();

if($_SESSION["emailid"]=="")
{
	header('location:index.php');
}

?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Jay Jalaram Medicine</title>
  <!-- Tell the browser to be responsive to screen width -->
 <?php
  include 'links.php';
  
  ?>
  
  
  <script type="text/javascript">


		$(document).ready(function(){
	//	alert("hii");
$("#test").on('blur',function() {
    var val = $("#test").val();
	var len= $("#test").val().length;
		if(len < 10){
	    alert("Mobile number length should be 10");
    	$("#test").val("");
        $("#test").focus();
	}

   else if (parseInt(val) < 0 || isNaN(val)) {
        alert("Only numbers are allowed");
        $("#test").val("");
        $("#test").focus();
    }
});



$("#zip1").on('blur',function() {
    var val = $("#zip1").val();
	var len= $("#zip1").val().length;
	if(len < 6){
	    alert("Zipcode length should be 6");
    	 $("#zip1").val("");
        $("#zip1").focus();
    
	}
    else if (parseInt(val) < 0 || isNaN(val)) {
        alert("Only  numbers are allowed");
        $("#zip1").val("");
        $("#zip1").focus();
    
	}
});



$('#pass1').on('blur', function(){
    if(this.value.length < 4){ // checks the password value length
       alert('password should not be empty/length must be between 5 to 12');
       $('#pass1').val(""); // focuses the current field.
       
	   $('#pass1').focus(); // focuses the current field.
      // return false; // stops the execution.
    }
});






});

$(document).ready(function(e) {
    $('#btn').click(function() {
        var sEmail = $('#mail').val();
        if ($.trim(sEmail).length == 0) {
            alert('Please enter valid email address');
            e.preventDefault();
        }
        if (validateEmail(sEmail)) {
           // alert('Email is valid');
        }
        else {
            alert('Invalid Email Address');
            e.preventDefault();
        }
    });
});

function validateEmail(sEmail) {
    var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    if (filter.test(sEmail)) {
        return true;
    }
    else {
        return false;
    }
}









	
	function allLetter(uname)
{
	var letters=/^[A-Za-z]+$/;
	if(uname.value.match(letters))
	{
			return true;
	}
	else
	{
			uname.focus();
			
			alert('username must have alphabetic charcters only');
			return false;
	}
}





function passid_validation(passid)
{
	var pl=passid.value.length;
	var mx=12;
	var my=5;
	if(pl==0 || pl<=my )
	{
		alert("password should not be empty/length must be between "+5+" to "+12);
		passid.focus();
		return false;
	}
	return true;
}

function allnumeric(unum)
{
		var number=/^[0-9]+$/;
		if(unum.value.match(number))
		{
			return true;
		}
		else
		{
				alert('Mobile number must have numeric characters only');
				unum.focus();
				return false;
				
		}
}

function mess()
{
	alert("enter correct captcha code");

}

function allzip(uzip)
{
		var numbers=/^[0-9]+$/;
		var len=uzip.value.length;
		if(len<6)
		{
				alert('ZIP code must be of length 6');
				
			uzip.value = "";
		}
		else if(uzip.value.match(numbers))
		{
			return true;
		}
		else
		{
				alert('ZIP code must have numeric characters only');
				uzip.value = " ";				
				uzip.focus();
				
				return false;
				
		}
}









function allmob(uzip)
{
		var numbers=/^[0-9]+$/;
		var len=uzip.value.length;
		if(len<10)
		{
				alert('Mobile number must be of length 10');
				uzip.value = " ";				
				
		}
		if(uzip.value.match(numbers))
		{
			return true;
		}
		else
		{
				alert('Mobile number must have numeric characters only');
				uzip.focus();
				uzip.value = " ";				
				
				return false;
				
		}
}




</script>




  
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php

include 'header.php';

?>
  <!-- Left side column. contains the logo and sidebar -->
  
  <aside class="main-sidebar">
   
    <section class="sidebar">
     
      <ul class="sidebar-menu">
      
        <li class="treeview active">
          <a href="#">
            <i class="fa fa-table"></i> <span>Tables</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
        <li class="active"><a href="userdata.php"><i class="fa fa-circle-o"></i> User Table</a></li>
            <li class="active"><a href="category.php"><i class="fa fa-circle-o"></i> Category Table</a></li>
			 <li class="active"><a href="question.php"><i class="fa fa-circle-o"></i> Question Table</a></li>
			 <li class="active"><a href="data.php"><i class="fa fa-circle-o"></i> Prescription Table</a></li>
			 <li class="active"><a href="company.php"><i class="fa fa-circle-o"></i> Company Table</a></li>
			 <li class="active"><a href="favourite.php"><i class="fa fa-circle-o"></i> Favourite Table</a></li>
			 <li class="active"><a href="feedback.php"><i class="fa fa-circle-o"></i> FeedBack Table</a></li>
			 <li class="active"><a href="order.php"><i class="fa fa-circle-o"></i> Order Table</a></li>
			 <li class="active"><a href="product.php"><i class="fa fa-circle-o"></i> Product Table</a></li>
          </ul>
        </li>
    </section>
    
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
        
          <div class="box">
           
            <!-- /.box-header -->
            <div class="box-body">
			

<div class="box box-primary">
            <div class="box-header with-border">
              <h1>Create Admin Form</h1>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" role="form">
              <div class="box-body">
                <div class="form-group">
                  <label >Enter Email Id</label>
                  <input type="email" id="mail" class="form-control" name="txt_email" placeholder="Enter Email Id" style="width: 550px; height: 40px;" required>
                </div>
				<div class="form-group">
                  <label >Enter User Name</label>
                  <input type="text" class="form-control" name="txt_name" placeholder="Enter User Name" style="width: 550px; height: 40px;" required>
                </div>
				
				<div class="form-group">
                  <label >Enter Password</label>
                  <input type="password" id="pass1" class="form-control" onblur="return passid_validation(txt_pass);" name="txt_pass" placeholder="Enter Password" style="width: 550px; height: 40px;" required>
                </div>
				
				<div class="form-group">
                  <label >Enter Address</label>

				<textarea name="txtadd" col="5" class="form-control" style="width: 550px;height: 60px;" placeholder="Enter Address" required></textarea>
				                 
				 </div>
				
				<div class="form-group">
                  <label >Select the Area</label>

				<select name="txtcity" class="form-control" autocomplete="off" style="width: 550px; height: 40px;">
<option value="Kankaria">Kankaria</option>
<option value="Maninagar">Maninagar</option>
<option value="Jaymala">Jaymala</option>
<option value="Isanpur">Isanpur</option>
<option value="Ghodasar">Ghodasar</option>
<option value="Dakshini">Dakshini</option>
<option value="Khokhara">Khokhara</option>
<option value="Raipur">Raipur</option>
<option value="Bhulabhai">Bhulabhai</option>


</select>                 
				 </div>
				
				
				<div class="form-group">
                  <label >Enter Zipcode</label>
                  <input type="text" class="form-control" onblur="return allzip(txt_zip);" maxlength='6' name="txt_zip" placeholder="Enter Zipcode" id="zip1" style="width: 550px; height: 40px;" required>
				                 
				 </div>
				
				
				<div class="form-group">
                  <label >Enter Mobile Number</label>
                  <input type="text" class="form-control" name="txt_mob" onblur="return allmob(txt_mob);" maxlength='10' id="test" placeholder="Enter Mobile number" style="width: 550px; height: 40px;" required>
				                 
				 </div>
				
			<div class="form-group">
                  <label >Select the Gender</label>

				<select name="txt_gen" class="form-control" autocomplete="off" style="width: 550px; height: 40px;" required>
<option value="M">Male</option>
<option value="F">Female</option>


</select>                 
				 </div>
				
				
				<!--
				<div class="form-group">
                  <label >Enter the Shipping Address</label>

				<textarea name="txtship" col="5" class="form-control" style="width: 550px;height: 60px;" placeholder="Enter Shipping Address" required></textarea>
				                 
				 </div>
		-->
		<!--
			<div class="form-group">
                  <label >Select the Type of User</label>

				<select name="txt_type" class="form-control" autocomplete="off" style="width: 550px; height: 40px;" required>
<option value="admin">Admin</option>
<option value="user">User</option>


</select>                 
				 </div> -->
				
		
	
		        
              </div>
              
              <div class="box-footer">
                <button type="submit" id="btn" class="btn btn-primary" name="ins_user">Add</button>
              </div>
			  <?php 
			  if(isset($_POST["ins_user"]))
			  {
			  $email=$_POST["txt_email"];
			  $name=$_POST["txt_name"];
			  $pass=$_POST["txt_pass"];
			  $add=$_POST["txtadd"];
			  $city=$_POST["txtcity"];
			  $zip=$_POST["txt_zip"];
			  $mob=$_POST["txt_mob"];
			  $gen=$_POST["txt_gen"];
			  //$ship=$_POST["txtship"];
			  //$type=$_POST["txt_type"];
			  
			    $date=date("d/m/y");

			  $con=mysql_connect("localhost","root","");
			  mysql_select_db("medicine",$con);
			  $res=mysql_query("Insert into user_tbl values('$email','$name','$pass','$add','$city','$zip','$mob','$gen','NULL','admin','true','Null','$date')",$con);
			  
			  if($res==1)
			  {
				  header('location:userdata.php');
			  }
			  else
			  {
				//  echo "na thayu";
				echo "<script>";
				echo "alert('Not Working')";
				echo "</script>";
			  }
			  }
			  ?>
            </form>
          </div>
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>All rights reserved.</b> 
    </div>
    
     <strong>Copyright &copy; 2016-2017 Jay Jalaram Medicine</strong>
 </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<?php
	include 'link1.php';
?>
<script>
  $(function () {
    $("#example").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
</body>
</html>
