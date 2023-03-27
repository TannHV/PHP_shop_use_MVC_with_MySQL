<title>Admin Edit Product</title>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Product</h1>
            <div class="card mb-4">
                <?php
                $mahh = $_GET['id'];
                $ad = new admin();
                $product  = $ad->getProductSingle($mahh);
                ?>
                <form action="index.php?action=Product&act=editPr" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="mahh" value="<?php echo $mahh; ?>">
                    <div class="form-check p-2">
                        <label for="name">Name:</label>
                        <input class="form-control" type="text" name="name" value="<?php echo $product['tenhh']; ?>" required>
                    </div>
                    <div class="form-check  p-2">
                        <label for="Type">Type:</label>
                        <select class="form-select" aria-label="Default select example" name="Type" required>
                            <?php
                            $select = $ad->getAllProductType();
                            while ($option = $select->fetch()) :
                            ?>
                                <option <?php echo $option['maloai'] == $product['maloai'] ? 'selected' : ''; ?> value="<?php echo $option['maloai'] ?>"><?php echo $option['tenloai'] ?></option>
                            <?php
                            endwhile;
                            ?>
                        </select>
                    </div>
                    <div class="form-check p-2">
                        <label for="image">Image:</label>
                        <input class="form-control" type="file" name="image" value="../assets/img/sanpham/" onchange="document.getElementById('reviewImage').src = window.URL.createObjectURL(this.files[0])"  accept=".jpg,.png,.jpeg" > 
                    </div>
                    <img id="reviewImage"  class="rounded mx-auto d-block" alt="Review image" width="" src="../assets/img/sanpham/<?php echo $product['hinh'] ?>" />
                    <div class="form-check p-2">
                        <label for="price">Price:</label>
                        <input class="form-control" type="text" name="price" value="<?php echo $product['dongia']; ?>" required>
                    </div>
                    <div class="form-check p-2">
                        <label for="discount">Discount:</label>
                        <input class="form-control" type="text" name="discount" value="<?php echo $product['giamgia']; ?>" required>
                    </div>
                    <div class="form-check p-2">
                        <label for="quantity">Quantity:</label>
                        <input class="form-control" type="text" name="quantity" value="<?php echo $product['soluongton']; ?>" required>
                    </div>
                    <div class="form-check p-2">
                        <label for="view">View:</label>
                        <input class="form-control" type="text" name="view" value="<?php echo $product['soluotxem']; ?>" required>
                    </div>
                    <div class="form-check p-2">
                        <label for="duration">Duration:</label>
                        <input class="form-control" type="text" name="duration" value="<?php echo $product['thoihan']; ?>" required>
                    </div>
                    <div class="form-check p-2">
                        <label for="description">Description:</label>
                        <textarea class="form-control" name="description" rows="5" required><?php echo $product['mota']; ?></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary w-50">Update Product</button>
                </form>

            </div>
        </div>

    </main>