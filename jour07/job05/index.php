<?php

function occurences($str, $char)
{
    $count = 0;

    for ($num = 0; isset($str[$num]); $num++) {
        if ($char == $str[$num]) {
            $count += 1;
        }
    }

    return $count;
}

$str = "bonjour";
$letter = "o";

echo occurences($str, $letter);
