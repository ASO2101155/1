<?php
    require_once 'DBConnect.php';
    class NoticeTblManager{

        private $dbConnectCls;
        //DBConnectクラス
        public function __construct(){
            $this->dbConnectCls = new DBconnect();
        }
        
        public function SelectNoticeTblByUserId($user_id){
            $pdo = $this->dbConnectCls->dbConnect();
            $sql = "SELECT * FROM Notification AS e
                    INNER JOIN User AS u
                    ON e.transmission_user_id = u.user_id
                    WHERE e.reception_user_id = ?";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1, $user_id, PDO::PARAM_INT);
            $ps->execute();
            $searchArray = $ps->fetchAll();
            return $searchArray;
        }

        public function InsertNoticeTbl($rec_user_id, $tra_user_id, $notification_type, $event_id, $forum_id) {
            $pdo = $this->dbConnectCls->dbConnect();
            $sql = "INSERT INTO Notification(reception_user_id, transmission_user_id, notification_type, event_id, forum_id)
                               VALUES(?, ?, ?, ?, ?)";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1, $rec_user_id, PDO::PARAM_INT);
            $ps->bindValue(2, $tra_user_id, PDO::PARAM_INT);
            $ps->bindValue(3, $notification_type, PDO::PARAM_INT);
            $ps->bindValue(4, $event_id, PDO::PARAM_INT);
            $ps->bindValue(5, $forum_id, PDO::PARAM_INT);
            $ps->execute();
        }
    }
?>