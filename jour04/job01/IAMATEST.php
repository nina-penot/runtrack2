<?php

if (isset($_GET["name"]) and isset($_GET["last_name"])) {
    if ($_GET["name"] == "" or $_GET["last_name"] == "") {
        echo "Qui êtes-vous?...", "<br>";
    } else {
        echo "Bienvenue ", $_GET["name"], " ", $_GET["last_name"], ".", "<br>";
    }
}

if (isset($_GET["color"])) {
    echo "Votre couleur préférée est: ", $_GET["color"], "<br>";
}

?>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <form method="get" action="IAMATEST.php">
        <input type="text" name="name" placeholder="Votre prénom...">
        <input type="text" name="last_name" placeholder="Votre nom...">
        <input type="text" name="color" placeholder="Votre couleur préférée...">
        <input type="submit" value="Envoyer">
    </form>
</body>

</html>