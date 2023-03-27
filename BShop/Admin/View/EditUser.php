<title>Admin Edit User</title>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">User</h1>
            <div class="card mb-4">
                <?php
                $mahh = $_GET['id'];
                $ad = new admin();
                $user  = $ad->getSingleUser($mahh);
                ?>
                <form action="index.php?action=User&act=UpdateUser" method="POST">
                    <div class="form-check mt-3 p-2">
                        <label for="name">ID User:</label>
                        <input class="form-control" type="text" name="makh" value="<?php echo $user['makh'] ?>" required readonly>
                    </div>
                    <div class="form-check mt-3 p-2">
                        <label for="name">Name User:</label>
                        <input class="form-control" type="text" name="tenkh" value="<?php echo $user['tenkh'] ?>" required>
                    </div>
                    <div class="form-check mt-3 p-2">
                        <label for="name">Email User:</label>
                        <input class="form-control" type="email" name="email" value="<?php echo $user['email'] ?>" required>
                    </div>
                    <div class="form-check mt-3 p-2">
                        <label for="name">Address User:</label>
                        <input class="form-control" type="text" name="diachi" value="<?php echo $user['diachi'] ?>" required>
                    </div>
                    <div class="form-check mt-3 p-2">
                        <label for="name">NumberPhone:</label>
                        <input class="form-control" type="text" name="sodienthoai" value="<?php echo $user['sodienthoai'] ?>" required="[0-9]{10}" onKeyPress="if(this.value.length==10) return false;">
                    </div>
                    <div class="form-check mt-3 p-2">
                        <label for="Type">Role:</label>
                        <select class="form-select" aria-label="Default select example" name="vaitro" required>
                            <option <?php echo ($user['vaitro'] == '1') ? "selected" : "" ?> value="1"> Admin</option>
                            <option <?php echo ($user['vaitro'] == '0') ? "selected" : "" ?> value="0">User</option>
                        </select>
                    </div>
                    <div class="text-center mt-4 mb-2 pb-2">
                        <button type="submit" class="btn btn-primary w-50">Update User</button>
                    </div>
                </form>

            </div>
        </div>

    </main>