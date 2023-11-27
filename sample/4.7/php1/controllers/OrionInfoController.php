<?php
require_once "OrionController.php";

class OrionInfoController extends OrionController {
    public $template = "orion_info.twig";

    public function getContext(): array
    {
        $context = parent::getContext();
        
        return $context;
    }
}