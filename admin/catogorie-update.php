<?php
require_once("assets/config/connect.php");
if(!isset($_GET['id'])){
    header('location: catogorie.php');
}
else{
    $updateid = $_GET['id'];
    $query = "SELECT name, description FROM `catogory` WHERE id=$updateid";
    if($result = $conn->query($query)){
        while($row = $result->fetch_assoc()){
            $naam = $row['name'];
            $description = $row['description'];
        }
    }
}

if(isset($_POST['submit'])){
    $naam = $_POST['naam'];
    $beschrijving = $_POST['beschrijving'];
    $catogorienaam = $conn->real_escape_string($naam);
    $catogoriebeschrijving = $conn->real_escape_string($beschrijving);
    $query = "UPDATE catogory SET name='$catogorienaam', description='$catogoriebeschrijving'";
    if($conn->query($query)){
        header("Location: catogorie.php");
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spel & Zo - Catogorie Wijzigen</title>
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
        <a href="catogorie.php"><button class="button red">Wijzigen annuleren</button></a>
    </div>
    <div class="formdiv">
        <form method="POST">
            <h4>Catogorie Wijzigen</h4>
            <input type="text" name="naam" placeholder="Catogorie-naam" value="<?php echo $naam; ?>" required><br>
            <textarea name="beschrijving" placeholder="Catogorie-Beschrijving" required><?php echo $description; ?></textarea><br>
            <input type="submit" name="submit" value="Wijzig catogorie!"><br>
            <p class="error"><?php echo $error ?></p>
        </form>
    </div>
</body>

