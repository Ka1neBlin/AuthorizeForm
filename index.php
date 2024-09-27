<!DOCTYPE html>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <meta charset="utf-8">
        <title>Login</title>
    </head>
    <body>
        <div class="justify-content-center align-items-center">
            <form action="authorize.php" method="post">
                <h4>Wuthering Waves rule 34</h4>
                <p>
                    <?php
                        if(isset($_GET['error_log'])){
                            switch($_GET['error_log']){
                                case 1:
                                    echo "Заполните все поля!";
                                    break;
                                case 2:
                                    echo "Неверный логин или пароль!";
                                default:
                                    break;
                            }
                        }
                    ?>
                </p>
                <input type="text" id="username" name="username" placeholder="Логин"><br>
                <input type="password" id="password" name="password" placeholder="Пароль"><br>
                <input type="submit" value="Войти"><br>
                <a href="register.php">Нет учётной записи?</a>
            </form>
        </div>
    </body>
</html>