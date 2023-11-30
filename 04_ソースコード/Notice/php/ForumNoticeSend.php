<?php
    require_once '../../DBManager/DBAccess.php';
    require_once 'NoticeSend.php';
    
    class ForumNoticeSend {
        public function forumNoticeSend($event_reply, $rec_user_id, $tra_user_id, $forum_id){
            $dbaccess = new DBAccess();
            $noticeSendCls = new NoticeSend();

            // // DBに通知情報登録
            try {
                $dbaccess->InsertNoticeTblForForum($rec_user_id, $tra_user_id, $forum_id);
            }catch(Exception $e) {
                return $e;
            }
            // 通知送信
            try {
                $noticeSendCls->sendForumNotificaion($event_reply, $rec_user_id);
            }catch(Exception $e){
                return $e;
            }
        }
    }
?>