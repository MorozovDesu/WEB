<?php
require_once "AndromedaController.php";

class AndromedaImageController extends AndromedaController {
    public $template = "__image.twig";

    public function getContext(): array
    {
        $context = parent::getContext();
        
        $context['image'] = "/images/andromeda.jpg";   
    
        return $context;
    }
}