<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">  
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>

    <title>viewCart</title>
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

<div style="margin-bottom: 100px;"></div>
<?php
session_start();


$total = 0;
$grand_total = 0;

if (isset($_SESSION['cart'])) {
    echo "<table class='table'>
            <thead class='table-light table-border text-center'>
                <th>Index</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Product Quantity</th>
                <th>Total price</th>
                <th>Action</th>
            </thead>
            <tbody class='table-border text-center'>";

    foreach ($_SESSION['cart'] as $key => $value) {
        $productPrice = floatval(filter_var($value['productprice'], FILTER_SANITIZE_NUMBER_FLOAT));
        $productQuantity = floatval(filter_var($value['productquantity'], FILTER_SANITIZE_NUMBER_FLOAT));
        $total = $productPrice * $productQuantity;
        $grand_total += $total;
        
       

        echo "<tr>
                <td>$key</td>
                <td>$value[productname]</td>
                <td>$value[productprice]</td>
                <td>
                    <form action='managecart.php' method='POST'>
                        <input type='hidden' name='item' value='$value[productname]'>
                        <input type='number' name='new_quantity' value='$value[productquantity]' min='1' max='10'>
                        <button type='submit' class='btn-warning' name='update'>Update</button>
                    </form>
                </td>

                <td>$total</td>
                
                <td>
                    <form action='managecart.php' method='POST'>
                        <input type='hidden' name='item' value='$value[productname]'>
                        <button type='submit' class='btn-danger' name='remove'>Delete</button>
                    </form>
                </td>
            </tr>";
    }

    echo "</tbody>
        </table>";

    
    echo "<div class='card'>
            <div class='card-body'>
                <h5 class='card-title'>Grand Total: $grand_total</h5>
                <form action='product.php' method='POST'>
                <button type='submit' class='btn btn-danger'>Continue Shopping</button>
            </form>
                <br>
                <form action='checkout.php' method='POST'>
                    <button type='submit' class='btn btn-success'>Proceed to Checkout</button>
                </form>
            </div>
        </div>";
} else {
    echo "<p>Your cart is empty.</p>";
}
?>


 

</body>
</html>
