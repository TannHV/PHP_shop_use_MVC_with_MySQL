<?php
$act = "Auth";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'Auth':
        include "./View/loginAdmin.php";
        break;
    case 'login':
        // echo "hello";
        if (isset($_POST['Email']) && isset($_POST['Password'])) {
            $email = $_POST['Email']; // admin
            $pass = $_POST['Password']; // 123456
            $usr = new user();
            $checkemail = $usr->ExistUser($email);
            if ($checkemail) {
                $check = $usr->login($email, md5($pass));
                if ($check) {
                    if ($check['vaitro'] == 0) {
                        echo '<script>alert("You do not have permission to access this resource");</script>';
                        include "./View/loginAdmin.php";
                    } else {
                        echo '<script>alert("Login success!");</script>';
                        $user = array(
                            'makh' => $check['makh'],
                            'email' => $check['email'],
                            'sodu' => $check['sodu'],
                            'vaitro' => $check['vaitro']
                        );
                        $_SESSION['admin'] = $user;
                        echo '<meta http-equiv="refresh" content= "0; url=./"/>';
                    }
                } else {
                    echo '<script>alert("Login Failed");</script>';
                    include "./View/loginAdmin.php";
                }
            } else {
                echo '<script>alert("Login Failed");</script>';
                include "./View/loginAdmin.php";
            }
        } else {
            echo '<script>alert("Login Failed");</script>';
            include "./View/loginAdmin.php";
        }
        break;
    case 'logout':
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
        echo '<script>alert("Logout success");</script>';
        echo '<meta http-equiv="refresh" content= "0; url=./"/>';
        break;
}
