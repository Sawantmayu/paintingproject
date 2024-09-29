<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "booking";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

// Delete booking
if (isset($_POST['delete_id'])) {
    $delete_id = $_POST['delete_id'];
    $delete_sql = "DELETE FROM booking WHERE id = $delete_id";
    $conn->query($delete_sql);
}

// Retrieve booking information from the database
$sql = "SELECT * FROM booking";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <title>Admin Panel - Booking Information</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
       
    </style>
</head>
<body>
<div class="bg-warning text-center">
    <h2>Admin Panel - Booking Information</h2>
    </div>
    <?php
    
    if ($result->num_rows > 0) {
        echo "<form method='post' action=''>";
        echo "<table>";
        echo "<tr><th>Name</th><th>Email</th><th>Address</th><th>Date</th><th>Time</th><th>Action</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["name"] . "</td><td>" . $row["email"] . "</td><td>" . $row["address"] . "</td><td>" . $row["date"] . "</td><td>" . $row["time"] . "</td>";
            echo "<td><button type='submit'  class='btn btn-warning' name='delete_id' value='" . $row["id"] . "'>Delete</button></td>";
            echo "</tr>";
        }

        echo "</table>";
        echo "</form>";
    } else {
        echo "No bookings found.";
    }
    ?>

</body>
</html>

<?php
$conn->close();
?>
