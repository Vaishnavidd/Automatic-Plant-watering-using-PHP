<?php

//Include the database connection file
include "config.php";
	
	if(isset($_GET["temp"]) && isset($_GET["humidity"]))
	{
	
		$temp=$_GET["temp"];
		$humidity=$_GET["humidity"];
		$ldr=$_GET["ldr"];
		$soil=$_GET["soil"];
		$water=$_GET["water"];
		$userid=$_GET["userid"];
		$cropid=$_GET["cropid"];
		

		if(mysqli_query($connection,"INSERT INTO `sensorinfo`( `userid`, `cropid`, `temp`, `humidity`, `soil`, `ldr`, `water`) VALUES ('$userid','$cropid','$temp','$humidity','$soil','$ldr','$water')"))
		{
			echo "Success";
		}
		else
		{
			echo "Fail";	
		}
	}

?>