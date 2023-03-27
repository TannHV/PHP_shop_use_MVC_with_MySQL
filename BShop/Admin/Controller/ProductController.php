<?php
if (isset($_GET['act'])) {
    switch ($_GET['act']) {
        case 'editPr':
            if (isset($_POST['mahh'])) {
                $ad = new admin();
                $uploadCheck = true;
                $mahh  = $_POST['mahh'];
                $image = $_FILES['image'];

                $target_dir = "../assets/img/sanpham";
                $target_image = $target_dir . "/" . basename($image['name']);
                $name_image = basename($image['name']);
                $imageFileType = strtolower(pathinfo($target_image, PATHINFO_EXTENSION));

                if ($name_image == "") {
                    $prodc = $ad->getProductSingle($mahh);
                    $name_image = $prodc['hinh'];
                } else {
                    if ($image["size"] > 500000) {
                        echo "<script>alert('Sorry, your file is too large.')</script>";
                        $uploadCheck = false;
                    }

                    if (
                        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                        && $imageFileType != "gif"
                    ) {
                        echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.')</script>";
                        $uploadCheck = false;
                    }

                    if ($uploadCheck == false) {
                        echo "<script>alert('Sorry, your file was not uploaded.')</script>";
                    } else {
                        move_uploaded_file($image["tmp_name"], $target_image);
                    }
                }
                if ($uploadCheck) {
                    $dacbiet =  $_POST['discount'] > 0 ? 1 : 0;
                    $product = array(
                        'tenhh' => $_POST['name'],
                        'dongia' => $_POST['price'],
                        'giamgia' => $_POST['discount'],
                        'hinh' => $name_image,
                        'maloai' => $_POST['Type'],
                        'dacbiet' => $dacbiet,
                        'soluongton' => $_POST['quantity'],
                        'soluotxem' => $_POST['view'],
                        'thoihan' => $_POST['duration'],
                        'mota' => $_POST['description']
                    );
                    $ad->updateProduct($mahh, $product);
                    echo "<script>alert('Update product success')</script>";
                    echo '<meta http-equiv="refresh" content= "0; url=./index.php?ation=Admin&act=allproduct"/>';
                } else {
                    echo "<script>alert('Product update fail')</script>";
                    include "./View/EditProduct.php";
                }
            }
            break;
        case 'createPr':
            $ad = new admin();

            $uploadCheck = true;
            $image = $_FILES['image'];

            $target_dir = "../assets/img/sanpham";
            $target_image = $target_dir . "/" . basename($image['name']);
            $name_image = basename($image['name']);
            $imageFileType = strtolower(pathinfo($target_image, PATHINFO_EXTENSION));

            if ($image["size"] > 500000) {
                echo "<script>alert('Sorry, your file is too large.')</script>";
                $uploadCheck = false;
            }

            if (
                $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif"
            ) {
                echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.')</script>";
                $uploadCheck = false;
            }

            if ($uploadCheck == false) {
                echo "<script>alert('Sorry, your file was not uploaded.')</script>";
            } else {
                move_uploaded_file($image["tmp_name"], $target_image);
            }

            $dacbiet =  $_POST['discount'] > 0 ? 1 : 0;
            $product = array(
                'tenhh' => $_POST['name'],
                'dongia' => $_POST['price'],
                'giamgia' => $_POST['discount'],
                'hinh' => $name_image,
                'maloai' => $_POST['Type'],
                'dacbiet' => $dacbiet,
                'soluongton' => $_POST['quantity'],
                'soluotxem' => $_POST['view'],
                'thoihan' => $_POST['duration'],
                'mota' => $_POST['description']
            );
            $ad->createProduct($product);
            echo "<script>alert('Add product success')</script>";
            echo '<meta http-equiv="refresh" content= "0; url=./index.php?ation=Admin&act=allproduct"/>';

            break;
        case 'deletePr':
            if (isset($_GET['id'])) {
                $mahh  = $_GET['id'];
                $ad = new admin();
                $pr = $ad->getProductSingle($mahh);
                if ($pr) {
                    $ad->deleteProduct($mahh);
                    echo "<script>alert('Delete product Success')</script>";
                    include "./View/AllProduct.php";
                } else {
                    echo "<script>alert('Product not exists')</script>";
                    include "./View/AllProduct.php";
                }
            } else {
                echo "<script>alert('Delete product Fail')</script>";
                include "./View/AllProduct.php";
            }
            break;

        case 'createType':
            if (isset($_POST['nametype'])) {
                $tenloai = $_POST['nametype'];
                $idmenu = $_POST['idmenu'];
                $ad = new admin();
                $ad->createType($tenloai, $idmenu);
                echo "<script>alert('Add type sussec')</script>";
                echo '<meta http-equiv="refresh" content= "0; url=./index.php?ation=Admin&act=addtype"/>';
                include "./View/AllType.php";
            }
            break;

        case 'editType':
            if (isset($_POST['maloai'])) {
                $maloai = $_POST['maloai'];
                $tenloai = $_POST['nametype'];
                $idmenu = $_POST['idmenu'];
                $ad = new admin();
                $type = $ad->getSingleProductType($maloai);
                if ($type) {
                    $ad->updateType($maloai, $tenloai, $idmenu);
                    echo "<script>alert('Edit type success')</script>";
                    echo '<meta http-equiv="refresh" content= "0; url=./index.php?ation=Admin&act=addtype"/>';
                } else {
                    echo "<script>alert('Edit type fail')</script>";
                    include "./View/AllType.php";
                }
            }
            break;
        case 'deleteType':
            if (isset($_GET['id'])) {
                $maloai  = $_GET['id'];
                $ad = new admin();
                $type = $ad->getSingleProductType($maloai);
                if ($type) {
                    $ad->deleteType($maloai);
                    echo "<script>alert('Delete type Success')</script>";
                    echo '<meta http-equiv="refresh" content= "0; url=./index.php?ation=Admin&act=alltype"/>';
                } else {
                    echo "<script>alert('Type not exists')</script>";
                    include "./View/AllType.php";
                }
            } else {
                echo "<script>alert('Delete type Fail')</script>";
                include "./View/AllType.php";
            }
            break;
        case 'orderDetail':
            include "./View/OrderDetail.php";
            break;
        case 'editOrder':
            include "./View/EditOrder.php";
            break;
        case 'UpdateOrder':
            if (isset($_POST['masohd']) && isset($_POST['makh'])) {
                $masohd = $_POST['masohd'];
                $makh = $_POST['makh'];

                $date_string = $_POST['ngaydat'];
                $ngaydat = date('Y-m-d H:i:s', strtotime($date_string));
                $tongtien = $_POST['tongtien'];
                $tinhtrang = $_POST['tinhtrang'];
                $ad = new admin();
                $order  = $ad->getSingleOrder($masohd);
                if ($order) {
                    $ad->updateOrder($masohd, $makh, $ngaydat, $tongtien, $tinhtrang);
                    echo "<script>alert('Update order success')</script>";
                    echo '<meta http-equiv="refresh" content= "0; url=./index.php?ation=Admin&act=allorderMain"/>';
                } else {
                    echo "<script>alert('Update order fail')</script>";
                    include "./View/AllOrderMain.php";
                }
            }
            break;
        case 'deleteOrder':
            if (isset($_GET['id'])) {
                $masohd  = $_GET['id'];
                $ad = new admin();
                $type = $ad->getSingleOrder($masohd);
                if ($type) {
                    $ad->deleteOrder($masohd);
                    echo "<script>alert('Delete order Success')</script>";
                    echo '<meta http-equiv="refresh" content= "0; url=./index.php?ation=Admin&act=allorderMain"/>';
                } else {
                    echo "<script>alert('Order not exists')</script>";
                    include "./View/AllOrderMain.php";
                }
            } else {
                echo "<script>alert('Delete order Fail')</script>";
                include "./View/AllOrderMain.php";
            }
            break;
        case 'orderDetailTemp':
            include "./View/orderDetailTemp.php";
            break;
        case 'editOrderTemp':
            include "./View/EditOrderTemp.php";
            break;
        case 'UpdateOrderTemp':
            if (isset($_POST['masohd']) && isset($_POST['makh'])) {
                $masohd = $_POST['masohd'];
                $makh = $_POST['makh'];

                $date_string = $_POST['ngaydat'];
                $ngaydat = date('Y-m-d H:i:s', strtotime($date_string));
                $tongtien = $_POST['tongtien'];
                $tinhtrang = $_POST['tinhtrang'];
                $ad = new admin();
                $order  = $ad->getSingleOrderTemp($masohd);
                if ($order) {
                    $ad->updateOrderTemp($masohd, $makh, $ngaydat, $tongtien, $tinhtrang);
                    echo "<script>alert('Update order success')</script>";
                    echo '<meta http-equiv="refresh" content= "0; url=./index.php?ation=Admin&act=allorderTemp"/>';
                } else {
                    echo "<script>alert('Update order fail')</script>";
                    include "./View/AllOrderMain.php";
                }
            }
            break;
        case 'deleteOrderTemp':
            if (isset($_GET['id'])) {
                $masohd  = $_GET['id'];
                $ad = new admin();
                $type = $ad->getSingleOrderTemp($masohd);
                if ($type) {
                    $ad->deleteOrderTemp($masohd);
                    echo "<script>alert('Delete order Success')</script>";
                    echo '<meta http-equiv="refresh" content= "0; url=./index.php?ation=Admin&act=allorderMain"/>';
                } else {
                    echo "<script>alert('Order not exists')</script>";
                    include "./View/AllOrderMain.php";
                }
            } else {
                echo "<script>alert('Delete order Fail')</script>";
                include "./View/AllOrderMain.php";
            }
            break;
        case 'import_type':
            if (isset($_POST['submit_file'])) {
                $file = $_FILES['file']['tmp_name'];

                file_put_contents($file, str_replace("\xEF\xBB\xBF", "", file_get_contents($file)));
                $file_open = fopen($file, "r");
                while (($csv = fgetcsv($file_open, 1000, ",")) !== false) {
                    $db = new connect();
                    $maloai = $csv[0];
                    $tenloai = $csv[1];
                    $idmenu = $csv[2];
                    $query = "insert into loai(maloai,tenloai,idmenu) values($maloai,'$tenloai',$idmenu)";
                    // echo $query;
                    $db->exec($query);
                }
                echo '<script>alert ("import success!")</script>';
                include './View/AddType.php';
            }
            break;
        case 'deletecomnent':
            if (isset($_GET['id'])) {
                $ad = new admin();
                $ad->deleteComment($_GET['id']);
                echo "<script>alert('Delete Commetent Success')</script>";
                echo '<meta http-equiv="refresh" content= "0; url=./index.php?ation=Admin&act=allcomment"/>';
            }
            break;
        case 'deleterating':
            if (isset($_GET['id'])) {
                $ad = new admin();
                $hh = new hanghoa();
                $mahh = $ad->getSingleRating($_GET['id']);
                $countRating = $hh->getRate($mahh);
                $ad->deleteRating($_GET['id']);

                echo "<script>alert('Delete Commetent Success')</script>";
                echo '<meta http-equiv="refresh" content= "0; url=./index.php?ation=Admin&act=allrating"/>';
            }
            break;
    }
}
