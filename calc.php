<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function calculatePrice($paintType, $serviceType, $area) {
    global $conn;

    $sql = "SELECT price_per_sqft FROM painting_services WHERE paint_type = '$paintType' AND service_type = '$serviceType'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $pricePerSqft = $row["price_per_sqft"];
        $totalPrice = $pricePerSqft * $area;
        return $totalPrice;
    } else {
        return "Combination of paint type and service type not found in the database.";
    }
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $paintType = isset($_POST["paintType"]) ? $_POST["paintType"] : "";
    $serviceType = isset($_POST["serviceType"]) ? $_POST["serviceType"] : "";
    $area = isset($_POST["area"]) ? $_POST["area"] : "";

    if (!empty($paintType) && !empty($serviceType) && !empty($area)) {
        $price = calculatePrice($paintType, $serviceType, $area);
        
        if (is_numeric($price)) {
            echo "Total Price: ₹" . number_format($price, 2); 
        } else {
            echo $price;
        }
    } else {
        echo "Please fill in all the fields.";
    }
}

$conn->close();
?>


