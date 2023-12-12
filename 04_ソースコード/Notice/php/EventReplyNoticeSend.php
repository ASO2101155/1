<?php
    require_once '../../DBManager/DBAccess.php';
    require_once 'NoticeSend.php';
    
    class EventReplyNoticeSend {
        public function eventReplyNoticeSend($event_reply, $rec_user_id, $tra_user_id, $event_id){
            $dbaccess = new DBAccess();
            $noticeSendCls = new NoticeSend();

            // // DBに通知情報登録
            try {
                $dbaccess->InsertNoticeTblForEventReply($rec_user_id, $tra_user_id, $event_id);
            }catch(Exception $e) {
                return $e;
            }
            // 通知送信
            try {
                $noticeSendCls->sendEventReplyNotificaion($event_reply, $rec_user_id);
            }catch(Exception $e){
                return $e;
            }
            
            
        }
    }
?>