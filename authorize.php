<?php
require_once('connect.php');

$login = $_POST['username'];
$pass = $_POST['password'];

if(empty($login) || empty($pass)){
    header('Location: index.php?error_log=1');
    exit;
} else{
    $my_query = "SELECT * FROM Users WHERE login = '$login';";
    $result = $conn->query($my_query);

    if($result->num_rows > 0){
        if(password_verify($pass, $row['password'])){
            echo "Добро пожаловать, " . $row['login'];
        }
        else{
            header('Location: index.php?error_log=2');
            exit;
        }
    }
    else{
        header('Location: index.php?error_log=2');
        exit;
    }
}
?>