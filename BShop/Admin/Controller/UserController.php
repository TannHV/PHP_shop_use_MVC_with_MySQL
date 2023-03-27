<?php
if (isset($_GET['act'])) {
    switch ($_GET['act']) {
        case 'EditUser':
            include "./View/EditUser.php";
            break;
        case 'UpdateUser':
            if (isset($_POST['makh'])) {
                $makh = $_POST['makh'];
                $tenkh = $_POST['tenkh'];
                $email = $_POST['email'];
                $diachi = $_POST['diachi'];
                $sodienthoai = $_POST['sodienthoai'];
                $vaitro = $_POST['vaitro'];
                $ad = new admin();
                $User  = $ad->getSingleUser($makh);
                if ($User) {
                    $ad->updateUser($makh, $tenkh, $email, $diachi, $sodienthoai, $vaitro);
                    echo "<script>alert('Update user success')</script>";
                    echo '<meta http-equiv="refresh" content= "0; url=./index.php?ation=Admin&act=alluser"/>';
                } else {
                    echo "<script>alert('Update user fail')</script>";
                    include "./View/EditUser.php";
                }
            }
            break;
        case 'DeleteUser':
            if (isset($_GET['id'])) {
                $makh  = $_GET['id'];
                $ad = new admin();
                $User = $ad->getSingleUser($makh);
                if ($User) {
                    $ad->deleteUser($makh);
                    echo "<script>alert('Delete user Success')</script>";
                    echo '<meta http-equiv="refresh" content= "0; url=./index.php?ation=Admin&act=alluser"/>';
                } else {
                    echo "<script>alert('user not exists')</script>";
                    include "./View/AllUser.php";
                }
            } else {
                echo "<script>alert('Delete user Fail')</script>";
                include "./View/AllUser.php";
            }
            break;
    }
}
