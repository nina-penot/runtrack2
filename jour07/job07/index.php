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

//fonction qui excecute la découpe
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

//function qui génère une table de lettres majuscules
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

//fonction qui génère une table de lettres minuscules
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

//fonction pour calculer la longueur d'une variable parce que je n'ai pas le droit à strlen() >:(
function len($var)
{
    $length = 0;
    for ($num = 0; isset($var[$num]); $num++) {
        $length += 1;
    }
    return $length;
}

//GRAS -----------------------------------------------------------------------------------------------

function gras($str)
{
    //Découpe $str en mots
    $str_array = cutter($str);

    //parcours tous les mots dans la table
    for ($num = 0; isset($str_array[$num]); $num++) {
        //Si la première lettre du mot est majuscule, afficher le mot avec des balises de gras
        if (is_majuscule($str_array[$num][0])) {
            echo "<b>", $str_array[$num], "</b>";
            //sinon, afficher le mot
        } else {
            echo $str_array[$num];
        }
    }
}

//CESAR ------------------------------------------------------------------------------------------------
function cesar($str, $decalage)
{
    //génère une table de minuscules et de majuscules
    $minuscules = minus_Generator();
    $majuscules = maj_Generator();

    //retient la longueur de l'alphabet
    $alphabet_len = len($majuscules);

    //va garder en mémoire le $str transformé
    $new_str = "";
    //Va être utilisé pour calculer la position de la lettre à récupérer avec le décalage
    $calc = 0;

    //parcours le $str
    for ($num = 0; isset($str[$num]); $num++) {
        //si majuscule...
        if (is_majuscule($str[$num])) {
            for ($n = 0; isset($majuscules[$n]); $n++) {
                if ($str[$num] == $majuscules[$n]) {
                    $calc = ($n + $decalage) % $alphabet_len;
                    $new_str = $new_str . $majuscules[$calc];
                }
            }
            //si minuscule...
        } else if (is_minuscule($str[$num])) {
            for ($n = 0; isset($minuscules[$n]); $n++) {
                if ($str[$num] == $minuscules[$n]) {
                    $calc = ($n + $decalage) % $alphabet_len;
                    $new_str = $new_str . $minuscules[$calc];
                }
            }
            //Si ce n'est aucun des 2, ajoute simplement l'élément du $str
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