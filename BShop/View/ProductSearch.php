
<div class="container">
    <div class="row">
        <div class="row">
            <div class="col-lg-9 col-md-12 col-sm-12">
                <?php
                $search = '';
                if (isset($_GET['Search'])) {
                    $search = $_GET['Search'];
                    echo '<title>Tìm kiếm - ' . $search .'</title>';
                    echo '<h2>Tìm kiếm sản phẩm</h2>';
                    echo '<p>Từ khóa "<strong>' . $search . '</strong>"</p>'
                ?>
            </div>
        </div>
        <?php
                    $hh = new hanghoa();
                    $result = $hh->getProductSearch($search);
                    if ($result) {
                        while ($set = $result->fetch()) :
        ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mt-3 mb-3">
                    <a class='sanpham-card' href="index.php?action=Details&id=<?php echo $set['mahh']; ?>">
                        <div class="card border-0">
                            <div class="card-body p-0">
                                <img src="assets\img\sanpham\<?php echo $set['hinh'] ?>" class="img-thumbnail p-0" alt="">
                                <?php if ($set['soluongton'] <= 0) echo '<div class="overlay">Product out stock</div>' ?>
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
                    }
                    if ($result->rowCount() == 0) {
            ?>
            <div class="col-lg-12">
                <div class="text-center">
                    <img src="assets\img\product_not_found.png" class="img-fluid" alt="Product not found" width="50%"/>
                </div>
            </div>
    <?php
                    }
                }
    ?>
    </div>
</div>
<?php
if ($result->rowCount() == 0):
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
                            <?php if($set['soluongton'] == 0)echo'<div class="overlay">Product out stock</div>'?>
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
                                <?php echo "-" . FLOOR(100-($set['giamgia'] / $set['dongia']) * 100) . '%' ?>
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