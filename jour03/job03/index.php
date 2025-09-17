<?php

$str = "I'm sorry Dave I'm afraid I can't do that";

function vowels_only($text)
{
    $vowels = ["a", "e", "i", "o", "u", "y"];

    for ($x = 0; $x < strlen($text); $x++) {
        if (in_array(strtolower($text[$x]), $vowels)) {
            echo $text[$x];
        }
    }
}

vowels_only($str);
