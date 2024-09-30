<?php
require_once('connect.php');
session_start(); // Необходима для безопасной передачи логина

$login = $_POST['username'];
$pass = $_POST['password'];
$repeat = $_POST['repeat_password'];

// Проверка на пустые поля
if(empty($login) || empty($pass) || empty($repeat)){
    // Возвращает обратно на страницу регистрации с кодом 1
    header("Location: register.php?error=1");
    exit;
}
// Проверка на соответствие вводимых паролей
else if($pass != $repeat){
    // Возвращает обратно на страницу регистрации с кодом 2
    header("Location: register.php?error=2");
    exit;
} else {
    // Запрос для проверки на наличие существующего логина
    $check = $conn->prepare("SELECT * FROM Users WHERE login = :login");
    $check->execute(['login' => $login]);

    // Проверка запроса на наличие существующего логина
    if($check->rowCount() > 0){
        // Возвращает обратно на страницу регистрации с кодом 3
        header('Location: register.php?error=3');
        exit;
    } else{
        // В идеале бы соль добавить
        $my_query = $conn->prepare("INSERT INTO Users(login, password) VALUES (:login, SHA(:password))");
        $my_query->execute(['login' => $login, 'password' => $pass]);
        if($my_query->rowCount() > 0){
            $_SESSION['login'] = $login; // Передаёт введённый логин на страницу пользователя
            header('Location: user_page.php');
            exit;
        }
        else{
            // Переходит на страницу ошибки исполнения запроса
            header("Location: errors.php?code=2");
            exit;
        }
    }
}
?>