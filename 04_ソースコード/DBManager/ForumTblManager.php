<?php
    require_once 'DBConnect.php';
    class ForumTblManager{

    //DBConnectクラス
    private function DBconnect(){
        $dbConnectCls = new DBConnect();
        return $dbConnectCls;
    }
    
    }
?>