<?php

if (isset($_POST["name"]) and isset($_POST["password"])) {
    if ($_POST["name"] == "John" and $_POST["password"] == "Rambo") {
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
    <form method="post" action="index.php">
        <input type="text" name="name" placeholder="Votre prénom...">
        <input type="text" name="password" placeholder="Votre mot de passe...">
        <input type="submit" value="Envoyer">
    </form>
</body>

</html>