<?php

function isPrime($num)
{
    if ($num <= 1) {
        return false;
    }
    for ($i = 2; $i < $num; $i++) {
        if ($num % $i == 0) {
            return false;
        }
    }

    echo $num, "<br>";
}

for ($x = 1; $x <= 1000; $x++) {
    isPrime($x);
}
