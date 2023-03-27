<title>Admin Edit Product</title>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Add Product</h1>
            <div class="card mb-4">
                <form action="index.php?action=Product&act=createPr" method="POST" enctype="multipart/form-data">
                    <div class="form-check mt-3 p-2">
                        <label for="name">Name:</label>
                        <input class="form-control" type="text" name="name" value="" required>
                    </div>

                    <div class="form-check  p-2">
                        <label for="Type">Type:</label>
                        <select class="form-select" aria-label="Default select example" name="Type" required>
                            <?php
                            $ad = new admin();
                            $select = $ad->getAllProductType();
                            while ($option = $select->fetch()) :
                            ?>
                                <option value="<?php echo $option['maloai'] ?>"><?php echo $option['tenloai'] ?></option>
                            <?php
                            endwhile;
                            ?>
                        </select>
                    </div>

                    <div class="form-check p-2">
                        <label for="image">Image:</label>
                        <input class="form-control" type="file" name="image" value="" required  onchange="document.getElementById('reviewImage').src = window.URL.createObjectURL(this.files[0])"  accept=".jpg,.png,.jpeg">
                    </div>
                    <img id="reviewImage" class="rounded mx-auto d-block" alt="Review image" width="" src="../assets/img/sanpham/no-image.png" />
                    <div class="form-check p-2">
                        <label for="price">Price:</label>
                        <input class="form-control" type="number" name="price" value="" required>
                    </div>

                    <div class="form-check p-2">
                        <label for="discount">Discount:</label>
                        <input class="form-control" type="number" name="discount" value="" required>
                    </div>
                    <div class="form-check p-2">
                        <label for="quantity">Quantity:</label>
                        <input class="form-control" type="number" name="quantity" value="" required>
                    </div>
                    <div class="form-check p-2">
                        <label for="view">View:</label>
                        <input class="form-control" type="number" name="view" value="" required>
                    </div>
                    <div class="form-check p-2">
                        <label for="duration">Duration:</label>
                        <input class="form-control" type="text" name="duration" value="" required>
                    </div>

                    <div class="form-check p-2">
                        <label for="description">Description:</label>
                        <textarea class="form-control" name="description" rows="5" required></textarea>
                    </div>
                    <div class="text-center mt-4 mb-2 pb-2">
                        <button type="submit" class="btn btn-primary w-50">Add Product</button>
                    </div>
                </form>

            </div>
        </div>

    </main>