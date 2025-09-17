<?php

$str = "Les choses que l'on possède finissent par nous posséder.";

function reverse($text)
{
    for ($x = strlen($text) - 1; $x >= 0; $x -= 1) {
        echo $text[$x];
    }
}

reverse($str);
