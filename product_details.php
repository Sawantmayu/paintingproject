

<?php
include 'admin/products/config.php';

if(isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    $query = "SELECT * FROM `products` WHERE Id = $product_id";
    $result = mysqli_query($con, $query);

    if ($result && $row = mysqli_fetch_assoc($result)) {
        $product_name = $row['Pname'];
        $product_description = $row['Pdes'];
        $product_price = $row['Pprice'];
        $product_image = $row['Pimage'];
    } else {
        // Handle product not found
        die("Product not found");
    }
} else {
    // Handle invalid or missing product_id parameter
    die("Invalid product ID");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   
    <title><?php echo $product_name; ?> - Product Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <link rel="stylesheet" href="css/style.css">
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


    <div class="container">
    <div style="margin-bottom: 100px;"></div>
        <div class="row mt-5">
            <div class="col-md-6">
            <img src='admin/products/<?php echo $product_image; ?>' class='img-fluid' alt='<?php echo $product_name; ?>' width='500' height='300'> </div>
            <div class="col-md-6">
                <h2 class="display-4"><?php echo $product_name; ?></h2>
                <p class="lead"><?php echo $product_description; ?></p>
                <p class="text-danger"><?php echo $product_price; ?></p>
                
                <form action="" method="post">
                    <input type="hidden" name="Pname" value="<?php echo $product_name; ?>">
                    <input type="hidden" name="Pprice" value="<?php echo $product_price; ?>">
                    
              
                    <a href="payment/index.php" class="btn btn-danger">Buy Now </a>
                    
                
                </form>
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
