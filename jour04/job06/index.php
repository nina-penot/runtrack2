<?php

$number = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
$this_is_num = 0;
$length = 0;

if (isset($_GET["num"])) {
    for ($x = 0; isset($_GET["num"][$x]); $x++) {
        $length += 1;
        foreach ($number as $my_num) {
            if ($_GET["num"][$x] == $my_num) {
                $this_is_num += 1;
            }
        }
    }

    if ($length == $this_is_num) {
        if ($_GET["num"] % 2 == 0) {
            echo "Nombre pair";
        } else {
            echo "Nombre impair";
        }
    } else {
        echo "Quelque chose là dedans n'est pas un chiffre... Utilisez SEULEMENT des chiffres!";
    }
}


?>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <form method="get" action="index.php">
        <input type="text" name="num" placeholder="Entrez un nombre...">
        <input type="submit" value="Envoyer">
    </form>
</body>

</html>