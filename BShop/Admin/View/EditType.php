<title>Admin Edit Type</title>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Edit Type</h1>
            <?php
            $maloai = $_GET['id'];
            $ad = new admin();
            $type = $ad->getSingleProductType($maloai);
            ?>

            <div class="card mb-4">
                <form action="index.php?action=Product&act=editType" method="POST">
                    <input type="hidden" name="maloai" value="<?php echo $type['maloai'] ?>">
                    <div class="form-check mt-3 p-2">
                        <label for="name">Name Type:</label>
                        <input class="form-control" type="text" name="nametype" value="<?php echo $type['tenloai'] ?>" required>
                    </div>

                    <div class="form-check  p-2">
                        <label for="Type">For Menu:</label>
                        <select class="form-select" aria-label="Default select example" name="idmenu" required>
                            <?php
                            $select = $ad->getAllProductMenu();
                            while ($option = $select->fetch()) :
                            ?>
                                <option <?php echo $type['idmenu'] == $option['idmenu'] ? 'selected' : ''; ?> value="<?php echo $option['idmenu'] ?>"><?php echo $option['name'] ?></option>
                            <?php
                            endwhile;
                            ?>
                        </select>
                    </div>
                    <div class="text-center mt-4 mb-2 pb-2">
                        <button type="submit" class="btn btn-primary w-50">Edit Type</button>
                    </div>
                </form>

            </div>
        </div>

    </main>