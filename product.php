

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>

</head>
<body>
<header id="home">
     
     <nav class="sticky">
       
     <img src="logo.jpg" class="logo">
 
       <ul id="menu">
             <li><a href="welcome.php">HOME</a></li>
             <li><a href="#about">ABOUT</a></li>
             <li><a href="service.php">SERVICE</a></li>
             <li><a href="product.php">PRODUCTS</a></li>
             <li><a href="photo.html">PHOTO</a></li>
             <li><a href="#contact">CONTACT</a></li>
           
             
           </ul>
           
           <li class="nav-item">
                <a href="viewcart.php"><i class="fas fa-shopping-cart"><span></span></i></a>
                <a href="logout.php"><i class="fas fa-user"></i></a>
              </li>
             
             
     </nav>
</header>

  

<a href='cart.php'>View Cart</a>
    <div style="margin-bottom: 60px;"></div>
<h1 class="text-link font-monospace text-center my-3">DECORATING PRODUCTS</h1>   
<div class="container-fluid">
        <div class="col-md-12">
        <div class="row">
        
         

<?php
include 'admin/products/config.php';

$Record = mysqli_query($con,"SELECT * FROM `products`");
while($row = mysqli_fetch_array($Record)){
echo "

<div class='card ' style='width: 20rem; margin-right: 50px;'>
<a href='product_details.php?product_id=$row[Id]'>
<form action= 'managecart.php' method = 'POST'>
<img src='admin/products/$row[Pimage]' class='card-img-top' style='width: 310px; height: 200px; object-fit: cover;'>
<div class='card-body text-center' style='height: 260px;  width:300px; margin-bottom: 30px; padding-bottom: 10px;'>
  <h5 class='card-title'>$row[Pname]</h5>
  <p class='card-text ' >$row[Pdes]</p>
</a>
  <p class='card-text text-danger'>$row[Pprice]</p>
  <input type='hidden' name='Pname' value ='$row[Pname]' >
  <input type='hidden' name='Pprice' value ='$row[Pprice]' >
  <input type='number' name='Pquantity' value='1'min='1' max'100' placeholder ='Quantity'><br><br>
  <button type='submit' name='addCart' class='btn btn-dark'>
  Add to Cart <i class='fa fa-shopping-cart'></i>
 
  </button>
  <a href='checkout.php' class='btn btn-danger'>Buy now</a>

 

  <p></p>
  
</div>
</form>
</div>
    ";
}
?>
</div>  
        </div>
    </div>


<section class="footer mt-5">
        <div class="container-fluid bg-light bg-footer text-dark py-5">
        <div class="container py-5">
            <div class="row g-5">
               
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-warning">Our Services</h4>
                    <hr class="w-25 text-secondary mb-4" style="opacity: 1;">
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-dark mb-2" href="service.php"><i class="fa fa-angle-right me-2"></i>Residential Interior</a>
                        <a class="text-dark mb-2" href="service.php"><i class="fa fa-angle-right me-2"></i>Residential Exterior</a>
                        <a class="text-dark mb-2" href="service.php"><i class="fa fa-angle-right me-2"></i>Wood coating</a>
                        
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-warning">Quick Links</h4>
                    <hr class="w-25 text-secondary mb-4" style="opacity: 1;">
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-dark mb-2" href="welcome.php"><i class="fa fa-angle-right me-2"></i>Home</a>
                        <a class="text-dark mb-2" href="welcome.php"><i class="fa fa-angle-right me-2"></i>About Us</a>
                        <a class="text-dark mb-2" href="service.php"><i class="fa fa-angle-right me-2"></i>Our Services</a>
                        <a class="text-dark mb-2" href="products.php"><i class="fa fa-angle-right me-2"></i>Our Products</a>
                        <a class="text-dark" href="contactus.php"><i class="fa fa-angle-right me-2"></i>Contact Us</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-warning">Newsletter</h4>
                    <hr class="w-25 text-secondary mb-4" style="opacity: 1;">
                    <form action="">
                        <div class="input-group">
                            <input type="text" class="form-control p-3 border-0" placeholder="Your Email">
                            <button href="signup.php" class="btn btn-warning">Sign Up</button>
                        </div>
                    </form>
                  
                   
                </div>
            </div>
        </div>
    </div>
  
        
</body>


</html>
