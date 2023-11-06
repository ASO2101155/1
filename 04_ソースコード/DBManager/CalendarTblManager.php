<?php
    require_once 'DBConnect.php';
    class CalendarTblManager{

    //DBConnectクラス
    private function DBconnect(){
        $dbConnectCls = new DBConnect();
        return $dbConnectCls;
    }
    
    }
?>