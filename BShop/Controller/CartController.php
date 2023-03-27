<?php

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}
if (isset($_POST['mahh'])) {
    $mahh = (int)$_POST['mahh'];
    $soluong = (int) $_POST['soluong'];

    $gh = new giohang();
    $gh->add_item($mahh, $soluong);
}
if (isset($_GET['act'])) {
    if ($_GET['act'] == 'deleteAll') {
        $gh = new giohang();
        $gh->deleteAll();
    }
    if ($_GET['act'] == "add-to-cart" && isset($_SESSION['idproduct'])) {
        $mahh = (int)$_SESSION['idproduct'];
        $soluong = 1;

        $gh = new giohang();
        $gh->add_item($mahh, $soluong);
        echo "<script>alert('Thêm sản phẩm vào giỏ hàng thàng công')</script>";
        unset($_SESSION['idproduct']);
        echo '<meta http-equiv="refresh" content= "0; url=./index.php?action=Details&id=' . $mahh . '"/>';
    }
    if ($_GET['act'] == "detete_item" && isset($_GET['id'])) {
        $gh = new giohang();
        $gh->Remove($_GET['id']);
    }
    if ($_GET['act'] == "update_cart") {
        $newlist  = $_POST['newqty'];
        foreach ($newlist as $key => $qty) {
            if ($_SESSION['cart'][$key] != $qty) {
                $gh = new giohang();
                $gh->Update($key, $qty);
            }
        }
    }
}
include './View/Cart.php';
