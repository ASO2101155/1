<?php 
    class SchoolTblManager{

    //DBConnectクラス
    require_once 'DBConnect.php';
    $dbConnectCls = new DBConnect();
    
        public function SelectSchoolTbl(){
            $pdo = $dbconnectCls->dbconnect();
            //select処理（学校テーブルのデータ全件取得）
            $sql = "SELECT * FROM School";
            $ps = $pdo->prepare($sql);
            $ps->execute();

            $selectData = $ps->fetchAll();
            return $selectData;
        }
    }
?>