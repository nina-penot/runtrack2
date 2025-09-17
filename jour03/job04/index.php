<?php

$str = "Dans l'espace, personne ne vous entend crier";

// echo strlen($str); mais il faut faire une fonction donc:

function CountManually($text)
{
    for ($x = 0; isset($text[$x]); $x++) {
        echo "Lettre numéro ", $x + 1, " - ", $text[$x], "<br>";
    }
    echo "Il y a ", $x, " lettres au total.", "<br>";
}

CountManually($str);
