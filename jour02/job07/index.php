<?php

$hauteur = 5;

for ($x = 1; $x <= $hauteur; $x++) {
    for ($y = 0; $y <= $hauteur * 2; $y++) {
        if ($y == $hauteur - ($x - 1) or $y == $hauteur + $x - 1) {
            echo "*";
        } else if ($x == $hauteur) {
            echo "*";
        } else {
            echo "_";
        }
    }
    echo "<br>";
}
