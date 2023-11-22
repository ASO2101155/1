<?php
    require_once 'DBConnect.php';
    class EventTblManager{

        private $dbConnectCls;
        //DBConnectクラス
        public function __construct(){
            $this->dbConnectCls = new DBconnect();
        }

        public function SelectEventTbl(){
            $pdo = $this->dbConnectCls->dbConnect();
            $sql = "SELECT e.*, u.user_name FROM event as e 
                    INNER JOIN user as u
                    ON e.user_id = u.user_id";
            $res = $pdo->query($sql);
            $searchArray= $res->fetchAll();
            return $searchArray;
        }
    
        public function SelectEventTblByCategoryCode($category_code){

        }

        public function SelectEventDetailById($event_id){
            $pdo = $this->dbConnectCls->dbConnect();
            $sql = "SELECT e.*, u.user_name FROM event as e 
                    INNER JOIN user as u
                    ON e.user_id = u.user_id
                    WHERE event_id = ?";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1, $event_id, PDO::PARAM_INT);
            $ps->execute();
            $searchArray = $ps->fetch();
            return $searchArray;
        }

        public function InsertEventTbl($user_id, $eve_cate_code, $title, $comment, $building_num, $held_datetime, $end_datetime){
            $pdo = $this->dbConnectCls->dbConnect();
            $sql = "INSERT INTO event(user_id, event_category_code, title, datetime, comment, building_number, held_datetime, end_datetime)
                               VALUES(?, ?, ?, cast(NOW() AS DATETIME), ?, ?, ? ,?)";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1, $user_id, PDO::PARAM_INT);
            $ps->bindValue(2, $eve_cate_code, PDO::PARAM_STR);
            $ps->bindValue(3, $title, PDO::PARAM_STR);
            $ps->bindValue(4, $comment, PDO::PARAM_STR);
            $ps->bindValue(5, $building_num, PDO::PARAM_INT);
            $ps->bindValue(6, $held_datetime, PDO::PARAM_STR);
            $ps->bindValue(7, $end_datetime, PDO::PARAM_STR);
            $ps->execute();

            $sql2 = "SELECT MAX(event_id) AS event_id FROM Event;";
            $res = $pdo->query($sql2);
            $last_insert_id = $res->fetchAll();
            return $last_insert_id;
        }

        public function UpdateEventTblByEventId($event_id, $user_id, $eve_cate_code, $title, $comment, $building_num, $held_datetime, $end_datetime){

        }
    }
?>