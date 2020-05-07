<?php
require_once("admin/assets/config/connect.php");
if(isset($_POST['submit'])){
    $username = $password = "";
    $error = "";
    
    // Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    
        // Check if username is empty
        if(empty(trim($_POST["username"]))){
            $error = "Vul uw gebruikersnaam in";
        } else{
            $username = trim($_POST["username"]);
        }
    
        // Check if password is empty
        if(empty(trim($_POST["password"]))){
            $error = "Vul uw wachtwoord in";
        } else{
            $password = trim($_POST["password"]);
        }
    
        // Validate credentials
        if(empty($error)){
            // Prepare a select statement
            $sql = "SELECT id, voornaam, gebruikersnaam, wachtwoord FROM user WHERE `gebruikersnaam` = ?";
    
            if($stmt = mysqli_prepare($conn, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "s", $param_username);
    
                // Set parameters
                $param_username = $username;
    
                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    // Store result
                    mysqli_stmt_store_result($stmt);
    
                    // Check if username exists, if yes then verify password
                    if(mysqli_stmt_num_rows($stmt) == 1){
                        // Bind result variables
                        mysqli_stmt_bind_result($stmt, $id, $voornaam, $username, $database_password);
                        if(mysqli_stmt_fetch($stmt)){
                            if(password_verify($password, $database_password)){
                                
                                // Password is correct, so start a new session
                                session_start();
                                // Store data in session variables
                                $_SESSION["klantlogin"] = $voornaam;
    
    
                                // Redirect user to welcome page
                                header("Location: index.php");
                            
                            } else{
                                // Display an error message if password is not valid
                                $error = "Wachtwoord of gebruikersnaam onjuist";
                            }
                        }
                    } else{
                        // Display an error message if username doesn't exist
                        $error = "Wachtwoord of gebruikersnaam onjuist";
                    }
                } else{
                    echo "Sorry, er is iets fout gegaan! neem contact op met de developer!";
                }
            }
    
            // Close statement
            mysqli_stmt_close($stmt);
        }
    
        // Close connection
        mysqli_close($conn);
    }
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spel & Zo - Login</title>
    <link rel="stylesheet" href="admin/assets/css/homestyle.css">
    <link rel="stylesheet" href="admin/assets/css/homeresponsive.css">
    <link rel="icon" type="image/png" href="../assets/img/logo.png">
    <link rel="stylesheet" href="https://use.typekit.net/mdn4bzp.css">
</head>
<body>
    <a href="../index.php">&larr;Ga terug naar webpagina</a>
    <div class="logindiv">
        <div class="header">
            <h4>Spel & Zo - Inloggen klant</h4>
        </div>
        <form method="POST">
            <input type="text" placeholder="Gebruikersnaam" name="username" required><br>
            <input type="password" placeholder="Wachtwoord" name="password" required><br>
            <input type="submit" value="Log in!" name="submit">
            <p><?php echo $error ?></p>
        </form>
        <a class="aanmaken" href="register.php">Account aanmaken</a>
    </div>
</body>
</html>

