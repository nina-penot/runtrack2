<?php

//fonction qui check si il faut faire une coupe dans une phrase
function should_Cut($a)
{
    $cut = [" ", ",", ";", ":", "."];
    foreach ($cut as $separator) {
        if ($a == $separator) {
            return true;
        }
    }
}

//fonction qui excecute la coupe si should_Cut() true
function cutter($str)
{
    $my_words = [];
    $word = "";

    for ($num = 0; isset($str[$num]); $num++) {
        if (should_Cut($str[$num])) {
            if ($word == "") {
                $my_words[] = $str[$num];
            } else {
                $my_words[] = $word;
                $my_words[] = $str[$num];
                $word = "";
            }
        } else {
            $word = $word . $str[$num];
        }
    }
    if ($word != "") {
        $my_words[] = $word;
    }

    return $my_words;
}

//fonction qui check si une lettre est un majuscule
function is_majuscule($letter)
{
    $majs = [];
    for ($l = 'A'; $l <= 'Z'; $l++) {
        $majs[] = $l;
        if ($l == 'Z') {
            break;
        }
    }

    foreach ($majs as $L) {
        if ($letter == $L) {
            return true;
        }
    }
}

function maj_Generator()
{
    $majs = [];
    for ($l = 'A'; $l <= 'Z'; $l++) {
        $majs[] = $l;
        if ($l == 'Z') {
            break;
        }
    }
    return $majs;
}

//fonction qui check si une lettre est minuscule
function is_minuscule($letter)
{
    $minus = [];
    for ($l = 'a'; $l <= 'z'; $l++) {
        $minus[] = $l;
        if ($l == 'z') {
            break;
        }
    }

    foreach ($minus as $l) {
        if ($letter == $l) {
            return true;
        }
    }
}

function minus_Generator()
{
    $minus = [];
    for ($l = 'a'; $l <= 'z'; $l++) {
        $minus[] = $l;
        if ($l == 'z') {
            break;
        }
    }
    return $minus;
}

//fonction pour 

//GRAS -----------------------------------------------------------------------------------------------

function gras($str)
{
    $str_array = cutter($str);

    for ($num = 0; isset($str_array[$num]); $num++) {
        if (is_majuscule($str_array[$num][0])) {
            echo "<b>", $str_array[$num], "</b>";
        } else {
            echo $str_array[$num];
        }
    }
}

//CESAR ------------------------------------------------------------------------------------------------

function cesar($str, $decalage)
{
    $letter_table = [
        ["a", "A"],
        ["b", "B"],
        ["c", "C"],
        ["d", "D"],
        ["e", "E"],
        ["f", "F"],
        ["g", "G"],
        ["h", "H"],
        ["i", "I"],
        ["j", "J"],
        ["k", "K"],
        ["l", "L"],
        ["m", "M"],
        ["n", "N"],
        ["o", "O"],
        ["p", "P"],
        ["q", "Q"],
        ["r", "R"],
        ["s", "S"],
        ["t", "T"],
        ["u", "U"],
        ["v", "V"],
        ["w", "W"],
        ["x", "X"],
        ["y", "Y"],
        ["z", "Z"]
    ];

    $table_length = 0;
    for ($num = 0; isset($letter_table[$num]); $num++) {
        $table_length += 1;
    }

    $new_str = "";
    $calc = 0;

    //Loop str donné
    for ($num = 0; isset($str[$num]); $num++) {
        //Si c'est une majuscule...
        if (is_majuscule($str[$num])) {
            for ($x = 0; isset($letter_table[$x]); $x++) {
                for ($y = 0; isset($letter_table[$x][$y]); $y++) {
                    if ($str[$num] == $letter_table[$x][$y]) {
                        //Calcule la position de la lettre à récupérer, si cela va au-delà de la
                        //longueur de la table, réduit par la longueur de la table jusqu'à
                        //être moins que la longueur de la table pour trouver un chiffre
                        $calc = $x + $decalage;
                        if ($calc > $table_length) {
                            for ($i = $calc; $i >= $table_length; $i -= $table_length) {
                                $calc -= $table_length;
                            }
                        }
                        //Une fois fait, ajoute la nouvelle lettre à une variable pour former
                        //la nouvelle chaine de charactères
                        $new_str = $new_str . $letter_table[$calc][$y];
                    }
                }
            }
        } else if (is_minuscule($str[$num])) {
            for ($x = 0; isset($letter_table[$x]); $x++) {
                for ($y = 0; isset($letter_table[$x][$y]); $y++) {
                    if ($str[$num] == $letter_table[$x][$y]) {
                        $calc = $x + $decalage;
                        if ($calc > $table_length) {
                            for ($i = $calc; $i > $table_length; $i -= $table_length) {
                                $calc -= $table_length;
                            }
                        }
                        $new_str = $new_str . $letter_table[$calc][$y];
                    }
                }
            }
        } else {
            $new_str = $new_str . $str[$num];
        }
    }

    echo $new_str;
}

//PLATEFORME ------------------------------------------------------------------------------------

function plateforme($str)
{
    //Découper les mots et garder en mémoire les mots et les séparateurs
    $my_words = cutter($str);

    //fonction "me" à la fin check
    function has_me($word)
    {
        $count = 0;
        $my_me = "me";
        $me_test = "";
        for ($i = 0; isset($word[$i]); $i++) {
            $count += 1;
        }

        if ($count <= 1) {
            return false;
        } else {
            for ($n = $count - 2; $n < $count; $n++) {
                $me_test = $me_test . $word[$n];
            }
        }

        if ($me_test == $my_me) {
            return true;
        } else {
            return false;
        }
    }

    //Reconstruire la phrase avec les mots en ...me avec "_"
    foreach ($my_words as $a) {
        if (has_me($a)) {
            echo $a, "_";
        } else {
            echo $a;
        }
    }
}

if (isset($_GET["str"])) {
    if ($_GET["fonction"] == "gras") {
        gras($_GET["str"]);
    } else if ($_GET["fonction"] == "cesar") {
        cesar($_GET["str"], 2);
    } else if ($_GET["fonction"] == "plateforme") {
        plateforme($_GET["str"]);
    }
}

$table_test = [minus_Generator(), maj_Generator()];
print_r($table_test);

?>

<html>
<form method="get">
    <input name="str" type="text" placeholder="Votre texte ici...">
    <select name="fonction">
        <option value="gras">Gras</option>
        <option value="cesar">Cesar</option>
        <option value="plateforme">Plateforme</option>
    </select>
    <input type="submit" value="Envoyer">
</form>

</html>