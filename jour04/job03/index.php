<?php

$amount = 0;

if (isset($_POST)) {
    foreach ($_POST as $x) {
        $amount += 1;
    }
    echo $amount;
}

?>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <form method="post" action="index.php">
        <input type="text" name="name" placeholder="Votre prénom...">
        <input type="text" name="last_name" placeholder="Votre nom...">
        <input type="text" name="color" placeholder="Votre couleur préférée...">
        <input type="submit" value="Envoyer">
    </form>
</body>

</html>