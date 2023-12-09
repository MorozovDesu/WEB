<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    
    <div class="container">
        <div>
            <a href="/" class="me-2">Главная</a>
            <a href="/?type=кустовые" class="me-2">Кустовые</a>
            <a href="/?type=одиночные" class="me-2">Одиночные</a>
        </div>
        @yield('content')

    </div>
</body>

</html>
