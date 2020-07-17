<?php
session_start();
ob_start();

$msg;
$color;

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

if(isset($_POST["submit"]))
  {
  
    $fname=$_POST["password"];
    $encpassword=md5($fname);
    
    
    if(mysqli_query($connection,"update `user` set `password`='$encpassword' where username='$page_owner'"))
    {
      
        $msg="Password Update Successfully.";
    $color= "alert-success";
        
    
    }
  else
    {
      $msg="Please Check Information.";
    $color= "alert-warning";
      
  
    }
  }

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Password Update </title>
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
        Password Update
        <small>MCGP </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
<div class="col-md-6">
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
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Update Password</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body ">
    
    
           <form action="" method="post" enctype="multipart/form-data" onSubmit="return validate()">
      <div class="form-group has-feedback ">
        <input type="password" id="password" class="form-control" name="password"  placeholder="New Password" required>
        
      </div>
    
     <div class="form-group has-feedback ">
        <input type="password" id="repassword" class="form-control" name="repassword"  placeholder="Retype New Password" required>
        
      </div>
          <button type="submit" class="btn btn-lg btn-success btn-block" name="submit" >Update Me</button>
      <button type="reset" class="btn btn-lg btn-warning btn-block " name="reset">Reset</button>
    
    
               
    </form>
        </div>
      
        
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

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

<script type="text/javascript">
function validate() 
{
    var pass= document.getElementById("password").value;
   var repass =  document.getElementById("repassword").value;
    
    
    
    if(pass == repass) 
  {
          //alert(' Allowed Extension!');
    return true;
    } 
  else 
  {
        alert('Please Check Password!');
        return false;
    }      
      
}


</script>
</body>
</html>

<?php
}
else
{
//echo "hii";

header("location: ../index.php");
}
?>
