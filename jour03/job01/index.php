<?php

$my_numbers = [200, 204, 173, 98, 171, 404, 459];

foreach ($my_numbers as $num) {
    if ($num % 2 == 0) {
        echo $num, " est paire.", "<br>";
    } else {
        echo $num, " est impaire.", "<br>";
    }
}
