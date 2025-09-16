<?php

for ($x = 1; $x <= 100; $x++) {
    if (is_int($x / 3) == true and is_int($x / 5) == false) {
        echo "Fizz", "<br>";
    } else if (is_int($x / 3) == false and is_int($x / 5) == true) {
        echo "Buzz", "<br>";
    } else if (is_int($x / 3) == true and is_int($x / 5) == true) {
        echo "FizzBuzz", "<br>";
    } else {
        echo $x, "<br>";
    }
}
