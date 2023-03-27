<?php
class creditcard
{
    public function __construct()
    {
    }

    public function CreateNewCard($name, $number, $cvv, $balance)
    {
        $db  = new connect();
        $query = "insert into creditcard(IdCard,NameOnCard,CardNumber,CVV,Balance)values( NULL , '$name','$number', '$cvv' , $balance)";

        $db->exec($query);
    }

    public function getListCard()
    {
        $db  = new connect();
        $select = "select * from creditcard ;";
        $result = $db->getList($select);
        return $result;
    }

    public function getCard($namecard, $numbercard, $cvv)
    {
        $db  = new connect();
        $select = "select IdCard,Balance from creditcard where NameOnCard = '" . trim($namecard) . "' and CardNumber = '$numbercard' and CVV = '$cvv' ";
        // echo $select;
        $result  = $db->getList($select);
        $set = $result->fetch();
        return $set;
    }

    public function getCardwithID($idcard)
    {
        $db  = new connect();
        $select = "select * from creditcard where IdCard ='$idcard' ;";
        $result = $db->getInstance($select);
        return $result;
    }

    public function addBalance($idcard, $balance)
    {
        $db  = new connect();
        $query = "update `creditcard`
        SET balance = balance + $balance
        WHERE IdCard = $idcard;";
        // echo $query;
        $db->exec($query);
    }
    public function deleteCard($idcard)
    {
        $db  = new connect();
        $query = "delete FROM `creditcard` where IDcard =$idcard";
        $db->exec($query);
        //reset auto increment
        $query = "SET @num := 0;
        UPDATE creditcard SET `IdCard` = @num := (@num+1);
        ALTER TABLE creditcard AUTO_INCREMENT = 1;";
        $db->exec($query);
    }

    public function Purchase($idcard, $total)
    {
        $db  = new connect();
        $query = "update `creditcard`
        SET balance = balance - $total
        WHERE IdCard = $idcard;";
        // echo $query;
        $db->exec($query);
    }

    public function ReplaceUnicode($str)
    {
        $unicode = array(
            'a' => 'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
            'd' => 'đ',
            'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
            'i' => 'í|ì|ỉ|ĩ|ị',
            'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
            'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
            'y' => 'ý|ỳ|ỷ|ỹ|ỵ',
            'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
            'D' => 'Đ',
            'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
            'I' => 'Í|Ì|Ỉ|Ĩ|Ị',
            'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
            'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
            'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
        );
        foreach ($unicode as $nonUnicode => $uni) {
            $str = preg_replace("/($uni)/i", $nonUnicode, $str);
        }
        $str = str_replace(' ', ' ', $str);
        return $str;
    }
}
