<?php

for ($x = 0; $x <= 100; $x++) {
    if ($x <= 20) {
        echo "<i>", $x, "</i>", "<br>";
    } else if ($x >= 25 and $x <= 50 and $x != 42) {
        echo "<u>", $x, "</u>", "<br>";
    } else if ($x == 42) {
        echo "La Plateforme_", "<br>";
    } else {
        echo $x, "<br>";
    }
}
