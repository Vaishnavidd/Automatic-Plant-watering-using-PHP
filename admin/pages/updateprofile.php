<?php
session_start();
ob_start();

//Include the database connection file
include "../../config.php";

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

  $email=$_POST["email"];
  $mob=$_POST["mobile"];
  
if(mysqli_query($connection,"update admin set mobile='$mob',email='$email' where username='$page_owner'"))
  {
    
    $msg="User Update successfully.";
    $color= "alert-success";  
    
  }
  else
  {
    $msg="Please Check Information. ";
    $color= "alert-warning";  
  
  }
  }

?>

<!DOCTYPE html>
<html style="height: auto; min-height: 100%;">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Update Dashboard</title>
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

  <!-- =============================================== -->

  

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Profile Update
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
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Update Profile</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body ">
        
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
       
    
        
    <?php
    
    $result = mysqli_query($connection,"SET NAMES utf8");
    
    //echo "SELECT * from login as l,taluka as t where l.id='$userid' and l.talukaid=t.taluka_id";
    
    $res=mysqli_query($connection,"SELECT * from admin where username='$page_owner'");
      $user = mysqli_fetch_array($res);
       ?>
               
        <div class="form-group">
                  <label for="exampleInputEmail1">Username : </label>
                 <label><?php echo $user['username']?></label>
                </div>
        <div class="form-group">
                  <label for="exampleInputEmail1">Mobile</label>
                  <input type="text" class="form-control" placeholder="Enter Mobile" value="<?php echo $user['mobile']?>" name="mobile" required pattern="[0-9]{10}">
                </div>
        
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control"  placeholder="Enter email" value="<?php echo $user['email']?>" name="email" required>
                </div>
         
              <!-- /.box-body -->

               <button type="submit" class="btn btn-lg btn-success btn-block" name="submit" >Update Me</button>
            </form>
        </div>
      
        
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
header("location: ../index.html");
}
?>
