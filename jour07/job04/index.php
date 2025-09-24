<?php

function calcule(float $a, string $operator, float $b)
{
    switch ($operator) {
        case "+":
            return $a + $b;
            break;
        case "-":
            return $a - $b;
            break;
        case "*":
            return $a * $b;
            break;
        case "/":
            return $a / $b;
            break;
        case "%":
            return $a % $b;
            break;
        default:
            return "ERREUR: Opérateur non reconnu.";
    }
}

echo calcule(2, "+", 3);
