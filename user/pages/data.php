<?php
// Connect to MySQL
include "../../config.php";
session_start();

$userid=$_GET['id'];

$result = mysqli_query($connection,"SET NAMES utf8");
$result = mysqli_query($connection,"SELECT * from sensorinfo where userid='$userid'");

// Print out rows
$prefix = '';
echo "[\n";
while ( $row = mysqli_fetch_assoc( $result ) ) {
  echo $prefix . " {\n";
  echo '  "category": "' . $row['time'] . '",' . "\n";
  echo '  "value1": ' . $row['temp'] . ',' . "\n";
  echo '  "value2": ' . $row['humidity'] . ',' . "\n";
  echo '  "value3": ' . $row['soil'] . ',' . "\n";
  echo '  "value4": ' . $row['water'] . ',' . "\n";
  echo '  "value5": ' . $row['ldr'] . ',' . "\n";
  echo " }";
  $prefix = ",\n";
}
echo "\n]";

// Close the connection
//mysqli_close($link);
?>