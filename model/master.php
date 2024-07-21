<?php
class Mastermodel
{
    public function __construct()
    {
    }

    //Hàm được dùng để đổ giá trị của bảng khi gán giá trị bảng 
    public static function get_all_from($table)
    {
        $db = new Connect();
        $select = "select * from $table";
        $result = $db->getList($select);
        return $result;
    }
}
