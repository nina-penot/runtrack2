<?php

$str = "Certaines choses changent, et d'autres ne changeront jamais.";

function CountManuallyAdded($text)
{
    for ($x = 1; isset($text[$x]); $x++) {
        echo $text[$x];
    }
    echo $text[0];
}

CountManuallyAdded($str);
