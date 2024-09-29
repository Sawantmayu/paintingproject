<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $mobile = $_POST["mobile"];
    $email = $_POST["email"];
    $message = $_POST["message"];}

$connection = mysqli_connect("localhost","root","","contactus") or die("connection failed!");
$sql = "INSERT INTO contacts (name, mobile, email, message)VALUES('{$name}','{$mobile}','{$email}','{$message}')";

$result = mysqli_query($connection,$sql) or die("query failed!");
header("location: http://localhost/project1/welcome.php");


mysqli_close($connection);
?>