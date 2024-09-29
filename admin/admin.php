<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin home_page</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>
    

<nav class="navbar navbar-light bg-dark">
  <div class="container-fluid text-white">
    <a class="navbar-brand text-white"><h1>PaintIt</h1></a>
    <span>
        <i class="fas fa-user-sheild "></i>
        Hello, |
        <i class="fas fa-sign-out-alt"></i>
        <a href="logout.php"><i class="fa-light fa-right-from-bracket"></i></a>
        


    </span>
  </div>
</nav>

<div>
    <h2 class="text-center">Dashboard</h2>
</div>

<div class="bg-warning text-center">
    <a href="service/index.php" class="text-white text-decoration-none fs-3 fw-bold px-5"> Add Service</a>
    <a href="book.php"  class="text-white text-decoration-none fs-4 fw-bold px-5">Bookings</a>
    <a href="products/index.php" class="text-white text-decoration-none fs-3 fw-bold px-5"> Add Product</a>
    <a href="../user_images.php" class="text-white text-decoration-none fs-3 fw-bold px-5"> Images</a>
    
</div>


</body>
</html>