<?php
require_once('connect.php');

$login = $_POST['username'];
$pass = $_POST['password'];
$repeat = $_POST['repeat_password'];

$hash = password_hash($pass, PASSWORD_DEFAULT);

if(empty($login) || empty($pass) || empty($repeat)){
    header("Location: register.php?error=1");
    exit;
} else if($pass != $repeat){
    header("Location: register.php?error=2");
    exit;
} else {
    $check_login = "SELECT * FROM Users WHERE login = '$login';";
    $result = $conn->query($check_login);
    if($result->$num_rows > 0){
        header('Location: register.php?error=3');
        exit;
    }
    else{
        $my_query = "INSERT INTO Users (login, password) VALUES ('$login', '$hash');";
        if($conn->query($my_query) == TRUE){
            echo "Добро пожаловать, $login";
        }
        else{
            header('Location: errors.php?code=2');
            exit;
        }
    }
}
?>