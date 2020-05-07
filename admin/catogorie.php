<?php
session_start();
if(isset($_SESSION['adminlogin'])){
    header("Location: index.php");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spel & Zo - Catogorieën</title>
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
        <a href="catogorie-toevoegen.php"><button class="green button">Catogorie toevoegen</button></a>
    </div>
</body>


<?php
require_once("assets/config/connect.php");
$query = "SELECT * FROM catogory";
if ($result = $conn->query($query)) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="catogorie"><div class="text"><h5>' .$row["name"] . '</h5><br><p>' .$row['description'] . '</p></div><div class="buttons"><button class="red"><a href="catogorie-delete.php?id='.$row['id'].'">Verwijder Catogorie</a></button><button class="orange"><a href="catogorie-update.php?id='.$row['id'].'">Update Catogorie</a></button></div></div>';
    }
}