<?php

require_once("admin/assets/config/connect.php");

if(isset($_POST['submit'])){
    $voornaam = $_POST['firstname'];
    $achternaam = $_POST['lastname'];

    $gebruikersnaam = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = "INSERT INTO user(voornaam, achternaam, gebruikersnaam, wachtwoord) VALUES('$voornaam', '$achternaam' ,'$gebruikersnaam', '$password')";

    if($conn->query($query)){
        header("Location: index.php");
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spel & Zo - Registreren</title>
    <link rel="stylesheet" href="admin/assets/css/homestyle.css">
    <link rel="stylesheet" href="admin/assets/css/homeresponsive.css">
    <link rel="icon" type="image/png" href="../assets/img/logo.png">
    <link rel="stylesheet" href="https://use.typekit.net/mdn4bzp.css">
</head>
<body>
    <a href="../index.php">&larr;Ga terug naar webpagina</a>
    <div class="logindiv">
        <div class="header">
            <h4>Spel & Zo - account aanmaken</h4>
        </div>
        <form method="POST">
            <input type="text" placeholder="Voornaam" name="firstname" required><br>
            <input type="text" placeholder="Achternaam" name="lastname" required><br>
            <input type="text" placeholder="Gebruikersnaam" name="username" required><br>
            <input type="password" placeholder="Wachtwoord" name="password" required><br>
            <input type="submit" value="Log in!" name="submit">
            <p><?php echo $error ?></p>
        </form>
        <a class="aanmaken" href="register.php">Account aanmaken</a>
    </div>
</body>
</html>
?>