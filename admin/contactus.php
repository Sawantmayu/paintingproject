<head>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

</head>
<?php

$isAdmin = true; 

if ($isAdmin) {
    $connection = mysqli_connect("localhost", "root", "", "contactus") or die("Connection failed!");

    
    $sql = "SELECT * FROM contacts";
    $result = mysqli_query($connection, $sql) or die("Query failed!");

   
    echo "<html>";
    echo "<head>";
    echo "<title>Admin Panel - Contact Us Information</title>";
    echo "<style>";
    echo "table { border-collapse: collapse; width: 100%; margin-top: 20px; }";
    echo "th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }";
    echo "th { background-color: #f2f2f2; }";
    echo "</style>";
    echo "</head>";
    echo "<body>";
    
    echo "<h2>Admin Panel - Contact Us Information</h2>";

    if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr><th>Name</th><th>Mobile</th><th>Email</th><th>Message</th></tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row["name"] . "</td><td>" . $row["mobile"] . "</td><td>" . $row["email"] . "</td><td>" . $row["message"] . "</td>";
            echo "<td>";
            
            echo "</td>";
            echo "</tr>";

        }

        echo "</table>";
    } else {
        echo "No contact form submissions found.";
    }

    echo "</body>";
    echo "</html>";

    mysqli_close($connection);
} else {
    
    header("Location: contactus.php"); 
    exit();
}
?>
