<?php
require_once("assets/config/connect.php");
if(!isset($_GET['id'])){
    header('location: catogorie.php');
}
else{
    echo "Hey";
    $deleteid = $_GET['id'];
    $query = "DELETE FROM `product` WHERE id=$deleteid";
    if($conn->query($query)){
        header("Location: product.php");
    }
    else{
    }
}



?>