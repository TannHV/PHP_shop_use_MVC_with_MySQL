<?php

use PHPMailer\PHPMailer\PHPMailer;

if (isset($_GET['act'])) {
    switch ($_GET['act']) {
        case 'Check':
            //gửi về địa chỉ mail
            if (isset($_POST['email'])) {
                $getemail = $_POST['email'];
                $ur = new User();
                $result = $ur->getEmail($getemail);

                if ($result) {
                    $ex_date = strtotime(date('Y-m-d H:i:s')) + 300;
                    $email = md5($result['email']);
                    $pass = md5($result['matkhau']);
                    $link = "
                    <a href='http://localhost/LTPHP2/BShop/index.php?action=RestPass&act=resetps&key=" . $email . "&reset=" . $pass . "&ex_d=" . $ex_date . "'>Click To Reset password</a>
                    ";
                    $mail = new PHPMailer(true);
                    $mail->CharSet =  "utf-8";
                    $mail->IsSMTP();
                    // enable SMTP authentication
                    $mail->SMTPAuth = true;
                    // GMAIL username to:
                    // $mail->Username 
			//place your email in there
			//example tamtest@gmail.com
                    $mail->Username = "";
                    // GMAIL password
                    // $mail->Password 
			//Place your password application in the after turn on 2-step verification google
			//example "rvzfkhlhgsow"
                    $mail->Password = "";
                    $mail->SMTPSecure = "tls";
                    // sets GMAIL as the SMTP server
                    $mail->Host = "smtp.gmail.com";
                    $mail->Port = "587";
                    $mail->From = 'blueshop@eco.mail.com';
                    $mail->FromName = 'BlueShop';
                    $mail->AddAddress($getemail, 'reciever_name');
                    $mail->Subject  =  'Reset Password';
                    $mail->IsHTML(true);
                    $mail->Body    = '<h3>Url is valid for 5 minutes from the time of sending the email</h3>
                    Click On This Link to Reset Password ' . $link . '';
                    if ($mail->Send()) {
                        echo "<script> alert('Check Your Email and Click on the link sent to your email');</script>";
                        echo '<meta http-equiv="refresh" content= "0; url=https://mail.google.com/mail" />';
                    } else {
                        echo "Mail Error - >" . $mail->ErrorInfo;
                    }
                } else {
                    include './View/FogetPass.php';
                }
            }
            break;
        case 'Submit':
            $pass = '';
            $pass_error = '';
            if (isset($_POST['Password'])) {
                $pass = $_POST['Password'];
                $uppercase = preg_match('@[A-Z]@', $pass);
                $lowercase = preg_match('@[a-z]@', $pass);
                $number    = preg_match('@[0-9]@', $pass);
                $repass = $_POST['RePassword'];
                
                if (strlen($pass) >= 8 && $uppercase && $lowercase && $number && $repass == $pass) {
                    $passnew = md5($_POST['Password']);
                    $emailold = $_POST['email'];
                    $_SESSION['email'] = $emailold;
                    $ur = new User();
                    $ur->updateEmail($emailold, $passnew);
                    unset($_SESSION['keyreset']);
                    unset($_SESSION['reset']);
                    unset($_SESSION['ex_date']);
                    echo '<script> alert("Thay đổi mật khẩu thành công");</script>';
                    include "View/login.php";
                } else {
                    echo "<script> alert('Change password fail');</script>";
                    include 'View/resetpw.php';
                    break;
                }
            }
            break;
        case 'resetps':
            include 'View/resetpw.php';
            break;
    }
} else {
    include './View/FogetPass.php';
}
