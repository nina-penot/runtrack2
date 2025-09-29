<?php

try {
    $pdo = new PDO("mysql:host=localhost;dbname=jour09", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connexion réussie !";
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

$sql = "SELECT salles.nom as salle, etage.nom as etage FROM etage INNER JOIN salles ON etage.id = salles.id_etage";
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
            <th>Nom</th>
            <th>Etage</th>
        </tr>
        <?php
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            // print_r($row);
            echo "<td>" . $row['salle'] . "</td>";
            echo "<td>" . $row['etage'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>