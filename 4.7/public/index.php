<?php
require_once '../vendor/autoload.php';
require_once "../controllers/MainController.php";

require_once "../controllers/RoseController.php";
require_once "../controllers/RoseImageController.php";
require_once "../controllers/RoseInfoController.php";

require_once "../controllers/DaisiesController.php";
require_once "../controllers/DaisiesImageController.php";
require_once "../controllers/DaisiesInfoController.php";

require_once "../controllers/Controller404.php";

$loader = new \Twig\Loader\FilesystemLoader('../views');
$twig = new \Twig\Environment($loader);

$url = $_SERVER["REQUEST_URI"];

$title = "";
$template = "";
$context = [];
$controller = new Controller404($twig);

$menu = [
    [
        "title" => "Главная",
        "url" => "/",
    ],
    [
        "title" => "Розы",
        "url" => "/rose",
    ],
    [
        "title" => "Ромашки",
        "url" => "/daisies",
    ]
];

if ($url == "/") {
    $controller = new MainController($twig);
} elseif (preg_match("#^/rose/image#", $url)) { 
    $controller = new RoseImageController($twig);
} elseif (preg_match("#^/rose/info#", $url)) {
    $controller = new RoseInfoController($twig);
} elseif (preg_match("#^/rose#", $url)) {
    $controller = new RoseController($twig);
} elseif (preg_match("#^/daisies/image#", $url)) {
    $controller = new DaisiesImageController($twig);
} elseif (preg_match("#^/daisies/image#", $url)) {
    $controller = new DaisiesImageController($twig);
} elseif (preg_match("#^/daisies#", $url)) {
    $controller = new DaisiesInfoController($twig);
} elseif (preg_match("#^/daisies/info#", $url)) { 
    $controller = new DaisiesController($twig);       
}

// проверяем если controller не пустой, то рендерим страницу
if ($controller) {
    $controller->get();
}
