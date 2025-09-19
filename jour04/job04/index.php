<?php

if (isset($_POST["name"]) and isset($_POST["last_name"])) : ?>
    <table style="border: black solid 3px;">
        <tr style="background-color: lightgray; padding: 5px">
            <th>Argument</th>
            <th>Valeur</th>
        </tr>
        <tr>
            <td>Prénom</td>
            <td>Nom</td>
        </tr>
        <tr>
            <td><?php echo $_POST["name"]; ?></td>
            <td><?php echo $_POST["last_name"]; ?></td>
        </tr>
    </table>
<?php endif; ?>


<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <form method="post" action="index.php">
        <input type="text" name="name" placeholder="Votre prénom...">
        <input type="text" name="last_name" placeholder="Votre nom...">
        <input type="submit" value="Envoyer">
    </form>
</body>

</html>