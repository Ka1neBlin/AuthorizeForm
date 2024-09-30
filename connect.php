<?php
$server = "MySQL-8.2"; // Заменить на название локального сервера
$username = "root"; // Заменить на имя пользователя
$pass = ""; // Заменить на пароль пользователя
$database = "autho_form"; // Название базы данных

// Использую подключение через PDO, чтобы подключение
// к базе данных сделать более универсальным
// и обезопасить запросы от инъекций
try{
    $conn = new PDO("mysql:host=$server;dbname=$database", $username, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    // Переход на страницу с ошибкой
    header('Location: errors.php?code=1');
    exit;
}
?>