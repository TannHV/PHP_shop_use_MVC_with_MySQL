<title>Admin Edit Type</title>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Add Type</h1>
            <div class="card mb-4">
                <form action="index.php?action=Product&act=createType" method="POST">
                    <div class="form-check mt-3 p-2">
                        <label for="name">Name Type:</label>
                        <input class="form-control" type="text" name="nametype" value="" required>
                    </div>

                    <div class="form-check  p-2">
                        <label for="Type">For Menu:</label>
                        <select class="form-select" aria-label="Default select example" name="idmenu" required>
                            <?php
                            $ad = new admin();
                            $select = $ad->getAllProductMenu();
                            while ($option = $select->fetch()) :
                            ?>
                                <option value="<?php echo $option['idmenu'] ?>"><?php echo $option['name'] ?></option>
                            <?php
                            endwhile;
                            ?>
                        </select>
                    </div>

                    <div class="text-center mt-4 mb-2 pb-2">
                        <button type="submit" class="btn btn-primary w-50">Add Type</button>
                    </div>
                </form>

            </div>
        </div>
        <div class="container-fluid px-4">
            <h4 class="mt-2">Import file</h4>
            <div class="card mb-4">
                <div class="card-body">
                    <form action="index.php?action=Product&act=import_type" method="post" enctype="multipart/form-data">
                        <div class="form-group mb-3">
                            <label for="exampleInputEmail1">Choose file import</label>
                            <input type="file" name="file" class="form-control w-100" id="exampleInputEmail1" aria-describedby="emailHelp" required  accept=".csv" >
                            <button type="submit" name="submit_file" class="btn btn-success mt-4">IMPORT</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>