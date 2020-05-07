<?php
session_start();
if(isset($_SESSION['adminlogin'])){
    header("Location: index.php");
}


require_once("assets/config/connect.php");
if(isset($_POST['submit'])){
    $naam = $conn->real_escape_string($_POST['naam']);
    $beschrijving = $conn->real_escape_string($_POST['beschrijving']);
    $prijs = $conn->real_escape_string($_POST['prijs']);
    $databaseprijs = str_replace(',', '.', $prijs);
    if(!empty(trim($_POST['actieprijs']))){
        $actieprijs = $conn->real_escape_string($_POST['actieprijs']);
    }
    else{
        $actieprijs = 0.00;
    }
    $databaseactieprijs = str_replace(',', '.', $actieprijs);
    $gewicht = $conn->real_escape_string($_POST['gewicht']);
    $aantal = $conn->real_escape_string($_POST['aantal']);
    $minleeftijd = $conn->real_escape_string($_POST['minleeftijd']);
    $maxleeftijd = $conn->real_escape_string($_POST['maxleeftijd']);
    $duur = $conn->real_escape_string($_POST['duur']);
    $spelers = $conn->real_escape_string($_POST['spelers']);
    $cat_id = $conn->real_escape_string($_POST['cat']);
    $query = "INSERT INTO product(name, description, price, sale, weight, stock, minage, maxage, playtime, players, catogory_id) VALUES ('$naam', '$beschrijving', $databaseprijs, $databaseactieprijs, $gewicht, $aantal, $minleeftijd, $maxleeftijd, $duur, $spelers, $cat_id)";
    if($conn->query($query)){
        header("Location: product.php");
        echo "Hey";
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
    <title>Spel & Zo - Product Toevoegen</title>
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
        <a href="product.php"><button class="button red">Toevoegen annuleren</button></a>
    </div>
    <div class="formdiv">
        <form method="POST">
            <h4>Product Toevoegen</h4>
            <input type="text" name="naam" placeholder="Product-Naam" required><br>
            <textarea class="bigger" name="beschrijving" placeholder="Product-Beschrijving" required></textarea><br>
            <input type="number" step=0.01 name="prijs" placeholder="prijs" min=0 required><br>
            <input type="number" step=0.01 name="actieprijs" placeholder="actieprijs" min=0><br>
            <input type="number" step=1 name="gewicht" placeholder="Gewicht (in gram)" min=0 required><br>
            <input type="number" step=1 name="aantal" placeholder="Aantal op vooraad" min=0 required><br>
            <input type="number" step=1 name="minleeftijd" placeholder="Minimale leeftijd" min=0 required><br>
            <input type="number" step=1 name="maxleeftijd" placeholder="Maximale leeftijd" min=0 required><br>
            <input type="number" step=1 name="duur" placeholder="Speelduur" min=0 required><br>
            <input type="number" step=1 name="spelers" placeholder="Aantal spelers" min=1 required>
            <select name="cat">
                <?php
                require_once("assets/config/connect.php");
                $query2 = "SELECT id, name FROM `catogory`";
                if($result = $conn->query($query2)){
                    while($row = $result->fetch_assoc()){
                        echo "<option value='".$row['id']." '>".$row['name']."</option>";
                    }
                }
                ?>
            </select>
            <input type="submit" name="submit" value="Voeg Product toe!"><br>
            <p class="error"><?php echo $error ?></p>
        </form>
    </div>
</body>

