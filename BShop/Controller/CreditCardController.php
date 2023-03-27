<?php

if (isset($_GET['act'])) {
    switch ($_GET['act']) {
        case "AddCard":
            include './View/CreditAdd.php';
            break;
        case "ListCard":
            include './View/CreditList.php';
            break;
        case "delete":
            if (isset($_GET['id'])) {
                include './View/CreditAddBalance.php';
                $card = new CreditCard();
                $idcard = $_GET['id'];
                $card->deleteCard($idcard);
                echo "<script>alert('Xóa Credit Card thành công')</script>";
                echo '<meta http-equiv="refresh" content= "0; url=./index.php?action=CreditCard&act=ListCard"/>';
            } else {
                echo "<script>alert('Xóa Credit Card không thành công')</script>";
                echo '<meta http-equiv="refresh" content= "0; url=./index.php?action=CreditCard&act=ListCard"/>';
            }
            break;
        case "Add_balance":
            if (isset($_GET['id'])) {
                include './View/CreditAddBalance.php';
            } else {
                $card = new CreditCard();
                $idcard  = $_POST['idcard'];
                $balance = $_POST['balance'];
                $card->addBalance($idcard, $balance);
                echo "<script>alert('Thêm số dư cho Credit Card thành công')</script>";
                echo '<meta http-equiv="refresh" content= "0; url=./index.php?action=CreditCard&act=ListCard"/>';
            }
            break;
        case "create":
            if (isset($_POST['cardname'])) {
                $cardname = $_POST['cardname'];
                $cardnumber = $_POST['cardnumber'];
                $cvv  = $_POST['cvv'];
                $balance = $_POST['balance'];

                if (strlen($cvv) < 6 || strlen($cardnumber) < 16 || $balance < 200000) {
                    include './View/CreditAdd.php';
                } else {
                    $card = new CreditCard();
                    $cardname = strtoupper($card->ReplaceUnicode(trim($cardname)));
                    $card->CreateNewCard($cardname, $cardnumber, $cvv, $balance);
                    if (!$card) {
                        echo "<script>alert('Tạo Credit card không thành công')</script>";
                        include './View/CreditAdd.php';
                    } else {
                        echo "<script>alert('Tạo Credit Card thành công')</script>";
                        echo '<meta http-equiv="refresh" content= "0; url=./index.php?action=CreditCard&act=ListCard"/>';
                    }
                }
            }
            break;
        default:
            include './View/CreditList.php';
    }
} else {
    include './View/CreditList.php';
}
