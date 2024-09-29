<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service page</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-6  m-auto border border-primary mt-3">

      
     <form action="insert.php" method="POST" enctype="multipart/form-data">

     <div class="mb-3">
  <p class="text-center fw-bold fs-3 text-warning">Service Detail:</p>
</div>

<div class="mb-3">
  <label class="form-label">Service Name:</label>
  <input type="text"  name="Sname" class="form-control"  placeholder="Enter service name">
</div>

<div class="mb-3">
  <label class="form-label">Description:</label>
  <input type="text" name="Description" class="form-control"  placeholder="Enter description">
</div> 

<div class="mb-3">
  <label class="form-label">Add Service Image:</label>
  <input type="file" name="Simage" class="form-control"  >
</div>
<button name="submit" class="bg-warning my-3 form-control text-white" name="upload">Upload</button>
     </form>
     </div>
    </div>
</div>

<!--fetch data-->
<div class="container ">
  <div class="row">
    <div class="col-md-10  m-auto">

   
<table class="table table-hover border my-5">

<thead>
<th>Id</th>
<th>Name</th>
<th>Description</th>
<th>Image</th>
<th>update/delete</th>
</thead>

<tbody>
<?php
include 'config.php';
$Record = mysqli_query($con,"SELECT * FROM `service`");
while($row = mysqli_fetch_array($Record)){
echo "
    <tr>
        <td>$row[Id]</td>
        <td>$row[Sname]</td>
        <td>$row[Description]</td>
        <td><img src='$row[Simage]'  width = '200px'  height = '100px'></td>
        <td><a href='delete.php? ID= $row[Id]' class = 'btn btn-warning'>Delete</a></td>
        <td><a href='update.php? ID= $row[Id]' class = 'btn btn-warning'>Update</a></td>
        <td></td>
        
        
        
    </tr>
    ";
}
?>
</tbody>

</thead>

</table>
</div>
  </div>
</div>

</body>
</html>