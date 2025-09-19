<?php

function is_this_num($test_subject)
{
    $allnums = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
    $lenght = 0;
    $ya_thats_num = 0;

    for ($x = 0; isset($test_subject[$x]); $x++) {
        $lenght += 1;
        foreach ($allnums as $num) {
            if ($test_subject[$x] == $num) {
                $ya_thats_num += 1;
            }
        }
    }

    if ($lenght == $ya_thats_num) {
        return true;
    } else {
        return false;
    }
}

function Build_a_House($hauteur, $toiture)
{
    //Build roof
    $largeur = $toiture * 2;
    $roof_mid_left = $largeur / 2;
    $roof_mid_right = $largeur / 2 + 1;

    for ($x = 1; $x <= $toiture; $x++) {
        for ($y = 1; $y <= $largeur; $y++) {
            if ($y == $roof_mid_left) {
                echo "/";
            } else if ($y == $roof_mid_right) {
                echo "\\";
            } else if ($y > $roof_mid_left and $y < $roof_mid_right) {
                echo "_";
            } else {
                echo "&nbsp", "&nbsp";
            }
        }
        echo "<br>";
        $roof_mid_left -= 1;
        $roof_mid_right += 1;
    }

    //Build the house
    $mur = $hauteur - $toiture;
    if ($mur <= 0) {
        for ($y = 1; $y <= $largeur; $y++) {
            if ($y == 1 or $y == $largeur) {
                echo "|";
            } else {
                echo "_";
            }
        }
        echo "<br>", "Oh oops, c'est une bien petite maison...";
    } else {
        for ($x = 1; $x < $mur; $x++) {
            for ($y = 1; $y <= $largeur; $y++) {
                if ($y == 1 or $y == $largeur) {
                    echo "|";
                } else {
                    echo "&nbsp", "&nbsp";
                }
            }
            echo "<br>";
        }
        for ($b = 1; $b <= $largeur; $b++) {
            if ($b == 1 or $b == $largeur) {
                echo "|";
            } else {
                echo "_";
            }
        }
    }
}

if (isset($_GET["hauteur"]) and isset($_GET["largeur"])) {
    if (is_this_num($_GET["hauteur"]) and is_this_num($_GET["largeur"])) {
        Build_a_House($_GET["largeur"], $_GET["hauteur"]);
    } else {
        echo "ERREUR: Ce ne sont pas des chiffres, recommencez.";
    }
} else {
    echo "Rentrez deux valeurs chiffre.";
}

?>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <form method="get" action="index.php">
        <input type="text" name="hauteur" placeholder="Entrez un nombre hauteur...">
        <input type="text" name="largeur" placeholder="Entrez un nombre largeur...">
        <input type="submit" value="Envoyer">
    </form>
</body>

</html>