<?php

include 'config.php';

if(isset($_POST['submit'])){
    $NAME = $_POST['Sname'];
    $DESCRIPTION = $_POST['Description'];
    $IMAGE = $_FILES['Simage'];
    $img_loc = $_FILES['Simage']['tmp_name'];
    $img_name = $_FILES['Simage']['name'];
    $img_des = "Uploadimage/".$img_name;
    move_uploaded_file($img_loc,'Uploadimage/'.$img_name);

    

    mysqli_query($con,"INSERT INTO `service`( `Sname`, `Description`, `Simage`) VALUES ('$NAME','$DESCRIPTION','$img_des')");
    header("location:index.php");

}

?>


