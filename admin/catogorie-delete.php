<?php
require_once("assets/config/connect.php");
if(!isset($_GET['id'])){
    header('location: catogorie.php');
}
else{
    echo "Hey";
    $deleteid = $_GET['id'];
    $query = "DELETE FROM `catogory` WHERE id=$deleteid";
    $query2 = "DELETE FROM product WHERE catogory_id=$deleteid";
    if($conn->query($query) && $conn->query($query2)){
        header("Location: catogorie.php");
    }
    else{
    }
}



?>