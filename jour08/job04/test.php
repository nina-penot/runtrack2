<?php

$style = "display: block;";
if (isset($_GET["prenom"])) {
    $prenom = $_GET["prenom"];
    if (!isset($_COOKIE["prenom"])) {
        $_COOKIE["prenom"] = $prenom;
        setcookie("prenom", $_GET["prenom"], time() + 5000);
    } else if (isset($_COOKIE["prenom"]) and $_COOKIE["prenom"] != $prenom and !isset($_GET["deco"])) {
        $_COOKIE["prenom"] = $prenom;
        setcookie("prenom", $_GET["prenom"], time() + 5000);
    } else if (isset($_COOKIE["prenom"]) and $_COOKIE["prenom"] == $prenom and !isset($_GET["deco"])) {
        $style = "display: none;";
        echo "Bonjour ", $prenom;
    } else {
        $style = "display: block;";
    }
}


if (isset($_GET["deco"])) {
    setcookie("prenom", $_GET["prenom"], time() - 1);
}

?>

<html>

<head>
    <meta content="text/html" charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <form method="get">
        <div style="<?= $style ?>">Entrez votre prénom:</div>
        <input style="<?= $style ?>" type="text" name="prenom">
        <button style="<?= $style ?>" type="submit" name="connexion">CONNEXION</button>
        <button type="submit" name="deco">DECONNEXION</button>
    </form>
</body>

</html>