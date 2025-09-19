<?php

if (isset($_GET["name"]) and isset($_GET["password"])) {
    if ($_GET["name"] == "John" and $_GET["password"] == "Rambo") {
        echo "Votre pire cauchemard";
    } else {
        echo "C'est pas ma guerre";
    }
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
        <input type="text" name="password" placeholder="Votre nom...">
        <input type="submit" value="Envoyer">
    </form>
</body>

</html>