<?php
require_once("admin/assets/config/connect.php");
$searchid = $_GET['id'];
$query = "SELECT product.*, product_image.image FROM product LEFT JOIN product_image ON product_image.product_id = product.id WHERE product.id=$searchid GROUP BY id";
if($result = $conn->query($query)){
    while($row = $result->fetch_assoc()){
        $image = $row['image'];
        $name = $row['name'];
        $beschrijving = $row['description'];
    }
}

?>

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
    <a href="index.php">&larr;Ga terug naar webpagina</a>
    <div class="image-groot">
        <img id="groot" src="assets/uploads/<?php echo $image ?>" alt="img-groot">
    </div>
    <div class="images">
        <?php
        $query2 = "SELECT image FROM product_image WHERE product_id=$searchid";
        if($result2 = $conn->query($query2)){
            while($row2 = $result2->fetch_assoc()){
                echo '<div class="img-klein" onclick="afbeelding(this)"><img src="assets/uploads/' .$row2['image'].'"></div>';
            }
        }
        ?>
    </div>
    </div>
    <div class="detailtekst">
        <h1><?php echo $name ?></h1>
        <p><?php echo $beschrijving ?></p>
    </div>
    <script src="assets/js/afbeeldingen.js"></script>
    </body>
</html>


