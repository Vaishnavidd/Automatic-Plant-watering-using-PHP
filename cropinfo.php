<?php

//Include the database connection file
include "config.php";
  
  
  
  
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
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  
</head>
<body  >
<!-- Site wrapper -->
<div class="wrapper">

  <a class="btn btn-lg btn-error btn-block" href="index.php"></i>Home</a>

   <!-- Content Wrapper. Contains page content -->
  
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Crop Information List
        <small>MCGP</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
  <div class="row">
    
      <!-- left column -->
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
                                            <th class='text-center'>Photo2</th>                         
                      
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
                    echo "<td class='text-center'><img src='admin/pages/".$row['photo1'] . "' alt='User Image' width='50' height='60'></td>"; 
                    echo "<td class='text-center'><img src='".$row['photo2'] . "' alt='User Image' width='50' height='60'></td>"; 
                                                                            
                    echo "</tr>";
                    
                    
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
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
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

?>

