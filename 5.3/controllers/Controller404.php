<?php

require_once "BaseFlowerTwigController.php";

class Controller404 extends BaseFlowerTwigController {
    public $template = "404.twig"; 
    public $title = "Страница не найдена";
}