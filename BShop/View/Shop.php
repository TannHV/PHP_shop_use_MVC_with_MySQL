<title>Blue Shop - Shop Product</title>
<div class="container">
    <div class="row">
        <div class="row">
            <?php
            $loai = 'Tatca';
            $hh = new hanghoa();
            $CountProduct = $hh->getListAll();
            $limit = 12;
            $count = $CountProduct->rowCount();
            $p = new page();
            $page = $p->findpage($count, $limit);
            $start = $p->findStart($limit);
            ?>
            <div class="col-lg-8 col-md-12 col-sm-12">
                <h2>Tất cả các sản phẩm</h2>
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

        <div class="row">
            <?php
            if ($priceSort == 'Normal') {
                $result = $hh->getListAllPage($start, $limit);
            } else {
                $result = $hh->getListAllPageSort($start, $limit, $priceSort);
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
            ?>
        </div>
    </div>
    <div>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-end">
                <?php
                if ($priceSort == 'Normal') {
                    $url = '';
                } else {
                    $url = '&priceSort='. $priceSort;
                }
                $current_page = (isset($_GET['page'])) ? $_GET['page'] : 1;
                if ($current_page > 1 && $page > 1) {
                    echo '<li class="page-item">
                                    <a class="page-link" href="index.php?action=Shop&page=' . ($current_page - 1) . $url. '"><i class="fas fa-angle-left"></i></a>
                                </li>';
                }
                ?>
                <li class="page-item">
                    <a class="page-link <?php echo ($current_page == 1) ? 'active' : '' ?>" href="index.php?action=Shop&page=1<?php echo $url ?>">1</a>
                </li>
                <?php
                if ($page >= 1 && $current_page <= $page) {
                    $i = max(2, $current_page - 1);
                    if ($i > 2)
                        echo '<li class="page-item">...</li>';
                    for (; $i < min($current_page + 3, $page); $i++) {
                ?>
                        <li class="page-item"><a class="page-link <?php echo ($current_page == $i) ? 'active' : '' ?>" href="index.php?action=Shop&page=<?php echo $i ?><?php echo $url ?>"><?php echo $i ?></a></li>
                <?php
                    }
                    if ($i != $page)
                        echo '<li class="page-item">...</li>';
                }
                ?>
                <li class="page-item">
                    <a class="page-link <?php echo ($current_page == $page) ? 'active' : '' ?>" href="index.php?action=Shop&page=<?php echo $page ?><?php echo $url ?>"><?php echo $page ?></a>
                </li>
                <?php
                if ($current_page < $page && $page > 1) {
                    echo '<li class="page-item">
                                    <a class="page-link" href="index.php?action=Shop&page=' . ($current_page + 1) . $url. '"><i class="fas fa-angle-right"></i></a>
                                </li>  ';
                }
                ?>
            </ul>
        </nav>
    </div>
</div>