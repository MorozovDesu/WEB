<?php
require_once "AndromedaController.php";

class AndromedaInfoController extends AndromedaController {
    public $template = "andromeda_info.twig";

    public function getContext(): array
    {
        $context = parent::getContext();
        
        return $context;
    }
}