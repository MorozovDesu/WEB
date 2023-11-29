<?php
require_once "DaisiesController.php"; // обязательно импортим TwigBaseController

class DaisiesImageController extends DaisiesController {
    public $template = "__image.twig"; // шаблон страницы
    
    // переопределяем функцию контекста
    public function getContext() : array
    {
        $context = parent::getContext(); // вызываем родительский метод
        $context['image'] = "/images/daisies.jpg";

        return $context;
    }
    
}