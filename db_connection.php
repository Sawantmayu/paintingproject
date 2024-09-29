<?php
$hostname = "localhost";
$username = "your_username";
$password = "admin";

$connection = mysqli_connect($hostname, $username, $password, $database);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
