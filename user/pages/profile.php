<?php
session_start();
ob_start();

//Include the database connection file
include "../../config.php";

if (isset($_SESSION["VALID_USER"]) && !empty($_SESSION["VALID_USER"])) 
 {
    //This identifies the owners of pages for Adding and Cancelling Friendship activities
    if (isset($_GET["page_owner"]) && !empty($_GET["page_owner"])) 
  {
        $page_owner = strip_tags(base64_decode($_GET["page_owner"]));
    }
  else 
  {
        $page_owner = strip_tags($_SESSION["VALID_USER"]);
    }


?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <title>User Profile</title>
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
        WelCome
        <small>MCGP</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
<div class="row">
<div class="col-md-6">

      <!-- Default box -->
       <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Profile Details</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
      <?php 
        $userid=$_SESSION['VALID_USER'];
    $validate_user_information = mysqli_query($connection,"select u.*,d.* from user as u , device as d where u.username = '$userid' and u.deviceid=d.deviceid");
  
  
  if(mysqli_num_rows($validate_user_information) == 1) //Check if the information of the user are valid or not
  {   
        
  $get_user_information = mysqli_fetch_array($validate_user_information);
  ?>
          <div class="form-group">
      <label>Username:- </label>
          <label><?php echo $_SESSION['VALID_USER']; ?></label>                 
          </div>
      
      <div class="form-group">
      <label>Name :</label>
          <label><?php echo $get_user_information['name']; ?></label>                 
          </div>    
      
      <div class="form-group">
      <label>Mobile :</label>
          <label><?php echo $get_user_information['mobile']; ?></label>                 
          </div>      
                
         <div class="form-group">
      <label>Email :</label>
          <label><?php echo $get_user_information['email']; ?></label>                  
          </div>      
                
      <div class="form-group">
      <label>Address :</label>
          <label><?php echo $get_user_information['address'];  ?></label>                 
          </div> 
      
      <div class="form-group">
      <label>Device ID :</label>
          <label><?php echo $get_user_information['deviceid'];  ?></label>                  
          </div> 
      
       <div class="form-group">
      <label>Device Name :</label>
          <label><?php echo $get_user_information['devicename'];  ?></label>                  
          </div>  
      
       <div class="form-group">
      <label>Device Details :</label>
          <label><?php echo $get_user_information['details'];  ?></label>                 
          </div>     
                  
           <div class="form-group">
      <label>Device Manufactor Date :</label>
          <label><?php echo $get_user_information['mdate']; } ?></label>                  
          </div> 
          
                    
            </div>
      
      </div>
    </div>
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
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html>

<?php
}
else
{
//echo "hii";
echo $_SESSION["VALID_USER"];
header("location: ../index.php");
}
?>
