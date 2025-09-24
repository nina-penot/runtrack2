<?php

function leetSpeak(string $str)
{
    for ($num = 0; isset($str[$num]); $num++) {
        if ($str[$num] == "A" or $str[$num] == "a") {
            $str[$num] = 4;
        } else if ($str[$num] == "B" or $str[$num] == "b") {
            $str[$num] = 8;
        } else if ($str[$num] == "E" or $str[$num] == "e") {
            $str[$num] = 3;
        } else if ($str[$num] == "G" or $str[$num] == "g") {
            $str[$num] = 6;
        } else if ($str[$num] == "L" or $str[$num] == "l") {
            $str[$num] = 1;
        } else if ($str[$num] == "S" or $str[$num] == "s") {
            $str[$num] = 5;
        } else if ($str[$num] == "T" or $str[$num] == "t") {
            $str[$num] = 7;
        } else {
        }
    }
    return $str;
}

echo leetSpeak("Bonjour à tous");
