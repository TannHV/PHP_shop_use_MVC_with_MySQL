<title>Admin All Product</title>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">All Type</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item">DataBase</li>
                <li class="breadcrumb-item active">Type</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fab fa-product-hunt me-1"></i>
                    All Type
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>IdType</th>
                                    <th>NameType</th>
                                    <th>IdMenu</th>
                                    <th>NameMenu</th>
                                    <th>LinkMenu</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>IdType</th>
                                    <th>NameType</th>
                                    <th>IdMenu</th>
                                    <th>NameMenu</th>
                                    <th>LinkMenu</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                $ad = new admin();
                                $Type = $ad->getAllProductType();
                                while ($result = $Type->fetch()) :
                                ?>
                                    <tr>
                                        <td><?php echo $result['maloai']; ?></td>
                                        <td><?php echo $result['tenloai']; ?></td>
                                        <td><?php echo $result['idmenu']; ?></td>
                                        <td><?php echo $result['name']; ?></td>
                                        <td><?php echo $result['link']; ?></td>
                                        <td>
                                            <a name="" id="" class="btn btn-primary mb-2 text-center" href="index.php?action=Admin&act=edittype&id=<?php echo $result['maloai'] ?>">Edit</a>
                                            <a name="" id="" class="btn btn-danger mb-2 text-center" href="index.php?action=Product&act=deleteType&id=<?php echo $result['maloai'] ?>">Detele</a>
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