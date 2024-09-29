<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<style>
    input{
        margin: 10px;
    }
</style>
</head>
<body>


<?php
include 'config.php';


if (isset($_GET['ID'])) {
    
    $id = intval($_GET['ID']);

    
    $query = "SELECT * FROM service WHERE Id=$id";
    $record = mysqli_query($con, $query);

    if (!$record) {
        die('Error fetching data: ' . mysqli_error($con));
    }

    $data = mysqli_fetch_array($record);
} else {
   
    die('ID parameter is missing in the URL.');
}


?>
    

    <div class="container">
    <div class="row">
        <div class="col-md-6  m-auto border border-primary mt-3">

      
     <form action="update.php?ID=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">

     <div class="mb-3">
  <p class="text-center fw-bold fs-3 text-warning">Service Detail:</p>
</div>

<div class="mb-3">
  <label class="form-label">Service Name:</label>
  <input type="text" value=" <?php echo $data['Sname']?>" name="Sname" class="form-control"  placeholder="Enter service name">
</div>

<div class="mb-3">
  <label class="form-label">Description:</label>
  <input type="text" value=" <?php echo $data['Description']?>" name="Description" class="form-control"  placeholder="Enter description">
</div> 

<div class="mb-3">
  <label class="form-label">Add Service Image:</label>
  <input type="file" name="Simage" class="form-control"  >
  <img src=" <?php echo $data['Simage']?>"  alt="" style="height: 100px";>
</div>
<input type="hidden" name="Id" value="<?php echo $data['Id']?>">
<button type="submit" class="bg-warning my-3 form-control text-white" name="update">Update</button>
     </form>
     </div>
    </div>
</div>

<?php
include 'config.php';

if(isset($_POST['update'])){
    $id = $_POST['Id'];
    $name = $_POST['Sname'];
    $description = $_POST['Description'];

    // Check if a new file is uploaded
    if ($_FILES['Simage']['size'] > 0) {
        $img_loc = $_FILES['Simage']['tmp_name'];
        $img_name = $_FILES['Simage']['name'];
        $img_des = "Uploadimage/".$img_name;
        move_uploaded_file($img_loc, 'Uploadimage/'.$img_name);

        // Update with the new image
        mysqli_query($con, "UPDATE `service` SET `Sname`='$name', `Description`='$description', `Simage`='$img_des' WHERE Id='$id'");
    } else {
        // Update without changing the image
        mysqli_query($con, "UPDATE `service` SET `Sname`='$name', `Description`='$description' WHERE Id='$id'");
    }

    header("location:index.php");
}
?>


       

    </body>    
</html>