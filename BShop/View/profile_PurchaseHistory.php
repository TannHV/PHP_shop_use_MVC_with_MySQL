<link href="assets\css\UserProfile.css" rel="stylesheet">
<script src="./assets/js/sweetalert_user.js"></script>

<title>User - Purchase History</title>
<div class="container mt-4 mb-4">
    <div class="row">
        <div class="col-lg-3 my-lg-0 my-md-1">
            <div id="sidebar" class="bg-blue">
                <div class="h4 text-white">Account</div>
                <ul>
                    <li>
                        <a href="index.php?action=User&act=profile" class="text-decoration-none d-flex align-sets-start">
                            <div class="far fa-user pt-2 me-3"></div>
                            <div class="d-flex flex-column">
                                <div class="link">My Profile</div>
                                <div class="link-desc">Change your profile details & password</div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="index.php?action=User&act=wishlist" class="text-decoration-none d-flex align-sets-start">
                            <div class="fas fa-box-open pt-2 me-3"></div>
                            <div class="d-flex flex-column">
                                <div class="link">List Favorites</div>
                                <div class="link-desc">View & Manage list of favorites</div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="index.php?action=User&act=topup" class="text-decoration-none d-flex align-sets-start">
                            <div class="fas fa-credit-card pt-2 me-3"></div>
                            <div class="d-flex flex-column">
                                <div class="link">Top Up</div>
                                <div class="link-desc">Add balance to your account</div>
                            </div>
                        </a>
                    </li>
                    <li class="active">
                        <a href="index.php?action=User&act=PurchaseHistory" class="text-decoration-none d-flex align-sets-start">
                            <div class="fas fa-cash-register pt-2 me-3"></div>
                            <div class="d-flex flex-column">
                                <div class="link">Purchase History</div>
                                <div class="link-desc">View & Manage Bill</div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-lg-9 my-lg-0 my-1">
            <div id="main-content" class="bg-white border">
                <div class="text-uppercase"><i class="bi bi-receipt-cutoff"></i> Purchase History</div>
                <?php
                $order = new hoadon();
                $result = $order->getAllBill($_SESSION['makh']);
                if ($result) {
                ?>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="align-middle fw-bolder">Order ID</th>
                                <th class="text-left align-middle fw-bolder">Time Purchase</th>
                                <th class="text-center align-middle fw-bolder">Total</th>
                                <th class="text-center align-middle fw-bolder">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($set = $result->fetch()) :
                            ?>
                                <tr>
                                    <td><a href="index.php?action=User&act=PurchaseHistory&id=<?php echo  $set['masohd'] ?>">
                                            #
                                            <?php
                                            $idhd = '';
                                            for ($i = 0; $i < (4 - strlen($set['masohd'])); $i++) {
                                                $idhd .= '0';
                                            }
                                            echo $idhd .= $set['masohd'];
                                            ?></a>
                                    </td>
                                    <td class="text-left align-middle"><?php echo  $set['ngaydat'] ?></td>
                                    <td class="text-center align-middle"><?php echo  number_format($set['tongtien'], 2) ?> <u>đ</u></td>
                                    <td class="text-center align-middle">
                                        <div class="bg-success text-center text-white rounded"><?php echo  $set['tinhtrang'] ?></div>
                                    </td>
                                </tr>
                            <?php
                            endwhile;
                            ?>
                        </tbody>
                    </table>
                <?php
                } else {
                    echo '<h3 class="text-primary">Bạn mua bất kì sản phẩm nào</h3>';
                    echo '<h5 class="text-primary">Bạn nên đế Shop để mua thêm các sẳn phẩm <a class="text-danger" href="index.php?action=Shop">Click Here</a></h5>';
                }
                ?>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5 mb-5 border-top">
    <div class="row pb-5 pt-4">
        <div class="row">
            <div class="col-8">
                <h4 class='pt-2'>Có thể bạn quan tâm</h4>
            </div>
        </div>
        <?php
        $hh = new hanghoa();
        $result = $hh->getListRanDom(5);
        while ($set = $result->fetch()) :
        ?>
            <div class="col-lg-3 col-md-4 col-sm-6 mt-3 mb-3">
                <a class='sanpham-card' href="index.php?action=Details&id=<?php echo $set['mahh']; ?>">
                    <div class="card border-0">
                        <div class="card-body p-0">
                            <img src="assets\img\sanpham\<?php echo $set['hinh'] ?>" class="img-thumbnail p-0" alt="">
                            <?php if ($set['soluongton'] == 0) echo '<div class="overlay">Product out stock</div>' ?>
                        </div>
                    </div>
                    <p class="text-left ten-sp pt-2">
                        <?php echo $set['tenhh'] . " (" . $set['thoihan'] . ")" ?>
                    </p>
                    <?php
                    if ($set['giamgia'] > 0) {
                    ?>
                        <div class="row">
                            <div class="col-4 text-dark pt-1">
                                <h5 class="gia"><?php echo number_format($set['giamgia']) ?><sup><u>đ</u></sup></h5>
                            </div>
                            <div class="col-4 text-muted text-decoration-line-through pt-1">
                                <h5 class="gia"><?php echo number_format($set['dongia']) ?><sup><u>đ</u></sup></h5>
                            </div>
                            <div class="col-2 bg-danger ml-4 p-1 giamgia">
                                <?php echo "-" . FLOOR(100 - ($set['giamgia'] / $set['dongia']) * 100) . '%' ?>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    <?php
                    if ($set['giamgia'] == 0) {
                    ?>
                        <div class="row">
                            <div class="col-4 text-dark pt-1">
                                <h5 class="gia"><?php echo number_format($set['dongia']) ?><sup><u>đ</u></sup></h5>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </a>
            </div>
        <?php
        endwhile;
        ?>
    </div>
</div>