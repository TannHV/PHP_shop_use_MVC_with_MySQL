<title>Admin All Order</title>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">All Order</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item">DataBase</li>
                <li class="breadcrumb-item active">Order</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fab fa-order-hunt me-1"></i>
                    All Order
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Id Order</th>
                                    <th>Name User</th>
                                    <th>Email User</th>
                                    <th>Date Order</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Details</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Id Order</th>
                                    <th>Name User</th>
                                    <th>Email User</th>
                                    <th>Date Order</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Details</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                $ad = new admin();
                                $Order = $ad->getAllTempOrder();
                                while ($result = $Order->fetch()) :
                                ?>
                                    <tr>
                                        <td><?php echo $result['masohd'] ?></td>
                                        <td><?php echo $result['tenkh'] ?></td>
                                        <td><?php echo $result['email'] ?></td>
                                        <td><?php echo $result['ngaydat'] ?></td>
                                        <td><?php echo $result['tongtien'] ?></td>
                                        <td><?php echo $result['tinhtrang'] ?></td>
                                        <td><a name="" id="" class="btn btn-warning " href="index.php?action=Product&act=orderDetailTemp&id=<?php echo $result['masohd'] ?>">Details</a></td>
                                        <td>
                                            <a name="" id="" class="btn btn-primary mb-2 text-center" href="index.php?action=Product&act=editOrderTemp&id=<?php echo $result['masohd'] ?>">Edit</a>
                                            <button name="" id="" class="btn btn-danger mb-2 text-center" onclick="AskBeforeDeleteTemp(<?php echo $result['masohd'] ?>)">Detele</button>
                                        </td>
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