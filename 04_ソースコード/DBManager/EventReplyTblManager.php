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
            $sql = "SELECT * FROM EventReply AS e
                    INNER JOIN User AS u
                    ON e.user_id = u.user_id
                    WHERE event_id = ?
                    AND e.parent_event_reply_id IS NULL
                    ORDER BY e.event_reply_id ASC;";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1, $event_id, PDO::PARAM_INT);
            $ps->execute();
            $searchArray = $ps->fetchAll();
            return $searchArray;
        }

        public function SelectEventReplyByEventReplyId($event_reply_id) {
            $pdo = $this->dbConnectCls->dbConnect();
            $sql = "SELECT le.*, user_name, icon, re.user_id AS re_user_id, re.event_reply_status AS re_event_reply_status FROM EventReply AS le
                    INNER JOIN EventReply AS re
                    ON le.parent_event_reply_id = re.event_reply_id
                    INNER JOIN User AS u
                    ON le.user_id = u.user_id
                    WHERE re.event_reply_id = ?
                    ORDER BY le.event_reply_id ASC;";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1, $event_reply_id, PDO::PARAM_INT);
            $ps->execute();
            $searchArray = $ps->fetchAll();
            return $searchArray;
        }
    
        public function InsertEventReplyTbl($event_id, $user_id, $reply_content, $parent_event_reply_id){
            $pdo = $this->dbConnectCls->dbConnect();
            $sql = "INSERT INTO EventReply(event_id, user_id, datetime, reply_content, parent_event_reply_id, event_reply_status)
                               VALUES(?, ?, cast(NOW() AS DATETIME), ?, ?, true)";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1, $event_id, PDO::PARAM_INT);
            $ps->bindValue(2, $user_id, PDO::PARAM_INT);
            $ps->bindValue(3, $reply_content, PDO::PARAM_STR);
            $ps->bindValue(4, $parent_event_reply_id, PDO::PARAM_INT);
            $ps->execute();
        }

        public function UpdateEventReplyStatusByEventReplyId($event_reply_id){
            $pdo = $this->dbConnectCls->dbConnect();
            $sql = "UPDATE EventReply SET event_reply_status = 0 
                    WHERE event_reply_id = ?";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1, $event_reply_id, PDO::PARAM_INT);
            $ps->execute();
        }
    }
?>