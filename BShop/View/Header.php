<div id="preloader"></div>

<!-- ======= Top Bar ======= -->
<section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
        <div class="contact-info d-flex align-items-center">
            <i class="bi bi-envelope-fill"></i><a class="emailtop" href="mailto:contact@example.com">info@example.com</a>
            <i class="bi bi-phone-fill phone-icon"></i> +1 2345 6789
        </div>
        <div class="social-links d-none d-md-block">
            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
        </div>
    </div>
</section>
<!-- ======= Header ======= -->
<header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center">
        <h1 class="logo me-auto"><a href="index.php?action=Home"><img src="././assets/img/logo-w.png" alt="logo" class="pb-1" width="" class="img-fluid"> BlueShop</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo me-auto"><img src="./assets/img/logo.png" alt="" class="img-fluid"></a>-->
        <nav id="navbar" class="navbar">
            <ul>
                <li>
                    <a class="nav-link scrollto <?php echo isset($_GET['action']) && $_GET['action'] == 'Home' && !isset($_GET['act']) ? 'active' : ''; ?>
                                                <?php if (!isset($_GET['action'])) {
                                                    echo 'active';
                                                } ?> " href="index.php?action=Home">
                        <i class="	fa fa-home"></i> Home
                    </a>
                </li>
                <li>
                    <a class="nav-link scrollto menu <?php echo isset($_GET['action']) && $_GET['action'] == 'Home' && isset($_GET['act']) && $_GET['act'] == 'About' ? 'active' : ''; ?> " href="index.php?action=Home&act=About">
                        <i class="fa fa-info"></i>About
                    </a>
                </li>
                <li class="dropdown menu">
                    <a href="index.php?action=Shop" class="<?php echo isset($_GET['action']) && $_GET['action'] == 'Shop' ? 'active' : ''; ?>"><i class="bi bi-tags-fill"></i>
                        <span> Category </span> <i class="bi bi-chevron-down"></i>
                    </a>
                    <ul class="text-left ">
                        <li>
                            <a href="index.php?action=Shop&type=Entertainment" class="<?php echo isset($_GET['action']) && $_GET['action'] == 'Shop' && isset($_GET['type']) && $_GET['type'] == 'Entertainment' ? 'active' : ''; ?>">
                                <i class='fas fa-gamepad'></i>
                                Entertainment</a>
                        </li>
                        <li>
                            <a href="index.php?action=Shop&type=Work" class="<?php echo isset($_GET['action']) && $_GET['action'] == 'Shop' && isset($_GET['type']) && $_GET['type'] == 'Work' ? 'active' : ''; ?>">
                                <i class='fas fa-briefcase'></i>
                                Work</a>
                        </li>
                        <li>
                            <a href="index.php?action=Shop&type=Learn" class="<?php echo isset($_GET['action']) && $_GET['action'] == 'Shop' && isset($_GET['type']) && $_GET['type'] == 'Learn' ? 'active' : ''; ?>">
                                <i class="fas fa-graduation-cap"></i>
                                Learn</a>
                        </li>
                        <li>
                            <a href="index.php?action=Shop&type=Game Steam" class="<?php echo isset($_GET['action']) && $_GET['action'] == 'Shop' && isset($_GET['type']) && $_GET['type'] == 'Game Steam' ? 'active' : ''; ?>">
                                <i class="fab fa-steam"></i>
                                Game Steam</a>
                        </li>
                        <li>
                            <a href="index.php?action=Shop&type=Origin" class="<?php echo isset($_GET['action']) && $_GET['action'] == 'Shop' && isset($_GET['type']) && $_GET['type'] == 'Origin' ? 'active' : ''; ?>">
                                <svg role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" id="IconChangeColor" height="19" width="19">
                                    <title>Origin</title>
                                    <path d="M12.588 3.11a8.78 8.78 0 013.417.919 8.775 8.775 0 012.706 2.094 9.113 9.113 0 011.715 2.963 8.65 8.65 0 01.465 3.502 8.224 8.224 0 01-.307 1.848 9.174 9.174 0 01-.674 1.703 19.96 19.96 0 01-1.47 2.412 17.61 17.61 0 01-1.762 2.118 18.61 18.61 0 01-4.286 3.281l-.037.026a.196.196 0 01-.109.023.293.293 0 01-.159-.097.266.266 0 01-.062-.173c0-.029.004-.059.012-.085a.186.186 0 01.037-.062c.277-.393.506-.806.686-1.235a5.42 5.42 0 00.368-1.359.118.118 0 00-.038-.085.11.11 0 00-.085-.038 9.155 9.155 0 01-.795.062 4.926 4.926 0 01-.796-.037 8.818 8.818 0 01-6.123-3.013 9.089 9.089 0 01-1.715-2.963 8.662 8.662 0 01-.465-3.502 8.224 8.224 0 01.306-1.848 8.598 8.598 0 01.675-1.68c.439-.864.93-1.676 1.469-2.436a18.035 18.035 0 011.76-2.119A18.801 18.801 0 0111.609.05l.038-.025a.187.187 0 01.11-.025.295.295 0 01.157.098.255.255 0 01.062.174.244.244 0 01-.012.084.164.164 0 01-.036.061 6.447 6.447 0 00-.687 1.237c-.18.433-.3.885-.366 1.358 0 .033.012.063.036.086a.117.117 0 00.085.037c.262-.033.527-.053.795-.06.272-.01.536.002.798.034zm-.807 12.367a3.32 3.32 0 002.521-.855c.72-.64 1.11-1.438 1.176-2.4a3.357 3.357 0 00-.856-2.535 3.294 3.294 0 00-2.4-1.162 3.36 3.36 0 00-2.534.855 3.3 3.3 0 00-1.164 2.4 3.381 3.381 0 00.846 2.535c.628.725 1.432 1.115 2.411 1.162z" id="mainIconPathAttribute" fill="#ffffff"></path>
                                </svg>
                                Origin</a>
                        </li>
                        <li>
                            <a href="index.php?action=Shop&type=Windows" class="<?php echo isset($_GET['action']) && $_GET['action'] == 'Shop' && isset($_GET['type']) && $_GET['type'] == 'Windows' ? 'active' : ''; ?>">
                                <i class="fab fa-windows"></i>
                                Windows ,Office</a>
                        </li>
                        <li>
                            <a href="index.php?action=Shop&type=Drive" class="<?php echo isset($_GET['action']) && $_GET['action'] == 'Shop' && isset($_GET['type']) && $_GET['type'] == 'Drive' ? 'active' : ''; ?>">
                                <i class="fab fa-google-drive"></i>
                                Google Drive</a>
                        </li>
                        <li>
                            <a href="index.php?action=Shop&type=Wallet" class="<?php echo isset($_GET['action']) && $_GET['action'] == 'Shop' && isset($_GET['type']) && $_GET['type'] == 'Wallet' ? 'active' : ''; ?>">
                                <i class='fab fa-steam-square'></i>
                                Steam Wallet
                            </a>
                        </li>
                        <li>
                            <a href="index.php?action=Shop&type=iTunes" class="<?php echo isset($_GET['action']) && $_GET['action'] == 'Shop' && isset($_GET['type']) && $_GET['type'] == 'iTunes' ? 'active' : ''; ?>">
                                <i class="fab fa-itunes"></i>
                                iTunes, Xbox
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="nav-link scrollto menu <?php echo isset($_GET['action']) && $_GET['action'] == 'Home' && isset($_GET['act']) && $_GET['act'] == 'Feedback' ? 'active' : ''; ?>" href="index.php?action=Home&act=Feedback">
                        <i class="bi bi-chat-right-text-fill"></i><span class="text-center">Feedback</span>
                    </a>
                </li>
                <?php
                if (isset($_SESSION['email']) && isset($_SESSION['makh'])) {
                ?>
                    <li>
                        <!-- Warning -->
                        <div class="ml-4 btn-group p-2">
                            <a type="button" href="index.php?action=User&act=profile" class="btn btn-warning pr-3 pl-3"><i class="bi bi-person-circle pr-2" style="font-size:16px;"></i> <?php echo  $_SESSION['tenkh'] ?></a>
                            <button type="button" class="btn btn-warning dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu w-100" style="background-color: #2579f2;">
                                <a class="dropdown-item float-start pl-3" href="index.php?action=User&act=topup">
                                    <span><i class="bi bi-cash-coin"></i> Balance</span>
                                    <span class="ml-0 pl-0 pr-3">
                                        <br>
                                        <?php echo number_format($_SESSION['sodu']) ?>đ <i class="bi bi-plus-circle-dotted" style="font-weight: bold; font-size: 16px"></i>
                                    </span>
                                </a>
                                <a class="dropdown-item pl-3" href="index.php?action=User&act=wishlist"><span><i class="bi bi-bookmark-heart" style="font-weight: bold; font-size: 16px"></i> List Favorite </span></a>
                                <a class="dropdown-item pl-3" href="index.php?action=User&act=PurchaseHistory"><span><i class="bi bi-list-check" style="font-weight: bold; font-size: 16px"></i> Purchase history </span></a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-left pl-3" href="index.php?action=User&act=logout"><span><i class="bi bi-box-arrow-right" style="font-weight: bold; font-size: 16px"></i> Log Out </span></a>
                                <?php
                                if ($_SESSION['vaitro'] != 0) :
                                ?>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-left pl-3" href="./Admin"><span><i class="bi bi-incognito" style="font-weight: bold; font-size: 16px"></i> Admin</span></a>
                                <?php
                                endif;
                                ?>
                            </div>
                        </div>
                    </li>
                <?php
                } else {
                ?>
                    <li>
                        <a class="signup scrollto buttonsp" href="index.php?action=User&act=sign-up">
                            <i class="fa fa-user-plus"></i>Sign Up
                        </a>
                    </li>
                    <li>
                        <a class="login scrollto buttonln" href="index.php?action=User&act=login">
                            <i class="fa fa-user"></i>Login
                        </a>
                    </li>
                <?php } ?>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->
    </div>

