<?php
$act = "Home";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'Home':
        include "./View/HomeAdmin.php";
        break;
    case 'allproduct':
        include "./View/AllProduct.php";
        break;
    case 'addproduct':
        include "./View/AddProduct.php";
        break;
    case 'editproduct':
        include "./View/EditProduct.php";
        break;
    case 'alltype':
        include "./View/AllType.php";
        break;
    case 'addtype':
        include "./View/AddType.php";
        break;
    case 'edittype':
        include "./View/EditType.php";
        break;
    case 'allorderMain':
        include "./View/AllOrderMain.php";
        break;
    case 'allorderTemp':
        include "./View/AllOrderTemp.php";
        break;
    case 'alluser':
        include "./View/AllUser.php";
        break;
    case 'allusertemp':
        include "./View/AllUserTemp.php";
        break;
    case 'allcomment':
        include "./View/AllComments.php";
        break;
    case 'allrating':
        include "./View/AllRating.php";
        break;
    case 'changePass':
        include "./View/ChangePassword.php";
        break;
    case 'changepass_action':
        if (isset($_POST['makh']) && isset($_POST['email']) && isset($_POST['txtpassword'])) {
            $newpass = '';
            $pass_error = '';
            $makh = $_POST['makh'];
            $email = $_POST['email'];
            $pass = $_POST['txtpassword'];
            $us = new user();
            $check = $us->login($email, md5($pass));
            if (!$check) {
                echo "<script>alert('Password change failed')</script>";
                include 'View/ChangePassword.php';
                // echo '<meta http-equiv="refresh" content= "0; url=./"/>';
            } else {
                if (isset($_POST['matkhau'])) {
                    $newpass = $_POST['matkhau'];
                    $uppercase = preg_match('@[A-Z]@', $newpass);
                    $lowercase = preg_match('@[a-z]@', $newpass);
                    $number = preg_match('@[0-9]@', $newpass);
                    $repass = $_POST['renewpassword'];
                    if (strlen($newpass) >= 8 && $uppercase && $lowercase && $number && $repass == $newpass) {
                        $matkhau = md5($_POST['matkhau']);
                        $ad = new admin();
                        $ad->UpdatePass($makh, $matkhau);
                        echo '<script> alert("Change password success");</script>';
                        echo '<meta http-equiv="refresh" content= "0; url=./"/>';
                    } else {
                        echo "<script> alert('Change password fail');</script>";
                        include 'View/ChangePassword.php';
                    }
                }
            }
            break;
        }
}
