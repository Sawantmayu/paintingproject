<?php
// Replace these values with your actual database credentials
$hostname = "localhost";
$username = "root";
$password = "";
$database = "db";

$conn = mysqli_connect($hostname, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>