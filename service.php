<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>

</head>
<body>
<header id="home" >
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
        <div class="content-items"></div>
      <div class="hello">
        <h1>Services </h1>
          
     </div>

     
    </header>  
   

    <div class="bg-dark text-center">
    <a href="color.html" class="text-white text-decoration-none fs-3 fw-bold px-5"> Color-Cataloge</a>
    <a href="paint.php"  class="text-white text-decoration-none fs-4 fw-bold px-5">Paints </a>
    
</div>
    <div style="margin-bottom: 120px;"></div>
<h1 class="text-link font-monospace text-center my-3">Our Services</h1>   
<div class="container-fluid">
        <div class="col-md-12">
        <div class="row">
        
         

<?php
include 'config.php';
$Record = mysqli_query($con,"SELECT * FROM `service`");
while($row = mysqli_fetch_array($Record)){
echo "

<div class='card ' style='width: 18rem; margin-right: 20px;'>
<img src='admin/service/$row[Simage]' class='card-img-top' style='width: 287px; height: 200px;'>
<div class='card-body text-center'>
  <h5 class='card-title'>$row[Sname]</h5>
  <p class='card-text'>$row[Description]</p>
  <p></P> 
</div>
</div>
    ";
}
?>
<div class="container text-center">
    <form action='admin/customize.php' method='post'  >
        <button type='submit' class='btn btn-warning '>Add your referenced image here</button>
    </form>
</div>
</div>  
        </div>
    </div>

<!-- Call To Action Start -->
    <div class="container-fluid bg-call-to-action py-5 " style="margin-top: 80px;">
        <div class="container py-5">
            <div class="row g-0 justify-content-start">
                <div class="col-lg-6">
                    <h1 class="display-5 mb-4">Book Your Service Now</h1>
                    <br>
                    <br> 
                    <a href="book.html" class="btn btn-primary rounded-pill py-md-3 px-md-5 mt-4">Book Now</a>
                </div>
            </div>
        </div>
      
<br>
<br>
<br>
<div style="margin-bottom: 100px;"></div>

<h2>Painting Calculator</h2>

<form action="calc.php" method="post">
    <label for="paintType">Select Paint Type:</label>
    <select name="paintType" id="paintType">
        <option value="Fresh Painting">Fresh Painting</option>
        <option value="Repainting">Repainting</option>
    </select>

    <label for="serviceType">Select Service Type:</label>
    <select name="serviceType" id="serviceType">
        <option value="Interior">Interior</option>
        <option value="Exterior">Exterior</option>
    </select>

    <label for="area">Enter Area (in sqft):</label>
    <input type="text" name="area" id="area">

    <input type="submit" value="Calculate">
</form>
 
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
                        <a class="text-dark mb-2" href="about.php"><i class="fa fa-angle-right me-2"></i>About Us</a>
                        <a class="text-dark mb-2" href="service.php"><i class="fa fa-angle-right me-2"></i>Our Services</a>
                        <a class="text-dark mb-2" href="products.php"><i class="fa fa-angle-right me-2"></i>Our Products</a>
                        <a class="text-dark" href="welcome.php"><i class="fa fa-angle-right me-2"></i>Contact Us</a>
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
