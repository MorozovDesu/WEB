<?php

require_once "BaseFlowerTwigController.php";


class SearchController extends BaseFlowerTwigController {
    public $template = "search.twig";

    public function getContext(): array
    {
        $context = parent::getContext();

        $type = isset($_GET['type']) ?  $_GET['type'] : '';
        $title = isset($_GET['title']) ?  $_GET['title'] : '';
        $info = isset($_GET['info']) ?  $_GET['info'] : '';
        
        $sql = <<<EOL
SELECT id, title
FROM flower_objects
WHERE (:title = '' OR title LIKE CONCAT ('%', :title, '%'))
        AND (:info = '' OR info LIKE CONCAT ('%', :info, '%'))
        AND (:type = '' OR type = :type)
EOL;
        $query = $this->pdo->prepare($sql);
        
        $query->bindValue(":title", $title);
        $query->bindValue(":info", $info);
        $query->bindValue(":type", $type);
        $query->execute();

        $context['objects'] = $query->fetchAll();

        return $context;
    }

}