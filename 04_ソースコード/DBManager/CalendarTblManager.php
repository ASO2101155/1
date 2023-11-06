<?php
    require_once 'DBConnect.php';
    class CalendarTblManager{

        private $dbConnectCls;
        //DBConnectクラス
        public function __construct(){
            $this->dbConnectCls = new DBconnect();
        }
    
        public function SelectCalendarTblByUser_id($user_id){

        }

        public function InsertCalendarMessageTbl($event_id, $user_id, $registration_status){

        }
    }
?>