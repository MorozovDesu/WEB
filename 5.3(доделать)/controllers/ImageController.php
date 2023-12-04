<?php

require_once "BaseFlowerTwigController.php";

class ImageController extends BaseFlowerTwigController {
    public $template = "__image.twig";
    
    public function getContext(): array
    {
        $context = parent::getContext();
        
        // подготавливаем запрос SELECT * FROM space_objects
        // вообще звездочку не рекомендуется использовать, но на первый раз пойдет
        $query = $this->pdo->query("SELECT * FROM flower_objects");
        
        // стягиваем данные через fetchAll() и сохраняем результат в контекст
        $context['flower_objects'] = $query->fetchAll();
        
        $context['id'] = $this->params['id'];

        return $context;
    }

}