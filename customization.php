<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painting Customization</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body>

    <div class="container">
        <h1>House Painting Customization</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="houseImage">Upload Your House Image:</label>
            <input type="file" name="houseImage" id="houseImage" accept="image/*" required>
            <button type="submit">Submit</button>
        </form>

        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "db";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_FILES["houseImage"]) && $_FILES["houseImage"]["error"] == UPLOAD_ERR_OK) {
                $targetDir = __DIR__ . "/uploads/";

                // Create the "uploads" directory if it doesn't exist
                if (!file_exists($targetDir)) {
                    mkdir($targetDir, 0777, true);
                }

                $targetFile = $targetDir . basename($_FILES["houseImage"]["name"]);

                if (move_uploaded_file($_FILES["houseImage"]["tmp_name"], $targetFile)) {
                    $sql = "INSERT INTO house_images (file_path) VALUES ('$targetFile')";
                    $conn->query($sql);

                    // Display the uploaded image
                    echo '<img src="' . $targetFile . '" alt="Uploaded Image">';
                    echo "<p>Image uploaded successfully!</p>";
                } else {
                    echo "<p>Sorry, there was an error uploading your file.</p>";
                }
            } else {
                echo "<p>Error: No file uploaded.</p>";
            }
        }

        $conn->close();
        ?>

    </div>

</body>
</html>
