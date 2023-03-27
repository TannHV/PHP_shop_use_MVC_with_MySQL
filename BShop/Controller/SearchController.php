<?php
if (isset($_GET['Search']) && $_GET['Search'] != ''){
    include './View/ProductSearch.php';
}else{
    include './View/Shop.php';
}
