<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include database connection code
include('connection.php'); // Change the path accordingly

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $paintType = isset($_POST["paintType"]) ? $_POST["paintType"] : "";
    $serviceType = isset($_POST["serviceType"]) ? $_POST["serviceType"] : "";
    $newPrice = isset($_POST["newPrice"]) ? $_POST["newPrice"] : "";

    // Perform the update in the database
    $sql = "UPDATE painting_services SET price_per_sqft = '$newPrice' WHERE paint_type = '$paintType' AND service_type = '$serviceType'";
    
    if ($conn->query($sql) === TRUE) {
        echo "Prices updated successfully!";
    } else {
        echo "Error updating prices: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
