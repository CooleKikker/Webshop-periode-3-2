<?php
session_start();
if(isset($_SESSION['adminlogin'])){
    header("Location: index.php");
}
require_once("assets/config/connect.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spel & Zo - Producten</title>
    <link rel="stylesheet" href="assets/css/adminstyle.css">
    <link rel="stylesheet" href="assets/css/adminresponsive.css">
    <link rel="icon" type="image/png" href="../assets/img/logo.png">
    <link rel="stylesheet" href="https://use.typekit.net/mdn4bzp.css">
</head>
<body>
    <header>
        <img src="../assets/img/logo.png" alt="Logo">
    </header>
    <nav>
        <a href="admin.php">Home</a> -
        <a href="catogorie.php">Catogorieën</a> -
        <a href="product.php">Producten</a> -
        <a href="bestellingen.php">Bestellingen</a> -
        <a href="klanten.php">Klanten</a>
    </nav>
    <div class="acties">
        <a href="product-toevoegen.php"><button class="green button">Product toevoegen</button></a>
        <a href="afbeelding-toevoegen.php"><button class="green button nophone">Afbeelding toevoegen</button></a>
    </div>
</body>

<?php
$query = "SELECT product.name, product.id, product.description, product.price, product.sale, product.catogory_id, product_image.image FROM product LEFT JOIN product_image ON product_image.product_id = product.id GROUP BY id";
if($result = $conn->query($query)){
    while($row = $result->fetch_assoc()){
        if($row['sale'] != 0.00){
            echo '<div class="product"><div class="acties border"><button class="orange"><a href="product-update.php?id='.$row['id'].'">Update product</a><button class="red"><a href="product-delete.php?id='.$row['id'].'">Verwijder product</a></button></button></div><div class="image"><img alt="productfoto" src="../assets/uploads/'.$row['image'] .'"></div><h2>'.$row['name'].'</h2><p>'.$row['description'].'</p><h4>€'.$row['sale'].' <span>€'.$row['price'].'</span></div>';
        }
        else{
            echo '<div class="product"><div class="acties border"><button class="orange"><a href="product-update.php?id='.$row['id'].'"></button><button class="red"><a href="product-delete.php?id='.$row['id'].'">Verwijder product</a></button></div><div class="image"><img alt="productfoto" src="../assets/uploads/'.$row['image'] .'"></div><h2>'.$row['name'].'</h2><hr><p>'.$row['description'].'</p><h4>€'.$row['price'].'</div>';
        }
    }
}
?>