<?php
require_once '../vendor/autoload.php';
require_once '../framework/autoload.php';
require_once "../controllers/MainController.php";
require_once "../controllers/ObjectController.php";
// require_once "../controllers/ImageController.php";
// require_once "../controllers/InfoController.php";
// require_once "../controllers/RoseController.php";
// require_once "../controllers/DaisiesController.php";

require_once "../controllers/Controller404.php";



$loader = new \Twig\Loader\FilesystemLoader('../views');
$twig = new \Twig\Environment($loader, [
    "debug" => true
]);
$twig->addExtension(new \Twig\Extension\DebugExtension());

$pdo = new PDO("mysql:host=localhost;dbname=outer_flower;charset=utf8", "root", "");

$router = new Router($twig, $pdo);
$router->add("/", MainController::class);
$router->add("/flower-object/(?P<id>\d+)/image", ObjectController::class);
$router->add("/flower-object/(?P<id>\d+)/info", ObjectController::class);
$router->add("/flower-object/(?P<id>\d+)/(?P<show>\w+)", ObjectController::class);



// // $router->add("/rose", RoseController::class);
// $router->add("/rose/image", ObjectController::class);
// $router->add("/rose/info", ObjectController::class);
// // $router->add("/daisies", DaisiesController::class);
// $router->add("/daisies/image", ObjectController::class);
// $router->add("/daisies/info", ObjectController::class);

$router->add("/flower-object/(?P<id>\d+)", ObjectController::class);

$router->get_or_default(Controller404::class);

