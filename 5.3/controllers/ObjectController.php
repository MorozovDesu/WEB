<?php

require_once "BaseFlowerTwigController.php";

class ObjectController extends BaseFlowerTwigController
{
    public $template = "__object.twig"; // указываем шаблон

    public function getContext(): array
    {
        $context = parent::getContext();

        // // тут уже указываю конкретные поля, там более грамотно
        // $query = $this->pdo->prepare("SELECT description, id FROM flower_objects WHERE id= :my_id");
        // // // подвязываем значение в my_id 
        // $query->bindValue("my_id", $this->params['id']);
        // $query->execute(); // выполняем запрос

        // // // стягиваем одну строчку из базы
        // $data = $query->fetch();

        // // // передаем описание из БД в контекст
        // $context['description'] = $data['description'];
        // $context['id'] = $this->params['id'];

        // //////////////////////////////////////////////////////

        if (isset($_GET['info'])) {
            $query = $this->pdo->prepare("SELECT * FROM flower_objects WHERE type = :info");
            $query->bindValue("info", $_GET['info']);
            $query->execute();
        } else {
            $query = $this->pdo->query("SELECT * FROM flower_objects");
        }
        
        $context['flower_objects'] = $query->fetchAll();

        return $context;
    }
}