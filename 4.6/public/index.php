<?php
require_once '../vendor/autoload.php';
$loader = new \Twig\Loader\FilesystemLoader('../views');
$twig = new \Twig\Environment($loader);

$url = $_SERVER["REQUEST_URI"];

$title = "";
$template = "";
$context = [];

$menu = [
    [
        "title" => "Главная",
        "url" => "/",
    ],
    [
        "title" => "Розы",
        "url" => "/rose",
    ],
    [
        "title" => "Ромашки",
        "url" => "/daisies",
    ]
];
if ($url == "/") {
    $title = "Главная";
    $template = "main.twig";
} elseif (preg_match("#^/rose#", $url)) {
    $title = "Розы";
    $template = "__object.twig";
    $context['imageView'] = "/rose/image";
    $context['infoView'] = "/rose/info";

	if (preg_match("#^/rose/image#", $url)) {
		$template = "__image.twig";
		$context['image'] = "/images/roses.jpg";
	} elseif (preg_match("#^/rose/info#", $url)) {
		$template = "rose_info.twig";
	}
} elseif (preg_match("#^/daisies#", $url)) {
    $title = "Ромашки";
    $template = "__object.twig";
    $context['imageView'] = "/daisies/image";
    $context['infoView'] = "/daisies/info";

    if (preg_match("#^/daisies/image#", $url)) {
		$template = "__image.twig";
		$context['image'] = "/images/daisies.jpg";
	} elseif (preg_match("#^/daisies/info#", $url)) {
		$template = "daisies_info.twig";
	}
}

$context['title'] = $title;
$context['menu'] = $menu;

echo $twig->render($template, $context);