</header><!-- End Header -->
<div class="container mt-2 mb-4 search-bar">
    <div class="row">
        <div class="col-sm-12 col-md-8 col-lg-9 mt-3">
            <form action="index.php?" method="get">
                <div class="input-group">
                    <input name="action" value="Search" hidden>
                    <input type="search" name="Search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" value="<?php echo isset($_GET["Search"]) ? $_GET["Search"] : '' ?>" />
                    <button type="submit" class="btn btn-outline-primary">
                        Search <i class='fas fa-search'></i>
                    </button>
                </div>
            </form>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-3 text-center btn-cart mt-2">
            <a href='index.php?action=Cart' class="btn w-75"><i class="bi bi-cart"></i>Cart
                <span id="slsp">
                    <?php
                    if (isset($_SESSION['cart'])) {
                        $gh = new giohang();
                        $CartTotal = $gh->CartTotal();
                        echo $CartTotal;
                    } else {
                        echo 0;
                    }
                    ?>
                </span>
            </a>
        </div>
    </div>
</div>
<button type="button" class="btn bg-light btn-outline-primary rounded text-center" id="btn-back-to-top">
    <i class="fas fa-arrow-up"></i>
</button>

<div class="text-center alert-width text-danger">
    <h2>Kích thước thiết bị quá nhỏ vui lòng đổi thiết thị khác để xem đầy đủ nội dung</h2>
    <i class="bi bi-aspect-ratio" style="font-size:30px"></i>
</div>