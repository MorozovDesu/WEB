<?php
$is_main = $url == '/rose';
$is_image = $url == '/rose/image';
$is_info = $url == '/rose/info';
$is_main = $url == '/daisies';
$is_image = $url == '/daisies/image';
$is_info = $url == '/daisies/info';
?>

<ul class="list-group p-2">
    <li class="list-group-item">
        <a class=" btn btn-primary me-2 " href="/rose">
            Розы
        </a>
        <a class="btn btn-link " href="/rose/image">
            Картинка
        </a>
        <a class="btn btn-link" href="/rose/info">Описание</a>
    </li>

</ul>
<ul class="list-group p-2">
    <li class="list-group-item">
        <a class="btn btn-primary me-2" href="/daisies">
            Ромашки
        </a>
        <a class="btn btn-link " href="/daisies/image">
            Картинка
        </a>
        <a class="btn btn-link" href="/daisies/info">Описание</a>
    </li>
</ul>