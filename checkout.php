<?php
// Database connection
$hostname = "localhost";
$username = "root";
$password = "";
$database = "admin1";


error_reporting(E_ALL);
ini_set('display_errors', '1');

$connection = mysqli_connect($hostname, $username, $password, $database);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {  
    $name = isset($_POST['name']) ? mysqli_real_escape_string($connection, $_POST['name']) : '';

   
    $mobile = isset($_POST['mobile']) ? mysqli_real_escape_string($connection, $_POST['mobile']) : '';

    
    $email = isset($_POST['email']) ? mysqli_real_escape_string($connection, $_POST['email']) : '';

   
    $address = isset($_POST['address']) ? mysqli_real_escape_string($connection, $_POST['address']) : '';

   
    $sqlCheck = "SELECT * FROM orders WHERE name = '$name' AND mobile = '$mobile' AND email = '$email' AND address = '$address'";
    $resultCheck = mysqli_query($connection, $sqlCheck);

    if (mysqli_num_rows($resultCheck) == 0) {
        
        $sqlInsert = "INSERT INTO orders (name, mobile, email, address) VALUES ('$name', '$mobile', '$email', '$address')";

        if (mysqli_query($connection, $sqlInsert)) {
            
            header('Location: payment/index.php');
            exit();
        } else {
            echo "Error: " . $sqlInsert . "<br>" . mysqli_error($connection);
        }
    } else {
        
        echo "";
    }
}

mysqli_close($connection); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>

    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin-top: 10; 
        }

        .form-container {
            max-width: 450px;
            width: 100%;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-right: 20px; 
        }

        .form-container img {
           width: 500px;
            height: 500px;
            max-height: 500px;
        }
    </style>

    <title>Checkout</title>
</head>
<body>
    <header>
        <!-- Your header content goes here -->
    </header>

    <div class="container mt-5">
    
        <div class="form-container">
            <h2>Add Delivery Address</h2>

            <form action="" method="post" onsubmit="return validateForm()">
                <div class="mb-3" style="max-width: 500px;">
                    <label for="name" class="form-label"><i class="fas fa-user"></i> Name:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3" style="max-width: 500px;">
                    <label for="mobile" class="form-label"> <i class="fas fa-phone"></i> Mobile Number:</label>
                    <input type="tel" class="form-control" id="mobile" name="mobile" required pattern="\d{10}">
                </div>
                <div class="mb-3" style="max-width: 500px;">
                    <label for="email" class="form-label"><i class="fas fa-envelope"></i> Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3" style="max-width: 500px;">
                    <label for="address" class="form-label"> <i class="fas fa-map-marker-alt"></i> Address:</label>
                    <textarea class="form-control" id="address" name="address" required></textarea>
                </div>
                <button type="submit" class="btn btn-success"><i class="fas fa-shopping-cart"></i> Place Order</button>
            </form>
        </div>
        <img src="images/order.jpg" alt="Side Image" style="max-width: 300px; height: auto;">
    </div>

    <!-- Your footer content goes here -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofSFEQqUp7n5Cq2Ut3ibVJJAzGytlQDgsN" crossorigin="anonymous"></script>
    
    <script>
        function validateForm() {
            var phoneNumber = document.getElementById("mobile").value;
            var email = document.getElementById("email").value;

            // Validate phone number
            if (phoneNumber.length !== 10 || isNaN(phoneNumber)) {
                alert("Please enter a valid 10-digit phone number.");
                return false; // Prevent form submission
            }

            // Validate email format
            if (!email.includes('@')) {
                alert("Please enter a valid email address.");
                return false; // Prevent form submission
            }

            return true; // Proceed with form submission
        }
    </script>
</body>
</html>
