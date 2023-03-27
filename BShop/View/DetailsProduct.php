<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet" />
<style>
    select#rate {
        font-family: 'FontAwesome', 'Second Font name';
        color: #fcd303;
    }

    span.star {
        font-family: 'FontAwesome', 'Second Font name';
        color: #fcd303;
    }
</style>
<script type="text/javascript">
    function change(id) {
        var cname = document.getElementById(id).className;
        var ab = document.getElementById(id + "_hidden").value;
        document.getElementById(cname + "rating").value = ab;
        for (var i = ab; i >= 1; i--) {
            document.getElementById(cname + i).src = 'assets/img/star2.png';
        }
        var id = parseInt(ab) + 1;
        for (var j = id; j <= 5; j++) {
            document.getElementById(cname + j).src = "assets/img/star1.png";
        }
    }
</script>
<div class="container">
    <div class="col-md-12 bg-white product-details">
        <section class="panel">
            <div class="panel-body">
                <form action="index.php?action=Cart" method="post">
                    <?php
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $hh = new hanghoa();
                        $result = $hh->getProductDetails($id);
                        $hh->addViewsProduct($id);
                        $mahh  = $result['mahh'];
                        $rating = $hh->getRate($mahh);
                        $_SESSION['idproduct'] = $mahh;
                        $tenhh = $result['tenhh'];
                        $dongia = $result['dongia'];
                        $giamgia = $result['giamgia'];
                        $thoihan = $result['thoihan'];
                        $hinh = $result['hinh'];
                        $mota = $result['mota'];
                        $soluong = $result['soluongton'];
                        $maloai = $result['maloai'];
                        $Loai = $hh->getTypeMenu($id);
                        $Category = $Loai['name'];
                        $countRating = $hh->getCountRate($mahh);
                    }
                    ?>
                    <div class="row">
                        <h6>
                            <a href="index.php?action=Shop">Shop</a> /
                            <a href="index.php?action=Shop&type=<?php echo $Category ?>"><?php echo $Category ?></a> /
                            <a href="index.php?action=Details&id=<?php echo $id; ?>"><?php echo $tenhh ?> </a>
                        </h6>
                    </div>
                    <title>Blue Shop - <?php echo $tenhh ?></title>
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="pro-img-details">
                                <?php if ($soluong <= 0) echo '<div class="overlay-top" id="outstock">Product out stock</div>' ?>
                                <img src="assets\img\sanpham\<?php echo $hinh ?>" alt="" id="anhsp">
                            </div>
                            <div class="pro-img-list">
                                <?php
                                $HinhArr = $hh->getGroupHinh($maloai);
                                while ($set = $HinhArr->fetch()) : ?>
                                    <a href="index.php?action=Details&id=<?php echo $set['mahh']; ?>">
                                        <img src="assets\img\sanpham\<?php echo $set['hinh'] ?>" style="width:150px">
                                    </a>
                                <?php
                                endwhile;
                                ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <a href="#" class="">
                                <input type="hidden" name="mahh" value="<?php echo $mahh ?>" />
                                <h2 class="text-dark" id="ten"><?php echo $tenhh ?></h2>
                                <h2 class="text-dark" id="thoi han">(<?php echo $thoihan ?>)</h2>
                            </a>
                            <p> <?php echo $mota ?></p>
                            <strong>
                                <h6 class="text-dark">Status:
                                    <?php
                                    if ($soluong > 0) {
                                        echo "<span class='text-success'>In stock</span>";
                                    } else {
                                        echo "<span class='text-danger'>Out stock</span>";
                                    }
                                    ?>
                                </h6>
                            </strong>
                            <div class="product_meta pt-4">
                                <span class="tagged_as"><strong>Tags:</strong>
                                    <a class='text-info' rel="tag" href="index.php?action=Shop&type=<?php echo $Category ?>"><?php echo $Category ?></a>
                                </span>
                            </div>
                            <div class="product_meta pt-4">
                                <span class="tagged_as"><strong>Rating:</strong>
                                    <?php echo number_format($rating, 1) ?><i class='fas fa-star' style='font-size:20px;color:#fcd303'></i>( <?php echo $countRating ?> reviews)
                                </span>
                            </div>
                            <div class="product_meta">
                                <?php
                                $maloaiSp = $hh->getGroupTH($maloai);
                                while ($set = $maloaiSp->fetch()) :
                                ?>
                                    <a href="index.php?action=Details&id=<?php echo $set['mahh']; ?>" class="thoihansp mb-2 btn <?php echo $mahh == $set['mahh'] ? 'btn-info text-white' : 'btn-outline-info' ?> <?php echo $set['soluongton'] == 0 ? 'disabled' : ''  ?>"><?php echo $set['thoihan']; ?></a>
                                <?php
                                endwhile;
                                ?>
                            </div>
                            <div class="m-bot15">
                                <?php
                                if ($giamgia != 0) {
                                ?><h2 class="text-dark"><?php echo number_format($giamgia) ?><sup><u>đ</u></sup></h2>
                                    <div class="row">
                                        <div class="col-4">
                                            <h4 class="text-muted text-decoration-line-through"><?php echo number_format($dongia) ?><sup><u>đ</u></sup></h4>
                                        </div>
                                        <div class="col-3 giamgiadetail p-1 mb-2">
                                            <?php echo "-" . FLOOR(100 - ($giamgia / $dongia) * 100) . '%' ?>
                                        </div>
                                    </div>
                                <?php
                                } else {
                                ?>
                                    <h2 class="text-dark"><?php echo number_format($dongia) ?><sup><u>đ</u></sup></h2>
                                <?php
                                }
                                ?>
                            </div>
                            <?php
                            ?>
                            <div class="input-group mt-2 mb-2 w-25 " style="display:<?php echo $soluong <= 0 ? 'none' : 'flex'; ?>">
                                <div class="form-outline">
                                    <input type="number" id="typeNumber" class="form-control quantity" name="soluong" min="1" value="" max="<?php echo $soluong; ?>" />
                                    <label class=" form-label" for="soluong">Quantity</label>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-3">
                                    <button class="btn btn-round btn-primary w-100" type="submit" <?php if ($soluong <= 0) echo 'disabled' ?> id="buy-button">
                                        <i class='fas fa-cart-arrow-down'></i> Buy Now</button>
                                </div>
                                <div class="col-3">
                                    <a class="btn btn-success w-100 text-white <?php if ($soluong <= 0) echo 'disabled' ?>" role="button" href="index.php?action=Cart&act=add-to-cart">
                                        <i class='fas fa-cart-plus'></i> Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row mt-0">
                    <div class="col-md-6"></div>
                    <div class="col-md-6">
                        <?php
                        $makh = -1;
                        if (isset($_SESSION['makh'])) {
                            $makh = $_SESSION['makh'];
                            $kt = new user();
                            $check = $kt->ExistWishlist($makh, $mahh);
                            if ($check) {
                        ?>
                                <form method="post" action="index.php?action=Details&id=<?php echo $mahh ?>&act=addwishlist">
                                    <input type="hidden" name="makh" value="<?php echo $makh ?>">
                                    <button class="btn btn-round btn-danger text-light" type="submit" disabled><i class="fas fa-heart"></i> In wishlist</button>
                                </form>
                            <?php
                            } else {
                            ?>
                                <form method="post" action="index.php?action=Details&id=<?php echo $mahh ?>&act=addwishlist">
                                    <input type="hidden" name="makh" value="<?php echo $makh ?>">
                                    <button class="btn btn-round btn-danger" type="submit"><i class="far fa-heart"></i> Add to wishlist</button>
                                </form>
                            <?php
                            }
                        } else {
                            ?>
                            <form method="post" action="index.php?action=Details&id=<?php echo $mahh ?>&act=addwishlist">
                                <input type="hidden" name="makh" value="-1">
                                <button class="btn btn-round btn-danger" type="submit"><i class="far fa-heart"></i> Add to wishlist</button>
                            </form>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-reviews-tab" data-bs-toggle="tab" data-bs-target="#nav-reviews" type="button" role="tab" aria-controls="nav-reviews" aria-selected="true"><i class="bi bi-star-fill"></i> Reviews</button>
            <button class="nav-link" id="nav-comment-tab" data-bs-toggle="tab" data-bs-target="#nav-comment" type="button" role="tab" aria-controls="nav-comment" aria-selected="false"><i class="bi bi-chat-right-dots-fill"></i> Comment</button>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-reviews" role="tabpanel" aria-labelledby="nav-reviews-tab">
            <div class="be-comment-block">
                <?php
                $usr = new User();
                if (isset($_SESSION['makh'])) {
                    $order = new hoadon();
                    $checkBuy = $order->checkBought($_SESSION['makh'], $mahh);
                    if ($checkBuy) {
                        $checkRated = $usr->CheckRate($mahh, $makh);
                        if (!$checkRated) {
                ?>
                            <form class="form-block" action="index.php?action=Details&id=<?php echo $mahh ?>&act=rating" method="post">
                                <div class="row">
                                    <div class="col-xs-9 col-sm-8">
                                        <ul class="list-unstyled">
                                            <li class="text-muted"><strong><i class="bi bi-person"></i> Your Name: </strong><span style="color:#2579f2 ;"> <?php echo $_SESSION['tenkh'] ?> </span></li>
                                            <li class="text-muted"><strong><i class="bi bi-envelope"></i> Your Email: </strong><span style="color:#2579f2 ;"> <?php echo $_SESSION['email'] ?></span></li>
                                        </ul>
                                    </div>
                                    <div class="col-xs-3 col-sm-4">
                                        <ul class="list-unstyled">
                                            <li class="text-muted"><strong><i class="bi bi-calendar-check"></i> Time purchase: </strong><span style="color:#2579f2 ;"> <?php echo $checkBuy['ngaydat'] ?> </span></li>
                                        </ul>
                                    </div>
                                    <input type="hidden" name="makh" value="<?php echo $_SESSION['makh'] ?>" />
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-3 mt-1 text-left fw-bold">
                                                <label class="form-label" for="rate"><i class="bi bi-stars"></i> Your Rate</label>
                                            </div>
                                            <div class="col-9  mt-1">
                                                <input type="hidden" id="php1_hidden" value="1">
                                                <img src="assets\img\star2.png" onmouseover="change(this.id);" id="php1" class="php" width="20px">
                                                <input type="hidden" id="php2_hidden" value="2">
                                                <img src="assets\img\star2.png" onmouseover="change(this.id);" id="php2" class="php" width="20px">
                                                <input type="hidden" id="php3_hidden" value="3">
                                                <img src="assets\img\star2.png" onmouseover="change(this.id);" id="php3" class="php" width="20px">
                                                <input type="hidden" id="php4_hidden" value="4">
                                                <img src="assets\img\star2.png" onmouseover="change(this.id);" id="php4" class="php" width="20px">
                                                <input type="hidden" id="php5_hidden" value="5">
                                                <img src="assets\img\star2.png" onmouseover="change(this.id);" id="php5" class="php" width="20px">
                                            </div>
                                            <input type="hidden" name="number_rating" id="phprating" value="5">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 ">
                                        <div class="form-outline mb-4">
                                            <textarea class="form-control" id="textAreaExample6" rows="3" name="comment"></textarea>
                                            <label class="form-label" for="textAreaExample6">Your rating</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <button type="submit" class="btn btn-primary btn-block mb-4">
                                            Post Your Reviews
                                        </button>
                                    </div>
                                </div>
                            </form>
                <?php
                        } else {
                            echo '<h4 class="text-warning">The product has been rated by you</h4>';
                        }
                    } else {
                        echo '<h4 class="text-warning">You need to <a class="text-danger" href="#top">purchase</a> the product to reviews</h4>';
                    }
                } else {
                    echo '<h4 class="text-warning">You need to <a href="index.php?action=User&act=login" class="text-danger">login</a> and purchase the product to reviews</h4>';
                }
                $result = $usr->ShowRate($mahh);
                $count = $result->rowCount();
                ?>
                <hr style="width:100%;text-align:left;margin-left:0">
                <?php
                if ($count == 0) {
                ?>
                    <div class="be-comment">
                        <div class="be-comment-content">
                            <h2 class="be-comment-text">
                                <i class='fas fa-star'></i> There are no Reviews yet
                            </h2>
                        </div>
                    </div>
                <?php
                } else {
                ?>
                    <h1 class="comments-title">Reviews (<?php echo $count; ?> )</h1>
                    <?php
                    while ($set = $result->fetch()) :
                    ?>
                        <div class="be-comment">
                            <div class="be-img-comment">
                                <a>
                                    <img src="assets\img\user.png" alt="" class="be-ava-comment">
                                </a>
                            </div>
                            <div class="be-comment-content">
                                <span class="be-comment-name mb-1">
                                    <a><?php echo $set['tenkh'] ?></a>
                                    <span class="star mb-0">
                                        <?php
                                        for ($i = 0; $i < 5; $i++) {
                                            if ($i < $set['rate']) {
                                                echo '&#xf005;';
                                            } else {
                                                echo '&#xf006;';
                                            }
                                        }
                                        ?>
                                    </span>
                                </span>
                                <span class="be-comment-time mb-1">
                                    <i class="fa fa-clock-o"></i>
                                    <?php echo $set['ngaydg'] ?>
                                </span>
                                <p class="be-comment-text">
                                    <?php echo $set['noidung'] ?>
                                </p>
                            </div>
                        </div>
                <?php
                    endwhile;
                }
                ?>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-comment" role="tabpanel" aria-labelledby="nav-comment-tab">
            <div class="be-comment-block">
                <?php
                if (isset($_SESSION['makh'])) {
                    $order = new hoadon();
                ?>
                    <form class="form-block" action="index.php?action=Details&id=<?php echo $mahh ?>&act=comment" method="post">
                        <div class="row">
                            <h6><i class="bi bi-person-circle"></i>Your Name: <?php echo $_SESSION['tenkh'] ?></h6>
                            <input type="hidden" name="makh" value="<?php echo $_SESSION['makh'] ?>" />
                            <div class="col-xs-12 ">
                                <div class="form-outline mb-4">
                                    <textarea class="form-control" id="textAreaExample6" rows="3" name="comment" required></textarea>
                                    <label class="form-label" for="textAreaExample6">Your comment</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary btn-block mb-4">
                                    Post Your Comment
                                </button>
                            </div>
                        </div>
                    </form>
                <?php
                } else {
                    echo '<h4 class="text-warning">You need to <a href="index.php?action=User&act=login" class="text-danger">login</a> to comment</h4>';
                }
                $usr = new User();
                $result = $usr->Showcomment($mahh);
                $count = $result->rowCount();

                ?>
                <hr style="width:100%;text-align:left;margin-left:0">
                <?php
                if ($count == 0) {
                ?>
                    <div class="be-comment">
                        <div class="be-comment-content">
                            <h2 class="be-comment-text">
                                There are no comments yet <i class='far fa-comment'></i>
                            </h2>
                        </div>
                    </div>
                <?php
                } else {
                ?>
                    <h1 class="comments-title">Comments ( <?php echo $count; ?> )</h1>
                    <?php
                    while ($set = $result->fetch()) :
                    ?>
                        <div class="be-comment">
                            <div class="be-img-comment">
                                <a>
                                    <img src="assets\img\user_2.png" alt="" class="be-ava-comment">
                                </a>
                            </div>
                            <div class="be-comment-content">
                                <span class="be-comment-name">
                                    <a><?php echo $set['tenkh'] ?></a>
                                </span>
                                <span class="be-comment-time">
                                    <i class="fa fa-clock-o"></i>
                                    <?php echo $set['ngaybl'] ?>
                                </span>
                                <p class="be-comment-text">
                                    <?php echo $set['noidung'] ?>
                                </p>
                            </div>
                        </div>
                <?php
                    endwhile;
                }
                ?>
            </div>
        </div>
    </div>
</div>
<div class="sptt">
    <div class="container pb-5 pt-5">
        <div class="row pb-5 pt-4">
            <div class="row">
                <div class="col-8">
                    <h4 class='pt-2'>Sản phẩm tương tự</h4>
                </div>
                <div class="col-4 text-right">
                    <a type="button" name="" id="" class="btn btn-primary" href="index.php?action=Shop&type=<?php echo $Category ?>">Xem thêm</a>
                </div>
            </div>
            <?php
            $hh = new hanghoa();

            $result = $hh->getProductSame($Category);
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
</div>