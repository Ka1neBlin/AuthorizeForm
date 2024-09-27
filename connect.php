<?php
$server = "MySQL-8.2";
$username = "root";
$pass = "";
$database = "autho_form";

try{
    $conn = new PDO("mysql:host=$server;dbname=$database", $username, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    header('Location: errors.php?code=1');
    exit;
}
?>