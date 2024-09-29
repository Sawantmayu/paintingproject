<?php
include("customizedconnection.php");

session_start();

// Check if the form is submitted and the token is valid
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit']) && isset($_POST['token']) && $_POST['token'] === $_SESSION['form_token']) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message= $_POST["message"];
    $image = $_FILES["image"];
    $imageName = $image["name"];
    $imageTmpName = $image["tmp_name"];
    $uploadPath = "Uploadimage/";

    if (!file_exists($uploadPath)) {
        mkdir($uploadPath, 0777, true);
    }

    $targetFilePath = $uploadPath . $imageName;
    move_uploaded_file($imageTmpName, $targetFilePath);

    $sql = "INSERT INTO user_images (name, email, message,image_path) VALUES ('$name', '$email', '$message','$targetFilePath')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script> alert('Image Uploaded successfully.');
                                  </script>";
        unset($_SESSION['form_token']); 
    } else {
        echo '<script>showAlert("Error", "Error uploading image: ' . mysqli_error($conn) . '");</script>';
    }
}

// Generate a new token
$token = bin2hex(random_bytes(32));
$_SESSION['form_token'] = $token;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload</title>
</head>

<body class="d-flex align-items-center justify-content-center" style="height: 100vh; background-color: #f8f9fa;">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title text-center">Upload Image</h2>
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="token" value="<?php echo $token; ?>">
                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <div class="mb-3">
                    <label for="message" class="form-label">Message:</label>
                    <input type="text" class="form-control" id="message" name="message" required>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Upload Image:</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                    <small id="imageHelp" class="form-text text-muted">Add your referenced image here.</small>
                </div>

                <button type="submit" class="btn btn-warning" name="submit">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>
<script>
    $(document).ready(function () {
        
        $('#imageForm').submit(function (e) {
            var imageInput = $('#image');
            var imageError = $('#imageError');

            if (imageInput[0].files.length === 0) {
                e.preventDefault(); 
                imageError.text('Please select an image.').show();
            } else {
                imageError.hide().text('');
            }
        });
    });
</script>
