<?php

$str = "On n’est pas le meilleur quand on le croit mais quand on le sait";

$dic = ["voyelles" => 0, "consonnes" => 0];

$vowels = ["a", "e", "i", "o", "u", "y"];
$conson = [
    "b",
    "c",
    "d",
    "f",
    "g",
    "h",
    "j",
    "k",
    "l",
    "m",
    "n",
    "p",
    "q",
    "r",
    "s",
    "t",
    "u",
    "v",
    "w",
    "x",
    "z"
];

for ($x = 0; $x < strlen($str); $x++) {
    if (in_array(strtolower($str[$x]), $vowels)) {
        $dic["voyelles"] += 1;
    } else if (in_array(strtolower($str[$x]), $conson)) {
        $dic["consonnes"] += 1;
    } else {
        continue;
    }
}

?>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau</title>
    <style>
        table {
            border: black solid 2px;
            border-collapse: collapse;
        }

        td {
            border: black solid 1px;
            padding: 5px;
            text-align: center;
        }

        th {
            background-color: lightgray;
            padding: 10px;
            border: black solid 1px;
        }
    </style>
</head>

<body>
    <table>
        <tr>
            <th>Voyelles</th>
            <th>Consonnes</th>
        </tr>
        <tr>
            <td><?php echo $dic["voyelles"]; ?></td>
            <td><?php echo $dic["consonnes"]; ?></td>
        </tr>
    </table>
</body>

</html>