<?php 

    // подключаем пакеты которые установили через composer
    require_once '../vendor/autoload.php';

    // создаем загрузчик шаблонов, и указываем папку с шаблонами
    // \Twig\Loader\FilesystemLoader -- это типа как в C# писать Twig.Loader.FilesystemLoader, 
     // только слеш вместо точек
     $loader = new \Twig\Loader\FilesystemLoader('../views');
     // создаем собственно экземпляр Twig с помощью которого будет рендерить
     $twig = new \Twig\Environment($loader);


     $url = $_SERVER["REQUEST_URI"];

     // добавил две переменные
     $title = "";
     $template = "";
     $image = "";
     // тут теперь просто заполняю значение переменных
     if ($url == "/") {
         $title = "Главная";
         $template = "main.twig";
     } elseif (preg_match("#/rose#", $url)) {
         $title = "Розы";
         $template = "rose.twig";
         $image = "/images/roses.jpg";
     } elseif (preg_match("#/daisies#", $url)) {
         $title = "Ромашки";
         $template = "daisies.twig";
         $image = "/images/daisies.jpg";
     }
     
     // рендеринг делаем один раз по заполненным переменным
     echo $twig->render($template, [
         "title" => $title,
         "image" => $image,
     ]);




    //  исправить работу с картинками и добавить последний пункт со словариком
?>