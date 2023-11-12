<?php
$is_image = $url == '/daisies/image';
$is_info = $url == '/daisies/info';
?>

<h1>Ромашки</h1>
Полюбуйтесь красотой ромашек и узнайте что-то новое о них
<ul class="nav nav-pills">
    <li class="nav-item p-2 ">
        <a class="nav-link <?= $is_image ? "active" : '' ?>" href="/daisies/image">
            Картинка
        </a>
    </li>
    <li class="nav-item p-2 ">
        <a class="nav-link <?= $is_info ? "active" : '' ?>" href="/daisies/info">Описание</a>
    </li>
</ul>


<?php if ($is_image) { ?>
    <img src="/images/daisies.jpg" alt="" width="500" height="700">
<?php } else if ($is_info) { ?>
        Ромашка – это абсолютно неприхотливое растение, цветущее в первый год жизни. Имеет тонкий стебель и узкие зеленые
        листья. Цветки состоят из яркой желтой сердцевины и вытянутых белоснежных лепестков. Они собраны в корзиночки небольшими
        группами, благодаря чему цветение кажется пышным.


<?php } ?>