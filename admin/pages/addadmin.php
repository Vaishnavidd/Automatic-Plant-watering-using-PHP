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
  

if(mysqli_query($connection,"insert into admin (username,mobile,password,status,email) values('$username','$mob','$encpassword','Active','$email')"))
  {
    $msg="User added successfully.";
    $color= "alert-success";
    adminmailsend($email,$password,$username);
    
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
   <title>Add New Admin </title>
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
         Admin Registration
        <small>MCGP</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
  
        <!-- left column -->
    <div class="row">
        <div class="col-md-6">

      <!-- Default box -->
       <div class="box box-primary col-md-6">
            <div class="box-header with-border">
              <h3 class="box-title">Admin Registration</h3>
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
