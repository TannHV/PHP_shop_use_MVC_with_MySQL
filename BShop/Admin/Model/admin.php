<?php

class admin
{

    public function __construct()
    {
    }

    public function getAllProductType()
    {
        $db  = new connect();
        $select = "select loai.*,menu.name,menu.link FROM loai, menu where loai.idmenu = menu.idmenu ORDER BY loai.maloai ASC";
        $result = $db->getList($select);
        return $result;
    }

    public function getSingleProductType($maloai)
    {
        $db  = new connect();
        $select = "select * FROM loai where maloai = $maloai ";
        $result = $db->getInstance($select);
        return $result;
    }

    public function getAllProductMenu()
    {
        $db  = new connect();
        $select = "select * FROM  menu ";
        $result = $db->getList($select);
        return $result;
    }
    public function getProductType($maloai)
    {
        $db  = new connect();
        $select = "select hanghoa.maloai,tenloai FROM hanghoa,loai WHERE hanghoa.maloai = loai.maloai AND hanghoa.maloai = '" . $maloai . "';";
        $result = $db->getInstance($select);
        return $result;
    }
    public function getProductSingle($id)
    {
        $db  = new connect();
        $select = "select * FROM hanghoa WHERE mahh  = $id;";
        $result = $db->getInstance($select);
        return $result;
    }
    public function createProduct($data)
    {
        $date = new DateTime();
        $ngay = $date->format("Y-m-d");
        $db  = new connect();
        $query = "insert INTO hanghoa (tenhh, dongia, giamgia, hinh, maloai, dacbiet, soluongton,soluotxem, ngaylap ,thoihan, mota)
        VALUES  ('" . $data['tenhh'] . "'," . $data['dongia'] . "," . $data['giamgia'] . ", '" . $data['hinh'] . "', " . $data['maloai'] . "," . $data['dacbiet'] . ",  " . $data['soluongton'] . ",0,'$ngay', '" . $data['thoihan'] . "', '" . $data['mota'] . "') ";
        // echo $query;
        $db->Exec($query);
    }
    public function updateProduct($id, $data)
    {
        $db  = new connect();
        $query = "update hanghoa
        SET tenhh =  '" . $data['tenhh'] . "',
            dongia = " . $data['dongia'] . ",
            giamgia =  " . $data['giamgia'] . ",
            hinh = '" . $data['hinh'] . "',
            maloai = " . $data['maloai'] . ",
            dacbiet =  " . $data['dacbiet'] . ",
            soluongton =  " . $data['soluongton'] . ",
            soluotxem =  " . $data['soluongton'] . ",
            thoihan = ' " . $data['thoihan'] . "',
            mota = '" . $data['mota'] . "'
        WHERE mahh = $id;
        ";
        // echo $query;
        $db->Exec($query);
    }
    public function deleteProduct($id)
    {
        $db  = new connect();
        $query = "delete FROM hanghoa WHERE mahh = $id ";
        $db->Exec($query);
    }

    public function createType($tenloai, $idmenu)
    {
        $db  = new connect();
        $query = "insert INTO loai (maloai, tenloai, idmenu)
        VALUES (NULL, '$tenloai', $idmenu);";
        // echo $query;
        $db->Exec($query);
    }
    public function updateType($id, $tenloai, $idmenu)
    {
        $db  = new connect();
        $query = "
        UPDATE loai
        SET tenloai = '$tenloai',
            idmenu = $idmenu
        WHERE maloai = $id;
        ";
        // echo $query;
        $db->Exec($query);
    }
    public function deleteType($id)
    {
        $db  = new connect();
        $query = "delete FROM loai
        WHERE maloai = $id;";
        $db->Exec($query);
    }
    public function getAllMainOrder()
    {
        $db  = new connect();
        $select = "select hoadon.*,khachhang.tenkh,khachhang.email FROM hoadon,khachhang WHERE hoadon.makh = khachhang.makh ORDER by hoadon.masohd ASC";
        $result = $db->getList($select);
        return $result;
    }
    public function getAllTempOrder()
    {
        $db  = new connect();
        $select = "select hoadon_temp.*,khachhang_temp.tenkh,khachhang_temp.email FROM hoadon_temp,khachhang_temp WHERE hoadon_temp.makh = khachhang_temp.makh ORDER by hoadon_temp.masohd ASC";
        $result = $db->getList($select);
        return $result;
    }
    public function getBillDetail($masohd)
    {
        $db = new connect();
        $select = "select * FROM cthoadon,hanghoa where masohd = $masohd and cthoadon.mahh = hanghoa.mahh ";
        $result = $db->getList($select);
        return $result;
    }

    public function getAllUser()
    {
        $db = new connect();
        $select = "select *  FROM khachhang ";
        $result = $db->getList($select);
        return $result;
    }

    public function getSingleUser($makh)
    {
        $db  = new connect();
        $select = "select * FROM khachhang WHERE makh  = $makh ;";
        $result = $db->getInstance($select);
        return $result;
    }

