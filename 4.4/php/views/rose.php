<?php
$is_image = $url == '/rose/image';
$is_info = $url == '/rose/info';
?>

<h1>Розы</h1>
Полюбуйтесь красотой роз и узнайте что-то новое о них
<ul class="nav nav-pills">
    <li class="nav-item p-2">
        <a class="nav-link  <?= $is_image ? "active" : '' ?>" href="/rose/image">
            Картинка
        </a>
    </li>
    <li class="nav-item p-2">
        <a class="nav-link <?= $is_info  ? "active" : '' ?>" href="/rose/info">Описание</a>
    </li>
</ul>


<?php if ($is_image) { ?>
    <img src="/images/roses.jpg" alt="" width="500" height="500" >
<?php } else if ($is_info) { ?>
        В естественных местообитаниях розы представляют собой листопадные или вечнозеленые кустарники и кустарнички высотой от
        15 см до 3 м и выше, некоторые виды с длинными (до 7-9 м), тонкими, стелющимися по земле или цепляющими за опору
        побегами.
        Все розы по форме куста подразделяются на кустовые и плетистые.
<?php } ?>