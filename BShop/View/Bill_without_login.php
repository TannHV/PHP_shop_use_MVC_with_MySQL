<title>Bill</title>
<?php
$user_temp = new User_temp();
if (isset($_SESSION['sohdid_temp'])) {
    $masohd =  $_SESSION['sohdid_temp'];
    $userInfo = $user_temp->getInfoUser($_SESSION['makh_temp']);
    $result = $user_temp->getBillDetail_Temp($masohd);
    if ($result) {
?>
        <div class="card-body">
            <div class="container mb-5 mt-3">
                <?php
                $info_order = $user_temp->getBillInfo_Temp($masohd);
                $idhd = '';
                for ($i = 0; $i < (4 - strlen($masohd)); $i++) {
                    $idhd .= '0';
                }
                $idhd .= $masohd;

                if ($userInfo['solanmua'] > 1) :
                    echo '<div class="p-3 rounded text-light" style="background-color: #FF684C;"> <i class="bi bi-exclamation-octagon"></i>Have you ever made a purchase here if you want to see your payment history please<a href="index.php?action=User&act=sign-up" style="color: blue;">Register here</a></div>';
                endif;
                ?>

                <div class="row d-flex align-items-baseline">
                    <div class="col-xl-9">
                        <p style="color: #7e8d9f;font-size: 20px;">Invoice &gt;&gt; <strong>ID: #TMP<?php echo $idhd ?></strong></p>
                    </div>
                </div>
                <div class="container">
                    <div class="col-md-12 rounded" style="background-color:#2579f2">
                        <div class="text-left pt-2">
                            <h1 class="logo me-auto text-white text-uppercase "><img src="././assets/img/logo-w.png" alt="logo" class="pb-1" width="7%" class="img-fluid mt-0"> <span class="mt-3">BlueShop</span></h1>
                        </div>
                    </div>
                    <div class="row mt-4">

                        <div class="col-xl-7">
                            <ul class="list-unstyled">
                                <li class="text-muted">To: <span style="color:#2579f2 ;"><?php echo $userInfo['tenkh'] ?> </span></li>
                                <li class="text-muted"><i class='fas fa-location-arrow'></i> <?php echo $userInfo['diachi'] ?></li>
                                <li class="text-muted"><i class="fas fa-phone"></i> <?php echo $userInfo['sodienthoai'] ?></li>
                            </ul>
                        </div>
                        <div class="col-xl-5">
                            <ul class="list-unstyled">
                                <li class="text-muted"><i class="fas fa-circle" style="color:#2579f2 ;"></i>
                                    <span class="fw-bold">ID:</span>#TMP
                                    <?php echo $idhd; ?>
                                </li>
                                <li class="text-muted"><i class="fas fa-circle" style="color:#2579f2 ;"></i>
                                    <span class="fw-bold">Creation Date: </span><?php echo $info_order['ngaydat'] ?>
                                </li>
                                <li class="text-muted"><i class="fas fa-circle" style="color:#2579f2;"></i>
                                    <span class="me-1 fw-bold">Status:</span>
                                    <span class="badge bg-success text-white fw-bold"><?php echo $info_order['tinhtrang'] ?></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <?php
                    while ($item = $result->fetch()) :
                    ?>
                        <div class="row my-2 mx-1 justify-content-center">
                            <div class="col-md-2 mb-4 mb-md-0">
                                <div class=" bg-image ripple rounded-5 mb-4 overflow-hidden d-block" data-ripple-color="light">
                                    <img src="assets\img\sanpham\<?php echo $item['hinh'] ?>" class="w-100" height="" alt="" />
                                    <a href="index.php?action=Details&id=<?php echo $item['mahh']; ?>">
                                        <div class="hover-overlay">
                                            <div class="mask" style="background-color: hsla(0, 0%, 98.4%, 0.2)"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4 mb-md-0">
                                <a href="index.php?action=Details&id=<?php echo $item['mahh']; ?>">
                                    <h6 class="fw-bold text-black"><?php echo $item['tenhh'] ?></h6>
                                </a>
                                <p class="mb-0">
                                    <span class="text-muted me-2 ">Thời hạn:</span><span class="text-danger"><?php echo $item['thoihan'] ?></span>
                                </p>
                                <strong><span class="text-info me-2">Quantity</span><span class="text-success"><?php echo $item['soluongmua'] ?></span></strong>
                            </div>
                            <div class="col-md-4 mb-4 mb-md-0">
                                <?php
                                if ($item['giamgia'] == 0) {
                                ?>
                                    <span class="align-middle"><?php echo number_format($item['dongia'], 2) ?><u>đ</u></span><br>
                                <?php
                                } else {
                                ?>
                                    <h5 class="mb-2">
                                        <span class="align-middle"><?php echo number_format($item['giamgia'], 2) ?><u>đ</u></span><br>
                                        <s class="text-muted me-2 small align-middle"><?php echo number_format($item['dongia'], 2) ?><u>đ</u></s>
                                    </h5>
                                    <p class="text-danger"><small>You save <?php echo   FLOOR(100 - ($item['giamgia'] / $item['dongia']) * 100) . '%' ?></small></p>
                                <?php
                                } ?>
                            </div>
                        </div>
                        <hr>
                    <?php
                    endwhile;
                    ?>
                    <div class="row">
                        <div class="col-xl-8">
                            <p class="ms-3"></p>
                        </div>
                        <div class="col-xl-3">
                            <p class="text-black float-start"><span class="text-black me-3"> Total Amount</span>
                                <span style="font-size: 25px;"><?php echo number_format($info_order['tongtien'], 2) ?> <u>đ</u></span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <h2>Thank you for your business!</h2>
            </div>
        </div>
<?php
    } else {
        echo '<h3 class="text-primary">Hóa đơn không tồn tại</h3>';
        echo '<h5 class="text-primary">Bạn nên đế Shop để mua thêm các sẳn phẩm <a class="text-danger" href="index.php?action=Shop">Click Here</a></h5>';
    }
} else {
    echo '<h3 class="text-primary">Không có hóa đơn</h3>';
}
?>