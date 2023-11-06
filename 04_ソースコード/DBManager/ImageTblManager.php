<?php
    require_once 'DBConnect.php';
    class ImageTblManager{

    //DBConnectクラス
    private function DBconnect(){
        $dbConnectCls = new DBConnect();
        return $dbConnectCls;
    }
    
    }
?>