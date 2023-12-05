<?php

require_once "BaseFlowerTwigController.php";

class FlowerObjectUpdateController extends BaseFlowerTwigController
{
    public $template = "flower_object_update.twig";

    public function get(array $context)
    {
        $id = $this->params['id'];

        $sql = <<<EOL
SELECT * FROM flower_objects WHERE id = :id
EOL;
        $query = $this->pdo->prepare($sql);
        $query->bindValue("id", $id);
        $query->execute();

        $data = $query->fetch();
        $context['object'] = $data;

        parent::get($context);
    }

    public function post(array $context)
    {
        $id = $this->params['id'];

        // Проверка существования ключей в массиве $_POST
        $title = isset($_POST['title']) ? $_POST['title'] : '';
        $description = isset($_POST['description']) ? $_POST['description'] : '';
        $type = isset($_POST['type']) ? $_POST['type'] : '';
        $info = isset($_POST['info']) ? $_POST['info'] : '';

        // Проверка существования ключей в массиве $_FILES
        $tmp_name = isset($_FILES['image']['tmp_name']) ? $_FILES['image']['tmp_name'] : null;
        $name = isset($_FILES['image']['name']) ? $_FILES['image']['name'] : '';

        // Проверка на успешную загрузку файла
        if (!empty($tmp_name) && is_uploaded_file($tmp_name)) {
            $image_url = "/media/$name";
            move_uploaded_file($tmp_name, "../public/media/$name");
        } else {
            // В случае неудачной загрузки файла присвоим значение по умолчанию
            $image_url = "/default_image.jpg";
        }

        // Проверка на пустоту $title, так как title является обязательным полем (NOT NULL)
        if (!empty($title)) {
            $sql = <<<EOL
UPDATE flower_objects 
SET title = :title, description = :description, type = :type, info = :info, image = :image_url
WHERE id = :id
EOL;

            // Подготавливаем запрос к БД
            $query = $this->pdo->prepare($sql);

            // Привязываем параметры
            $query->bindValue("id", $id);
            $query->bindValue("title", $title);
            $query->bindValue("description", $description);
            $query->bindValue("type", $type);
            $query->bindValue("info", $info);
            $query->bindValue("image_url", $image_url);

            // Выполняем запрос
            $query->execute();

            $context['message'] = 'Вы успешно изменили объект';
            $context['id'] = $id;

            $this->get($context);
        } else {
            // Обработка случая, когда title не был предоставлен
            $context['error'] = 'Название объекта не может быть пустым';
            parent::get($context);
        }
    }
}
