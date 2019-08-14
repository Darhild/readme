<?php
require_once("helpers.php");
require_once("data.php");
require_once("functions.php");

$header = include_template("header.php", ["is_auth" => $is_auth, "user_name" => $user_name]);

$footer = include_template("footer.php");

$page_content = include_template("main.php", ["posts" => $posts]);

$layout_content = include_template("layout.php", ["content" => $page_content, "title" => "Лучший сервис блогов в рунете", "header" => $header, "footer" => $footer]);

print($layout_content );

?>
