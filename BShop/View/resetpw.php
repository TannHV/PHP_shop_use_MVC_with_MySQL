<title>Forget Password</title>
<style>
    #topbar,
    .footer-2 {
        display: none !important;
    }

    .search-bar {
        display: none !important;
    }

    .login-bg {
        background: #393f81 url('./assets/img/login-bg.jpg') no-repeat center 100%;
        background-size: cover;
    }

    .card-lg {
        background-color: #ffffffcc;
    }

    .error-input {
        background: #ff000045 !important;
    }
</style>

<script>
    function SnH_Ps() {
        var x = document.getElementById("Password");
        var y = document.getElementById("RePassword");
        if (x.type === "password") {
            document.getElementById('ShowHidePs').textContent = 'Hide Password';
            x.type = "text";
            y.type = "text";
        } else {
            document.getElementById('ShowHidePs').textContent = 'Show Password';
            x.type = "password";
            y.type = "password";
        }
    }
</script>

<?php
if (isset($_GET['key']) && isset($_GET['reset']) && isset($_GET['ex_d'])) {
    $_SESSION['keyreset'] = $_GET['key'];
    $_SESSION['reset'] = $_GET['reset'];
    $_SESSION['ex_date'] = $_GET['ex_d'];
}
$email = $_SESSION['keyreset'];
$pass = $_SESSION['reset'];
$ex_date = $_SESSION['ex_date'];
$ur = new User();
$result = $ur->getPassEmail($email, $pass);

$timenow = strtotime(date('Y-m-d H:i:s'));
if ($timenow < $ex_date) {
    if ($result) {
        $emailold = $result['email'];
        $pass = '';
        $pass_error = '';
        $repass = '';
        $repass_error = '';
        if (isset($_POST['Password'])) {
            $pass = $_POST['Password'];
            $uppercase = preg_match('@[A-Z]@', $pass);
            $lowercase = preg_match('@[a-z]@', $pass);
            $number    = preg_match('@[0-9]@', $pass);
            $flag = false;
            // Must be a minimum of 8 characters
            if (strlen($pass) >= 8) {
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
        if (isset($_POST['Password']) && isset($_POST['RePassword'])) {
            $pass = $_POST['Password'];
            $repass = $_POST['RePassword'];
            if ($repass != $pass) {
                $repass_error = 'Re-enter the password is not the same';
            }
        }

?>
        <section class="vh-100 login-bg">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col col-xl-10">
                        <div class="card card-lg" style="border-radius: 1rem;">
                            <div class="row g-0">
                                <div class="col-md-6 col-lg-5 d-none d-md-block pt-5">
                                    <img src="./assets/img/login.svg" alt="login form" class="img-fluid rounded mx-auto d-block" style="border-radius: 1rem 0 0 1rem;" />
                                </div>
                                <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                    <div class="card-body p-4 p-lg-5 text-black">
                                        <form action='index.php?action=RestPass&act=Submit' method='post'>
                                            <div class="d-flex align-items-center mb-3 pb-1">
                                                <img class="img" src="./assets/img/logo.png" alt="" width="10%">
                                                <span class="h1 fw-bold mb-0">BlueShop</span>
                                            </div>
                                            <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Enter your email to reset Password</h5>
                                            <!-- Password input -->
                                            <input type="hidden" name="email" value="<?php echo $emailold; ?>">
                                            <div class="form-outline mt-4">
                                                <input type="password" id="Password" class="form-control <?php echo $pass_error != '' ? 'error-input' : '' ?>" name="Password" required value="<?php echo $pass ?>" />
                                                <label class="form-label" for="Password">Password</label>
                                            </div>
                                            <?php
                                            if ($pass_error != '') {
                                                echo '<small class="text-danger">' . $pass_error . '</small>';
                                            }
                                            ?>
                                            <div class="form-outline mt-4">
                                                <input type="password" id="RePassword" class="form-control <?php echo $repass_error != '' ? 'error-input' : '' ?>" name="RePassword" required value="<?php echo $repass ?>" />
                                                <label class="form-label" for="RePassword">Confirm Password</label>
                                            </div>
                                            <?php
                                            if ($repass_error != '') {
                                                echo '<small class="text-danger">' . $repass_error . '</small>';
                                            }
                                            ?>
                                            <div class="custom-control custom-checkbox form-outline mb-4">
                                                <input type="checkbox" class="custom-control-input" id="defaultUnchecked" onclick="SnH_Ps()">
                                                <label class="custom-control-label" for="defaultUnchecked" id="ShowHidePs">Show Password</label>
                                            </div>
                                            <div class="pt-1 mb-4">
                                                <button class="btn btn-dark btn-lg btn-block" type="submit">Change new password</button>
                                            </div>
                                            <a href="#!" class="small text-muted">Terms of use.</a>
                                            <a href="#!" class="small text-muted">Privacy policy</a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php
    } else {
        echo "<script> alert('Your url is not valid, please check again');</script>";
        echo '<meta http-equiv="refresh" content= "0; url=./index.php?action=User&act=login" />';
    }
} else {
    echo "<script> alert('Your url has expired');</script>";
    echo '<meta http-equiv="refresh" content= "0; url=./index.php?action=RestPass" />';
} ?>