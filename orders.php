<?php
session_start();

// Check if the user is logged in or redirect to the login page
if (!isset($_SESSION['id'])) {
    header('Location: login.php'); // Replace with the actual login page URL
    exit();
}

// Check if the payment is completed
if (!isset($_SESSION['payment_completed']) || !$_SESSION['payment_completed']) {
    header('Location: product.php'); // Redirect to the home page or payment page
    exit();
}

// Include your database connection file
include('db_connection.php'); // Replace with the actual path to your database connection file

// Retrieve user and order details from the database
$user_id = $_SESSION['id'];
$sql = "SELECT * FROM cart WHERE id = ?";
$stmt = mysqli_prepare($connection, $sql);
mysqli_stmt_bind_param($stmt, "i", $user_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
mysqli_stmt_close($stmt);

// Your HTML and display logic for showing orders
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders</title>
    <!-- Your additional styles and scripts here -->
</head>
<body>

<h2>My Orders</h2>

<?php
// Display user's orders
while ($row = mysqli_fetch_assoc($result)) {
    echo "<p>Order ID: {$row['order_id']}</p>";
    echo "<p>Product: {$row['product_name']}</p>";
    echo "<p>Quantity: {$row['quantity']}</p>";
    echo "<p>Order Date: {$row['order_date']}</p>";
    echo "<hr>";
}
?>

<!-- Your additional HTML and styling for the orders page -->

</body>
</html>
