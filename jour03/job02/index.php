<?php

$str = "Tous ces instants seront perdus dans le temps comme les larmes sous la pluie.";

for ($x = 0; $x <= strlen($str); $x += 2) {
    echo $str[$x];
}
