<?php
    require_once 'DBConnect.php';
    class ImageTblManager{

        private $dbConnectCls;
        //DBConnectクラス
        public function __construct(){
            $this->dbConnectCls = new DBconnect();
        }

        public function SelectImageTblById($event_id){
            $pdo = $this->dbConnectCls->dbConnect();
            $sql = "SELECT * FROM Image 
                    WHERE event_id = ?;";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1, $event_id, PDO::PARAM_INT);
            $ps->execute();
            $searchArray = $ps->fetchAll();
            return $searchArray;
        }
    
        public function InsertImageTbl($event_id, $image_path){
            $pdo = $this->dbConnectCls->dbConnect();
            $sql = "INSERT INTO Image(event_id, file_path)
                               VALUES(?, ?)";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1, $event_id, PDO::PARAM_INT);
            $ps->bindValue(2, $image_path, PDO::PARAM_STR);
            
            $ps->execute();
        }

        public function UpdateImageTblByEventId($event_id, $image_path){

        }
    }
?>