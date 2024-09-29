<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product page</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-6  m-auto border border-primary mt-3">

      
     <form action="insert.php" method="POST" enctype="multipart/form-data">

     <div class="mb-3">
  <p class="text-center fw-bold fs-3 text-warning">Product Detail:</p>
</div>

<div class="mb-3">
  <label class="form-label">Product Name:</label>
  <input type="text"  name="Pname" class="form-control"  placeholder="Enter Product name">
</div>


<div class="mb-3">
  <label class="form-label">Product Price:</label>
  <input type="text"  name="Pprice" value="1" min="1" max="1000", class="form-control"  placeholder="Enter Product Price">
</div>

<div class="mb-3">
  <label class="form-label">Add Product Image:</label>
  <input type="file" name="Pimage" class="form-control"  >
</div>

<div class="mb-3">
  <label class="form-label">Product Description:</label>
  <input type="text"  name="Pdes" class="form-control"  placeholder="Enter Product Description">
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
<th>Price</th>
<th>Image</th>
<th>Description</th>
<th>update/delete</th>
</thead>

<tbody>
<?php
include 'config.php';
$Record = mysqli_query($con,"SELECT * FROM `products`");
while($row = mysqli_fetch_array($Record)){
echo "
    <tr>
        <td>$row[Id]</td>
        <td>$row[Pname]</td>
        <td>$row[Pprice]</td>
        <td><img src='$row[Pimage]'  width = '150px'  height = '100px'></td>
        <td>$row[Pdes]</td>
       
        
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