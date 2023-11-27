<?php
require_once "TwigBaseController.php";

class AndromedaController extends TwigBaseController {
    public $title = "Галактика Андромеда";
    public $template = "__object.twig";

    public function getContext(): array
    {
        $context = parent::getContext();
        
        $context['imageView'] = "/andromeda/image";
        $context['infoView'] = "/andromeda/info"; 
    
        return $context;
    }
}