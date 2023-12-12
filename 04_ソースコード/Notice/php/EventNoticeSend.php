<?php
    require_once '../../DBManager/DBAccess.php';
    require_once 'NoticeSend.php';
    
    class EventNoticeSend {
        public function eventNoticeSend($event_reply, $rec_user_id, $tra_user_id, $event_id){
            $dbaccess = new DBAccess();
            $noticeSendCls = new NoticeSend();

            // DBに通知情報登録
            try {
                $dbaccess->InsertNoticeTblForEvent($rec_user_id, $tra_user_id, $event_id);
            }catch(Exception $e) {
                return $e;
            }
            // 通知送信
            try {
                $noticeSendCls->sendEventNotificaion($event_reply, $rec_user_id);
            }catch(Exception $e){
                return $e;
            }
            
            
        }
    }
?>