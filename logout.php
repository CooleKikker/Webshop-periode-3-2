<?php
session_start();
unset($_SESSION['klantlogin']);
header("Location: login.php");
?>