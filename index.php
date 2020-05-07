<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spel & Zo</title>
    <link rel="stylesheet" href="/assets/css/homestyle.css">
    <link rel="stylesheet" href="/assets/css/homeresponsive.css">
    <link rel="icon" type="image/png" href="assets/img/logo.png">
    <link rel="stylesheet" href="https://use.typekit.net/mdn4bzp.css">
    <meta name="description" content="Spel & Zo, De leukste spellen van nederland! Kleine prijsjes, Veel plezier!">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
</head>
<body>
    <div class="logbar">
        <a href="winkelwagen.php" class="right">
            <img src="assets/img/winkelwagen.png" alt="winkelwagen"/>
            <p>Winkelwagen(<?php session_start(); echo count($_SESSION['winkelwagen']); ?>)</p>
        </a>
        <?php
                session_start();
                if(isset($_SESSION['klantlogin'])){
                    echo '<a href="account.php" class="left">';
                }
                else{
                    echo '<a href="login.php" class="left">';
                }
        ?>
            <img src="assets/img/login-before.png" alt="login"/>
            <?php
                session_start();
                if(isset($_SESSION['klantlogin'])){
                    echo "<p>Hallo, ". $_SESSION['klantlogin'] . "</p>";
                }
                else{
                    echo "<p>Niet ingelogd</p>";
                }
            ?>
        </a>

    </div>
    <header>
        <a href="index.php"><img src="assets/img/logo.png" alt="Logo"></a>
    </header>
    <img class="slide" src="assets/img/afbeelding-breed.jpg" alt="afbeelding-breed" id="slide">
    <div class="over" id="over">
        <h2>Over spel & zo</h2>
        <p>Spel & zo is de leukste webshop voor al jouw spelletjes! We hebben een groot asortiment aan bordspellen, kaartspellen en electronische spellen, voor jong en oud! Veel winkelplezier!</p>
    </div>
    <div class="side" id="side">
        <h4>Catogorieën</h4>
        <hr>
        <?php
            require_once("admin/assets/config/connect.php");
            $query = "SELECT id, name FROM `catogory`";
            if($result = $conn->query($query)){
                while($row = $result->fetch_assoc()){
                    echo '<p><a href="overzicht.php?id='.$row['id'].'">'.$row['name'].'</a>';
                }
            }
        ?>
    </div>
    <div class="aanbevolen" id="aanbevolen">
        <?php
        $query2 = "SELECT product.name, product.id, product.description, product.price, product.sale, product.catogory_id, product_image.image FROM product LEFT JOIN product_image ON product_image.product_id = product.id GROUP BY id LIMIT 6";
                if($result = $conn->query($query2)){
                    while($row = $result->fetch_assoc()){
                        if($row['sale'] != 0.00){
                            echo '<div class="product"><div class="acties border"><button class="orange"><a href="product-detail.php?id='.$row['id'].'">Bekijk product</a><button class="red"><a href="product-winkelwagen.php?id='.$row['id'].'">In winkelwagen</a></button></button></div><div class="image"><img alt="productfoto" src="../assets/uploads/'.$row['image'] .'"></div><h2>'.$row['name'].'</h2><p>'.$row['description'].'</p><h4>€'.$row['sale'].' <span>€'.$row['price'].'</span></div>';
                        }
                        else{
                            echo '<div class="product"><div class="acties border"><button class="orange"><a href="product-detail.php?id='.$row['id'].'"></button><button class="red"><a href="product-winkelwagen.php?id='.$row['id'].'">In winkelwagen</a></button></div><div class="image"><img alt="productfoto" src="../assets/uploads/'.$row['image'] .'"></div><h2>'.$row['name'].'</h2><hr><p>'.$row['description'].'</p><h4>€'.$row['price'].'</div>';
                        }
                }
            }
            ?>
    </div>
    <script src="assets/js/responsive.js"></script>
</body>
</html>