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
            <img src="aalto.png" />
            <h4>
                <?php
                    session_start();
                    if(isset($_SESSION['login'])){
                        echo "Добро пожаловать, " . $_SESSION['login'] . "!";
                    }
                ?>
            </h4>
        </div>
    </body>
</html>