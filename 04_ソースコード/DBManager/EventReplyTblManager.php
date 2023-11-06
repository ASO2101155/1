<?php
    require_once 'DBConnect.php';
    class EventReplyTblManager{

    //DBConnectクラス
    private function DBconnect(){
        $dbConnectCls = new DBConnect();
        return $dbConnectCls;
    }
    
    }
?>