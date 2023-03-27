<?php
$act  = "Home";
if (isset($_GET['act'])) {
    switch ($_GET['act']) {
        case "About":
            include './View/About.php';
            break;
        case "Feedback":
            include './View/Feecback.php';
            break;
        default:
            include './View/' . $act . '.php';
    }
} else {
    include './View/' . $act . '.php';
}
