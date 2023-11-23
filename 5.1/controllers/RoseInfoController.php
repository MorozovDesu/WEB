<?php
require_once "RoseController.php";

class RoseInfoController extends RoseController {
    public $template = "rose_info.twig";
    
    public function getContext(): array
    {
        $context = parent::getContext(); 


        return $context;
    }
}