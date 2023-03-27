<?php
if (isset($_GET['act'])) {
    switch ($_GET['act']) {
        case 'addwishlist':
            $mahh = $_GET['id'];
            if (isset($_POST['makh']) && $_POST['makh'] != -1) {
                $makh = $_POST['makh'];
                $kt = new user();
                $check = $kt->ExistWishlist($makh, $mahh);
                if (!$check) {
                    $us  = new user();
                    $us->InsertWishlistItem($makh, $mahh);
                    if (!$us) {
                        echo "<script>alert('Thêm sẳn phẩm không thành công')</script>";
                    } else {
                        echo "<script>alert('Thêm sẳn phẩm thành công')</script>";
                    }
                } else {
                    echo "<script>alert('Sẳn phẳm đã có trong danh sách yêu thích của bạn')</script>";
                }
                include './View/DetailsProduct.php';
            } else {
                echo "<script>alert('Bạn cần đăng nhập để thêm sẳn phẳm yêu thích')</script>";
                echo '<meta http-equiv="refresh" content= "0; url=./index.php?action=User&act=login"/>';
            }
            break;
        case 'comment':
            $usr = new User();
            $mahh = $_GET['id'];
            $makh = $_POST['makh'];
            $noidung = $_POST['comment'];
            $usr->insertcomment($mahh, $makh, $noidung);
            echo "<script>alert('comment thành công')</script>";
            include './View/DetailsProduct.php';
            break;
        case 'rating':
            $usr = new User();
            $mahh = $_GET['id'];
            $makh = $_POST['makh'];
            $noidung = $_POST['comment'];
            $rate = $_POST['number_rating'];
            $usr->insertRate($mahh, $makh, $noidung,$rate);
            
            echo "<script>alert('rating thành công')</script>";
            include './View/DetailsProduct.php';
            break;
    }
} else {
    include './View/DetailsProduct.php';
}
