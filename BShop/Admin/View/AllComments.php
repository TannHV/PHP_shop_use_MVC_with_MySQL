<title>Admin All User</title>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">All User</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item">DataBase</li>
                <li class="breadcrumb-item active">User</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fab fa-user-hunt me-1"></i>
                    All Comments
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>ID Comment</th>
                                    <th>ID User</th>
                                    <th>Name User</th>
                                    <th>ID Product</th>
                                    <th>Name Product</th>
                                    <th>Date Comments</th>
                                    <th>Content</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID Comment</th>
                                    <th>ID User</th>
                                    <th>Name User</th>
                                    <th>ID Product</th>
                                    <th>Name Product</th>
                                    <th>Date Comments</th>
                                    <th>Content</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                $ad = new admin();
                                $user = $ad->getAllComments();
                                while ($result = $user->fetch()) :
                                ?>
                                    <tr>
                                        <td><?php echo $result['mabl']; ?></td>
                                        <td><?php echo $result['makh']; ?></td>
                                        <td><?php echo $result['tenkh']; ?></td>
                                        <td><?php echo $result['mahh']; ?></td>
                                        <td><?php echo $result['tenhh']; ?></td>
                                        <td><?php echo $result['ngaybl']; ?></td>
                                        <td><?php echo $result['noidung']; ?></td>
                                        <td>
                                            <a name="" id="" class="btn btn-danger mb-2 text-center" href="index.php?action=Product&act=deletecomnent&id=<?php echo $result['mabl'] ?>">Detele</a>
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