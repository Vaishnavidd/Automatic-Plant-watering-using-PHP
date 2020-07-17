<?php
session_start();
ob_start();
$msg;
  $color;

$deviceid=$_POST["mid"];
if(!isset($deviceid))
{
 header("location:rptdevice.php?page_owner=".base64_encode($_SESSION["VALID_ADMIN"]));
}

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
  
  $name=$_POST["name"];
  $details=$_POST["details"];
  

if(mysqli_query($connection,"update device set devicename='$name',details='$details' where deviceid='$deviceid'"))
  {
    
    $msg="Device Update successfully.";
    $color= "alert-success";
      
    
  }
  else
  {
    $msg="Please Check Information. or Device Name Already Exists";
    $color= "alert-warning";

    
  
  }
  }

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> 
   <title>Update Device</title>
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
         Update Device
        <small>MCGP</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo "index.php?page_owner=".base64_encode($page_owner); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Device Master</a></li>
        <li class="active">Update Device</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

<div class="row"> 
        <!-- left column -->
        <div class="col-md-6">

      <!-- Default box -->
       <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Update Device</h3>
            </div>
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
    
          <!-- /.box-header -->
            <!-- form start -->
            <form  method="post" action="">
              <div class="box-body">
      <input type="hidden" name="mid" value="<?php echo $deviceid;?> ">  
    <div class="form-group">
      <label>Device ID :-</label>
        
    <?php
    
    $result = mysqli_query($connection,"SET NAMES utf8");
    
    //echo "SELECT * from login as l,taluka as t where l.id='$userid' and l.talukaid=t.taluka_id";
    
    $res=mysqli_query($connection,"SELECT * from device where deviceid=$deviceid");
      $user = mysqli_fetch_array($res);
       ?>
                <label><?php echo $user['deviceid']; ?></label>                   
          </div>
        <div class="form-group">
                  <label for="exampleInputEmail1">Device Name</label>
                  <input type="text" class="form-control" value="<?php echo $user['devicename']?>" placeholder="Enter Device Name" name="name" required pattern="[a-zA-Z0-9]+">
                </div>
        <div class="form-group">
               <div class="form-group">
                  <label for="exampleInputEmail1">Details</label>
                  <textarea class="form-control" rows="3" placeholder="Enter Details" name="details"><?php echo $user['details']?></textarea>
                </div>                
                
                
                 <button type="submit" class="btn btn-lg btn-success btn-block" name="submit" >Update Me</button>
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
