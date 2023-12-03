<?php

require_once "BaseFlowerTwigController.php";


class MainController extends BaseFlowerTwigController {
    public $template = "main.twig";
    public $title = "Главная";

    public function getContext(): array
    {
        $context = parent::getContext();

        if (isset($_GET['type'])){
            $query = $this->pdo->prepare("SELECT * FROM flower_objects WHERE type = :type");
            $query -> bindValue("type", $_GET['type']);
            $query -> execute();
        }
        else{
            $query = $this->pdo->query("SELECT * FROM flower_objects");
        }
        
        // подготавливаем запрос SELECT * FROM space_objects
        // вообще звездочку не рекомендуется использовать, но на первый раз пойдет
        
        
        // стягиваем данные через fetchAll() и сохраняем результат в контекст
        $context['flower_objects'] = $query->fetchAll();

        return $context;
    }

}