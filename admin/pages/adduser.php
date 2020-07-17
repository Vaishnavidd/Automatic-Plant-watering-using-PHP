<?php
session_start();
ob_start();

//Include the database connection file
include "../../config.php";
require "../../mail.php";
$msg;
  $color;

if (isset($_SESSION["VALID_ADMIN"]) && !empty($_SESSION["VALID_ADMIN"])) 
 {
    //This identifies the owners of pages for Adding and Cancelling Friendship activities
    if (isset($_GET["page_owner"]) && !empty($_GET["page_owner"])) 
  {
        $page_owner = strip_tags(base64_decode($_GET["page_owner"]));
    }
  else 
  {
        $page_owner = strip_tags($_SESSION["VALID_ADMIN"]);
    }
  
  if(isset($_POST["submit"]))
  {
  
  $username=$_POST["username"];
  $password = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10);
  $encpassword=md5($password);
  $email=$_POST["email"];
  $mob=$_POST["mobile"];
  $name=$_POST["fname"]." ".$_POST["mname"]." ".$_POST["lname"];
  $address=$_POST["address"];
  $deviceid=$_POST['device'];
  $date=date("y-m-d");
  

if(mysqli_query($connection,"insert into user(`username`, `password`, `email`, `mobile`, `name`,  `status`, `address`,`deviceid`) values('$username','$encpassword','$email','$mob','$name','Active','$address','$deviceid')"))
  {
    $msg="User added successfully.";
    $color= "alert-success";
    mailsend($email,$username,$password,$name);
    
    mysqli_query($connection,"update device set sdate='$date' where deviceid='$deviceid'");
    
  }
  else
  {
    $msg="Please Check Information. or Username Already Exists";
    $color= "alert-warning";
    
  
  }
  }

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> 
   <title>Add New User </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
</head>
<body  class="sidebar-mini skin-green-light fixed hold-transition" >
<!-- Site wrapper -->
<div class="wrapper">

  <?php include("header.php"); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         User Registration
        <small>MCGP</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo "index.php?page_owner=".base64_encode($page_owner); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">User Master</a></li>
        <li class="active">Add User</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
  
        <!-- left column -->
    <div class="row">
        <div class="col-md-6">

      <!-- Default box -->
       <div class="box box-success col-md-6">
            <div class="box-header with-border">
              <h3 class="box-title">User Registration</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
      <?php
if(isset($msg))
{
  echo  '<div class="alert '.$color.'">
                    <ul class="margin-bottom-none padding-left-lg">
                      <li>'.$msg.'</li>
                      
                    </ul>
                                
          </div>';
}


 ?>
            <form  method="post" action="">
              <div class="box-body">
        <div class="form-group">
                  <label for="exampleInputEmail1">First name</label>
                  <input type="text" class="form-control"  placeholder="Enter First name" name="fname" required pattern="[a-zA-Z]+">
                </div>
        <div class="form-group">
                  <label for="exampleInputEmail1">Middle Name</label>
                  <input type="text" class="form-control"  placeholder="Enter Middle Name" name="mname" required pattern="[a-zA-Z]+">
                </div>
        <div class="form-group">
                  <label for="exampleInputEmail1">Last Name</label>
                  <input type="text" class="form-control"  placeholder="Enter Last Name" name="lname" required pattern="[a-zA-Z]+">
                </div>
        
        
         <div class="form-group">
                  <label for="exampleInputEmail1">Username</label>
                  <input type="text" class="form-control"  placeholder="Enter Username" name="username" required pattern="[a-zA-Z]+">
                </div>
        
        <div class="form-group">
                  <label for="exampleInputEmail1">Mobile</label>
                  <input type="number" class="form-control" placeholder="Enter Mobile" name="mobile" required pattern="[0-9]{10}" min="7000000000" max="9999999999">
                </div>
        
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control"  placeholder="Enter email" name="email" required>
                </div>
        <div class="form-group">
                  <label for="exampleInputEmail1">Address</label>
                  <textarea class="form-control" rows="3" placeholder="Enter Address" name="address"></textarea>
                </div>
                  
                <label>Device</label>
        <select class="form-control" name="device">
    <?php
    $result = mysqli_query($connection,"SET NAMES utf8");
      $res=mysqli_query($connection,"select * from device where deviceid not in(select deviceid from user)");
      while ($row = mysqli_fetch_assoc($res)) 
      { ?>
                 <option value="<?php echo $row['deviceid'];?>"><?php echo $row['devicename']; ?></option>
                                              <?php } ?> 
                                                
                                            </select>                     
          </div>
             
              <!-- /.box-body -->

               <button type="submit" class="btn btn-lg btn-success btn-block" name="submit" >Register Me</button>
            </form>
          </div>
        <!-- /.box-body -->
        
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
</div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  

  
    
</div>

<!-- ./wrapper -->

<!-- jQuery 2.2.0 -->
<script src="../../plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/app.min.js"></script>

</body>
</html>

<?php
}
else
{
//echo "hii";
echo $_SESSION["VALID_ADMIN"];
header("location: ../index.php");
}
?>
