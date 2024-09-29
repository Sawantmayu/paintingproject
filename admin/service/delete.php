<?php
include 'config.php';

$Id = $_GET['ID'];
$result = mysqli_query($con, "DELETE FROM `service` WHERE Id = $Id");

if ($result) {
    $message = "Record deleted successfully";
} else {
    $message = "Error deleting record";
}

header("location:index.php?message=" . urlencode($message));
?>
