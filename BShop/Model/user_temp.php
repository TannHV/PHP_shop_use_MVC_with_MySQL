<?php

class User_temp
{

    public function __construct()
    {
    }

    public function CreateUserTemp($tenkh, $email, $diachi, $dt)
    {
        $db  = new connect();
        $query = "insert into khachhang_temp(makh, tenkh, email, diachi, sodienthoai,solanmua)values( NULL , '$tenkh', '$email' , '$diachi' , '" . trim($dt) . "',0)";
        // echo $query;
        $db->exec($query);
    }
    public function ExistUserTemp($email, $dt)
    {
        $db = new connect();
        $select = "select * FROM `khachhang_temp` where email ='$email' and sodienthoai ='$dt'";
        // echo $select;
        $result = $db->getInstance($select);
        return $result;
    }

    public function getInfoUser($makh_temp)
    {
        $db = new connect();
        $select = "select * FROM `khachhang_temp` where makh = $makh_temp";
        // echo $select;
        $result = $db->getInstance($select);
        return $result;
    }

    public function CreateOrder_Temp($makh)
    {
        $db  = new connect();
        $date = new DateTime("now");
        $dateCreate = $date->format('Y-m-d H:i:s');

        $query = "insert into hoadon_temp(masohd,makh,ngaydat,tongtien,tinhtrang) values(NULL,$makh,'$dateCreate',0,'Paid')";
        $db->exec($query);

        $query = "update khachhang_temp set solanmua=solanmua+1 where makh = $makh";
        $db->exec($query);

        $masohd = $db->getInstance("select masohd FROM `hoadon_temp` where makh = $makh order by masohd desc limit 1");

        return $masohd[0];
    }

    public function insertOrderDetail_Temp($sohdid, $mahh, $soluong, $thoihan, $total)
    {
        $db = new connect();
        $query = "iNSERT INTO `cthoadon_temp`(`masohd`,`mahh`,`soluongmua`,`thoihan`,`thanhtien`) VALUES($sohdid, $mahh, $soluong, '$thoihan', $total)";

        $db->exec($query);
    }

    public function updateOrderTotal_Temp($sohd, $tongtien)
    {
        $db = new connect();
        $query = "update hoadon_temp set tongtien=$tongtien where masohd=$sohd";
        $db->exec($query);
    }
    public function getBillInfo_Temp($masohd)
    {
        $db = new connect();
        $select = "select * FROM hoadon_temp where masohd = $masohd ";
        $result = $db->getInstance($select);
        return $result;
    }
    public function getBillDetail_Temp($masohd)
    {
        $db = new connect();
        $select = "select * FROM cthoadon_temp,hanghoa where masohd = $masohd and cthoadon_temp.mahh = hanghoa.mahh";

        $result = $db->getList($select);
        return $result;
    }

    public function getAllBill_Temp($makh)
    {
        $db = new connect();
        $select = "select * FROM hoadon_temp where makh = $makh ";
        $result = $db->getList($select);
        return $result;
    }

    public function getInfoBillDetail_Temp($masohd)
    {
        $db = new connect();
        $select = "select * FROM cthoadon_temp where masohd = $masohd ";
        $result = $db->getInstance($select);
        return $result;
    }

    public function deleteBillDetail_Temp($masohd)
    {
        $db  = new connect();
        $query = "delete FROM cthoadon_temp where masohd =$masohd ";
        echo $query;
        $db->exec($query);
    }

    public function deleteBill_Temp($makh)
    {
        $db  = new connect();
        $query = "delete FROM hoadon_temp where makh =$makh";
        echo $query;
        $db->exec($query);
    }
    public function deleteUser_Temp($makh)
    {
        $db  = new connect();
        $query = "delete FROM khachhang_temp where makh =$makh";
        echo $query;
        $db->exec($query);
    }
}
