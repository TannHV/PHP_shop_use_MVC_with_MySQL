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
                    All User
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>ID User</th>
                                    <th>Name User</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Balance</th>
                                    <th>Phone</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID User</th>
                                    <th>Name User</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Balance</th>
                                    <th>Phone</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                $ad = new admin();
                                $user = $ad->getAllUser();
                                while ($result = $user->fetch()) :
                                ?>
                                    <tr>
                                        <td><?php echo $result['makh']; ?></td>
                                        <td><?php echo $result['tenkh']; ?></td>
                                        <td><?php echo $result['email']; ?></td>
                                        <td><?php echo $result['diachi']; ?></td>
                                        <td><?php echo number_format($result['sodu']); ?></td>
                                        <td><?php echo $result['sodienthoai']; ?></td>
                                        <td>
                                            <?php
                                            switch ($result['vaitro']):
                                                case 0:
                                                    echo 'User';
                                                    break;
                                                case 1:
                                                    echo 'Admin';
                                                    break;
                                            endswitch;
                                            ?>
                                        </td>
                                        <td>
                                            <a name="" id="" class="btn btn-primary mb-2 text-center" href="index.php?action=User&act=EditUser&id=<?php echo $result['makh']; ?>">Edit</a>
                                            <a name="" id="" class="btn btn-danger mb-2 text-center" href="">Detele</a>
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