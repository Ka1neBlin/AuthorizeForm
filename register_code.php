<?php
require_once('connect.php');
session_start();

$login = $_POST['username'];
$pass = $_POST['password'];
$repeat = $_POST['repeat_password'];

if(empty($login) || empty($pass) || empty($repeat)){
    header("Location: register.php?error=1");
    exit;
} else if($pass != $repeat){
    header("Location: register.php?error=2");
    exit;
} else {
    $check = $conn->prepare("SELECT * FROM Users WHERE login = :login");
    $check->execute(['login' => $login]);

    if($check->rowCount() > 0){
        header('Location: register.php?error=3');
        exit;
    } else{
        // В идеале бы соль добавить
        $my_query = $conn->prepare("INSERT INTO Users(login, password) VALUES (:login, SHA(:password))");
        $my_query->execute(['login' => $login, 'password' => $pass]);
        if($my_query->rowCount() > 0){
            $_SESSION['login'] = $login;
            header('Location: user_page.php');
            exit;
        }
        else{
            header("Location: errors.php?code=2");
            exit;
        }
    }
}
?>