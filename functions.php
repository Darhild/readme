<?php
require_once "helpers.php";

/**
 * Обрезает передаваемый текст до указанной длины, добавляет троеточие
 *
 * @param string $str Текст
 * @param int $max_length Максимальная длина текста
 *
 * @return string Отформатированный текст
 */
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

//function show_time_after_post($date) {
//  $now = date_create("now");
//  $post_time = date_create($date);
//  $diff = date_diff($post_time, $now);
//  $minutes = date_interval_format($diff, "%i");
//  $minutes_form = get_noun_plural_form($minutes, "минута", "минуты", "минут");
//  $hours = date_interval_format($diff, "%h");
//  $hours_form = get_noun_plural_form($hours, "час", "часа", "часов");
//  $days = date_interval_format($diff, "%d");
//  $days_form = get_noun_plural_form($days, "день", "дня", "дней");
//  $weeks = $days / 7;
//  $weeks_form = get_noun_plural_form($weeks, "неделя", "недели", "недель");
//  $months = date_interval_format($diff, "%i");
//  $months_form = get_noun_plural_form($months, "месяц", "месяца", "месяцев");
//
//
//  if ($minutes < 60) {
//      return $minutes . " " . $minutes_form . " назад";
//  }
//  else if ($hours && $hours < 24) {
//      return $hours . " " . $hours_form . " назад";
//  }
//  else if ($days && $days < 7) {
//      return $days . " " . $days_form . " назад";
//  }
//  else if ($weeks && $weeks < 5) {
//      return $weeks . " " . $weeks_form . " назад";
//  }
//  else {
//      return $months . " " . $months_form . " назад";
//  }
//}
/*
function show_time_after_post($date) {
    date_default_timezone_set("Europe/Moscow");

    $now = time();
    $post_time = strtotime($date);
    $diff = $now - $post_time;
    $minutes = floor($diff / 60);
    $hours = floor($minutes / 60);
    $days = floor($hours / 24);
    $weeks = floor($days / 7);
    $months = floor($weeks / 5);

    $minutes_form = get_noun_plural_form($minutes, "минута", "минуты", "минут");
    $hours_form = get_noun_plural_form($hours, "час", "часа", "часов");
    $days_form = get_noun_plural_form($days, "день", "дня", "дней");
    $weeks_form = get_noun_plural_form($weeks, "неделя", "недели", "недель");
    $months_form = get_noun_plural_form($months, "месяц", "месяца", "месяцев");


    if ($minutes < 60) {
        return $minutes . " " . $minutes_form . " назад";
    }
    else if ($hours < 24) {
        return $hours . " " . $hours_form . " назад";
    }
    else if ($days < 7) {
        return $days . " " . $days_form . " назад";
    }
    else if ($weeks < 5) {
        return $weeks . " " . $weeks_form . " назад";
    }
    else {
        return $months . " " . $months_form . " назад";
    }
}*/


function show_time_after_post($date) {
    date_default_timezone_set("Europe/Moscow");

    $now = date_create("now");
    $post_time = date_create($date);
    $diff = date_diff($post_time, $now);
    $minutes = date_interval_format($diff, "%i");
    $hours = date_interval_format($diff, "%h");
    $days = date_interval_format($diff, "%d");
    $weeks = floor($days / 7);
    $months = date_interval_format($diff, "%m");

    $minutes_form = get_noun_plural_form($minutes, "минута", "минуты", "минут");
    $hours_form = get_noun_plural_form($hours, "час", "часа", "часов");
    $days_form = get_noun_plural_form($days, "день", "дня", "дней");
    $weeks_form = get_noun_plural_form($weeks, "неделя", "недели", "недель");
    $months_form = get_noun_plural_form($months, "месяц", "месяца", "месяцев");

    $plural_forms = [
        "minutes" => ["минута", "минуты", "минут"],
        "hours" => ["час", "часа", "часов"],
        "days" => ["день", "дня", "дней"],
        "weeks" => ["неделя", "недели", "недель"],
        "months" => ["месяц", "месяца", "месяцев"]
    ];

    if ($months) {
        return $months . " " . $months_form . " назад";
    }
    else if ($weeks) {
        return $weeks . " " . $weeks_form . " назад";
    }
    else if ($days) {
        return $days . " " . $days_form . " назад";
    }
    else if ($hours) {
        return $hours . " " . $hours_form . " назад";
    }
    else {
        return $minutes . " " . $minutes_form . " назад";
    }
}
