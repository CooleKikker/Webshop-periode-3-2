<?php
session_start();
if(isset($_SESSION['adminlogin'])){
    header("Location: index.php");
}

?>
<?php
require_once("assets/config/connect.php");
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $target_dir = "../assets/uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        $imagenaam = $_FILES['fileToUpload']['name'];
        $product_id = $_POST['product'];
        $query = "INSERT INTO product_image(image, product_id) VALUES ('$imagenaam', $product_id)";
        if($conn->query($query)){
            header("Location: product.php");
        }else{
            echo "Lol";
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
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
        <a href="product.php"><button class="button red">Toevoegen annuleren</button></a>
    </div>
    <div class="formdiv">
        <form method="POST" enctype="multipart/form-data">
            <h4>Afbeelding Toevoegen</h4>
            Selecteer product:
            <select name="product" required>
                <?php
                $query = "SELECT id, name FROM product";
                if ($result = $conn->query($query)) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='".$row['id']." '>".$row['name']."</option>";
                    }
                }
                ?>
            </select>
            <input type="file" name="fileToUpload">
            <input type="submit" name="submit" value="Afbeelding toevoegen!">
        </form>
    </div>
</body>



