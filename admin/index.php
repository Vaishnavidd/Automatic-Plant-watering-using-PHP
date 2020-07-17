<?php

//Include the database connection file
require "../config.php"; 

if(isset($_POST['submit']))
{
	session_start();
	ob_start();
	$msg;
	$color;

//Check to be sure that a valid session has been created
if(isset($_POST["username"]) && isset($_POST["password"]))
{
	$username = trim(strip_tags($_POST['username']));
	$user_password = trim(strip_tags($_POST['password']));
	$encrypted_md5_password = md5($user_password);
		

	//Check the database table for the logged in user or page owner information
	$validate_user_information = mysqli_query($connection,"select * from `admin` where `username` = '".mysqli_real_escape_string($connection,$username)."' AND `password` = '".mysqli_real_escape_string($connection,$encrypted_md5_password)."' AND `status`='Active'");
	
	
	if(mysqli_num_rows($validate_user_information) == 1) //Check if the information of the user are valid or not
	{
		//The submitted info of the user are valid therefore, grant the user access to the system by creating a valid session for this user and redirect this user to the welcome page
		$get_user_information = mysqli_fetch_array($validate_user_information);
		$_SESSION["VALID_ADMIN"] = $username;
		$_SESSION['userid'] = $get_user_information['adminid'];
		$_SESSION["Admin_FULLNAME"] = strip_tags($get_user_information["username"]);
		
		header("location: pages/index.php?page_owner=".base64_encode($username));		
	}
	else
	{
		//The submitted info the user are invalid therefore, display an error message on the screen to the user
			$msg="Please Enter Correct Username and Password.";
			$color= "alert-warning";	
	}
}
else
{
	//Redirect user back to login page if there is no valid session created or the created session is an empty field
		
			$msg="Please Enter Correct Username and Password.";
			$color= "alert-warning";
		
}
}
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MCGP Admin Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>MCGP <br>Admin Login</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>
	 <p class="login-box-msg">  </p>
	 <div style="float:right; font-size: 80%; position: relative; top:-20px"><a href="../index.php">Home</a></div>
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
    <form action="" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="username" placeholder="User Name" required pattern="[A-Za-z]+">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control"  name="password" placeholder="Password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      
        <!-- /.col -->
        
        <!-- /.col -->
      </div>
	  
          <button type="submit" class="btn btn-lg btn-success btn-block " name="submit">Sign In</button>
      
		
		
          <a class="btn btn-lg btn-warning btn-block" href="pages/forgot.php"></i>Forget Password</a>

				
  <a class="btn btn-lg btn-error btn-block" href="../index.php"></i>Home</a>
          
    </form>

    
   

   
    

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.0 -->
<script src="../plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>

