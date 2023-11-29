<?php
require_once "DaisiesController.php";

class DaisiesInfoController extends DaisiesController {
    public $template = "daisies_info.twig";
    
    public function getContext(): array
    {
        $context = parent::getContext(); 


        return $context;
    }
}