<?php

if (isset($_COOKIE["nbvisites"])) {
    $nbvisites = $_COOKIE["nbvisites"];
} else {
    $nbvisites = 0;
}

if (isset($_POST['reset'])) {
    $nbvisites = 0;
} else {
    $nbvisites++;
}

setcookie("nbvisites", $nbvisites, time() + 5000);

echo $nbvisites;

?>

<html>

<head>
    <meta content="text/html" charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <form method="post">
        <button type="submit" name="reset">RESET</button>
    </form>
</body>

</html>