<?php
session_start();
ob_start();

//Include the database connection file
include "../../config.php";
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
  
  if(isset($_POST["Delete"]))
  {
  
    
    $id=$_POST["mid"];
  
    
  
  if(mysqli_query($connection,"delete from farminfo where id='$id'"))
  {
    $msg="Device Status update successfully.";
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
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <title>Crop Information List </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap.css">
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
        Crop Information List
        <small>MCGP</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo "index.php?page_owner=".base64_encode($page_owner); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Crop Master</a></li>
        <li class="active"> Crop Information List</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
  <div class="row">
    
   <?php
if(isset($msg))
{
  echo  '<div class="alert '.$color.'">
                    <ul class="margin-bottom-none padding-left-lg">
                      <li>'.$msg.'</li>
                      
                    </ul>
                                
          </div>';
}


 ?>    <!-- left column -->
        <div class="col-md-12">

      <!-- Default box -->
       <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"> Crop Information List</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
             <div class="box-body  table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                              <th class='text-center'>Id</th>
                                            <th class='text-center'> Name</th>
                      
                      <th class='text-center'>Details</th>
                      <th class='text-center'>Summary</th>
                      <th class='text-center'>Photo</th>                                  
                                            <th class='text-center'>Photo2</th>                         <th class='text-center'>Delete</th>
                      
                </tr>
                </thead>
                <tbody>
  <?php
                $result = mysqli_query($connection,"SET NAMES utf8");
                  $result = mysqli_query($connection,"SELECT * from farminfo");
                  
                  while ($row = mysqli_fetch_assoc($result)) 
                  { 
                    $mid=$row['id'];
                                        
                    echo '<tr class="odd gradeX">';
                    
                    echo "<td class='text-center'>".$row['id'] . "</td>";
                    echo "<td class='text-center'>".$row['name'] . "</td>";
                    
                    echo "<td class='text-center'>".$row['details'] . "</td>";
                    echo "<td class='text-center'>".$row['summary'] . "</td>";
                    echo "<td class='text-center'><img src='".$row['photo1'] . "' alt='User Image' width='50' height='60'></td>"; 
                    echo "<td class='text-center'><img src='".$row['photo2'] . "' alt='User Image' width='50' height='60'></td>"; 
                                                                            
                    echo "<td class='text-center'> 
                        <form  method=\"post\" action=\"\">
                          <input name=\"mid\" type=\"hidden\" value=\"$mid\">
                          
                          <input type=\"submit\" value=\"Delete\" name=\"Delete\">
                        </form>
                      </td></tr>";
                    
                    
                  }
                
                
                ?>           
                </tbody>
                
              </table>
            </div>
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
<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<script>
$(document).ready(function() {
    $('#example1').DataTable( {
        stateSave: true
    } );
} );
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

