<?php
    require_once 'DBConnect.php';
    class ImageTblManager{

        private $dbConnectCls;
        //DBConnectクラス
        public function __construct(){
            $this->dbConnectCls = new DBconnect();
        }
    
        public function InsertImageTbl($image_path){

        }

        public function UpdateImageTblByEventId($event_id, $image_path){

        }
    }
?>