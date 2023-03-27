<?php
class hoadon
{

    var $sohd  = null;
    var $makh = null;
    var $ngaydat = null;
    var $tongtien = null;
    var $tinhtrang = null;
    var $mahh = null;

    public function __construct()
    {
    }

    public function CreateOrder($makh)
    {
        $db  = new connect();
        $date = new DateTime("now");
        $dateCreate = $date->format('Y-m-d H:i:s');

        $query = "insert into hoadon(masohd,makh,ngaydat,tongtien,tinhtrang) values(NULL,$makh,'$dateCreate',0,'Paid')";
        $db->exec($query);

        $masohd = $db->getInstance("select masohd FROM `hoadon` where makh = $makh order by masohd desc limit 1");

        return $masohd[0];
    }

    public function insertOrderDetail($sohdid, $mahh, $soluong, $thoihan, $total)
    {
        $db = new connect();

        $query = "iNSERT INTO `cthoadon`(`masohd`,`mahh`,`soluongmua`,`thoihan`,`thanhtien`) VALUES($sohdid, $mahh, $soluong, '$thoihan', $total)";

        $db->exec($query);

        $updatequery = "update hanghoa set soluongton=soluongton - $soluong where mahh=$mahh";
        $db->exec($updatequery);
    }

    public function updateOrderTotal($sohd, $tongtien)
    {
        $db = new connect();
        $query = "update hoadon set tongtien=$tongtien where masohd=$sohd";
        $db->exec($query);
    }

    public function getAllBill($makh)
    {
        $db = new connect();
        $select = "select * FROM `hoadon` where makh = $makh order by masohd desc";

        $result = $db->getList($select);
        return $result;
    }
    public function getBillInfo($masohd)
    {
        $db = new connect();
        $select = "select * FROM hoadon where masohd = $masohd ";
        $result = $db->getInstance($select);
        return $result;
    }
    public function getBillDetail($masohd)
    {
        $db = new connect();
        $select = "select * FROM cthoadon,hanghoa where masohd = $masohd and cthoadon.mahh = hanghoa.mahh ";

        $result = $db->getList($select);
        return $result;
    }

    public function getCountBill($makh)
    {
        $db = new connect();
        $select = "select count(masohd) as 'SoHoaDon' FROM `hoadon` where makh = $makh order by masohd desc";

        $result = $db->getInstance($select);
        return $result['SoHoaDon'];
    }

    public function InsertOrder($makh, $dateCreate, $total)
    {
        $db  = new connect();

        $query = "insert into hoadon(masohd,makh,ngaydat,tongtien,tinhtrang) values(NULL,$makh,'$dateCreate',$total,'Paid')";
        $db->exec($query);

        $masohd = $db->getInstance("select masohd FROM `hoadon` where makh = $makh order by masohd desc limit 1");

        return $masohd[0];
    }

    public function checkBought($makh, $mahh)
    {
        $db = new connect();
        $select = "select * from hoadon,cthoadon WHERE hoadon.masohd = cthoadon.masohd and hoadon.makh = $makh and  cthoadon.mahh =$mahh";

        $result = $db->getInstance($select);
        return $result;
    }
}
