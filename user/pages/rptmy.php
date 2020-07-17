<?php
session_start();
ob_start();

//Include the database connection file
include "../../config.php";
  $msg;
  $color;

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
  <title>My Farm Sensor Data  </title>
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
  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
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
        User List
        <small>MCGP</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo "index.php?page_owner=".base64_encode($page_owner); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Report Master</a></li>
        <li class="active"> Sensor Data</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
  <div class="row">
    
    <!-- left column -->
        <div class="col-md-12">

      <!-- Default box -->
       <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title"> Sensor Data</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
             <div class="box-body  table-responsive">
              <table id="example1" class="table table-bordered table-striped display nowrap">
                <thead>
                <tr>
                              <th class='text-center'>Id</th>
                                            <th class='text-center'>Crop</th>
                      
                      <th class='text-center'>Time</th>
                      <th class='text-center'>Temperature </th>
                      <th class='text-center'>Humidity</th>
                      <th class='text-center'>Soil</th>
                      <th class='text-center'>Water Level</th>            
                                            <th class='text-center'>LDR</th>
                      
                      
                </tr>
                </thead>
                <tbody>
  <?php
                $result = mysqli_query($connection,"SET NAMES utf8");
                $userid=$_SESSION['userid'];
                  $result = mysqli_query($connection,"SELECT s.* ,c.cropname from  sensorinfo as s, crop as c where s.userid='$userid' and c.cropid=s.cropid");
                  
                  while ($row = mysqli_fetch_assoc($result)) 
                  { 
                    $mid=$row['userid'];
                    
                    
                    echo '<tr class="odd gradeX">';
                    
                    echo "<td class='text-center'>".$row['userid'] . "</td>";
                    echo "<td class='text-center'>".$row['cropname'] . "</td>";
                    
                    echo "<td class='text-center'>".$row['time'] . "</td>";
                    echo "<td class='text-center'>".$row['temp'] . "</td>";
                    echo "<td class='text-center'>".$row['humidity'] . "</td>";
                    
                    echo "<td class='text-center'>".$row['soil'] . "</td>";
                    echo "<td class='text-center'>".$row['water'] . "</td>";
                    echo "<td class='text-center'>".$row['ldr'] . "</td>";
                      echo "</tr>";
                    
                    
                  }
                
                
                ?>           
                </tbody>
                <tfoot>
        <tr>
                              <th class='text-center'>Id</th>
                                            <th class='text-center'>Crop</th>
                      
                      <th class='text-center'>Time</th>
                      <th class='text-center'>Temperature </th>
                      <th class='text-center'>Humidity</th>
                      <th class='text-center'>Soil</th>
                      <th class='text-center'>Water Level</th>            
                                            <th class='text-center'>LDR</th>
                      
                </tr>
        </tfoot>
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
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>

<script>
$(document).ready(function() {

    $('#example1').DataTable( {
  stateSave: true,
  dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ],
        initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
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
echo $_SESSION["VALID_USER"];
header("location: ../index.php");
}
?>

