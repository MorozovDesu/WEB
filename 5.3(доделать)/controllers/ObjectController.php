<?php

require_once "BaseFlowerTwigController.php";

class ObjectController extends BaseFlowerTwigController
{
    public $template = "__object.twig"; // указываем шаблон

    public function getContext(): array
    {
        $context = parent::getContext();

        $show = isset($_GET['show']) ? $_GET['show'] : '';

        // Устанавливаем id в контекст
        $context['id'] = $this->params['id'];

        if ($show === 'image') {
            // Логика для отображения изображения
            $query = $this->pdo->prepare("SELECT image FROM flower_objects WHERE id = :my_id");
            $query->bindValue("my_id", $this->params['id']);
            $this->template = "__image.twig";
            $query->execute();

            $context['flower_objects'] = $query->fetchAll();
        } elseif ($show === 'info') {
            // Логика для отображения полной информации
            $query = $this->pdo->prepare("SELECT * FROM flower_objects WHERE id = :my_id");
            $query->bindValue("my_id", $this->params['id']);
            $this->template = "__info.twig";

            $query->execute();

            $context['flower_objects'] = $query->fetchAll();
        } else {
            // Логика для общей информации
            $query = $this->pdo->query("SELECT * FROM flower_objects");
            $context['flower_objects'] = $query->fetchAll();
        }


        echo "<pre>";
        print_r($this->params);
        echo "</pre>";

        return $context;
    }
}
