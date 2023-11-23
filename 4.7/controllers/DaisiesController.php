<?php
require_once "TwigBaseController.php"; // обязательно импортим TwigBaseController

class DaisiesController extends TwigBaseController {
    public $title = "Ромашки"; // название страницы
    public $template = "__object.twig"; // шаблон страницы
    
    // переопределяем функцию контекста
    public function getContext() : array
    {
        $context = parent::getContext(); // вызываем родительский метод
        // $context['title'] = $this->title; // добавляем title в контекст
        $context['imageView'] = "/daisies/image";
        $context['infoView'] = "/daisies/info"; 
        return $context;
    }
    
   
    
}