<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "richu";

$mysql = mysqli_connect($host, $username, $password, $database);

if (!$mysql) {
  die("Connection failed: " . mysqli_connect_error());
}
?>
