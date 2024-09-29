<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<?php

include("customizedconnection.php");


$sql = "SELECT * FROM user_images";
$result = mysqli_query($conn, $sql);
?>


    
    <?php
   
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div>";
        echo "<p>Name: " . $row['name'] . "</p>";
        echo "<p>Email: " . $row['email'] . "</p>";
        echo "<p>Message: " . $row['message'] . "</p>";
        echo "<img src='admin/{$row['image_path']}' alt='User Image' style='max-width: 300px; height: 300px;'>";
        echo "<form action='admin/deleteimage.php' method='post'>";
        echo "<input type='hidden' name='image_id' value='{$row['id']}'>";  

        echo "<button type='submit' class='btn btn-warning'>Delete</button>";
        echo "</form>";
        echo "</div>";
        echo "<hr>";
    }
    ?>

</body>
</html>
