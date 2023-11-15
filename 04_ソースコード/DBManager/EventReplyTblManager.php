<?php
    require_once 'DBConnect.php';
    class EventReplyTblManager{

        private $dbConnectCls;
        //DBConnectクラス
        public function __construct(){
            $this->dbConnectCls = new DBconnect();
        }
    
        public function InsertEventReplyTbl($event_id, $user_id, $reply_content, $parent_event_reply_id){
            
        }

        public function UpdateEventReplyStatusByEventId($event_reply_id){

        }
    }
?>