<?php
    require_once 'DBConnect.php';
    class EventReplyTblManager{

        private $dbConnectCls;
        //DBConnectクラス
        public function __construct(){
            $this->dbConnectCls = new DBconnect();
        }

        public function SelectEventCommentByEventId($event_id){
            $pdo = $this->dbConnectCls->dbConnect();
            $sql = "SELECT * FROM eventreply AS e
                    INNER JOIN user AS u
                    ON e.user_id = u.user_id
                    WHERE event_id = ?";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1, $event_id, PDO::PARAM_INT);
            $ps->execute();
            $searchArray = $ps->fetchAll();
            return $searchArray;
        }
    
        public function InsertEventReplyTbl($event_id, $user_id, $reply_content, $parent_event_reply_id){
            $pdo = $this->dbConnectCls->dbConnect();
            $sql = "INSERT INTO eventreply(event_id, user_id, datetime, reply_content, parent_event_reply_id, event_reply_status)
                               VALUES(?, ?, cast(NOW() AS DATETIME), ?, ?, true)";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1, $event_id, PDO::PARAM_INT);
            $ps->bindValue(2, $user_id, PDO::PARAM_INT);
            $ps->bindValue(3, $reply_content, PDO::PARAM_STR);
            $ps->bindValue(4, $parent_event_reply_id, PDO::PARAM_INT);
            $ps->execute();
        }

        public function UpdateEventReplyStatusByEventId($event_reply_id){

        }
    }
?>