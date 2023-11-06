<?php
    require_once 'DBConnect.php';
    class EventTblManager{

    //DBConnectクラス
    private function DBconnect(){
        $dbConnectCls = new DBConnect();
        return $dbConnectCls;
    }
    
    }
?>