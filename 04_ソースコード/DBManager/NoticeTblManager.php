<?php
    require_once 'DBConnect.php';
    class NoticeTblManager{

        private $dbConnectCls;
        //DBConnectクラス
        public function __construct(){
            $this->dbConnectCls = new DBconnect();
        }
        
        public function SelectNoticeTbl(){

        }

        public function InsertNoticeTbl($rec_user_id, $tra_user_id, $notification_type, $event_id, $forum_id) {

        }
    }
?>