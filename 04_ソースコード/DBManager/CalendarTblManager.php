<?php
    require_once 'DBConnect.php';
    class CalendarTblManager{

        private $dbConnectCls;
        //DBConnectクラス
        public function __construct(){
            $this->dbConnectCls = new DBconnect();
        }

        public function SelectCalendarTblByEventIdUserId($event_id, $user_id){
            $pdo = $this->dbConnectCls->dbConnect();
            $sql = "SELECT * FROM Calendar
                    WHERE event_id = ?
                    AND user_id = ?";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1, $event_id, PDO::PARAM_INT);
            $ps->bindValue(2, $user_id, PDO::PARAM_INT);
            $ps->execute();
            $searchArray = $ps->fetchAll();
            return $searchArray;
        }
    
        public function SelectCalendarTblByUserId($user_id){
            $pdo = $this->dbConnectCls->dbConnect();
            $sql = "SELECT * FROM Calendar INNER JOIN Event ON Event.event_id = Calendar.event_id AND Calendar.user_id = ? AND Event.end_datetime >= cast(NOW() AS DATETIME) ORDER BY Event.end_datetime ASC";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1, $user_id, PDO::PARAM_INT);
            $ps->execute();
            $searchArray = $ps->fetchAll();
            return $searchArray;
        }

        public function SelectCalendarTblByNow(){
            $pdo = $this->dbConnectCls->dbConnect();
            $sql = "SELECT *, c.user_id AS calendar_user_id FROM Calendar AS c
                    INNER JOIN Event AS e
                    ON c.event_id = e.event_id
                    WHERE DATE_FORMAT(e.end_datetime, '%Y-%m-%d') = DATE_ADD(DATE_FORMAT(now(), '%Y-%m-%d'), INTERVAL 1 DAY);";
            $searchArray = $pdo->query($sql);
            return $searchArray;
        }

        public function InsertCalendarMessageTbl($event_id, $user_id){
            $pdo = $this->dbConnectCls->dbConnect();
            $sql = "INSERT INTO Calendar(event_id, user_id, registration_status)
                               VALUES(?, ?, 1)";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1, $event_id, PDO::PARAM_INT);
            $ps->bindValue(2, $user_id, PDO::PARAM_INT);
            $ps->execute();
        }

        public function UpdateRegistrationStatusTrue($calendar_id){
            $pdo = $this->dbConnectCls->dbConnect();
            $sql = "UPDATE Calendar SET registration_status = 1 WHERE calendar_id = ?";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1, $calendar_id, PDO::PARAM_INT);
            $ps->execute();
        }

        public function UpdateRegistrationStatusFalse($calendar_id){
            $pdo = $this->dbConnectCls->dbConnect();
            $sql = "UPDATE Calendar SET registration_status = 0 WHERE calendar_id = ?";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1, $calendar_id, PDO::PARAM_INT);
            $ps->execute();
        }
    }
?>