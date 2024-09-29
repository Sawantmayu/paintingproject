<?php
    session_start();
    if(!isset($_SESSION['loggedin']) || isset($_SESSION['loggedin'])!=true){
        header("location:login.php");
        exit;
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="stylesheet.css">
   
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
</head>
  <body>
    
    <header id="home">
     
    <nav class="sticky">
      
    <img src="logo.jpg" class="logo">

      <ul id="menu">
            <li><a href="#home">HOME</a></li>
            <li><a href="#about">ABOUT</a></li>
            <li><a href="service.php">SERVICE</a></li>
            <li><a href="product.php">PRODUCTS</a></li>
            <li><a href="#project">PHOTO</a></li>
            <li><a href="#contact">CONTACT</a></li>
            
          </ul>
          <li class="nav-item">
                <a href="viewcart.php"><i class="fas fa-shopping-cart"><span></span></i></a>
                <a href="logout.php"><i class="fas fa-user"></i></a>
              </li>
           
        
            
            
    </nav>
    
    <section id="home" class="home container-fluid p-0">
    <div class="home"><br>
          <h3>PAINTING AND DECORATING</h3>
          <h1>Elevate Your Living Experience <br> Design</h1>

          <div class="item grid">
            <div class="item_box flex">
              <img src="inte1.jpg" width="80px">
              <div class="text">
                <a>Interior Design</a>
                <p>Transform your living space with our expert interior design services. Elevate your home to new levels of comfort and style</p>
              </div>
            </div>
            <div class="item_box flex ">
              <img src="exte.webp" width="80px">
              <div class="text">
                <a>Exterior Design</a>
                <p>Upgrade your outdoor spaces with our top-notch exterior design. Enhance your style and make your home stand out. </p>
              </div>
            </div>
            <div class="item_box flex">
              <img src="wall.jpg" width="80px">
              <div class="text">
                <a>Wall Textures</a>
                <p>"Explore captivating wall textures that redefine your space. Elevate your surroundings with our unique and stylish design solutions."</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  </header>
  

  <!-- about section starts  -->

<section id="about" class="about container">

<h1 class="heading">about us</h1>

<div class="row align-items-center">

  <div class="col-md-6 image">
    <img src="yellow.jpg" width="90%" alt="">
  </div>

  <div class="col-md-6 info">
    <h2>The best Painting service in the city</h2>
    <p>What sets us apart is our unwavering dedication to customer satisfaction. We work closely with our clients to understand their vision and bring it to life. Whether it's a residential or commercial project, we approach each task with enthusiasm, creativity, and a commitment to delivering exceptional results.</p>
    <p>Our services go beyond just applying paint; we specialize in creating environments that inspire. From color consultations to custom finishes, we offer a comprehensive range of painting and decorating solutions tailored to suit your unique style and preferences.</p>
    <div class="icons">
      
    </div>
  </div>

</div>

</section>
<section class="why_us_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2 class="text-center">
          Why Choose Us?
        </h2>
      </div>
      <div class="row">
        <div class="col-md-4 col-sm-6 mx-auto">
          <div class="box">
            <div class="img-box">
              <img src="w1.png" alt="">
            </div>
            <div class="detail-box">
              <h5>
                Faux Finishes
              </h5>
              <p>
            
            Unleash artistic elegance with faux finishes. From mimicking aged patinas to replicating marble, our skilled craftsmen transform spaces into timeless works of art.
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 mx-auto">
          <div class="box">
            <div class="img-box">
              <img src="w2.png" alt="">
            </div>
            <div class="detail-box">
              <h5>
                Water Proofing
              </h5>
              <p>
             Ensure lasting protection against the elements with our advanced waterproofing solutions. Trust us to safeguard your space for durability and peace of mind.
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 mx-auto">
          <div class="box">
            <div class="img-box">
              <img src="w3.png" alt="">
            </div>
            <div class="detail-box">
              <h5>
                Dust Proof
              </h5>
              <p>
              Elevate cleanliness and air quality with our efficient dust-proofing solutions. Experience a consistently pristine environment with our proven techniques.
              </p>
            </div>
          </div>
        </div>
      </div>
  </section>

<!-- service section starts  -->



<section class="service_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
      <div class="heading">our Services</div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="box">
            <div class="img-box">
              <img src="s1.jpg" alt="">
            </div>
            <div class="detail-box">
              <h5>
                Residential Interior
              </h5>
              <p>
             
              "Crafting personalized luxury for your home. Where every detail tells a story of sophistication and warmth." </p>
              
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="box">
            <div class="img-box">
              <img src="s2.jpg" alt="">
            </div>
            <div class="detail-box">
              <h5>
                Residential Exterior
              </h5>
              <p>
              "Elevate your surroundings with our curated touch for residential exteriors. A harmonious blend of design and nature, where each detail speaks of aesthetic charm."</p>
             
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="box">
            <div class="img-box">
              <img src="s3.jpg" alt="">
            </div>
            <div class="detail-box">
              <h5>
                Commercial Painting
              </h5>
              <p>
              "Revitalize commercial spaces with our expert touch in painting. Elevate aesthetics, enhance durability, and make a lasting impression with our tailored solutions for a vibrant and professional finish." </p>
              
              
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="view-more" >
      <a href="paint.php" title="View More" class="btn-view-more">View More</a>
    </div>
  </section>


<section id="project" class="project">

<div class="heading">our projects</div>

<div class="box-container mx-auto">

<div class="box">
  <a href="photo1.jpg" title="">
    <img src="photo1.jpg" alt="">
  </a>
</div>

<div class="box">
  <a href="photo2.jpg" title="">
    <img src="photo2.jpg" alt="">
  </a>
</div>

<div class="box">
  <a href="photos3.webp" title="">
    <img src="photos3.webp" alt="">
  </a>
</div>

<div class="box">
  <a href="photos4.jpg" title="">
    <img src="photos4.jpg" alt="">
  </a>
</div>

<div class="box">
  <a href="photo5.jpg" title="">
    <img src="photo5.jpg" alt="">
  </a>
</div>

<div class="box">
  <a href="photo6.jpeg" title="">
    <img src="photo6.jpeg" alt="">
  </a>
</div>


      

</div>
<div class="view-more">
      <a href="photo.html" title="View More" class="btn-view-more">View More</a>
    </div>


</section>
<!-- contact us section starts   -->
<section id="contact" class="contact">
<div class="contact">
<div class="heading">Contact us</div>
        <div class="container">
            <div class="main">
                <div class="content">
                    <h2>Contact Us</h2>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                <label for="name"><i class="fas fa-user"></i>  Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter Your Name" required>
            </div>

            <div class="form-group">
                <label for="mobile"><i class="fas fa-mobile-alt"></i>  Number</label>
                <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Enter Your Number" required>
            </div>

            <div class="form-group">
                <label for="email"><i class="fas fa-envelope"></i>Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Enter Your Email" required>
            </div>

            <div class="form-group">
                <label for="message"><i class="fas fa-comment"></i>  Message</label>
                <textarea name="message" id="message" class="form-control" placeholder="Your Message" rows="4" required></textarea>
            </div>               
             <button type="submit" class="btn">Send <i class="fas fa-paper-plane"></i></button>
                    </form>
                </div>
                <div class="form-img">
                    <img src="images/contact-us.webp" alt="">
                </div>
            </div>
        </div>
    </div> 
    <?php
                        
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
      
                            echo "<script>
                                    alert('Thank you for contacting us! We will get back to you as soon as possible.');
                                  </script>";
                        }
                        ?>

    <script>
    function validateForm() {
     
        var emailInput = document.getElementById('email');
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(emailInput.value)) {
            alert('Please enter a valid email address.');
            return false;
        }

        var phoneNumber = document.getElementById("mobile").value;
        var email = document.getElementById("email").value;

       
        if (phoneNumber.length !== 10 || isNaN(phoneNumber)) {
            alert("Please enter a valid 10-digit phone number.");
            return false; 
        }
    }
</script>

  </section>

  



 

<section class="footer mt-5">
       <!-- Footer Start -->
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
  

</html>

  </body> 
</html>