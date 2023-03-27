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
                    All Rating
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>ID Rate</th>
                                    <th>ID User</th>
                                    <th>Name User</th>
                                    <th>ID Product</th>
                                    <th>Name Product</th>
                                    <th>Date Rating</th>
                                    <th>Rating</th>
                                    <th>Content</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID Rate</th>
                                    <th>ID User</th>
                                    <th>Name User</th>
                                    <th>ID Product</th>
                                    <th>Name Product</th>
                                    <th>Date Rating</th>
                                    <th>Rating</th>
                                    <th>Content</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                $ad = new admin();
                                $user = $ad->getAllRating();
                                while ($result = $user->fetch()) :
                                ?>
                                    <tr>
                                        <td><?php echo $result['madg']; ?></td>
                                        <td><?php echo $result['makh']; ?></td>
                                        <td><?php echo $result['tenkh']; ?></td>
                                        <td><?php echo $result['mahh']; ?></td>
                                        <td><?php echo $result['tenhh']; ?></td>
                                        <td><?php echo $result['ngaydg']; ?></td>
                                        <td>
                                            <span class="star mb-0">
                                                <?php
                                                for ($i = 0; $i < 5; $i++) {
                                                    if ($i < $result['rate']) {
                                                        echo '&#xf005;';
                                                    } else {
                                                        echo '&#xf006;';
                                                    }
                                                }
                                                ?>
                                            </span>
                                        </td>
                                        <td><?php echo $result['noidung']; ?></td>

                                        <td>
                                            <a name="" id="" class="btn btn-danger mb-2 text-center" href="index.php?action=Product&act=deleterating&id=<?php echo $result['madg'] ?>">Detele</a>
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

    <style>
        span.star {
            font-family: 'FontAwesome', 'Second Font name';
            color: #fcd303;
        }
    </style>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet" />