<?php

require_once "../vendor/autoload.php";
require_once "../controllers/Controller404.php";
require_once "../controllers/MainController.php";

require_once "../controllers/AndromedaController.php";
require_once "../controllers/AndromedaImageController.php";
require_once "../controllers/AndromedaInfoController.php";

require_once "../controllers/OrionController.php";
require_once "../controllers/OrionImageController.php";
require_once "../controllers/OrionInfoController.php";

$loader = new \Twig\Loader\FilesystemLoader('../views');
$twig = new \Twig\Environment($loader);

$url = $_SERVER["REQUEST_URI"];

// $title = "";
// $template = "";
// $context = [];

// $menu = [
//     [
//         "title" => "Главная",
//         "url" => "/",
//     ],
//     [
//         "title" => "Андромеда",
//         "url" => "/andromeda",
//     ],
//     [
//         "title" => "Орион",
//         "url" => "/orion",
//     ]
// ];

// if ($url == "/") {
//     $title = "Главная";
//     $template = "main.twig";
// } elseif (preg_match("#^/andromeda#", $url)) {
//     $title = "Андромеда";
//     $template = "__object.twig";
//     $context['imageView'] = "/andromeda/image";
//     $context['infoView'] = "/andromeda/info";

// 	if (preg_match("#^/andromeda/image#", $url)) {
// 		$template = "__image.twig";
// 		$context['image'] = "/images/andromeda.jpg";
// 	} elseif (preg_match("#^/andromeda/info#", $url)) {
// 		$template = "andromeda_info.twig";
// 	}
// } elseif (preg_match("#^/orion#", $url)) {
//     $title = "Орион";
//     $template = "__object.twig";
//     $context['imageView'] = "/orion/image";
//     $context['infoView'] = "/orion/info";

//     if (preg_match("#^/orion/image#", $url)) {
// 		$template = "__image.twig";
// 		$context['image'] = "/images/orion.jpg";
// 	} elseif (preg_match("#^/orion/info#", $url)) {
// 		$template = "orion_info.twig";
// 	}
// }

$controller = new Controller404($twig); // теперь 404 будут нашем контроллером по умолчанию

if ($url == "/") {
    $controller = new MainController($twig); // создаем экземпляр контроллера для главной страницы
} elseif (preg_match("#^/andromeda#", $url)) {
    $controller = new AndromedaController($twig); // тут просто контроллер создаем
    
    if (preg_match("#^/andromeda/image#", $url)) {
        $controller = new AndromedaImageController($twig);
    } elseif (preg_match("#^/andromeda/info#", $url)) {
        $controller = new AndromedaInfoController($twig);
    }
} elseif (preg_match("#^/orion#", $url)) {
    $controller = new OrionController($twig); // тут просто контроллер создаем
    
    if (preg_match("#^/orion/image#", $url)) {
        $controller = new OrionImageController($twig);
    } elseif (preg_match("#^/orion/info#", $url)) {
        $controller = new OrionInfoController($twig);
    }
} 

if ($controller) {
    $controller->get();
}