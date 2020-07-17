<?php
//Database Connection
define('hostnameorservername', 'localhost');
// Server Name or host Name
define('serverusername', 'root');
// database Username
define('serverpassword', '');
// database Password
define('databasenamed', 'mcgp2');
// database Name

global $connection;
$connection = @mysqli_connect(hostnameorservername, serverusername, serverpassword,databasenamed) or die('Connection could not be made to the Database Server. Please report this system error at <font color="blue">vaishnavideogaonkar@gmail.com</font>');

?>
