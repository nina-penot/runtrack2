<?php

function Style_changer($my_get)
{
    switch ($my_get) {
        case "style1":
            return "style1.css";
            break;
        case "style2":
            return "style2.css";
            break;
        case "style3":
            return "style3.css";
            break;
        default:
            return "";
    }
}


if (isset($_GET["style"])) {
    $my_style = Style_changer($_GET["style"]);
}
// <?= est comme un echo
?>

<html>

<head>
    <meta content="text/html" charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= $my_style ?>">
</head>

<body>
    <form method="get">
        <div class="my_label">Choisissez un style...</div>
        <select id="style" name="style">
            <option value="style1">Style 1</option>
            <option value="style2">Style 2</option>
            <option value="style3">Style 3</option>
        </select>
        <input type="submit" value="Envoyer">
    </form>

</body>


</html>