<?php

session_start();

$cell_empty = "-";
$cell_x = "X";
$cell_o = "O";
$cell_fill = "";

print_r($_GET);
echo "<br>";
print_r($_SESSION);
echo "<br>";

if (isset($_GET["0"])) {
    $cell_fill = "AAA";
}

?>

<!DOCTYPE html>

<html>

<form method="get">
    <table>
        <tr>
            <td> <button name="0"> <?= $cell_fill ?> </button> </td>
            <td> <button name="1"></button> </td>
            <td> <button name="2"></button> </td>
        </tr>
        <tr>
            <td> <button name="3"></button> </td>
            <td> <button name="4"></button> </td>
            <td> <button name="5"></button> </td>
        </tr>
        <tr>
            <td> <button name="6"></button> </td>
            <td> <button name="7"></button> </td>
            <td> <button name="8"></button> </td>
        </tr>
    </table>
</form>

</html>