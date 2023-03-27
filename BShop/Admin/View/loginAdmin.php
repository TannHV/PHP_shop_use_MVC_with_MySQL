<title>Admin - Check Authentication</title>
<style>
    .error-input {
        background: #ff000045 !important;
    }

    #layoutAuthentication {
        /* background:  rgba(3, 0, 0, 0.5) no-repeat center center; */
        background-size: 100%;
        min-height: 100%;
        background: linear-gradient(180deg, rgba(0, 41, 255, 0.4), rgba(0, 0, 0, 0.6)), url(./assets/img/background.gif);
        background-size: cover;
    }
</style>
<script>
    function SnH_Ps() {
        var x = document.getElementById("Password");
        if (x.type === "password") {
            document.getElementById('ShowHidePs').textContent = 'Hide Password';
            x.type = "text";
        } else {
            document.getElementById('ShowHidePs').textContent = 'Show Password';
            x.type = "password";
        }
    }
</script>
<?php
$email = '';
$email_error = false;
$pass = '';
$pass_error = false;
$auth_error = '';
if (isset($_POST['Email'])) {
    $email = $_POST['Email'];
    $pass = $_POST['Password'];
    $kt = new user();
    $check = $kt->ExistUser($email);
    if (!$check) {
        $email_error = true;
    } else {
        $check2 = $kt->login($email, md5($pass));
        if ($check2) {
            if ($check['vaitro'] == 0) {
                $auth_error = 'You do not have permission to access this resource';
            }
        } else {
            $pass_error = true;
        }
    }
}
?>
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <div class="container">
            <div class="row justify-content-center mt-5 pt-5">
                <div class="col-lg-5">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header  <?php echo $auth_error ? 'error-input' : '' ?>">
                            <div class="d-flex align-items-center mb-3 mt-4 pb-1">
                                <img class="img" src="../assets/img/logo.png" alt="" width="10%">
                                <span class="h1 fw-bold mb-0">BlueShop - <span class="text-success">Admin</span></span>
                            </div>
                            <h2 class="text-center">Login<i class='fas fa-user-circle'></i></h2>
                        </div>
                        <div class="card-body <?php echo $auth_error ? 'error-input' : '' ?>">
                            <form method="POST" action="index.php?action=Auth&act=login">
                                <div class="form-floating mb-3">
                                    <input class="form-control <?php echo $email_error ? 'error-input' : '' ?>" value="<?php echo $email ?>" id="inputEmail" type="email" placeholder="name@example.com" name="Email" />
                                    <label for="inputEmail">Email address</label>
                                    <?php
                                    if ($email_error) {
                                        echo '<small class="text-danger">Email is not registered</small>';
                                    }
                                    ?>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control <?php echo $pass_error ? 'error-input' : '' ?>" value="<?php echo $pass ?>" id="Password" type="password" placeholder="Password" name="Password" />
                                    <label for="inputPassword">Password</label>
                                    <?php
                                    if ($pass_error) {
                                        echo '<small class="text-danger">Invalid password</small>';
                                    }
                                    ?>
                                </div>
                                <div class="custom-control custom-checkbox form-outline mb-4">
                                    <input type="checkbox" class="custom-control-input" id="defaultUnchecked" onclick="SnH_Ps()">
                                    <label class="custom-control-label" for="defaultUnchecked" id="ShowHidePs">Show Password</label>
                                </div>
                                <div class="text-center mt-4 mb-0">
                                    <button type="submit" class="btn btn-primary w-50">Login</button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-center py-3">
                            <?php
                            if ($auth_error) {
                                echo '<h4 class="text-danger">' . $auth_error . '</h4>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="layoutAuthentication_footer">
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Your Website 2022</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>