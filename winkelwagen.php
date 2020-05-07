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
    <h2>Winkelwagen</h2>
    <a href="../index.php">&larr;Ga terug naar webpagina</a>
    <?php
    require_once("admin/assets/config/connect.php");
    session_start();
    $query = "SELECT * FROM product WHERE";
    if(isset($_SESSION['winkelwagen'])){
        foreach ($_SESSION['winkelwagen'] as $item) {
            $query .= " id=$item OR";
        }
        $occurences = array_count_values($_SESSION['winkelwagen']);
        $querydef = substr($query, 0, -4);
        if($result = $conn->query($querydef)){
            echo "<table><tr><th><b>Productnaam</b></th><th><b>Aantal</b></th><th><b>Prijs per stuk</b></th><th><b>Totaalprijs</b></th></tr>";
            while($row = $result->fetch_assoc()){
                echo "<table><tr><td>".$row['name']."<a class='delete' href='winkelmand-verwijderen.php?id=".$row['id']."'>Verwijder product</a></td><td>".$occurences[$row['id']]."</b></td><td>€".$row['price']."</td><td>€".$row['price'] * $occurences[$row['id']]."</b></td></tr>";
                $totaalprijs = $totaalprijs + $row['price'] * $occurences[$row['id']];
            }
            echo "</table>";
            echo "<h2 class='totaalprijs'>Totaalprijs: €" . $totaalprijs ."</h2>";
            echo "<a href='bestellen.php'><button class='button green'>Bestel nu!</button></a>";
        }
    }
    else{
        echo"<h1 class='noitem'>Geen items in winkelwagen!</h1>";
    }
?>
</html>

