<?php
require_once "TwigBaseController.php";

class OrionController extends TwigBaseController {
    public $title = "Тумманость Ориона";
    public $template = "__object.twig";

    public function getContext(): array
    {
        $context = parent::getContext();
        
        $context['imageView'] = "/orion/image";
        $context['infoView'] = "/orion/info"; 
    
        return $context;
    }
}