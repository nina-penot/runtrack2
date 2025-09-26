<?php

session_start();
$nbvisites = 0;

if (isset($_SESSION['nbvisites']))
    $nbvisites = $_SESSION['nbvisites'] += 1;
else
    $_SESSION['nbvisites'] = 1;

echo $nbvisites;
