<?php
if (isset($_SESSION['makh'])) {
    $makh = $_SESSION['makh'];
    if (isset($_GET['act'])) {
        switch ($_GET['act']) {
            case "CreditCard":
                $flag = true;
                foreach ($_SESSION['cart'] as $key => $item) {
                    $mahh = $item['mahh'];
                    $hh = new hanghoa();
                    $soluongton = $hh->getQuantity($mahh);
                    if ($soluongton <  $item['soluong']) {
                        $flag = false;
                        break;
                    }
                }
                if ($flag) {
                    $card = new CreditCard();
                    $cardname = $_POST['Cardname'];
                    $cardnumber = $_POST['Cardnumber'];
                    $cardname = strtoupper($card->ReplaceUnicode(trim($cardname)));
                    $cvv = $_POST['CVV'];
                    $getcard = $card->getCard($cardname, $cardnumber, $cvv);
                    $balance_card = $getcard ? $getcard['Balance'] : 0;
                    $id_card = $getcard ? $getcard['IdCard'] : -1;

                    $gh = new giohang();
                    $tong =  $gh->getTotal();

                    if ($getcard == null || $balance_card < $tong) {
                        echo "<script>alert('Thanh toán không thành công')</script>";
                        include './View/payment_with_low_balance.php';
                    } else {
                        if ($tong == 0) {
                            echo "<script>alert('Thanh toán không thành công')</script>";
                            include './View/Cart.php';
                        } else {
                            $ord = new hoadon();
                            $sohdid = $ord->CreateOrder($_SESSION['makh']);
                            $_SESSION['sohdid'] = $sohdid;

                            $total = 0;
                            foreach ($_SESSION['cart'] as $key => $item) {
                                $ord->insertOrderDetail($sohdid, $item['mahh'], $item['soluong'], $item['thoihan'], $item['total']);
                                $total += $item['total'];
                            }
                            $ord->updateOrderTotal($sohdid, $total);

                            $card->Purchase($id_card, $total);
                            unset($_SESSION['cart']);
                            echo "<script>alert('Thanh toán thành công')</script>";
                            include './View/Bill.php';
                        }
                    }
                } else {
                    echo "<script>alert('So luong khong du')</script>";
                    include './View/Cart.php';
                }
                break;
            default:
                include './View/Cart.php';
        }
    } else {
        $gh = new giohang();
        $tong =  $gh->getTotal();
        if ($_SESSION['sodu'] < $tong) {
            echo "<script>alert('Số dư của bạn không đủ thanh toán')</script>";
            include './View/payment_with_low_balance.php';
        } else {
            if ($tong == 0) {
                echo "<script>alert('Thanh toán không thành công')</script>";
                include './View/Cart.php';
            } else {
                $ord = new hoadon();
                $sohdid = $ord->CreateOrder($_SESSION['makh']);
                $_SESSION['sohdid'] = $sohdid;

                $total = 0;
                foreach ($_SESSION['cart'] as $key => $item) {
                    $ord->insertOrderDetail($sohdid, $item['mahh'], $item['soluong'], $item['thoihan'], $item['total']);
                    $total += $item['total'];
                }
                $ord->updateOrderTotal($sohdid, $total);

                $us = new User();
                $us->Purchase($makh, $total);
                $getus  = $us->getInfo($makh);
                $_SESSION['sodu'] = $getus['sodu'];
                unset($_SESSION['cart']);
                echo "<script>alert('Thanh toán thành công')</script>";
                include './View/Bill.php';
            }
        }
    }
} else {
    if (isset($_GET['act'])) {
        switch ($_GET['act']) {
            case "CreditCard":
                $card = new CreditCard();
                $cardname = $_POST['Cardname'];
                $cardnumber = $_POST['Cardnumber'];
                $cardname = strtoupper($card->ReplaceUnicode(trim($cardname)));
                $cvv = $_POST['CVV'];
                $getcard = $card->getCard($cardname, $cardnumber, $cvv);
                $balance_card = $getcard ? $getcard['Balance'] : 0;
                $id_card = $getcard ? $getcard['IdCard'] : -1;

                $gh = new giohang();
                $tong =  $gh->getTotal();

                $us = new User();
                $username = $_POST['Username'];
                $email = $_POST['Email'];
                $numberphone = $_POST['NumberPhone'];
                $address = $_POST['Address'];

                $checkEmail = $us->ExistUser($email);
                $checkDt = $us->ExistUserDt($numberphone);

                if ($getcard == null || $balance_card < $tong || $checkEmail != null || $checkDt != null) {
                    echo "<script>alert('Thanh toán không thành công')</script>";
                    include './View/payment_without_login.php';
                } else {

                    $user_temp = new User_temp();
                    //kiểm tra khách hàng đã từng dùng email và sdt để mua hàng chưa
                    $checkuser = $user_temp->ExistUserTemp($email, $numberphone);
                    $makh_temp = '';
                    if (!$checkuser) {
                        //insert thong tin vào bảng khách hàng tạm
                        $user_temp->CreateUserTemp($username, $email, $address, $numberphone);
                    }
                    //lấy lại thông tin
                    $checkuser = $user_temp->ExistUserTemp($email, $numberphone);
                    $makh_temp = $checkuser['makh'];

                    //tạo hóa đơn
                    $sohdid = $user_temp->CreateOrder_Temp($makh_temp);
                    $_SESSION['sohdid_temp'] = $sohdid;
                    $_SESSION['makh_temp'] = $makh_temp;
                    $total = 0;
                    foreach ($_SESSION['cart'] as $key => $item) {
                        $user_temp->insertOrderDetail_Temp($sohdid, $item['mahh'], $item['soluong'], $item['thoihan'], $item['total']);
                        $total += $item['total'];
                    }
                    //update hoa don của khách hàng
                    $user_temp->updateOrderTotal_Temp($sohdid, $total);
                    $card->Purchase($id_card, $total);
                    unset($_SESSION['cart']);

                    echo "<script>alert('Thanh toán thành công')</script>";
                    include './View/Bill_without_login.php';
                }

                break;
            default:
                include './View/Cart.php';
        }
    } else {
        include './View/payment_without_login.php';
    }
}
