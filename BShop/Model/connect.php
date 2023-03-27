<?php
class connect
{
    var $db = null;
    //ham tao
    public function __construct()
    {
        $dsn = 'mysql:host=localhost;dbname=bshop';
        $user = 'root';
        $pass = '';
        // $port = [7000];
        try {
            $this->db = new PDO($dsn, $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        } catch (\Throwable $th) {
            echo $th;
        }
    }
    public function getList($select)
    {
        $result = $this->db->query($select);
        return $result;
    }
    //tra ve 1 object
    public function getInstance($select)
    {
        $result = $this->db->query($select);
        $result = $result->fetch();
        return $result;
    }
    public function Exec($query)
    {
        $result = $this->db->exec($query);
        return $result;
    }
};
