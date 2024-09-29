<?php

include 'config.php';

if(isset($_POST['submit'])){
    $NAME = $_POST['Pname'];
    $PRICE = $_POST['Pprice'];
    $IMAGE = $_FILES['Pimage'];
    $img_loc = $_FILES['Pimage']['tmp_name'];
    $img_name = $_FILES['Pimage']['name'];
    $img_des = "Uploadimage/".$img_name;
    move_uploaded_file($img_loc,'Uploadimage/'.$img_name);
    $description = $_POST['Pdes'];

    mysqli_query($con,"INSERT INTO `products`( `Pname`, `Pprice`, `Pimage`, `Pdes`) VALUES ('$NAME','$PRICE','$img_des','$description')");
    header("location:index.php");

}

?>
