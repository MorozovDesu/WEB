<?php
require_once "OrionController.php";

class OrionImageController extends OrionController {
    public $template = "__image.twig";

    public function getContext(): array
    {
        $context = parent::getContext();
        
        $context['image'] = "/images/orion.jpg";   
    
        return $context;
    }
}