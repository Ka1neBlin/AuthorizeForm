<!DOCTYPE html>
<html>
    <head>
        <title>Error</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <meta charset="utf-8">
        <style>
            body {
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
            }
        </style>
    </head>
    <body>
        <div>
            <img src="yangyang.jpg" /><br>
            <h4>
                <?php
                    // Получение кода ошибки
                    if(isset($_GET['code'])){
                        switch($_GET['code']){
                            case 1:
                                echo "Ошибка подключения базы данных";
                                break;
                            case 2:
                                echo "Ошибка запроса к базе данных";
                                break;
                            default:
                                break;
                        }
                    }
                ?>
            </h4>
        </div>
    </body>
</html>