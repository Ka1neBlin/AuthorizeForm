<?php
require_once('connect.php');
session_start();

$login = $_POST['username'];
$pass = $_POST['password'];

if(empty($login) || empty($pass)){
    header('Location: index.php?error_log=1');
    exit;
} else{
    $my_query = $conn->prepare("SELECT * FROM Users WHERE login = :login AND password = SHA(:password);");
    $my_query->execute(['login' => $login, 'password' => $pass]);

    if($my_query->rowCount() > 0){
        $row = $my_query->fetch(PDO::FETCH_ASSOC);
        if($row['login'] != 'admin'){
            $_SESSION['login'] = $row['login'];
            header('Location: user_page.php');
            exit;
        }
        else{
            header('Location: admin_page.php');
            exit;
        }
    } else{
        header('Location: index.php?error_log=2');
        exit;
    }
}
?>