<?php
class hanghoa
{
    public function __construct()
    {
    }

    public function getListAll()
    {
        $db  = new connect();
        $select = "select * from hanghoa";

        $result = $db->getList($select);
        return $result;
    }
    public function getListDiscounts()
    {
        $db  = new connect();
        $select = "select * FROM hanghoa WHERE giamgia > 0 LIMIT 4;";

        $result = $db->getList($select);
        return $result;
    }
    public function getProductType($loai)
    {
        $db  = new connect();
        $select = "select hanghoa.* FROM hanghoa,loai,menu WHERE hanghoa.maloai = loai.maloai and loai.idmenu = menu.idmenu and menu.idmenu = " . $loai;
        $result = $db->getList($select);
        return $result;
    }
    public function getProductTypeSort($loai, $type)
    {
        $db  = new connect();
        $select = "select hanghoa.* FROM hanghoa,loai,menu WHERE hanghoa.maloai = loai.maloai and loai.idmenu = menu.idmenu and menu.idmenu = " . $loai . " ORDER BY (CASE 
        WHEN hanghoa.giamgia > 0 THEN hanghoa.giamgia 
        ELSE hanghoa.dongia 
        END ) $type";
        // echo $select;
        $result = $db->getList($select);
        return $result;
    }
    public function getProductTypeLimit($loai)
    {
        $db  = new connect();
        $select = "select hanghoa.* FROM hanghoa,loai,menu WHERE hanghoa.maloai = loai.maloai and loai.idmenu = menu.idmenu and menu.idmenu = " . $loai . " ORDER BY RAND() LIMIT 8";
        $result = $db->getList($select);
        return $result;
    }
    public function getMenu()
    {
        $db  = new connect();
        $select = "select * FROM menu";
        $result = $db->getList($select);
        return $result;
    }
    public function getProductTypeName($loai)
    {
        $db  = new connect();
        $select = "select * FROM `menu` WHERE name = '" . $loai . "'";
        $result = $db->getInstance($select);
        return $result;
    }
    public function getProductHot()
    {
        $db  = new connect();
        $select = "select * FROM `hanghoa` WHERE soluotxem > 5 ORDER by soluotxem DESC LIMIT 8;";
        $result = $db->getList($select);
        return $result;
    }
    public function getProductHotAll()
    {
        $db  = new connect();
        $select = "select * FROM `hanghoa` WHERE soluotxem > 5 ORDER by soluotxem DESC;";
        $result = $db->getList($select);
        return $result;
    }
    public function getListAllPage($start, $limit)
    {
        $db  = new connect();
        $select = "select hanghoa.* from hanghoa,loai where loai.maloai = hanghoa.maloai ORDER BY `loai`.`idmenu` ASC limit " . $start . "," . $limit;
        // echo $select;
        $result = $db->getList($select);
        return $result;
    }

    public function getListAllPageSort($start, $limit, $type)
    {
        $db  = new connect();
        $select = "select hanghoa.* from hanghoa,loai where loai.maloai = hanghoa.maloai ORDER BY (
            CASE 
            WHEN hanghoa.giamgia > 0 THEN hanghoa.giamgia 
            ELSE hanghoa.dongia 
            END 
        ) $type " . "limit " . $start . "," . $limit;
        // echo $select;
        $result = $db->getList($select);
        return $result;
    }
    public function getListAllnoSale()
    {
        $db  = new connect();
        $select = "select * from hanghoa WHERE giamgia like 0 ;";
        $result = $db->getList($select);
        return $result;
    }
    public function getListSalesAll()
    {
        $db  = new connect();
        $select = "select * FROM hanghoa WHERE giamgia > 0;";
        $result = $db->getList($select);
        return $result;
    }
    public function getListRanDom()
    {
        $db  = new connect();
        $select = "select * FROM `hanghoa` ORDER BY RAND() LIMIT 4;";
        $result = $db->getList($select);
        return $result;
    }
    public function getProductDetails($id)
    {
        $db  = new connect();
        $select = "select * FROM hanghoa WHERE mahh  = $id;";
        $result = $db->getInstance($select);
        return $result;
    }

    public function addViewsProduct($id)
    {
        $db  = new connect();
        $select = "update hanghoa set soluotxem = soluotxem + 1 WHERE mahh  = $id;";
        $result = $db->getInstance($select);
        return $result;
    }

    public function getGroupHinh($maloai)
    {
        $db  = new connect();
        $select = "select  hinh,mahh FROM `hanghoa` WHERE maloai = $maloai LIMIT 3";
        $result = $db->getList($select);
        return $result;
    }
    public function getQuantity($mahh){
        $db  = new connect();
        $select = "select soluongton FROM `hanghoa` WHERE mahh = $mahh ;";
        $result = $db->getInstance($select);
        return $result['soluongton'];
    }
    public function getGroupTH($maloai)
    {
        $db  = new connect();
        $select = "select DISTINCT thoihan,mahh,soluongton FROM `hanghoa` WHERE maloai = $maloai ORDER BY mahh ASC";
        $result = $db->getList($select);
        return $result;
    }
    public function getTypeMenu($id)
    {
        $db  = new connect();
        $select = "select menu.* from menu,hanghoa,loai where hanghoa.mahh = " . $id . " and hanghoa.maloai = loai.maloai and loai.idmenu = menu.idmenu;";
        $result = $db->getInstance($select);
        return $result;
    }

    public function getProductSame($loai)
    {
        $db  = new connect();
        $select = "select hanghoa.* from menu,hanghoa,loai where hanghoa.maloai = loai.maloai and loai.idmenu = menu.idmenu and menu.name = '" . $loai . "' and hanghoa.soluongton > 0 ORDER BY RAND() LIMIT 4;";
        $result = $db->getList($select);
        return $result;
    }

    public function getProductSearch($str)
    {
        $db  = new connect();
        $select = "select  * FROM `hanghoa` WHERE tenhh like '%" . $str . "%'";
        // echo $select;
        $result = $db->getList($select);
        return $result;
    }

    public function getRate($mahh)
    {
        $db  = new connect();
        $select = "select avg(rate)as avgRating FROM danhgia WHERE mahh= $mahh";
        // echo $select;
        $result = $db->getInstance($select);
        if ($result['avgRating'] == null) {
            $result['avgRating'] = 0;
        }
        $rate = $result['avgRating'];
        $updatequery = "update hanghoa set rate=$rate where mahh=$mahh";
        // echo $updatequery;

        $db->exec($updatequery);

        return $result['avgRating'];
    }

    public function getCountRate($mahh)
    {
        $db  = new connect();
        $select = "select count(madg) as countRating FROM danhgia WHERE mahh= $mahh";
        // echo $select;
        $result = $db->getInstance($select);
        return $result['countRating'];
    }
}
