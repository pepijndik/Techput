<?php
$host = "localhost";
$username = "pdik";
$password = "Daq1Stappels!";
$db = "mobox";

$con = mysqli_connect($host,$username,"Daq1Stappels!",$db);
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>