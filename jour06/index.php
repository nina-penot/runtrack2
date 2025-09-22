<?php

//Make a match for each style
?>

<html>

<head>
    <meta content="text/html" charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    if (isset($_GET["style"])) {
        switch ($_GET["style"]) {
            case "style1":
                echo '<link rel="stylesheet" href="style1.css">';
                break;
            case "style2":
                echo '<link rel="stylesheet" href="style2.css">';
                break;
            case "style3":
                echo '<link rel="stylesheet" href="style3.css">';
                break;
            default:
                echo '<link rel="stylesheet" href="">';
        }
    }
    ?>
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