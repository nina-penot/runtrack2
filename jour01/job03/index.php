<?php
$my_string = "Cats";
$my_int = 1;
$my_bool = true;
?>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        tr,
        th,
        td {
            border: black solid 2px;
            margin: 5px;
            padding: 5px;
        }
    </style>
</head>


<body>
    <table>
        <tr>
            <th>Type</th>
            <th>Nom</th>
            <th>Valeur</th>
        </tr>
        <tr>
            <td><?php echo gettype($my_string) ?></td>
            <td>my_string</td>
            <td><?php echo $my_string ?></td>
        </tr>
        <tr>
            <td><?php echo gettype($my_int) ?></td>
            <td>my_int</td>
            <td><?php echo $my_int ?></td>
        </tr>
        <tr>
            <td><?php echo gettype($my_bool) ?></td>
            <td>my_bool</td>
            <td><?php echo $my_bool ?></td>
        </tr>
    </table>

</body>

</html>