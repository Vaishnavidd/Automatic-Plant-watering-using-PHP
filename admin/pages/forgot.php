<?php

$msg;
	$color;

include "../../config.php";

require "../../mail.php";

if(isset($_POST["submit"]))
{
	$name = trim(strip_tags($_POST['name']));
	
	//echo "Submit Click ";
	$validate_user_information = mysqli_query($connection,"select * from `admin` where `username` = '".mysqli_real_escape_string($connection,$name)."' ");
	
	
	if(mysqli_num_rows($validate_user_information) == 1) //Check if the information of the user are valid or not
		{
	
			$password = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10);
			$encpassword=md5($password);
		
	
			if(mysqli_query($connection,"update `admin` set `password`='$encpassword' where username='$name'"))
				{
					echo '<script language="javascript">';
					echo 'alert("Password Reset successfully.")';
					echo '</script>';	
					$get_user_information = mysqli_fetch_array($validate_user_information);
					$email=$get_user_information["email"];
					//echo $email;
					forgotmail($email,$password);
					$msg="Password Reset successfully. Please Check Your Mail";
					$color= "alert-success";
				}
			else
				{
						$msg="Please Check Your Details.";
					$color= "alert-warning";
	
				}
			}
			else
				{
						$msg="Please Check Your Details.";
					$color= "alert-warning";
	
				}

		}


?>

<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Password Reset</title>

    <!-- Bootstrap Core CSS -->
   <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
     <link href="../../plugins/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

   

   
     <!-- Custom CSS -->
    <link href="../../dist/css/AdminLTE.min.css" rel="stylesheet">

     <!-- Custom Fonts -->
    <link href="../../plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

   <div class="container">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Forget Password</div>
                        <div style="float:right; font-size: 80%; position: relative; top:-20px"><a href="../index.php">Login</a></div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                        <form role="form" action="" method="post">

  <?php
if(isset($msg))
{
	echo  '<div class="alert '.$color.'">
                    <ul class="margin-bottom-none padding-left-lg">
                      <li>'.$msg.'</li>
                      
                    </ul>
                 								
          </div>';
}


 ?>                          <div class="form-group has-error">
                                <label class="control-label" for="inputWarning">User Name</label>
                                <input type="text" class="form-control" id="inputWarning" name="name" required pattern="[a-zA-Z]+">
								<p class="help-block">New Password will be mail to mention Email Address.</p>
                            </div>
														
							<button type="submit" class="btn btn-default" name="submit">Submit </button>
                            <button type="reset" class="btn btn-default" >Reset </button><br><br>
							 <a href="../index.php">Login Page</a> 
							</form>

                                



                        </div>                     
                    </div>  
        </div>
       
       
                
         </div> 
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../../plugins/jQuery/jQuery-2.2.0.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../../bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../../plugins/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript 
    <script src="dist/js/sb-admin-2.js"></script>-->
    

</body>

</html>

