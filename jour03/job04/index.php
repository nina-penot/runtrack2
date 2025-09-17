<?php

$str = "Dans l'espace, personne ne vous entend crier";

// echo strlen($str); mais il faut faire une fonction donc:

function CountManually($text)
{
    for ($x = 0; $x < strlen($text); $x++) {
        echo "Lettre numéro ", $x + 1, " - ", $text[$x], "<br>";
        if ($x == strlen($text) - 1) {
            echo "Il y a ", $x + 1, " lettres au total.", "<br>";
        }
    }
}

CountManually($str);
