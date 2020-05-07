<?php
session_start();
if(isset($_SESSION['adminlogin'])){
    header("Location: index.php");
}


require_once("assets/config/connect.php");
if(isset($_POST['submit'])){
    $naam = $_POST['naam'];
    $beschrijving = $_POST['beschrijving'];
    $catogorienaam = $conn->real_escape_string($naam);
    $catogoriebeschrijving = $conn->real_escape_string($beschrijving);
    $query = "INSERT INTO catogory(name, description) VALUES ('$catogorienaam', '$catogoriebeschrijving')";
    if($conn->query($query)){
        header("Location: catogorie.php");
    }
    else{
        $errror = "Er is wat misgegaan. Neem contact op met de developer!";
    }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spel & Zo - Catogorie Toevoegen</title>
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
        <a href="catogorie.php"><button class="button red">Toevoegen annuleren</button></a>
    </div>
    <div class="formdiv">
        <form method="POST">
            <h4>Catogorie Toevoegen</h4>
            <input type="text" name="naam" placeholder="Catogorie-naam" required><br>
            <textarea name="beschrijving" placeholder="Catogorie-Beschrijving" required></textarea><br>
            <input type="submit" name="submit" value="Voeg catogorie toe!"><br>
            <p class="error"><?php echo $error ?></p>
        </form>
    </div>
</body>

