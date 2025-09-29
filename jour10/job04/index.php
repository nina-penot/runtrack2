<?php

try {
    $pdo = new PDO("mysql:host=localhost;dbname=jour09", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connexion réussie !";
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

$sql = "SELECT * FROM `etudiants` WHERE prenom LIKE 't%'";
$stmt = $pdo->query($sql);
?>

<!DOCTYPE html>
<html>

<!-- HEAD -->

<head>
    <meta content="text/html" charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        th,
        td {
            border: black solid 2px;
            text-align: left;
            padding: 5px;
        }

        table {
            border: solid black 2px;
            border-collapse: collapse;
        }
    </style>
</head>

<!-- BODY -->

<body>
    <table>
        <tr>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Naissance</th>
            <th>Sexe</th>
            <th>Email</th>
        </tr>
        <?php
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $row['prenom'] . "</td>";
            echo "<td>" . $row['nom'] . "</td>";
            echo "<td>" . $row['naissance'] . "</td>";
            echo "<td>" . $row['sexe'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>