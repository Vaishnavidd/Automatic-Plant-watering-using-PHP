<?php
require("PHPMailerAutoload.php");
function mailsend($email,$uname,$pwd,$name)
{
	
$mail = new PHPMailer();

$mail->IsSMTP();                                      // set mailer to use SMTP
$mail->Host = "mx1.hostinger.in";  // specify main and backup server
$mail->SMTPAuth = true;     // turn on SMTP authentication
$mail->Username = "mcgp@dexterprojects.in";  // SMTP username
$mail->Password = "mcgpmcgp"; // SMTP password


$mail->Port = 587;
$mail->From = "mcgp@dexterprojects.in";
$mail->FromName = "MCGP";
$mail->AddAddress($email);


$mail->WordWrap = 50;                                 // set word wrap to 50 characters
//$mail->AddAttachment("/var/tmp/file.tar.gz");         // add attachments
//$mail->AddAttachment("/tmp/image.jpg", "new.jpg");    // optional name
$mail->IsHTML(true);                                  // set email format to HTML

$mail->Subject = "Welcome to MCGP";
$mail->Body    = "Dear ".$name."  ,  <br/>

Your Account is Created at MCGP as User. <br/> We thank you for registering with us.<br/><br/>

Your login ID is :". $uname."<br/>
Your Password is : ". $pwd."<br/><br/>
We request you to keep your login information confidential.<br/><br/>
Thanks for Showing interest in our company.<br/><br/><br/>
Regards,<br/>
MCGP Team

";
$mail->AltBody = "This is the body in plain text for non-HTML mail clients";

if(!$mail->Send())
{
   	echo '<script language="javascript">';
		echo 'alert("Mail is Not Send.")';
		echo '</script>';	
   
}
else
{
echo '<script language="javascript">';
		echo 'alert("Mail has been sent to given Email-ID to get your login credentials.")';
		echo '</script>';	
}


}


function adminmailsend($email,$pwd,$name)
{
	
$mail = new PHPMailer();

$mail->IsSMTP();                                      // set mailer to use SMTP
$mail->Host = "mx1.hostinger.in";  // specify main and backup server
$mail->SMTPAuth = true;     // turn on SMTP authentication
$mail->Username = "mcgp@dexterprojects.in";  // SMTP username
$mail->Password = "mcgpmcgp"; // SMTP password


$mail->Port = 587;
$mail->From = "mcgp@dexterprojects.in";
$mail->FromName = "MCGP";
$mail->AddAddress($email, "User");
//$mail->AddAddress("dindeshailesh@rediffmail.com");                  // name is optional
$mail->AddReplyTo("mcgp@dexterprojects.in", "Information");

$mail->WordWrap = 50;                                 // set word wrap to 50 characters
//$mail->AddAttachment("/var/tmp/file.tar.gz");         // add attachments
//$mail->AddAttachment("/tmp/image.jpg", "new.jpg");    // optional name
$mail->IsHTML(true);                                  // set email format to HTML

$mail->Subject = "Welcome MCGP";
$mail->Body    = "Dear ".$name."  ,  <br/>

Your Account is Created as Admin of MCGP. <br/> We thank you for registering with us.<br/><br/>

Your login ID is :". $email."<br/>
Your Password is : ". $pwd."<br/><br/>
We request you to keep your login information confidential.<br/><br/>
Thanks for Showing interest in MCGP.<br/><br/><br/>
Regards,<br/>
MCGP Team

";
$mail->AltBody = "This is the body in plain text for non-HTML mail clients";

if(!$mail->Send())
{
   	echo '<script language="javascript">';
		echo 'alert("Mail is Not Send.")';
		echo '</script>';	
   //exit;
}
else
{
echo '<script language="javascript">';
		echo 'alert("Mail has been sent to given Email-ID to get your login credentials.")';
		echo '</script>';	
}


}




//User Forgot password
function forgotmail($email,$pwd)
{
	
$mail = new PHPMailer();

$mail->IsSMTP();                                      // set mailer to use SMTP
$mail->Host = "mx1.hostinger.in";  // specify main and backup server
$mail->SMTPAuth = true;     // turn on SMTP authentication
$mail->Username = "mcgp@dexterprojects.in";  // SMTP username
$mail->Password = "mcgpmcgp"; // SMTP password


$mail->Port = 587;
$mail->From = "mcgp@dexterprojects.in";
$mail->FromName = "MCGP";
$mail->AddAddress($email);


$mail->WordWrap = 50;                                 // set word wrap to 50 characters
//$mail->AddAttachment("/var/tmp/file.tar.gz");         // add attachments
//$mail->AddAttachment("/tmp/image.jpg", "new.jpg");    // optional name
$mail->IsHTML(true);                                  // set email format to HTML

$mail->Subject = "Password reset  to MCGP Account";
$mail->Body    = "Dear ".$email."  ,  <br/>

Your Account Password is reset successfully at our MCGP Account. <br/> We thank you for registering with us.<br/><br/>


Your  New Password is : ". $pwd."<br/><br/>
We request you to keep your login information confidential.<br/><br/>
Thanks for Showing interest in our company.<br/><br/><br/>
Regards,<br/>
MCGP

";
$mail->AltBody = "This is the body in plain text for non-HTML mail clients";

if(!$mail->Send())
{
   	echo '<script language="javascript">';
		echo 'alert("Mail is Not Send.")';
		echo '</script>';	
   //exit;
echo $mail->ErrorInfo;
}
else
{
echo '<script language="javascript">';
		echo 'alert("Mail has been sent to given Email-ID to get your login credentials.")';
		echo '</script>';	
}


}
