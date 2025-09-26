<?php

session_start();

if (isset($_GET["prenom"]) and $_GET["prenom"] != "") {
    $_SESSION["prenoms"][] = $_GET["prenom"];
    foreach ($_SESSION["prenoms"] as $nom) {
        echo "<div>- ", $nom, "</div>";
    }
}


if (isset($_GET["reset"])) {
    $_SESSION["prenoms"] = [];
}

?>

<html>

<head>
    <meta content="text/html" charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <form method="get">
        <div>Entrez votre prénom:</div>
        <input type="text" name="prenom">
        <button type="submit" name="submit">ENVOYER</button>
        <button type="submit" name="reset">RESET</button>
    </form>
</body>

</html>