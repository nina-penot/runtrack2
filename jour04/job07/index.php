<?php

//Cette fonction test tous les éléments d'une variable
//pour voir si il s'agit d'un chiffre.
//$test_subject est just pour dire qu'il faut mettre un élément dans les parenthèses de la fonction
function is_this_num($test_subject)
{
    //Liste de tous les chiffres
    $allnums = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
    //Va garder en mémoire la longueur de $test_subject
    $lenght = 0;
    //Garde en mémoire lorsqu'il détecte un chiffre dans $test_subject
    $ya_thats_num = 0;

    //Boucle qui analyse chaque élément de $test_subject en tant que $x
    //Ex: si $test_buject = "CHAT", il va analyser $x = C, $x = H, $x = A, $x = T.
    for ($x = 0; isset($test_subject[$x]); $x++) {
        $lenght += 1;
        //Boucle qui regarde chaque élément de ma liste de chiffres en tant que $num
        foreach ($allnums as $num) {
            //Si un élément de $test_subject qui correspond à un chiffre, garde en mémoire (+1)
            if ($test_subject[$x] == $num) {
                $ya_thats_num += 1;
            }
        }
    }

    //Compare si la longueur et le nombre de chiffres sont égaux.
    if ($lenght == $ya_thats_num) {
        return true; //Si oui, donne le résultat: true
    } else {
        return false; //Si non, donne false
    }
    //EX: si $test_subject = 23, il y a 2 chiffres et la variable est longue de 2 (2, 4),
    //c'est donc bien un chiffre. $length == $ya_thats_num
    //EX2: si $test_subject = 2f5, il y a 2 chiffres et la variable est longue de 3 (2, f, 5),
    //ce n'est pas un chiffre car un élément n'est pas compté. $length != $ya_thats_num
}

//fonction pour construire la maison, prend 2 arguments: hauteur totale et taille de la toiture
function Build_a_House($hauteur, $toiture)
{
    //Construit le toit

    //La largeur <- -> du toit. Elle doit être un peut plus grande pour pouvoir
    //avoir l'air joli
    $largeur = $toiture * 2;
    //Pour trouver le milieu du toit. EX: si largeur = 6 il y a donc
    //1 2 3 4 5 6
    //Je veux donc détecter les deux chiffres du milieu: 3 et 4
    $roof_mid_left = $largeur / 2;
    $roof_mid_right = $largeur / 2 + 1;

    //Maintenant ça construit! Commence par une boucle sur la taille du toit...
    for ($x = 1; $x <= $toiture; $x++) {
        //Puis la largeur <- -> de toute la maison
        for ($y = 1; $y <= $largeur; $y++) {
            //Si on se trouve au milieu, faire /\
            if ($y == $roof_mid_left) {
                echo "/";
            } else if ($y == $roof_mid_right) {
                //NOTE: Mettre \ tout seul ne marche pas car c'est un charactère
                //spéciale. Il faut en mettre 2, mais un seul va s'afficher.
                echo "\\";
                //Fait en sorte que si il est possible de remplir ce qu'il y a
                //entre les /\, il le fait avec "_"
            } else if ($y > $roof_mid_left and $y < $roof_mid_right) {
                echo "_";
                //Si aucune autre condition n'est remplie, affiche juste
                //2 espaces (&nbsp est l'équivalent d'un espace pour html)
            } else {
                echo "&nbsp", "&nbsp";
            }
        }
        //Puis retour à la ligne
        echo "<br>";
        //Bouge les milieux, un vers la gauche (-1) un vers la droite (+1)
        $roof_mid_left -= 1;
        $roof_mid_right += 1;
    }

    //Construit le reste de la maison

    //Taille des murs
    $mur = $hauteur - $toiture;
    //Condition pour voir si la hauteur est 0 ou négatif.
    //Si c'est le cas la maison est trop petite
    if ($mur <= 0) {
        //Créer un mur d'une taille de 1
        for ($y = 1; $y <= $largeur; $y++) {
            if ($y == 1 or $y == $largeur) {
                echo "|";
            } else {
                echo "_";
            }
        }
        //Prévient que la maison est trop petite / Message d'erreur
        echo "<br>", "Oh oops, c'est une bien petite maison...";
        //Si ce n'est pas le cas, construit la maison normalement.
    } else {
        //Boucle qui passe par la taille du mur, construit un mur jusqu'à la fin
        for ($x = 1; $x < $mur; $x++) {
            for ($y = 1; $y <= $largeur; $y++) {
                //Place | à l'extrémité gauche et droite
                if ($y == 1 or $y == $largeur) {
                    echo "|";
                    //Rempli l'intérieur par des espaces
                } else {
                    echo "&nbsp", "&nbsp";
                }
            }
            //Une fois une ligne mur construite, va à la ligne
            echo "<br>";
        }
        //Une fois finit, une autre boucle pour faire le sol avec des "_"
        for ($b = 1; $b <= $largeur; $b++) {
            if ($b == 1 or $b == $largeur) {
                echo "|";
            } else {
                echo "_";
            }
        }
    }
}

//ET MAINTENANT IL EST L'HEURE!!
//Regarde si les $_GET existe
if (isset($_GET["hauteur"]) and isset($_GET["largeur"])) {
    //Si oui, vérifie que ce sont bien des chiffres en utilisant la fonction de tout à l'heure
    if (is_this_num($_GET["hauteur"]) and is_this_num($_GET["largeur"])) {
        //Si oui, utilise la fonction de tout à l'heure Build_a_House pour faire
        //la maison.
        Build_a_House($_GET["largeur"], $_GET["hauteur"]);
    } else {
        //Sinon (is_this_number return false) donne un message d'erreur
        //à la place et ne construit rien.
        echo "ERREUR: Ce ne sont pas des chiffres, recommencez.";
    }
} else {
    //Si $_GET n'existe pas encore, demande juste de rentrer deux chiffres.
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