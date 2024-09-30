<?php
require_once('connect.php');
session_start(); // Необходима для безопасной передачи логина

$login = $_POST['username'];
$pass = $_POST['password'];

// Проверка на пустые поля
if(empty($login) || empty($pass)){
    // Возвращает на страницу авторизации с кодом 1
    header('Location: index.php?error_log=1');
    exit;
} else{
    // Запрос для проверки данных пользователя
    $my_query = $conn->prepare("SELECT * FROM Users WHERE login = :login AND password = SHA(:password);");
    $my_query->execute(['login' => $login, 'password' => $pass]);

    // Проверка введённых данных
    if($my_query->rowCount() > 0){
        $row = $my_query->fetch(PDO::FETCH_ASSOC);

        // Проверка на учётную запись админа
        if($row['login'] != 'admin'){
            $_SESSION['login'] = $row['login']; // Передача логина на страницу пользователя
            header('Location: user_page.php'); // Переход на страницу пользователя
            exit;
        }
        else{
            // Переход на страницу админа
            header('Location: admin_page.php');
            exit;
        }
    } else{
        // Возвращает на страницу авторизации с кодом 2
        header('Location: index.php?error_log=2');
        exit;
    }
}
?>