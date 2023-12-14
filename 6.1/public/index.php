<?php
require_once '../vendor/autoload.php';
require_once '../framework/autoload.php';
require_once "../controllers/MainController.php";
require_once "../controllers/ObjectController.php";
require_once "../controllers/ImageController.php";
require_once "../controllers/InfoController.php";
require_once "../controllers/FlowerObjectCreateController.php";
require_once "../controllers/FlowerObjectDeleteController.php";
require_once "../controllers/FlowerObjectUpdateController.php";
require_once "../controllers/SearchController.php";
require_once "../controllers/BaseMiddleware.php";
require_once "../middlewares/LoginRequiredMiddeware.php";

require_once "../controllers/Controller404.php";



$loader = new \Twig\Loader\FilesystemLoader('../views');
$twig = new \Twig\Environment($loader, [
    "debug" => true
]);
$twig->addExtension(new \Twig\Extension\DebugExtension());

$pdo = new PDO("mysql:host=localhost;dbname=outer_flower;charset=utf8", "root", "");

$router = new Router($twig, $pdo);

$router->add("/", MainController::class);
$router->add("/flower-object/(?P<id>\d+)/image", ImageController::class);
$router->add("/flower-object/(?P<id>\d+)/info", InfoController::class);
$router->add("/rose/image", ImageController::class);
$router->add("/rose/info", InfoController::class);
$router->add("/daisies/image", ImageController::class);
$router->add("/daisies/info", InfoController::class);

$router->add("/flower-object/create", FlowerObjectCreateController::class)
        ->middleware(new LoginRequiredMiddeware());
$router->add("/search", SearchController::class)
        ->middleware(new LoginRequiredMiddeware());
$router->add("/flower-object/(?P<id>\d+)/delete", FlowerObjectDeleteController::class)
        ->middleware(new LoginRequiredMiddeware());
$router->add("/flower-object/(?P<id>\d+)/edit", FlowerObjectUpdateController::class)
        ->middleware(new LoginRequiredMiddeware());

$router->add("/flower-object/(?P<id>\d+)", ObjectController::class);

$router->get_or_default(Controller404::class);

