<?php 
class UserInfo{
    public function userInfo($id){
        require_once '../../DBManager/DBAccess.php';
        $cls = new DBAccess();
        //引数に入っているidでユーザー検索し返す
        $selectData = $cls->SelectUserTblById($id);
        return $selectData;
    }
}

?>