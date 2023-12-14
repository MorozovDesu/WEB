<?php 

class LoginRequiredMiddeware extends BaseMiddleware {
    public function apply(BaseController $controller, array $context)
    {
        // берем значения, которые введет пользователь
        $user = isset($_SERVER['PHP_AUTH_USER']) ? $_SERVER['PHP_AUTH_USER'] : '';
        $password = isset($_SERVER['PHP_AUTH_PW']) ? $_SERVER['PHP_AUTH_PW'] : '';

        // получаем доступ к PDO через $controller
        $pdo = $controller->pdo;

        // готовим запрос к базе данных для выборки пользователя с указанным именем
        $query = $pdo->prepare("SELECT * FROM users WHERE name = :name");
        $query->bindParam(':name', $user);
        $query->execute();

        // получаем результат запроса
        $userData = $query->fetch(PDO::FETCH_ASSOC);

        // проверяем наличие пользователя и корректность пароля
        if (!$userData || !password_verify($password, $userData['password'])) {
            // если не совпали, отправляем заголовок для аутентификации
            header('WWW-Authenticate: Basic realm="flower_objects"');
            http_response_code(401); // статус 401 -- Unauthorized
            exit; // прерываем выполнение скрипта
        }
    }
}
