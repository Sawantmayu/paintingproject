<?php
include("customizedconnection.php");

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['image_id'])) {
    $imageId = $_POST['image_id'];
    $sql = "SELECT image_path FROM user_images WHERE id = '$imageId'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $imagePath = $row['image_path'];

    $deleteSql = "DELETE FROM user_images WHERE id = '$imageId'";
    $deleteResult = mysqli_query($conn, $deleteSql);

    if ($deleteResult) {
    
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        echo "<script> alert('Image deleted successfully.');
                      window.location.href='admin.php'; // Redirect back to the admin page
              </script>";
    } else {
        echo '<script>alert("Error deleting image: ' . mysqli_error($conn) . '");</script>';
    }
} else {
    header("Location: admin.php");
}
?>
