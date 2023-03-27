<title>Blue Shop - Cart</title>
<div class="container mt-5 mb-5 cart">
    <?php
    if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) {
        echo '<script>setTimeout(NoProductInCart,1000);</script>';
    }
    if (isset($_GET['act'])) {
        if ($_GET['act'] == "update_cart") {
            echo "<script>UpdateItem();</script>";
            if (count($_SESSION['cart']) == 0) {
                echo '<script>setTimeout(NoProductInCart,2000);</script>';
            }
        }
    }

    ?>
    <h1>Cart</h1>
    <?php
    if (isset($_SESSION['cart'])) {
        $gh = new giohang();
        $CartTotal = $gh->CartTotal();
        $dis = $CartTotal > 0 ? '' : 'disabled';
    } else {
        $dis = '';
    }
    ?>
    <div class="row">
        <div class="col-sm-12 col-md-12 col-md-offset-1">
            <form action="index.php?action=Cart&act=update_cart" method="post">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="align-middle">Product</th>
                            <th class="align-middle">Quantity</th>
                            <th class="text-center align-middle">Price</th>
                            <th class="text-center align-middle">Discount</th>
                            <th class="text-center align-middle">Total</th>
                            <th colspan="2" class="text-right align-middle">
                                <button type='submit' name="" id="" class="btn btn-warning fw-bolder text-white <?php echo $dis ?>" href="#" role="button"><i class="bi bi-arrow-repeat"></i>Update</button>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($_SESSION['cart'] as $key => $item) : ?>
                            <tr>
                                <td class="col-sm-8 col-md-6">
                                    <div class="row">
                                        <div class="col-lg-4  col-md-12 col-sm-12">
                                            <a class="thumbnail pull-left" href="index.php?action=Details&id=<?php echo $item['mahh']; ?>">
                                                <img class="media-object" src="assets\img\sanpham\<?php echo $item['hinh'] ?>" style="width:100%">
                                            </a>
                                        </div>
                                        <div class=" col-lg-8 col-md-12 col-sm-12">
                                            <h4 class="media-heading"><a href="index.php?action=Details&id=<?php echo $item['mahh']; ?>"><?php echo $item['name'] ?></a></h4>
                                            <div class="row m-0 text-left">
                                                <div class="col-8  p-0 pt-2">
                                                    <h6>Thời hạn: <?php echo $item['thoihan'] ?></h6>
                                                </div>
                                                <?php if ($item['giamgia'] > 0) {
                                                ?>
                                                    <div class="col-4 giamgiacart">
                                                        <p class="text-white"><?php echo "-" . FLOOR(100 - ($item['giamgia'] / $item['dongia']) * 100) . '%' ?></p>
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
                                <td class="col-sm-1 col-md-1 pt-4 text-center align-middle">
                                    <input type="number" class="form-control" id="exampleInputEmail1" name="newqty[<?php echo $key ?>]" value="<?php echo $item['soluong'] ?>">
                                </td>
                                <td class="col-sm-1 col-md-1 text-center pt-4 align-middle">
                                    <strong>
                                        <?php echo number_format($item['dongia'], 2) ?><u>đ</u>
                                    </strong>
                                </td>
                                <td class="col-sm-1 col-md-1 text-center pt-4 align-middle">
                                    <strong>

                                        <?php
                                        if ($item['giamgia'] > 0) {
                                            echo '-' . number_format(($item['dongia'] - $item['giamgia']) * $item['soluong'], 2) . '<u>đ</u>';
                                        } else {
                                            echo 'No discount';
                                        }
                                        ?>
                                    </strong>
                                </td>
                                <td class="col-sm-1 col-md-1 text-center pt-4 align-middle">
                                    <strong>
                                        <?php echo number_format($item['total'], 2) ?><u>đ</u>
                                    </strong>
                                </td>
                                <td class="col-sm-1 col-md-1 text-right pt-4 align-middle">
                                    <button type="button" class="btn btn-danger deletebtn" onclick="AskBeforeDelete(<?php echo $key ?>)">
                                        <i class='fa fa-trash text-white'></i>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <tr class="text-right ">
                            <td colspan="3" class="align-middle pt-4">
                                <h4>Total</h4>
                            </td>
                            <td colspan="2" class="align-middle pt-4">
                                <h4>
                                    <strong>
                                        <?php
                                        $gh = new giohang();
                                        $tong =  $gh->getTotal();
                                        echo number_format($tong, 2);
                                        ?>đ
                                    </strong>
                                </h4>
                            </td>
                            <td>
                                <button name="" id="" class="btn btn-danger mt-2 fw-bolder text-white <?php echo $dis ?>" onclick="DeleteAll()" type="button">DeleteAll</button>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <a href='index.php?action=Shop' class="btn btn-secondary  text-left">
                                    <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping </a>
                            </td>
                            <td colspan="2" class="text-right">
                                <?php
                                if (isset($_SESSION['email']) && isset($_SESSION['makh'])) {
                                ?>
                                    Your Balance<br>
                                    
                                    <h4 class="<?php echo $_SESSION['sodu'] < $tong ? 'text-danger' : 'text-success' ?>"><?php echo number_format($_SESSION['sodu'], 2) . 'đ' ?></h4>
                                <?php
                                }
                                ?>
                            </td>
                            <td colspan="2" class="text-right">
                                <a class="btn btn-success w-100" <?php echo $dis ?> href="index.php?action=Order"> Checkout
                                    <i class='fas fa-cart-arrow-down'></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
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