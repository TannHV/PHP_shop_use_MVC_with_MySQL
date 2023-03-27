<div class="container">

    <div class="row">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12">
                <?php
                if (isset($_GET['type'])) {
                    $loai = $_GET['type'];
                    $hh = new hanghoa();
                    $menu = $hh->getProductTypeName($loai);
                    echo '<h2> Các sản phẩm ' . $menu['name'] . '</h2>';
                    echo '<title>Shop - ' . $menu['name'] . '</title>';
                ?>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-9">
                <form class="form-inline" method="get">
                    <input type="hidden" value="Shop" name="action">
                    <div class="row w-100">
                        <div class="col-5">
                            <select class="form-select w-100" aria-label="Default select example" name='type'>
                                <option value="Tatca" <?php ($loai === 'Tatca') ? 'selected' : '' ?>>Tất cả</option>
                                <?php
                                $mn = new hanghoa();
                                $menu2 = $mn->getMenu();
                                while ($type = $menu2->fetch()) {
                                    if ($type['name'] == 'Trang Chủ' || $type['name'] == 'Liên Hệ' || $type['name'] == 'Tài Khoản') {
                                    } else {
                                        $selected = $loai == $type['name'] ? 'selected' : '';
                                        echo '<option ' . $selected . ' value="' . $type['name'] . '">' . $type['name'] . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-5">
                            <?php
                            $priceSort = isset($_GET['priceSort']) ? $_GET['priceSort'] : 'Normal';
                            ?>
                            <select class="form-select w-100" aria-label="Default select example" name='priceSort'>
                                <option <?php echo ($priceSort == 'Normal') ? ' selected' : '' ?> value="Normal">Normal</option>
                                <option <?php echo ($priceSort == 'Desc') ? ' selected' : '' ?> value="Desc">High to low</option>
                                <option <?php echo ($priceSort == 'Asc') ? ' selected' : '' ?> value="Asc">Low to high</option>
                            </select>
                        </div>
                        <div class="col-2">
                            <button type="submit" class="btn btn-info mb-2">Sort</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <?php
                    if ($priceSort == 'Normal') {
                        $result = $hh->getProductType($menu['idmenu']);
                    } else {
                        $result = $hh->getProductTypeSort($menu['idmenu'], $priceSort);
                    }
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
    ?>
    </div>
</div>