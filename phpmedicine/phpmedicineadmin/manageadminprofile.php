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
  
  <script>
  
  
  $(document).ready(function(){
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
 }); 
 
 
 
 
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

<li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Reports</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <?php include 'reportslink.php'; ?>
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
              <h3 class="box-title">Edit Admin Profile Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<?php 
			$eid=$_REQUEST["id"];
			
			 $con=mysql_connect("localhost","root","");
                        mysql_select_db("medicine",$con);
                        $res=mysql_query("select * from user_tbl where email_id='$eid' and type='admin'");
						while($row=mysql_fetch_array($res,MYSQL_ASSOC))
                        {
							$uname=$row["user_name"];
							$pass=$row["password"];
							$add=$row["address"];
              $area=$row["area"];
				      $zip=$row["zipcode"];			
              $mno=$row["mobile_no"];
              $gen=$row["gender"];
						}
			?>
            <form method="post" action="edit_admin.php?id=<?php echo $eid;?>" role="form">
			
              <div class="box-body">
			           
                 <div class="form-group">
                  <label>Edit User Name</label>
                  <input type="text" class="form-control" name="txt_comid" value="<?php echo $uname;?>" required>
                </div>

                <div class="form-group">
                    <label >Edit Address</label>
                    <textarea name="txtadd" col="5" class="form-control" required><?php echo $add;?></textarea>     
                </div>
                
              <div>
                  <b><span style="color: black;font-size:15px;">Area</span></b>
          
                  <select name="txtcity" class="form-control" autocomplete="off">
                    <option value="Kankaria" <?php if($area=="Kankaria"){echo 'selected';} ?>>Kankaria</option>
                    <option value="Maninagar" <?php if($area=="Maninagar"){echo 'selected';}?>>Maninagar</option>
                    <option value="Jaymala"<?php if($area=="Jaymala"){echo 'selected';} ?>>Jaymala</option>
                    <option value="Isanpur" <?php if($area=="Isanpur"){echo 'selected';} ?>>Isanpur</option>
                    <option value="Ghodasar" <?php if($area=="Ghodasar"){echo 'selected';} ?>>Ghodasar</option>
                    <option value="Dakshini" <?php if($area=="Dakshini"){echo 'selected';} ?>>Dakshini</option>
                    <option value="Khokhara" <?php if($area=="Khokhara"){echo 'selected';} ?>>Khokhara</option>
                    <option value="Raipur" <?php if($area=="Raipur"){echo 'selected';} ?>>Raipur</option>
                    <option value="Bhulabhai" <?php if($area=="Bhulabhai"){echo 'selected';} ?>>Bhulabhai</option>
                  </select>
          </div>

<div class="form-group">
                  <label >Enter Zipcode</label>
                  <input type="text" class="form-control" onblur="return allzip(txt_zip);" maxlength='6' name="txt_zip" placeholder="Enter Zipcode" id="zip1" value="<?php echo $zip;?>" required>
                         
         </div>
        
        
        <div class="form-group">
                  <label >Enter Mobile Number</label>
                  <input type="text" value="<?php echo $mno; ?>" onblur="return allmob(txt_mob);" class="form-control" name="txt_mob" maxlength='10' id="test" placeholder="Enter Mobile number" required>
                         
         </div>
        
      <div class="form-group">
                  <label >Select the Gender</label>

        <select name="txt_gen" class="form-control" autocomplete="off" required>
<option value="M" <?php if($gen=="M"){echo 'selected';} ?> >Male</option>
<option value="F" <?php if($gen=="F"){echo 'selected';} ?> >Female</option>


</select>                 
         </div>
        
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="insup">Update</button>
                <a href="changepassword.php?id=<?php echo $eid;?>" role="button" class="btn btn-danger">Change Password</a>
              </div>
			  
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
      <b>Version</b> 2.3.8
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com"></a>.</strong> All rights
    reserved.
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
        <!-- /.control-sidebar-menu 

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
//	include 'link1.php';
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
