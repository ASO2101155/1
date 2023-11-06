<?php
    require_once 'DBConnect.php';
    class ForumMessageTblManager{

        private $dbConnectCls;
        //DBConnectクラス
        public function __construct(){
            $this->dbConnectCls = new DBconnect();
        }
    
        public function InsertForumMessageTbl($event_id, $user_id, $message_content){

        }

        public function UpdateForumMessageStatusByEventId($forum_message_id){

        }
    }
?>