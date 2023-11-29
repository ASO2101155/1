<?php
    require_once 'DBConnect.php';
    class EventTblManager{

        private $dbConnectCls;
        //DBConnectクラス
        public function __construct(){
            $this->dbConnectCls = new DBconnect();
        }

        public function SelectEventTbl(){

        }
    
        public function SelectEventTblByCategoryCode($category_code){

        }

        public function SelectEventDetailById($event_id){

        }

        public function InsertEventTbl($user_id, $eve_cate_code, $title, $comment, $building_num, $held_datetime, $end_datetime){

        }

        public function UpdateEventTblByEventId($event_id, $user_id, $eve_cate_code, $title, $comment, $building_num, $held_datetime, $end_datetime){

        }
    }
?>