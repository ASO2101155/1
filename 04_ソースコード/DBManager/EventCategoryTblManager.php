<?php
    require_once 'DBConnect.php';
    class EventCategoryTblManager{

    //DBConnectクラス
    private function DBconnect(){
        $dbConnectCls = new DBConnect();
        return $dbConnectCls;
    }
    
        public function SelectEventCategoryTbl(){
            $dbconnectCls = $this->DBconnect();
            $pdo = $dbconnectCls->dbconnect();
            //select処理（学校テーブルのデータ全件取得）
            $sql = "SELECT * FROM EventCategory";
            $ps = $pdo->prepare($sql);
            $ps->execute();

            $selectData = $ps->fetchAll();
            return $selectData;
        }
    }
?>