<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">


</head>

<body>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="container">
        <div class="navbar">
            <div>
                <a href="/" class="me-2">Главная</a>
                @foreach ($types as $type)
                    <a href="/?type={{ $type->title }}" class="me-2">{{ Str::ucfirst($type->title) }}</a>
                @endforeach
                @auth
                    <a href="flower-objects/create" class="create-link">Создать</a>
                @endauth
            </div>
            @auth
                <a href="/logout" class="logout-link">Выйти</a>
            @endauth
            @guest
                <a href="/login" class="login-link">Войти</a>
            @endguest
        </div>
        <div class="content">
            @yield('content')
        </div>
    </div>
</body>

<style>
    body {
        background-color: #f8f9fa;
        font-family: Arial, sans-serif;
    }

    .container {
        margin-top: 20px;
    }

    .alert {
        margin-top: 20px;
    }

    .navbar {
        background-color: #007bff;
        padding: 10px;
        border-radius: 5px;
        margin-bottom: 20px;
    }

    .navbar a {
        color: white;
        text-decoration: none;
        margin-right: 10px;
        position: relative;
    }

    .navbar a:hover {
        text-decoration: underline;
    }

    .navbar a::before {
        content: '';
        position: absolute;
        top: -2px;
        /* изменено свойство bottom на top */
        left: 0;
        width: 100%;
        height: 2px;
        background-color: white;
        transform: scaleX(0);
        transform-origin: right;
        transition: transform 0.7s ease;
    }

    .navbar a:hover::before {
        transform: scaleX(1);
        transform-origin: left;
    }

    .navbar a:active::before {
        transform-origin: right;
    }

    .content {
        background-color: white;
        padding: 20px;
        border-radius: 5px;
    }

    .create-link,
    .logout-link,
    .login-link {
        margin-left: 20px;
        text-decoration: none;
        position: relative;
    }

    .create-link:hover,
    .logout-link:hover,
    .login-link:hover {
        text-decoration: underline;
    }

    .create-link::before,
    .logout-link::before,
    .login-link::before {
        content: '';
        position: absolute;
        top: -2px;
        /* изменено свойство bottom на top */
        left: 0;
        width: 100%;
        height: 2px;
        background-color: white;
        transform: scaleX(0);
        transform-origin: right;
        transition: transform 0.7s ease;
    }

    .create-link:hover::before,
    .logout-link:hover::before,
    .login-link:hover::before {
        transform: scaleX(1);
        transform-origin: left;
    }

    .create-link:active::before,
    .logout-link:active::before,
    .login-link:active::before {
        transform-origin: right;
    }
</style>

</html>
