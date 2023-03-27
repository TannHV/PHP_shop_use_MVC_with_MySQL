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



<?php
$email = '';
$email_error = false;

if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $kt = new user();
    $check = $kt->ExistUser($email);
    if (!$check) {
        $email_error = true;
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
                                <form action='index.php?action=RestPass&act=Check' method='post'>
                                    <div class="d-flex align-items-center mb-3 pb-1">
                                        <img class="img" src="./assets/img/logo.png" alt="" width="10%">
                                        <span class="h1 fw-bold mb-0">BlueShop</span>
                                    </div>
                                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Enter your email to reset Password</h5>
                                    <?php
                                    if ($email_error) {
                                        echo "<h6 class='mb-2 pb-lg-2' style='color: #006CFF;'>Don't have an account? <a href='index.php?action=User&act=sign-up' style='color: #FF0000;'>Register here</a></h6>";
                                    }
                                    ?>
                                    <div class="form-outline mt-2 mb-2">
                                        <input type="email" id="Email" class="form-control form-control-lg <?php echo $email_error ? 'error-input' : '' ?>" name="email" value="<?php echo $email ?>" required />
                                        <label class=" form-label" for="Email">Email</label>
                                    </div>
                                    <?php
                                    if ($email_error) {
                                        echo '<small class="text-danger">Email is not registered</small>';
                                    }
                                    ?>
                                    <div class="pt-1 mb-4">
                                        <button class="btn btn-dark btn-lg btn-block" type="submit">Confirm</button>
                                    </div>
                                    <?php
                                    if (!$email_error) {
                                        echo '<p class="mb-5 pb-lg-2" style="color: #393f81;">Don"t have an account? <a href="index.php?action=User&act=sign-up" style="color: #393f81;">Register here</a></p>';
                                    }
                                    ?>
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