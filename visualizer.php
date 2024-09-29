<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Color Visualizer</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        h1 {
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        label {
            margin-bottom: 10px;
        }

        button {
            margin-top: 10px;
            padding: 10px;
            background-color: #4caf50;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 4px;
        }

        button:hover {
            background-color: #45a049;
        }

        .result-container {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .result-container img {
            width: 100%;
            max-width: 400px;
            margin-bottom: 20px;
            border-radius: 8px;
        }

        .color-box {
            width: 100%;
            height: 100px;
            margin-bottom: 20px;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <h1>Color Visualizer</h1>
    
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        <label for="image">Upload a photo:</label>
        <input type="file" id="image" name="image" accept="image/*" required>
        <label for="color">Choose a color:</label>
        <input type="color" id="color" name="color" required>
        <button type="submit">Visualize</button>
    </form>

    <div class="result-container">
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Check if a file is uploaded
                if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
                    // Get the uploaded file details
                    $fileName = $_FILES["image"]["name"];
                    $tempFilePath = $_FILES["image"]["tmp_name"];

                    // Move the uploaded file to a permanent location
                    $uploadDir = "uploads/";
                    $uploadedFilePath = $uploadDir . $fileName;
                    move_uploaded_file($tempFilePath, $uploadedFilePath);

                    // Get the selected color from the form
                    $selectedColor = $_POST["color"];

                    // Display the uploaded image with the applied color
                    echo "<div><img src='$uploadedFilePath' alt='Uploaded Image'></div>";
                    echo "<div class='color-box' style='background-color: $selectedColor;'></div>";
                } else {
                    echo "Error uploading the file.";
                }
            }
        ?>
    </div>
</body>
</html>
