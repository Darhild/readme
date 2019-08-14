<?php
require_once("helpers.php");

$is_auth = rand(0, 1);
$user_name = "Maria";
$posts = [
    [
        "title" => "Цитата",
        "type" => "post-quote",
        "content" => "Мы в жизни любим только раз, а после ищем лишь похожих",
        "user_name" => "Лариса",
        "avatar" => "userpic-larisa-small.jpg"
    ],
    [
        "title" => "Игра престолов",
        "type" => "post-text",
        "content" => "Не могу дождаться начала финального сезона своего любимого сериала!",
        "user_name" => "Владик",
        "avatar" => "userpic.jpg"
    ],
    [
        "title" => "Наконец, обработал фотки!",
        "type" => "post-photo",
        "content" => "rock-medium.jpg",
        "user_name" => "Виктор",
        "avatar" => "userpic-mark.jpg"
    ],
    [
        "title" => "Моя мечта",
        "type" => "post-photo",
        "content" => "coast-medium.jpg",
        "user_name" => "Лариса",
        "avatar" => "userpic-larisa-small.jpg"
    ],
    [
        "title" => "Лучшие курсы",
        "type" => "post-link",
        "content" => "www.htmlacademy.ru",
        "user_name" => "Владик",
        "avatar" => "userpic.jpg"
    ],
    [
        "title" => "Полезный пост про Байкал",
        "type" => "post-text",
        "content" => "Озеро Байкал – огромное древнее озеро в горах Сибири к северу от монгольской границы. Байкал считается самым глубоким озером в мире. Он окружен сетью пешеходных маршрутов, называемых Большой байкальской тропой. Деревня Листвянка, расположенная на западном берегу озера, – популярная отправная точка для летних экскурсий. Зимой здесь можно кататься на коньках и собачьих упряжках.",
        "user_name" => "Лариса",
        "avatar" => "userpic-larisa-small.jpg"
    ],
];

function format_text($str, $max_length = 300)
{
    $words = explode(" ", $str);
    $length = 0;

    foreach ($words as $key => $word) {
        $length += strlen($word);

        if ($length >= $max_length) {
            array_splice($words, $key);
            $words[$key] .= "...</p><a class=\"post-text__more-link\" href=\"#\">Читать далее</a>";
            break;
        }

        if ($key === count($words)- 1) {
            $word .= "</p>";
        }
    }

    $words[0] = "<p>" . $words[0];

    return implode($words, " ");
}

$page_content = include_template("main.php", ["posts" => $posts]);

$layout_content = include_template("layout.php", ["content" => $page_content, "title" => "Лучший сервис блогов в рунете"]);

print($layout_content );

?>
