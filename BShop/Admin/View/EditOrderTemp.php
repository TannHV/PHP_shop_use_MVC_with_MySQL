<title>Admin Edit Order</title>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Edit Order</h1>
            <?php
            $maloai = $_GET['id'];
            $ad = new admin();
            $order = $ad->getSingleOrderTemp($maloai);
            ?>

            <div class="card mb-4">
                <form action="index.php?action=Product&act=UpdateOrderTemp" method="POST">
                    <div class="form-check mt-3 p-2">
                        <label for="name">ID order:</label>
                        <input class="form-control" type="text" name="masohd" value="<?php echo $order['masohd'] ?>" required readonly>
                    </div>
                    <div class="form-check mt-3 p-2">
                        <label for="name">ID user:</label>
                        <input class="form-control" type="text" name="makh" value="<?php echo $order['makh'] ?>" required readonly>
                    </div>
                    <div class="form-check mt-3 p-2">
                        <label for="name">Date Order:</label>
                        <input class="form-control" type="datetime-local" name="ngaydat" value="<?php echo $order['ngaydat'] ?>" required>
                    </div>
                    <div class="form-check mt-3 p-2">
                        <label for="name">Total:</label>
                        <input class="form-control" type="number" name="tongtien" value="<?php echo $order['tongtien'] ?>" required>
                    </div>
                    <div class="form-check mt-3 p-2">
                        <label for="Type">Status:</label>
                        <select class="form-select" aria-label="Default select example" name="tinhtrang" required>
                            <option <?php echo ($order['tinhtrang'] == 'Paid') ? "selected" : "" ?> value="Paid"> Paid</option>
                            <option <?php echo ($order['tinhtrang'] == 'UnPaid') ? "selected" : "" ?> value="UnPaid">UnPaid</option>
                            <option <?php echo ($order['tinhtrang'] == 'Fail') ? "selected" : "" ?> value="Fail">Fail</option>
                            <option <?php echo ($order['tinhtrang'] == 'Success') ? "selected" : "" ?> value="Success">Success</option>
                        </select>
                    </div>
                    <div class="text-center mt-4 mb-2 pb-2">
                        <button order="submit" class="btn btn-primary w-50">Update Order</button>
                    </div>
                </form>

            </div>
        </div>

    </main>