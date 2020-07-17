<?php
session_start();
ob_start();

//Include the database connection file
include "../../config.php";

  $msg;
  $color;
  $vdate= date("Y-m-d");
  $vdate= date_create($vdate);

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
  $ptext=substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 8);
  
  $name=$_POST["name"];
  
  $details=$_POST["details"];
  $summary=$_POST["summary"];
  
  $imageFileType = pathinfo( basename($_FILES["photo"]["name"]),PATHINFO_EXTENSION);
  $photo = "../../info/".$ptext."_01.".$imageFileType;
  
  $imageFileType2 = pathinfo( basename($_FILES["photo2"]["name"]),PATHINFO_EXTENSION);
  $photo2 = "../../info/".$ptext."_02.".$imageFileType;


  

if(mysqli_query($connection,"insert into farminfo(`name`, `details`, `summary`, `photo1`,`photo2`) values('$name','$details','$summary','$photo','$photo2')"))
  {
    move_uploaded_file($_FILES["photo"]["tmp_name"], $photo);
    move_uploaded_file($_FILES["photo2"]["tmp_name"], $photo2);
    $msg="Information added successfully.";
    $color= "alert-success";
    
  }
  else
  {
    $msg="Please Check Information. or Device name Already Exists";
    $color= "alert-warning";  
  }
  }

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> 
   <title>Add Crop Information </title>
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
         Crop Information
        <small>MCGP</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo "index.php?page_owner=".base64_encode($page_owner); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Crop Master</a></li>
        <li class="active">Crop Information</li>
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
              <h3 class="box-title">Crop Information</h3>
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
            <form  method="post" action="" enctype="multipart/form-data" onSubmit="return validate()">
              <div class="box-body">
        
        <div class="form-group">
                  <label for="exampleInputEmail1">Crop Name</label>
                  <input type="text" class="form-control"  placeholder="Enter Crop Name" name="name" required pattern="[a-zA-Z0-9]+">
                </div>
        
        <div class="form-group">
                  <label for="exampleInputEmail1">Details</label>
                  <textarea class="form-control" rows="5" placeholder="Enter Details" name="details"></textarea>
                </div>
        
        
          <div class="form-group">
                  <label for="exampleInputEmail1">Photo </label>
                  <input type="file" class="form-control"  name="photo" id="photo">
          <p class="help-block">Photo size should be less than 50kb.</p>
                </div>
        
            
               
                
             
              <!-- /.box-body -->

               <button type="submit" class="btn btn-lg btn-success btn-block" name="submit" >Add Information</button>
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
<script>
function validate() 
{
    var filename=document.getElementById('photo').value;
  var fileUpload = document.getElementById("photo");
  var size = parseFloat(fileUpload.files[0].size / 1024).toFixed(2);
    var extension=filename.substr(filename.lastIndexOf('.')+1).toLowerCase();
  
  var filename2=document.getElementById('photo2').value;
  var fileUpload2 = document.getElementById("photo2");
  var size2 = parseFloat(fileUpload.files[0].size / 1024).toFixed(2);
    var extension2=filename2.substr(filename2.lastIndexOf('.')+1).toLowerCase();
    //alert(extension);
  
    if((extension=='jpg' || extension=='jpeg' || extension=='gif' || extension=='png') && (size < 50.0) && (extension2=='jpg' || extension2=='jpeg' || extension2=='gif' || extension2=='png') && (size2 < 50.0)) {
          //alert(' Allowed Extension!');
    return true;
    } 
  else {
        alert('Not Allowed Extension!');
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
echo $_SESSION["VALID_ADMIN"];
header("location: ../index.php");
}
?>
