<?php
    require_once 'UserTblManager.php';
    require_once 'SchoolTblManager.php';
    class DBAccess{
        private $userTblCls;
        private $schoolTblCls;
        private $EventTblCls;
        private $EventReplyTblCls;
        private $ImageTblCls;
        private $CalenderTblCls;
        private $ForumTblCls;
        private $ForumMessageTblCls;
        private $NoticeTblCls;

        public function __construct()
        {
            $this->userTblCls = new UserTblManager();
            $this->schoolTblCls = new SchoolTblManager();
            $this->EventTblCls = new EventTblManager();
            $this->EventReplyTblCls = new EventReplyTblManager();
            $this->ImageTblCls = new ImageTblManager();
            $this->CalenderTblCls = new CalenderTblManager();
            $this->ForumTblCls = new ForumTblManager();
            $this->ForumMessageTblCls = new ForumMessageTblManager();
            $this->NoticeTblCls = new NoticeTblManager();
        }

        //ユーザー情報をInsertするメソッド
        public function InsertUserTbl($mail,$password,$user_name,$school_code,$school_year,$major,$gender){
            //UserTblManagerで作成したInsertの処理を使う
            $this->userTblCls->InsertUserTbl($mail,$password,$user_name,$school_code,$school_year,$major,$gender);
        }

        //ユーザー情報をidでSelectするメソッド
        public function SelectUserTblById($user_id){
            //UserTblManagerで作成したSelect(idで検索)の処理を使う
            $selectData = $this->userTblCls->SelectUserTblById($user_id);
            return $selectData;
        }

        //ユーザー情報をmailでSelectするメソッド（ログインで使う）
        public function SelectUserTblByMail($mail){
            //UserTblManagerで作成したSelect(mailで検索)の処理を使う
            $selectData = $this->userTblCls->SelectUserTblByMail($mail);
            return $selectData;
        }

        //学校情報をSelectするメソッド
        public function SelectSchoolTbl(){
            //SchoolTblManagerで作成したSelectの処理を使う
            $selectData = $this->schoolTblCls->SelectSchoolTbl();
            return $selectData;
        }

        //通知情報をSelectするメソッド
        public function SelectNoticeTbl(){
            //NoticeTblManagerで作成したSelectの処理を使う
            $selectData = $this->NoticeTblCls->SelectNoticeTbl();
            return $selectData;
        }
        
        //通知情報をInsertするメソッド
        //コメントが届いたイベントの主に送信する通知
        public function InsertNoticeTblForEvent($rec_user_id, $tra_user_id, $event_id){
            //NoticeTblManagerで作成したInsertの処理を使う
            $this->NoticeTblCls->InsertNoticeTbl($rec_user_id, $tra_user_id, 0, $event_id, null);
        }

        //通知情報をInsertするメソッド
        //イベントコメントの返信を受け取ったユーザーに送信する通知
        public function InsertNoticeTblForEventReply($rec_user_id, $tra_user_id, $event_id){
            //NoticeTblManagerで作成したInsertの処理を使う
            $this->NoticeTblCls->InsertNoticeTbl($rec_user_id, $tra_user_id, 1, $event_id, null);
        }

        //通知情報をInsertするメソッド
        //コメントが届いた掲示板の主に送信する通知
        public function InsertNoticeTblForCalendar($rec_user_id, $event_id){
            //NoticeTblManagerで作成したInsertの処理を使う
            $this->NoticeTblCls->InsertNoticeTbl($rec_user_id, null, 3, $event_id, null);
        }

        //通知情報をInsertするメソッド
        //コメントが届いた掲示板の主に送信する通知
        public function InsertNoticeTblForForum($rec_user_id, $tra_user_id, $forum_id){
            //NoticeTblManagerで作成したInsertの処理を使う
            $this->NoticeTblCls->InsertNoticeTbl($rec_user_id, $tra_user_id, 2, null, $forum_id);
        }

        //イベント情報をSelectするメソッド
        public function SelectEventTbl(){
            //EventTblManagerで作成したSelectの処理を使う
            $selectData = $this->EventTblCls->SelectEventTbl();
            return $selectData;
        }

        //イベント情報をcategory_codeでSelectするメソッド
        public function SelectEventTblByCategoryCode($category_code){
            //EventTblManagerで作成したSelectの処理を使う
            $selectData = $this->EventTblCls->SelectEventTblByCategoryCode($category_code);
            return $selectData;
        }

        //イベント詳細情報をSelectするメソッド
        public function SelectEventDetailByEventId($event_id){
            //SchoolTblManagerで作成したSelectの処理を使う
            //イベントテーブル・イベント返信テーブル・画像テーブルを結合してSelectする
            $selectData = $this->EventTblCls->SelectEventDetailById($event_id);
            return $selectData;
        }

        //イベント情報をInsertするメソッド
        public function InsertEventTbl($user_id, $eve_cate_code, $title, $comment, $building_num, $held_datetime, $end_datetime){
            //EventTblManagerで作成したInsertの処理を使う
            //日時はSQL文の中で現在日時を取得してInsertする
            $this->EventTblCls->InsertEventTbl($user_id, $eve_cate_code, $title, $comment, $building_num, $held_datetime, $end_datetime);
        }

        //イベント情報をInsertするメソッド
        public function InsertImageTbl($image_path){
            //EventTblManagerで作成したInsertの処理を使う
            $this->EventTblCls->InsertImageTbl($image_path);
        }

        //イベント返信情報をInsertするメソッド
        public function InsertEventReplyTbl($event_id, $user_id, $reply_content){
            //EventReplyTblManagerで作成したInsertの処理を使う
            $this->EventReplyTblCls->InsertEventReplyTbl($event_id, $user_id, $reply_content, null);
        }

        //イベント返信情報をInsertするメソッド
        //返信に対する返信の情報をInsertする
        public function InsertEventReplyTblForReply($event_id, $user_id, $reply_content, $parent_event_reply_id){
            //EventReplyTblManagerで作成したInsertの処理を使う
            $this->EventReplyTblCls->InsertEventReplyTbl($event_id, $user_id, $reply_content, $parent_event_reply_id);
        }

        
    }
?>