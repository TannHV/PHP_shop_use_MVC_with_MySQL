<?php

$act = 'Profile';
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}

switch ($act) {
    case 'sign-up':
        include './View/signup.php';
        break;
    case 'login':
        include './View/login.php';
        break;
    case 'registration':
        if (isset($_POST['UserName'])) {
            $username = $_POST['UserName'];
            $email = $_POST['Email'];
            $kt = new user();
            $check = $kt->ExistUser($email);
            // check email dang duoc dang ky chua
            if ($check) {
                include './View/signup.php';
            } else {
                $dt  = trim($_POST['NumberPhone']);
                $checkdt = $kt->ExistUserDT($dt);
                if (!$checkdt) {
                    //https://itforusblog.wordpress.com/2020/05/28/regex-so-dien-thoai-viet-nam/
                    $regexphone = "/^(0?)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$/";
                    //kiem tra so dien thoai hop le chua
                    if (preg_match($regexphone, $dt)) {
                        $password = $_POST['Password'];
                        $uppercase = preg_match('@[A-Z]@', $password);
                        $lowercase = preg_match('@[a-z]@', $password);
                        $number    = preg_match('@[0-9]@', $password);
                        // Must be a minimum of 8 characters
                        // Must contain at least 1 number
                        // Must contain at least one uppercase character
                        // Must contain at least one lowercase character
                        if (!$uppercase || !$lowercase || !$number || strlen($password) < 8) {
                            include './View/signup.php';
                        } else {
                            //Kiem tra mat khau nhap lai co dung khong
                            $repass = $_POST['RePassword'];
                            if ($password == $repass) {
                                $diachi  = $_POST['Address'];
                                $crypt =  md5($password);
                                $us  = new user();
                                $us->InsertUser($username, $crypt, $email, $diachi, $dt);
                                if (!$us) {
                                    echo "<script>alert('Đăng kí không thành công')</script>";
                                    include './View/signup.php';
                                } else {
                                    $user_temp = new User_temp();
                                    $userTemp = $user_temp->ExistUserTemp($email, $dt);
                                    if ($userTemp) {
                                        //lấy mã khach hang chinh thức
                                        $UserCT = $us->ExistUser($email);
                                        $makh = $UserCT['makh'];
                                        //láy mã khách hàng trong bảng tạm
                                        $userTemp_makh = $userTemp['makh'];

                                        //lấy tất cả mã hóa đơn của khách
                                        $AllBill = $user_temp->getAllBill_Temp($userTemp_makh);
                                        $ord = new hoadon();

                                        while ($Bill = $AllBill->fetch()) {

                                            //tạo hóa đơn bên tài khoản chính
                                            $sohdid = $ord->InsertOrder($makh, $Bill['ngaydat'], $Bill['tongtien']);
                                            //lấy thông tin chi tiết hóa đơn bên bảng tạm
                                            $BillDetail =  $user_temp->getInfoBillDetail_Temp($Bill['masohd']);
                                            //insert thông tinh cào chi tiết hóa đơn bản chính
                                            $ord->insertOrderDetail($sohdid, $BillDetail['mahh'], $BillDetail['soluongmua'], $BillDetail['thoihan'], $BillDetail['thanhtien']);

                                            //xoa chi tiet hóa đơn ở bảng tạm
                                            $user_temp->deleteBillDetail_Temp($Bill['masohd']);
                                        }
                                        //xóa hóa đơn tạm
                                        $user_temp->deleteBill_Temp($userTemp_makh);
                                        //xóa khach hàng tạm 
                                        $user_temp->deleteUser_Temp($userTemp_makh);
                                        echo "<script>alert('Bạn từng mua hàng, đã chuyển hóa đơn thàng công')</script>";
                                    }
                                    echo "<script>alert('Đăng kí thành công')</script>";
                                    echo '<meta http-equiv="refresh" content= "0; url=./index.php?action=User&act=login"/>';
                                }
                            } else {
                                include './View/signup.php';
                            }
                        }
                    } else {
                        include './View/signup.php';
                    }
                } else {
                    include './View/signup.php';
                }
            }
        }
        break;
    case 'login-to':
        if (isset($_POST['Email']) && isset($_POST['Password'])) {
            $email = $_POST['Email'];
            $pass = md5($_POST['Password']);
            $us = new user();
            $check  = $us->login($email, $pass);
            if ($check != null) {
                $_SESSION['makh'] = $check['makh'];
                $_SESSION['tenkh'] = $check['tenkh'];
                $_SESSION['matkhau'] = $check['matkhau'];
                $_SESSION['email'] = $check['email'];
                $_SESSION['sodu'] = $check['sodu'];
                $_SESSION['diachi'] = $check['diachi'];
                $_SESSION['sodienthoai'] = $check['sodienthoai'];
                $_SESSION['vaitro'] = $check['vaitro'];
                if ($check['vaitro'] !== 0) {
                    $user = array(
                        'makh' => $check['makh'],
                        'email' => $check['email'],
                        'sodu' => $check['sodu'],
                        'vaitro' => $check['vaitro']
                    );
                    $_SESSION['admin'] = $user;
                }
                echo "<script>alert('Đăng nhập thành công')</script>";
                echo '<meta http-equiv="refresh" content= "0; url=./index.php?action=home"/>';
            } else {
                echo "<script>alert('Đăng nhập không thành công')</script>";
                include './View/login.php';
            }
            break;
        }
    case 'profile':
        if (isset($_SESSION['makh'])) {
            include './View/profile.php';
        } else {
            echo "<script>alert('Bạn chưa đăng nhặp')</script>";
            include './View/login.php';
        }
        break;
    case 'changeprofile':
        if (isset($_POST['makh'])) {
            $makh = $_POST['makh'];
            $username = $_POST['UserName'];
            $email = $_POST['Email'];
            $address = $_POST['Address'];
            $phone  = $_POST['NumberPhone'];
            $us = new User();
            $flag = false;
            $check = $us->getInfo($makh);
            if ($username == $check['tenkh'] && $email == $check['email'] && $address == $check['diachi'] && $phone == $check['sodienthoai']) {
                echo "<script>alert('Không có thông tin thay đổi')</script>";
                echo '<meta http-equiv="refresh" content= "0; url=./index.php?action=User&act=profile"/>';
            } else {
                $regexphone = "/^(0?)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$/";
                if (preg_match($regexphone, $phone)) {
                    $checkExistEmail = $us->ExistUser($email);
                    $checkExistPhone = $us->ExistUserDt($phone);
                    if ($checkExistEmail && !$checkExistPhone) {
                        if ($checkExistEmail['makh'] == $makh) {
                            $flag = true;
                        } else {
                            echo "<script>alert('Email đã được sử dụng')</script>";
                            include './View/profile.php';
                        }
                    } else if ($checkExistPhone && !$checkExistEmail) {
                        if ($checkExistPhone['makh'] == $makh) {
                            $flag = true;
                        } else {
                            echo "<script>alert('Số điện thoại đã được sử dụng')</script>";
                            include './View/profile.php';
                        }
                    } else  if ($checkExistPhone && $checkExistEmail) {
                        if ($checkExistPhone['makh'] == $makh && $checkExistEmail['makh'] == $makh) {
                            $flag = true;
                        } else  if ($checkExistPhone['makh'] == $makh && $checkExistEmail['makh'] != $makh) {
                            echo "<script>alert('Email đã được sử dụng')</script>";
                            include './View/profile.php';
                        } else if ($checkExistPhone['makh'] != $makh && $checkExistEmail['makh'] == $makh) {
                            echo "<script>alert('Số điện thoại đã được sử dụng')</script>";
                            include './View/profile.php';
                        } else {
                            echo "<script>alert('Số điện thoại và Email đã được sử dụng')</script>";
                            include './View/profile.php';
                        }
                    } else {
                        $flag  = true;
                    }
                    if ($flag) {
                        $us->ChangeInfo($makh, $username, $email, $address, $phone);
                        $_SESSION['tenkh'] = $username;
                        $_SESSION['email'] = $email;
                        $_SESSION['diachi'] = $address;
                        $_SESSION['sodienthoai'] = $phone;
                        echo "<script>alert('Thay đổi thông tin thành công')</script>";
                        echo '<meta http-equiv="refresh" content= "0; url=./index.php?action=User&act=profile"/>';
                    }
                } else {
                    echo "<script>alert('Số điện thoại không hợp lệ')</script>";
                    include './View/profile.php';
                }
            }
        }
        break;
    case 'changePass':
        $oldpass = '';
        $newpass = '';
        $confirmpass = '';
        $email = $_SESSION['email'];
        $makh = '';
        $flag = false;
        if (isset($_POST['OldPassword']) && isset($_POST['NwPassword']) && isset($_POST['CofNwPassword']) && isset($_POST['makh'])) {

            $newpass = $_POST['NwPassword'];
            $confirmpass = $_POST['CofNwPassword'];
            $makh = $_POST['makh'];

            $oldpass = md5($_POST['OldPassword']);
            $us = new user();
            $check  = $us->login($email, $oldpass);
            if ($check != null) {
                if ($_POST['OldPassword'] != $newpass) {
                    $uppercase = preg_match('@[A-Z]@', $newpass);
                    $lowercase = preg_match('@[a-z]@', $newpass);
                    $number    = preg_match('@[0-9]@', $newpass);
                    if ($uppercase && $lowercase && $number && strlen($newpass) >= 8) {
                        if ($newpass == $confirmpass) {
                            $flag = true;
                        }
                    }
                }
            }
        }

        if ($flag) {
            $us = new User();
            $us->ChangePass($makh, $oldpass, md5($newpass));
            echo "<script>alert('Thay đổi mật khẩu thành công')</script>";
            echo '<meta http-equiv="refresh" content= "0; url=./index.php?action=User&act=profile"/>';
        } else {
            echo "<script>alert('Thay đổi mật khẩu thất bại')</script>";
            include './View/profile.php';
        }
        break;
    case 'wishlist':
        if (isset($_GET['do'])) {
            $do = $_GET['do'];
            switch ($do) {
                case 'DeleteAll':
                    if (isset($_GET['id'])) {
                        $makh = $_GET['id'];
                        $us = new User();
                        $us->deleteWishListAll($makh);
                        if (!$us) {
                            echo "<script>alert('Xóa danh sách yêu thích không thành công')</script>";
                        } else {
                            echo "<script>alert(''Xóa danh sách yêu thích thành công')</script>";
                        }
                    }
                    break;
                case 'DeleteItem':
                    if (isset($_GET['id']) && isset($_GET['item'])) {
                        $makh = $_GET['id'];
                        $mahh = $_GET['item'];
                        $us = new User();
                        $us->deleteWishListItem($makh, $mahh);
                        if (!$us) {
                            echo "<script>alert('Xóa sẳn phẩm yêu thích không thành công')</script>";
                        } else {
                            echo "<script>alert('Xóa sẳn phẩm yêu thích thành công')</script>";
                        }
                    }
                    break;
            }
            echo '<meta http-equiv="refresh" content= "0; url=./index.php?action=User&act=wishlist"/>';
        } else {
            if (isset($_SESSION['makh'])) {
                include './View/profile_wishlist.php';
            } else {
                echo "<script>alert('Bạn chưa đăng nhặp')</script>";
                include './View/login.php';
            }
        }
        break;
    case 'topup':
        if (isset($_SESSION['makh'])) {
            include './View/profile_topup.php';
        } else {
            echo "<script>alert('Bạn chưa đăng nhặp')</script>";
            include './View/login.php';
        }
        break;
    case 'add_balace_user':
        if (isset($_POST['Cardname']) && isset($_POST['Password'])) {
            $card = new CreditCard();
            $us = new User();
            $cardname = $_POST['Cardname'];
            $cardnumber = $_POST['Cardnumber'];
            $cvv = $_POST['CVV'];
            $cardname = strtoupper($card->ReplaceUnicode(trim($cardname)));
            $makh = $_POST['makh'];
            $password = $_POST['Password'];
            $balance = $_POST['Balance'];

            $getus  = $us->getInfo($makh);
            $getcard = $card->getCard($cardname, $cardnumber, $cvv);
            $balance_card = $getcard ? $getcard['Balance'] : 0;


            if (!$getcard || $balance_card < $balance || $getus['matkhau'] != md5($password) || $balance  < 50000) {
                include './View/profile_topup.php';
            } else {

                $card->Purchase($getcard['IdCard'], $balance);
                $us->addBalanceUs($makh, $balance);
                $getcard = $card->getCard($cardname, $cardnumber, $cvv);
                $getus  = $us->getInfo($makh);
                $_SESSION['sodu'] = $getus['sodu'];
                echo "<script>alert('Nạp tiền vào tài khoản thàng công')</script>";
                echo '<meta http-equiv="refresh" content= "0; url=./index.php?action=User&act=profile"/>';
            }
        }
        break;
    case 'PurchaseHistory':
        if (isset($_SESSION['makh'])) {
            if (isset($_GET['id'])) {
                include './View/profile_PurchaseHistory_id.php';
            } else {
                include './View/profile_PurchaseHistory.php';
            }
        } else {
            echo "<script>alert('Bạn chưa đăng nhặp')</script>";
            include './View/login.php';
        }
        break;
    case 'logout':
        if (isset($_SESSION['tenkh']) && $_SESSION['makh']) {
            unset($_SESSION['makh']);
            unset($_SESSION['tenkh']);
            unset($_SESSION['matkhau']);
            unset($_SESSION['email']);
            unset($_SESSION['diachi']);
            unset($_SESSION['sodienthoai']);
            unset($_SESSION['cart']);
            unset($_SESSION['sodu']);
            unset($_SESSION['vaitro']);
            unset($_SESSION['sohdid']);
            unset($_SESSION['sohdid_temp']);
            unset($_SESSION['makh_temp']);
            unset($_SESSION['idproduct']);
            unset($_SESSION['admin']);
            echo "<script>alert('đăng xuất thành công')</script>";
            echo '<meta http-equiv="refresh" content= "0; url=./index.php?act=home"/>';
        }
        break;
}
