<?php
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
?>
