<?php
session_start();

// Database connection details
$hostname = "localhost";
$username = "root";
$password = "";
$database = "admin1";

// Establish a database connection
$connection = mysqli_connect($hostname, $username, $password, $database);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if (!isset($_SESSION['cart']) || !is_array($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

if (isset($_POST['addCart'])) {
    $product_name = $_POST['Pname'];
    $product_price = $_POST['Pprice'];
    $product_quantity = $_POST['Pquantity'];

    // Check if the product is already in the cart
    $check_product = array_column($_SESSION['cart'], 'productname');
    if (in_array($product_name, $check_product)) {
        echo "
            <script>
                alert('Product already added');
                window.location.href = 'product.php';
            </script>
        ";
    } else {
        // Add product to the session cart
        $_SESSION['cart'][] = array(
            'productname' => $product_name,
            'productprice' => $product_price,
            'productquantity' => $product_quantity
        );

        // Insert product into the database
        $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0; // Change this accordingly
        $sql = "INSERT INTO cart (user_id, product_name, product_price, product_quantity) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($connection, $sql);
        mysqli_stmt_bind_param($stmt, "issi", $user_id, $product_name, $product_price, $product_quantity);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        header('location:viewcart.php');
    }
}

// Remove product from the cart
if (isset($_POST['remove'])) {
    $item_to_remove = $_POST['item'];

    foreach ($_SESSION['cart'] as $key => $value) {
        if ($value['productname'] === $item_to_remove) {
            // Remove from the session cart
            unset($_SESSION['cart'][$key]);
            $_SESSION['cart'] = array_values($_SESSION['cart']);

            // Remove from the database
            $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0; // Change this accordingly
            $sql = "DELETE FROM cart WHERE user_id = ? AND product_name = ?";
            $stmt = mysqli_prepare($connection, $sql);
            mysqli_stmt_bind_param($stmt, "is", $user_id, $item_to_remove);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);

            header('location:viewcart.php');
        }
    }
}

// Update product quantity in the cart
if (isset($_POST['update'])) {
    $item_to_update = $_POST['item'];
    $new_quantity = $_POST['new_quantity'];

    foreach ($_SESSION['cart'] as $key => $value) {
        if ($value['productname'] === $item_to_update) {
            // Update in the session cart
            $_SESSION['cart'][$key]['productquantity'] = $new_quantity;

            // Update in the database
            $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0; // Change this accordingly
            $sql = "UPDATE cart SET product_quantity = ? WHERE user_id = ? AND product_name = ?";
            $stmt = mysqli_prepare($connection, $sql);
            mysqli_stmt_bind_param($stmt, "iss", $new_quantity, $user_id, $item_to_update);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);

            header('location:viewcart.php');
            exit(); // Exit after updating the quantity
        }
    }
}

// Close the database connection
mysqli_close($connection);
?>
