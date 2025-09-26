<?php

session_start();

//avoir un menu "start" qui cache le tableau tant qu'il est actif
//A un btn "start game" qui onclick -> cache menu "start" et affiche le tableau
//Démarre boucle "en jeu"
//Finit la boucle lorsque le jeu est terminé

//MY CONST VARS------------------------------------
//players
$player_x = "X";
$player_o = "O";
$empty_spot = "-";

//style states
$hide = "display: none";
$show = "display: block;";
$empty_board =
    [
        [$empty_spot, $empty_spot, $empty_spot],
        [$empty_spot, $empty_spot, $empty_spot],
        [$empty_spot, $empty_spot, $empty_spot]
    ];

//FUNCTIONS-----------------------------------
//fabrique bouttons automatiquement
function makeButton($row, $spot)
{
    $btn = '<button class="button_game" name="tile" value=' . $row . "-" . $spot . '> </button>';
    return $btn;
}

function makeCoords($btn_name)
{
    $coord_row = $btn_name[0];
    $coord_col = $btn_name[2];
    $my_coords = [$coord_row][$coord_col];
    return $my_coords;
}

//check si victoire
function victoryCheck($grid, $player)
{
    //in row
    for ($row = 0; isset($grid[$row]); $row++) {
        if ($grid[$row][0] == $player and $grid[$row][2] == $player and $grid[$row][3] == $player) {
            return true;
        }
    }

    //in column
    for ($col = 0; isset($grid[$col]); $col++) {
        if ($grid[0][$col] == $player and $grid[1][$col] == $player and $grid[2][$col] == $player) {
            return true;
        }
    }

    //diagonal
    if ($grid[0][0] == $player and $grid[1][1] == $player and $grid[2][2] == $player) {
        return true;
    }
    if ($grid[2][2] == $player and $grid[1][1] == $player and $grid[2][0] == $player) {
        return true;
    }

    return false;
}

//check si match nul
function nulCheck($grid, $empty)
{
    foreach ($grid as $row) {
        foreach ($row as $spot) {
            if ($spot == $empty) {
                return false;
            }
        }
    }

    return true;
}

//CODE------------------------------------------

if (!isset($_SESSION["board"])) {
    $_SESSION["board"] = $empty_board;
    $_SESSION["player"] = "X";
    $_SESSION["game_state"] = false;
}

if (isset($_GET["tile"])) {
    $coords = makeCoords($_GET["tile"]);
    print_r($coords);
}

if (isset($_GET["reset"])) {
    $_SESSION["board"] = $empty_board;
    $_SESSION["player"] = "X";
    $_SESSION["game_state"] = false;
}

print_r($_SESSION);
echo "<br>";
echo $_SESSION["board"][1][2];


?>

<!DOCTYPE html>

<html>

<head>
    <meta content="text/html" charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .button_game {
            width: 32px;
            height: 32px;
        }
    </style>
</head>

<!-- MENU START GAME -->
<form style="<?= $style_start ?>" method="get">
    <div>GAME START</div>
    <button name="start" value="false">START</button>
</form>

<!-- JEU -->
<form style="<?= $style_game ?>" method="get">
    <table>
        <?php for ($row = 0; isset($_SESSION["board"][$row]); $row++): ?>
            <tr>
                <?php for ($spot = 0; isset($_SESSION["board"][$row][$spot]); $spot++): ?>
                    <td>
                        <?= makeButton($row, $spot); ?>
                    </td>
                <?php endfor; ?>
            </tr>
        <?php endfor; ?>
    </table>
    <button name="reset">RESET</button>
</form>


</html>