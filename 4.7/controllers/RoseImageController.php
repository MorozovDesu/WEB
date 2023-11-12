<?php
require_once "RoseController.php"; // обязательно импортим TwigBaseController

class RoseImageController extends RoseController {
    public $template = "__image.twig"; // шаблон страницы
    
    // переопределяем функцию контекста
    public function getContext() : array
    {
        $context = parent::getContext(); // вызываем родительский метод
        $context['imageView'] = "/rose/image";
        $context['image'] = "/images/roses.jpg";

        return $context;
    }
    
}