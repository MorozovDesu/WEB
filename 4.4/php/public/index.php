<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <!-- <a class="navbar-brand" href="#">Navbar</a> -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Главная</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/rose">Розы</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/daisies">Ромашки</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <?php 
        $url = $_SERVER["REQUEST_URI"];

        // echo "Вы на странице: $url, будьте внимательны!<br>";

        if ($url == "/") {
            require "../views/main.php"; // << добавил ../, что означает ищи файл в папке на уровень выше
        } elseif (preg_match("#^/rose#", $url)) {
            require "../views/rose.php"; // << и тут
        } elseif (preg_match("#^/daisies#", $url)) {
            require "../views/daisies.php"; // и здесь
        } 
        ?>
    </div>
</body>

</html>