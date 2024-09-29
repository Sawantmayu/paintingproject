<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbanme = "booking";
$conn = new mysqli($servername,$username,$password,$dbanme);

if($conn->connect_error){
    die("Connection Failed:" .$conn->connect_error);

}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $date = $_POST["date"];
    $time = $_POST["time"];

    $sql = "INSERT INTO `booking`(`name`, `email`, `address`, `date`, `time`)
     VALUES ('$name','$email','$address','$date','$time')";

     if($conn->query($sql) == TRUE){
        echo "Booking Successfully";
     }else{
        echo "Error: " .$sql . "<br>" .$conn->error; 
     }
}

$conn->close();
?>