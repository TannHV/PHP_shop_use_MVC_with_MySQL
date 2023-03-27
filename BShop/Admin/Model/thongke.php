<?php

class thongke
{

    public function __construct()
    {
    }

    public function getStatistics($month, $year)
    {
        $db  = new connect();
        $select = "select c.ngaydat,b.tenhh,sum(a.soluongmua) as soluong FROM cthoadon a, hanghoa b ,hoadon c WHERE a.mahh = b.mahh and c.masohd = a.masohd and MONTH(c.ngaydat) = $month AND YEAR(c.ngaydat) = $year group by b.tenhh,c.ngaydat order by sum(a.soluongmua) ASC";
        // echo $select;
        $result = $db->getList($select);
        return $result;
    }
}
