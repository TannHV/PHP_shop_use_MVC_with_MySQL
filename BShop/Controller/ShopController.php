<?php
if (isset($_GET['type'])) {
    if ($_GET['type'] == 'ProductHot') {
        include './View/ProductHot.php';
    } else if ($_GET['type'] == "Tatca") {
        include './View/Shop.php';
    } else {
        include './View/ProductType.php';
    }
} else {
    include './View/Shop.php';
}
