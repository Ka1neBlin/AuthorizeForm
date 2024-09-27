<!DOCTYPE html>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <meta charset="utf-8">
        <title>Register</title>
    </head>
    <body>
        <div class="justify-content-center align-items-center"></div>
            <form action="register_code.php" method="post">
                <h4>Wuthering Waves rule 34</h4>
                <p>
                    <?php
                        if(isset($_GET['error'])){
                            switch($_GET['error']){
                                case 1:
                                    echo "Заполните все поля!";
                                    break;
                                case 2:
                                    echo "Пароли не совпадают!";
                                    break;
                                case 3:
                                    echo "Логин уже занят!";
                                    break;
                                default:
                                    break;
                            }
                        }
                    ?>
                </p>
                <input type="text" id="username" name="username" placeholder="Логин"><br>
                <input type="password" id="password" name="password" placeholder="Пароль"><br>
                <input type="password" id="repeat_password" name="repeat_password" placeholder="Повтор пароля"><br>
                <input type="submit" value="Войти"><br>
                <a href="index.php">Имеется учётная запись</a>
            </form>
        </div>
    </body>
</html>