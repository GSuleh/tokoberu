<?php

$host = 'localhost';
$pass = '';
$user = 'root';
$db = 'tokoberu';


$mysqli = mysqli_connect($host,$user,$pass,$db);

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

 ?>