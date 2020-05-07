<?php

if(isset($_GET['id'])){
    $deleteid = $_GET['id'];
}else{
    header("Location: winkelwagen.php");
}

session_start();

if (($key = array_search($deleteid, $_SESSION['winkelwagen'])) !== false) {
    unset($_SESSION['winkelwagen'][$key]);
}
header("Location: winkelwagen.php");
?>