    public function getSingleOrder($masohd)
    {
        $db  = new connect();
        $select = "select * FROM hoadon WHERE masohd  = $masohd ;";
        $result = $db->getInstance($select);
        return $result;
    }



    function updateOrder($masohd, $makh, $ngaydat, $tongtien, $tinhtrang)
    {
        $db  = new connect();
        $query = "update hoadon SET makh= $makh, ngaydat='$ngaydat', tongtien=$tongtien, tinhtrang='$tinhtrang' WHERE masohd=$masohd";
        // echo $query;
        $db->Exec($query);
    }

    public function deleteOrder($masohd)
    {
        $db  = new connect();
        $query = "DELETE FROM cthoadon WHERE masohd = $masohd;";
        $db->Exec($query);
        $query = "DELETE FROM hoadon WHERE masohd = $masohd;";
        $db->Exec($query);
    }

    public function getBillDetailTemp($masohd)
    {
        $db = new connect();
        $select = "select * FROM cthoadon_temp,hanghoa where masohd = $masohd and cthoadon_temp.mahh = hanghoa.mahh ";
        $result = $db->getList($select);
        return $result;
    }

    public function getSingleOrderTemp($masohd)
    {
        $db  = new connect();
        $select = "select * FROM hoadon_temp WHERE masohd  = $masohd ;";
        $result = $db->getInstance($select);
        return $result;
    }



    function updateOrderTemp($masohd, $makh, $ngaydat, $tongtien, $tinhtrang)
    {
        $db  = new connect();
        $query = "update hoadon_temp SET makh= $makh, ngaydat='$ngaydat', tongtien=$tongtien, tinhtrang='$tinhtrang' WHERE masohd=$masohd";
        // echo $query;
        $db->Exec($query);
    }

    public function deleteOrderTemp($masohd)
    {
        $db  = new connect();
        $query = "DELETE FROM cthoadon_temp WHERE masohd = $masohd;";
        $db->Exec($query);
        $query = "DELETE FROM hoadon_temp WHERE masohd = $masohd;";
        $db->Exec($query);
    }

    public function getAllUserTemp()
    {
        $db = new connect();
        $select = "select *  FROM khachhang_temp ";
        $result = $db->getList($select);
        return $result;
    }

    public function getCountBuyTem($makh)
    {
        $db  = new connect();
        $select = "SELECT COUNT(masohd) as countbuy FROM hoadon_temp WHERE makh =$makh ";
        $result = $db->getInstance($select);
        return $result['countbuy'];
    }

    function updateUser($makh, $tenkh, $email, $diachi, $sodienthoai, $vaitro)
    {
        $db  = new connect();
        $query = "UPDATE khachhang SET tenkh='$tenkh', email='$email', diachi='$diachi', sodienthoai='$sodienthoai', vaitro= '$vaitro' WHERE makh=$makh";
        // echo $query;
        $db->Exec($query);
    }

    public function deleteUser($makh)
    {
        $db  = new connect();
        // $query = "DELETE FROM cthoadon,hoadon WHERE makh = $makh";
        // $db->Exec($query);
        // $query = "DELETE FROM danhgia WHERE makh = $makh;";
        // $db->Exec($query);
        // $query = "DELETE FROM binhluan WHERE makh = $makh;";
        // $db->Exec($query);
        $query = "DELETE FROM khachhang WHERE makh = $makh;";
        $db->Exec($query);
    }
    function UpdatePass($id, $matkhau)
    {
        $db = new connect();
        $query = "update khachhang set matkhau='$matkhau' where makh='$id'";
        // echo $query;
        $db->exec($query);
    }
    public function getUserSingle($id)
    {
        $db = new connect();
        $select = "select * FROM khachhang WHERE makh  = $id;";
        $result = $db->getInstance($select);
        return $result;
    }

    public function getAllComments()
    {
        $db = new connect();
        $select = "select binhluan.*,khachhang.tenkh,hanghoa.tenhh FROM binhluan,khachhang,hanghoa WHERE  binhluan.mahh = hanghoa.mahh and binhluan.makh = khachhang.makh";
        $result = $db->getList($select);
        return $result;
    }

    public function getAllRating()
    {
        $db = new connect();
        $select = "select danhgia.*,khachhang.tenkh,hanghoa.tenhh FROM danhgia,khachhang,hanghoa WHERE  danhgia.mahh = hanghoa.mahh and danhgia.makh = khachhang.makh";
        // echo $select;
        $result = $db->getList($select);
        return $result;
    }
    public function getSingleRating($madg)
    {
        $db = new connect();
        $select = "SELECT * FROM `danhgia` WHERE madg = $madg";
        // echo $select;
        $result = $db->getInstance($select);
        return $result['mahh'];
    }
    public function deleteComment($id)
    {
        $db  = new connect();
        $query = "delete FROM binhluan WHERE mabl = $id ";
        $db->Exec($query);
    }
    public function deleteRating($id)
    {
        $db  = new connect();
        $query = "delete FROM danhgia WHERE madg = $id ";
        $db->Exec($query);
    }
}
