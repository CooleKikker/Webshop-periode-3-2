<?php


//Winkelwagen pagina: winkelwagen.php
session_start(); // sessie starten of onthouden als al bestaat
if (isset($_GET["id"])){ // kijk of er in de url een product_id zit

    $product_id = (int)$_GET["id"];  // product_id uit querystring van url halen, en controleren of het een integer is

    if(!isset($_SESSION['winkelwagen'])){ // kijk of session nog niet bestaat, dan aanmaken
        $_SESSION['winkelwagen'] = array();
    } 
    array_push($_SESSION['winkelwagen'],$product_id); // session_array uitbreiden met $product_id

    header("Location: index.php");
}else{
    header("Location: index.php");
}
?>