<?php
require_once "TwigBaseController.php"; // обязательно импортим TwigBaseController

class RoseController extends TwigBaseController {
    public $title = "Розы"; // название страницы
    public $template = "__object.twig"; // шаблон страницы
    
    // переопределяем функцию контекста
    public function getContext() : array
    {
        $context = parent::getContext(); // вызываем родительский метод
        $context['title'] = $this->title; // добавляем title в контекст
        return $context;
    }
    
   
    
}