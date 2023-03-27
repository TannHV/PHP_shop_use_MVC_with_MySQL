<title>Admin Change Password </title>
<?php
$newpass = '';
$pass_error = '';
$repass = '';
$repass_error = '';
$oldpass = '';
$oldpass_error = '';
if (isset($_SESSION['admin']['makh'])) {
    $id = $_SESSION['admin']['makh'];
    $hh = new admin();
    $result = $hh->getUserSingle($id);
    $makh = $result['makh'];
    $email = $result['email'];
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
        $us = new user();
        $check = $us->ExistUser($email);

        if (!$check) {
            $email_error = 'Email is not register';
        } else {
            $oldpass = $_POST['txtpassword'];
            $user = $us->login($email, md5($pass));
            if (!$user) {
                $oldpass_error = 'Incorrect password';
            }
        }
    }
    if (isset($_POST['matkhau'])) {
        $newpass = $_POST['matkhau'];
        $uppercase = preg_match('@[A-Z]@', $newpass);
        $lowercase = preg_match('@[a-z]@', $newpass);
        $number    = preg_match('@[0-9]@', $newpass);
        $flag = false;
        // Must be a minimum of 8 characters
        if (strlen($newpass) >= 8) {
            // Must contain at least one uppercase character
            if ($uppercase) {
                // Must contain at least one lowercase character
                if ($lowercase) {
                    if (!$number) {
                        $pass_error = 'Password must contain a number';
                    }
                } else {
                    $pass_error = 'Password must contain a lowercase character';
                }
            } else {
                $pass_error = 'Password must contain an uppercase character';
            }
        } else {
            $pass_error = 'Password must be at least 8 characters';
        }
    }
    if (isset($_POST['matkhau']) && isset($_POST['renewpassword'])) {
        $newpass = $_POST['matkhau'];
        $repass = $_POST['renewpassword'];
        if ($repass != $newpass) {
            $repass_error = 'Re-enter the password is not the same';
        }
    }
}
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Change Password</h1>
            <div class="card mb-4">
                <div class="card-header">
                    <!-- <i class="fab fa-product-hunt me-1"></i> -->
                    <i class="fa-solid fa-circle-plus me-1"></i>
                    Change Password
                </div>
                <div class="card-body">
                    <form method="POST" action="index.php?action=Admin&act=changepass_action&id=<?php echo $id ?>">
                        <div class="form-floating mb-3">
                            <input class="form-control " id="inputEmail" type="text" placeholder="Password" value="<?php echo $makh ?>" name="makh" hidden />
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control " id="inputEmail" type="text" placeholder="Password" value="<?php echo $email ?>" name="email" readonly />
                            <label for="inputmahh">Email</label>

                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="Password" type="password" placeholder="Password" name="txtpassword" required />
                            <label for="inputpassword">Old Password</label>
                            <?php
                            if ($oldpass_error != '') {
                                echo '<small class="text-danger">' . $oldpass_error . '</small>';
                            }
                            ?>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="newpassword" type="password" placeholder="Re New Password" name="matkhau" />
                            <label for="inputnewpassword">New Password</label>
                            <?php
                            if ($pass_error != '') {
                                echo '<small class="text-danger">' . $pass_error . '</small>';
                            }
                            ?>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="Password" type="password" placeholder="Re New Password" name="renewpassword" />
                            <label for="inputrenewpassword">Re New Password</label>
                            <?php
                            if ($repass_error != '') {
                                echo '<small class="text-danger">' . $repass_error . '</small>';
                            }
                            ?>
                        </div>
                        <div class="text-end mt-4 mb-0">
                            <button type="submit" class="btn btn-primary" id="nut">Save</button>
                        </div>
                    </form>
                </div>
            </div>
    </main>