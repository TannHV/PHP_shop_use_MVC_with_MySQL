<title>Admin Detail Order</title>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Detail Order</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item">DataBase</li>
                <li class="breadcrumb-item "><a href="index.php?ation=Admin&act=allorderMain">Order</a></li>
                <li class="breadcrumb-item active">#<?php echo $_GET['id'] ?></li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fab fa-order-hunt me-1"></i>
                    Detail Order
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Id Order</th>
                                    <th>Name Product</th>
                                    <th>ID Product</th>
                                    <th>Duration</th>
                                    <th>Price</th>
                                    <th>Discount</th>
                                    <th>Quantity</th>
                                    <th>Total</th>

                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Id Order</th>
                                    <th>Name Product</th>
                                    <th>ID Product</th>
                                    <th>Duration</th>
                                    <th>Price</th>
                                    <th>Discount</th>
                                    <th>Quantity</th>
                                    <th>Total</th>

                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                $masohd = $_GET['id'];
                                $ad = new admin();
                                $Order = $ad->getBillDetail($masohd);
                                while ($result = $Order->fetch()) :
                                ?>
                                    <tr>
                                        <td><?php echo $result['masohd'] ?></td>
                                        <td><?php echo $result['tenhh'] ?></td>
                                        <td><?php echo $result['mahh'] ?></td>

                                        <td><?php echo $result['thoihan'] ?></td>
                                        <td><?php echo $result['dongia'] ?></td>
                                        <td><?php echo $result['giamgia'] ?></td>
                                        <td><?php echo $result['soluongmua'] ?></td>
                                        <td><?php echo $result['thanhtien'] ?></td>
                                    </tr>
                                <?php
                                endwhile;
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </main>