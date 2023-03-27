<link href="assets\css\UserProfile.css" rel="stylesheet">
<script src="./assets/js/sweetalert_user.js"></script>

<title>User - Wish List</title>
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
                    <li class="active">
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
                    <li>
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
                <div class="text-uppercase"><i class="bi bi-box2-heart"></i> Wish List</div>
                <?php
                $us = new User();
                if ($us->getWishListCout($_SESSION['makh']) > 0) {
                ?>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="align-middle">Product</th>
                                <th class="text-center align-middle">Price</th>
                                <th class="text-center align-middle">Discount</th>
                                <th colspan="2" class="text-right align-middle">
                                    <button type='button' name="" id="" class="btn btn-warning fw-bolder text-white" onclick="DeleteAllitemWishList(<?php echo $_SESSION['makh'] ?>)"><i class="bi bi-trash3-fill"></i> Delete All</button>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $us = new User();
                            $result = $us->getWishList($_SESSION['makh']);
                            while ($set = $result->fetch()) :
                            ?>
                                <tr>
                                    <td class="col-sm-8 col-md-6">
                                        <div class="row">
                                            <div class="col-lg-4  col-md-12 col-sm-12">
                                                <a class="thumbnail pull-left" href="index.php?action=Details&id=<?php echo $set['mahh']; ?>">
                                                    <img class="media-object" src="assets\img\sanpham\<?php echo $set['hinh'] ?>" style="width:100%">
                                                </a>
                                            </div>
                                            <div class=" col-lg-8 col-md-12 col-sm-12">
                                                <h4 class="media-heading"><a href="index.php?action=Details&id=<?php echo $set['mahh']; ?>"><?php echo $set['tenhh'] ?></a></h4>
                                                <div class="row m-0 text-left">
                                                    <div class="col-8  p-0 pt-2">
                                                        <h6>Thời hạn: <?php echo $set['thoihan'] ?></h6>
                                                    </div>
                                                    <?php if ($set['giamgia'] > 0) {
                                                    ?>
                                                        <div class="col-4 giamgiacart">
                                                            <p class="text-white"><?php echo "-" . FLOOR(100 - ($set['giamgia'] / $set['dongia']) * 100) . '%' ?></p>
                                                        </div>
                                                    <?php
                                                    } ?>
                                                </div>
                                                <span>Status: </span>
                                                <span class="text-success">
                                                    <strong>
                                                        In Stock
                                                    </strong>
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col-sm-1 col-md-1 text-center pt-4 align-middle">
                                        <strong>
                                            <?php echo number_format($set['dongia'], 2) ?><u>đ</u>
                                        </strong>
                                    </td>
                                    <td class="col-sm-1 col-md-1 text-center pt-4 align-middle">
                                        <strong>

                                            <?php
                                            if ($set['giamgia'] > 0) {
                                                echo '-' . number_format($set['dongia']-$set['giamgia'], 2) . '<u>đ</u>';
                                            } else {
                                                echo 'No discount';
                                            }
                                            ?>
                                        </strong>
                                    </td>
                                    <td class="col-sm-1 col-md-1 text-right pt-4 align-middle">
                                        <button type="button" class="btn btn-danger deletebtn" onclick="AskBeforeDelete(<?php echo $_SESSION['makh'] . ',' . $set['mahh'] ?>)">
                                            <i class='fa fa-trash text-white'></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                <?php
                } else {
                    echo '<h3 class="text-primary">Bạn chưa có sẳn phẩm trong danh sách yêu thích</h3>';
                    echo '<h5 class="text-primary">Bạn nên đế Shop để xem thêm các sẳn phẩm <a class="text-danger" href="index.php?action=Shop">Click Here</a></h5>';
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php
$us = new User();
if ($us->getWishListCout($_SESSION['makh']) == 0) :
?>
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
<?php
endif; 
?>