<?php
$server = "MySQL-8.2";
$username = "rot";
$pass = "";
$database = "autho_form";

try{
    $conn = new PDO("mysql:host=$server;dbname=$database", $username, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Соединение установлено!";
}
catch(PDOException $e){
    echo "Ошибка соединения:" . $e->getMessage();
}
?>