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

// создаем экземпляр класса и передаем в него параметры подключения
// создание класса автоматом открывает соединение
$pdo = new PDO("mysql:host=localhost;dbname=outer_flower;charset=utf8", "root", "");

$url = $_SERVER["REQUEST_URI"];

$loader = new \Twig\Loader\FilesystemLoader('../views');
$twig = new \Twig\Environment($loader);

$twig = new \Twig\Environment($loader, [
    "debug" => true // добавляем тут debug режим
]);
$twig->addExtension(new \Twig\Extension\DebugExtension()); // и активируем расширение

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
    $controller->setPDO($pdo); // а тут передаем PDO в контроллер
    $controller->get();
}

