<?php
session_start();

// Initialisation de la grille et du joueur
if (!isset($_SESSION['grille'])) {
    $_SESSION['grille'] = array_fill(0, 3, array_fill(0, 3, '-'));
    $_SESSION['joueur'] = 'X'; // X commence
    $_SESSION['message'] = '';
}

// Réinitialisation de la partie
if (isset($_GET['reset'])) {
    $_SESSION['grille'] = array_fill(0, 3, array_fill(0, 3, '-'));
    $_SESSION['joueur'] = 'X';
    $_SESSION['message'] = '';
}

// Traitement du coup joué
if (isset($_GET['coup'])) {
    $coup = explode(',', $_GET['coup']);
    $i = (int)$coup[0];
    $j = (int)$coup[1];

    // Vérifier si la case est vide
    if ($_SESSION['grille'][$i][$j] === '-') {
        $_SESSION['grille'][$i][$j] = $_SESSION['joueur'];

        // Vérifier si le joueur a gagné
        if (aGagne($_SESSION['joueur'], $_SESSION['grille'])) {
            $_SESSION['message'] = $_SESSION['joueur'] . " a gagné !";
            // Réinitialiser la partie
            $_SESSION['grille'] = array_fill(0, 3, array_fill(0, 3, '-'));
            $_SESSION['joueur'] = 'X';
        } elseif (plein($_SESSION['grille'])) {
            $_SESSION['message'] = "Match nul !";
            $_SESSION['grille'] = array_fill(0, 3, array_fill(0, 3, '-'));
            $_SESSION['joueur'] = 'X';
        } else {
            // Changer de joueur
            $_SESSION['joueur'] = ($_SESSION['joueur'] === 'X') ? 'O' : 'X';
        }
    }
}

function aGagne($joueur, $g)
{
    // lignes
    for ($i = 0; $i < 3; $i++) {
        if ($g[$i][0] === $joueur && $g[$i][1] === $joueur && $g[$i][2] === $joueur) return true;
    }
    // colonnes
    for ($j = 0; $j < 3; $j++) {
        if ($g[0][$j] === $joueur && $g[1][$j] === $joueur && $g[2][$j] === $joueur) return true;
    }
    // diagonales
    if ($g[0][0] === $joueur && $g[1][1] === $joueur && $g[2][2] === $joueur) return true;
    if ($g[0][2] === $joueur && $g[1][1] === $joueur && $g[2][0] === $joueur) return true;

    return false;
}

function plein($g)
{
    foreach ($g as $ligne) {
        foreach ($ligne as $case) {
            if ($case === '-') return false;
        }
    }
    return true;
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Morpion en PHP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }

        table {
            margin: auto;
            border-collapse: collapse;
        }

        td {
            border: 2px solid #333;
            width: 80px;
            height: 80px;
        }

        input[type=submit] {
            width: 100%;
            height: 100%;
            font-size: 32px;
        }

        .message {
            margin: 10px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <h1>Morpion</h1>
    <div class="message"><?= htmlspecialchars($_SESSION['message']) ?></div>
    <form method="get">
        <table>
            <?php for ($i = 0; $i < 3; $i++): ?>
                <tr>
                    <?php for ($j = 0; $j < 3; $j++): ?>
                        <td>
                            <?php if ($_SESSION['grille'][$i][$j] === '-'): ?>
                                <button type="submit" name="coup" value="<?= $i . ',' . $j ?>">-</button>
                            <?php else: ?>
                                <input type="submit" value="<?= $_SESSION['grille'][$i][$j] ?>" disabled>
                            <?php endif; ?>
                        </td>
                    <?php endfor; ?>
                </tr>
            <?php endfor; ?>
        </table>
        <br>
        <button type="submit" name="reset">Réinitialiser la partie</button>
    </form>
</body>

</html>