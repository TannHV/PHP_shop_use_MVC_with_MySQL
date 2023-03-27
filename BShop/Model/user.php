<?php
class user
{
    public function __construct()
    {
    }

    public function InsertUser($tenkh, $matkhau, $email, $diachi, $dt)
    {
        $db  = new connect();
        $query = "insert into khachhang(makh, tenkh, matkhau, email, diachi,sodu, sodienthoai, vaitro)values( NULL , '$tenkh','$matkhau', '$email' , '$diachi' ,0, '" . trim($dt) . "' , default)";
        echo $query;
        $db->exec($query);
    }

    public function ExistUser($email)
    {
        $db = new connect();
        $select = "select * FROM `khachhang` where email ='$email'";
        // echo $select;
        $result = $db->getInstance($select);
        return $result;
    }
    public function ExistUserDt($dt)
    {
        $db = new connect();
        $select = "select * FROM `khachhang` where sodienthoai ='$dt'";
        // echo $select;
        $result = $db->getInstance($select);
        return $result;
    }
    public function login($email, $pass)
    {
        $db = new connect();
        $select = "select * from khachhang where email = '$email' and matkhau ='$pass'";
        // echo $select;
        $result  = $db->getList($select);
        $set = $result->fetch();
        return $set;
    }



    public function getInfo($makh)
    {
        $db = new connect();
        $select = "select * FROM `khachhang` where makh = $makh";
        // echo $select;   
        $result = $db->getList($select);
        $set = $result->fetch();
        return $set;
    }

    public function ChangeInfo($makh, $tenkh, $email, $diachi, $dt)
    {
        $db  = new connect();
        $query = "update `khachhang`
        SET tenkh = '$tenkh', email = '$email', diachi = '$diachi',sodienthoai = '" . trim($dt) . "'
        WHERE makh = $makh;";
        // echo $query;
        $db->exec($query);
    }

    public function ChangePass($makh, $oldpass, $newpass)
    {
        $db  = new connect();
        $query = "update `khachhang`
        SET matkhau = '$newpass'
        WHERE makh = $makh and matkhau = '$oldpass';";
        echo $query;
        $db->exec($query);
    }

    public function InsertWishlistItem($makh, $mahh)
    {
        $db  = new connect();
        $query = "insert into spyeuthich(makh,mahh)values($makh,$mahh)";
        // echo $query;
        $db->exec($query);
    }

    public function ExistWishlist($makh, $mahh)
    {
        $db = new connect();
        $select = "select * FROM `spyeuthich` where makh =$makh and mahh=$mahh";
        // echo $select;
        $result = $db->getInstance($select);
        return $result;
    }
    public function getWishList($makh)
    {
        $db  = new connect();
        $select = "select makh,hanghoa.* FROM `spyeuthich`,`hanghoa` WHERE spyeuthich.makh = $makh and spyeuthich.mahh = hanghoa.mahh;";
        $result = $db->getList($select);
        return $result;
    }
    public function getWishListCout($makh)
    {
        $db  = new connect();
        $select = "select COUNT(hanghoa.mahh) as'soluong' FROM `spyeuthich`,`hanghoa` WHERE spyeuthich.makh = $makh and spyeuthich.mahh = hanghoa.mahh;";
        $result = $db->getInstance($select);
        return $result['soluong'];
    }

    public function deleteWishListItem($makh, $mahh)
    {
        $db  = new connect();
        $query = "delete FROM `spyeuthich` where makh =$makh and mahh=$mahh";
        echo $query;
        $db->exec($query);
    }
    public function deleteWishListAll($makh)
    {
        $db  = new connect();
        $query = "delete FROM `spyeuthich` where makh =$makh";
        echo $query;
        $db->exec($query);
    }
    public function addBalanceUs($makh, $sodu)
    {
        $db  = new connect();
        $query = "update `khachhang`
        SET sodu = sodu + $sodu
        WHERE makh = $makh;";
        // echo $query;
        $db->exec($query);
    }

    public function Purchase($makh, $sotien)
    {
        $db  = new connect();
        $query = "update `khachhang`
        SET sodu = sodu - $sotien
        WHERE makh = $makh;";
        // echo $query;
        $db->exec($query);
    }
    function insertcomment($mahh, $makh, $noidung)
    {
        $db = new connect();
        $date = new DateTime("now");
        $datecreate = $date->format('Y-m-d H:i:s');
        $query = "insert into binhluan(mabl, mahh, makh, ngaybl, noidung) values(null, $mahh, $makh, '$datecreate','$noidung')";
        // echo $query;
        $db->exec($query);
    }
    function ShowComment($mahh)
    {
        $db = new connect();
        $select = "select a.tenkh,b.noidung,b.ngaybl  from khachhang a inner join binhluan b on a.makh=b.makh where b.mahh=$mahh order by b.ngaybl desc";

        $result = $db->getList($select);
        return $result;
    }
    function insertRate($mahh, $makh, $noidung, $rate)
    {
        $db = new connect();
        $date = new DateTime("now");
        $datecreate = $date->format('Y-m-d H:i:s');
        $query = "insert into danhgia(madg, mahh, makh, ngaydg, noidung, rate) values(null, $mahh, $makh, '$datecreate','$noidung',$rate)";
        // echo $query;
        $db->exec($query);
    }
    function ShowRate($mahh)
    {
        $db = new connect();
        $select = "select a.tenkh,b.noidung,b.ngaydg,b.rate  from khachhang a inner join danhgia b on a.makh=b.makh where b.mahh=$mahh order by b.ngaydg desc";
        $result = $db->getList($select);
        return $result;
    }

    function CheckRate($mahh, $makh)
    {
        $db = new connect();
        $select = "select a.tenkh,b.noidung,b.ngaydg,b.rate  from khachhang a inner join danhgia b on a.makh=b.makh where b.mahh=$mahh and a.makh = $makh order by b.ngaydg desc";

        $result = $db->getInstance($select);
        return $result;
    }
    // lấy lại địa chỉ email và mật khẩu của user
    function getEmail($email)
    {
        $db = new connect();
        $select = "select email,matkhau from khachhang where email='$email'";
        $result = $db->getInstance($select);
        return $result;
    }
    // lấy lại email và mật khẩu
    function getPassEmail($email, $pass)
    {
        $select = "select email,matkhau from khachhang where md5(email)='$email' and md5(matkhau)='$pass'";
        $db = new connect();
        $result = $db->getInstance($select);
        return $result;
    }
    function updateEmail($emailold, $passnew)
    {
        $db = new connect();
        $query = "update khachhang set matkhau='$passnew' where email='$emailold'";
        // echo $select;
        $db->exec($query);
    }
}
