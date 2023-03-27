<link href="assets\css\signup.css" rel="stylesheet">
<title>Sign Up</title>
<style>
    #topbar,
    .footer-2 {
        display: none !important;
    }

    .search-bar {
        display: none !important;
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
$name = isset($_POST['UserName']) ? $_POST['UserName'] : '';
$email = '';
$email_error = '';
$address = isset($_POST['Address']) ? $_POST['Address'] : '';
$phone = '';
$phone_error = '';
$pass = '';
$pass_error = '';
$repass = '';
$repass_error = '';
if (isset($_POST['Email'])) {
    $email = $_POST['Email'];
    $kt = new user();
    $check = $kt->ExistUser($email);
    if ($check) {
        $email_error = 'The Email was registered';
    }
}
if (isset($_POST['NumberPhone'])) {
    $phone = trim($_POST['NumberPhone']);
    $kt = new user();
    $check = $kt->ExistUserDT($phone);
    if ($check) {
        $phone_error = 'The phone number was registered';
    } else {
        //https://itforusblog.wordpress.com/2020/05/28/regex-so-dien-thoai-viet-nam/
        $regexphone = "/^(0?)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$/";
        if (preg_match($regexphone, $phone) == 0) {
            $phone_error = "invalid phone number";
        }
    }
}
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
if (isset($_SESSION['makh_temp'])) {
    $user_temp = new User_temp();
    $userInfo = $user_temp->getInfoUser($_SESSION['makh_temp']);
    $name = $userInfo['tenkh'];
    $email = $userInfo['email'];
    $address = $userInfo['diachi'];
    $phone = $userInfo['sodienthoai'];
    unset($_SESSION['makh_temp']);
}
?>
<section class="background-radial-gradient overflow-hidden">
    <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
        <div class="row gx-lg-5 align-items-center mb-5">
            <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
                <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)"> The best offer <br />
                    <span style="color: hsl(218, 81%, 75%)">for your business</span>
                </h1>
                <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)"> Lorem ipsum dolor, sit amet consectetur
                    adipisicing elit. Temporibus, expedita iusto veniam atque, magni tempora mollitia dolorum
                    consequatur nulla, neque debitis eos reprehenderit quasi ab ipsum nisi dolorem modi. Quos? </p>
            </div>
            <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
                <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>
                <div class="card bg-glass">
                    <div class="card-body px-4 py-5 px-md-5">
                        <form action="index.php?action=User&act=registration" method="POST">
                            <?php
                            if ($phone_error) {
                                echo "<h6 class='mb-2 pb-lg-2' style='color: #006CFF;'>Don't have an info? <a target='_blank' href='https://dichthuatphuongdong.com/tienich/ho-so-ngau-nhien.html' style='color: #FF0000;'>Click here to clam random info vn</a></h6>";
                            }
                            ?>
                            <div class="form-outline mt-4">
                                <input type="text" id="UserName" class="form-control" name="UserName" required value="<?php echo $name ?>" />
                                <label class="form-label" for="UserName">User Name</label>
                            </div>
                            <div class="form-outline mt-4">
                                <input type="email" id="Email" class="form-control <?php echo $email_error != '' ? 'error-input' : '' ?>" name="Email" required value="<?php echo $email ?>" />
                                <label class="form-label" for="Email">Email address</label>
                            </div>
                            <?php
                            if ($email_error != '') {
                                echo '<small class="text-danger">' . $email_error . '</small>';
                            }
                            ?>
                            <div class="form-outline mt-4">
                                <input type="text" id="Your Address" class="form-control" name="Address" value="<?php echo $address ?>" />
                                <label class="form-label" for="Your Address">Your Address</label>
                            </div>
                            <div class="form-outline mt-4">
                                <input type="number" id="Numberphone" class="form-control <?php echo $phone_error != '' ? 'error-input' : '' ?>" name="NumberPhone" maxlength="11" required value="<?php echo $phone ?>" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;" />
                                <label class="form-label" for="Numberphone">Your Numberphone</label>
                            </div>
                            <?php
                            if ($phone_error != '') {
                                echo '<small class="text-danger">' . $phone_error . '</small>';
                            }
                            ?>
                            <!-- Password input -->
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
                                <label class="form-label" for="RePassword">Re Password</label>
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
                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary btn-block mb-4"> Sign up </button>
                            <!-- Register buttons -->
                            <div class="text-center">
                                <p>or sign up with:</p>
                                <button type="button" class="btn btn-link btn-floating mx-1">
                                    <i class="fab fa-facebook-f"></i>
                                </button>
                                <button type="button" class="btn btn-link btn-floating mx-1">
                                    <i class="fab fa-google"></i>
                                </button>
                                <button type="button" class="btn btn-link btn-floating mx-1">
                                    <i class="fab fa-twitter"></i>
                                </button>
                                <button type="button" class="btn btn-link btn-floating mx-1">
                                    <i class="fab fa-github"></i>
                                </button>
                            </div>
                        </form>
                        <p class="pt-2 pb-lg-2" style="color: #393f81;">You have an account? <a href="index.php?action=User&act=login" style="color: #393f81;">Login here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>