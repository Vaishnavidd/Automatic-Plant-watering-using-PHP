<?php
// Connect to MySQL
include "../../config.php";
$link = mysqli_connect( 'localhost', 'root', '','smartfarmashta' );
$result = mysqli_query($link,"SET NAMES utf8");
$result = mysqli_query($link,"SELECT * from sensorinfo where userid='1'");

// Print out rows
$prefix = '';
echo "[\n";
while ( $row = mysqli_fetch_assoc( $result ) ) {
  echo $prefix . " {\n";
  echo '  "category": "' . $row['time'] . '",' . "\n";
  echo '  "value1": ' . $row['temp'] . ',' . "\n";
  echo '  "value2": ' . $row['humidity'] . ',' . "\n";
  echo '  "value3": ' . $row['ph'] . ',' . "\n";
  echo '  "value4": ' . $row['soil1'] . ',' . "\n";
  echo '  "value5": ' . $row['soil2'] . ',' . "\n";
  echo '  "value6": ' . $row['soil3'] . ',' . "\n";
  echo '  "value7": ' . $row['water'] . '' . "\n";
  echo " }";
  $prefix = ",\n";
}
echo "\n]";

// Close the connection
mysqli_close($link);
?>