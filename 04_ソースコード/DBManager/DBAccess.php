<?php
    require_once 'UserTblManager.php';
    require_once 'SchoolTblManager.php';
    require_once 'EventTblManager.php';
    require_once 'EventCategoryTblManager.php';
    require_once 'EventReplyTblManager.php';
    require_once 'ImageTblManager.php';
    require_once 'CalendarTblManager.php';
    require_once 'ForumTblManager.php';
    require_once 'ForumMessageTblManager.php';
    require_once 'NoticeTblManager.php';
    class DBAccess{
        private $userTblCls;
        private $schoolTblCls;
        private $eventTblCls;
        private $eventCategoryTblCls;
        private $eventReplyTblCls;
        private $imageTblCls;
        private $calendarTblCls;
        private $forumTblCls;
        private $forumMessageTblCls;
        private $noticeTblCls;

        public function __construct()
        {
            $this->userTblCls = new UserTblManager();
            $this->schoolTblCls = new SchoolTblManager();
            $this->eventTblCls = new EventTblManager();
            $this->eventCategoryTblCls = new EventCategoryTblManager();
            $this->eventReplyTblCls = new EventReplyTblManager();
            $this->imageTblCls = new ImageTblManager();
            $this->calendarTblCls = new CalendarTblManager();
            $this->forumTblCls = new ForumTblManager();
            $this->forumMessageTblCls = new ForumMessageTblManager();
            $this->noticeTblCls = new NoticeTblManager();
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
        public function SelectNoticeTblByUserId($user_id){
            //NoticeTblManagerで作成したSelectの処理を使う
            $selectData = $this->noticeTblCls->SelectNoticeTblByUserId($user_id);
            return $selectData;
        }
        
        //通知情報をInsertするメソッド
        //コメントが届いたイベントの主に送信する通知
        public function InsertNoticeTblForEvent($rec_user_id, $tra_user_id, $event_id){
            //NoticeTblManagerで作成したInsertの処理を使う
            $this->noticeTblCls->InsertNoticeTbl($rec_user_id, $tra_user_id, 0, $event_id, null);
        }

        //通知情報をInsertするメソッド
        //イベントコメントの返信を受け取ったユーザーに送信する通知
        public function InsertNoticeTblForEventReply($rec_user_id, $tra_user_id, $event_id){
            //NoticeTblManagerで作成したInsertの処理を使う
            $this->noticeTblCls->InsertNoticeTbl($rec_user_id, $tra_user_id, 1, $event_id, null);
        }

        //通知情報をInsertするメソッド
        //開催時間が１日前のイベントをカレンダーに登録しているユーザーに送信する通知
        public function InsertNoticeTblForCalendar($rec_user_id, $event_id){
            //NoticeTblManagerで作成したInsertの処理を使う
            $this->noticeTblCls->InsertNoticeTbl($rec_user_id, null, 3, $event_id, null);
        }

        //通知情報をInsertするメソッド
        //コメントが届いた掲示板の主に送信する通知
        public function InsertNoticeTblForForum($rec_user_id, $tra_user_id, $forum_id){
            //NoticeTblManagerで作成したInsertの処理を使う
            $this->noticeTblCls->InsertNoticeTbl($rec_user_id, $tra_user_id, 2, null, $forum_id);
        }

        //イベント情報をSelectするメソッド
        public function SelectEventTbl(){
            //EventTblManagerで作成したSelectの処理を使う
            $selectData = $this->eventTblCls->SelectEventTbl();
            return $selectData;
        }

        
        //イベント情報をcategory_codeでSelectするメソッド
        public function SelectEventTblByCategoryCode($category_code){
            //EventTblManagerで作成したSelectの処理を使う
            $selectData = $this->eventTblCls->SelectEventTblByCategoryCode($category_code);
            return $selectData;
        }

        //イベント詳細情報をSelectするメソッド
        public function SelectEventDetailByEventId($event_id){
            //EventReplyTblManagerで作成したSelectの処理を使う
            $selectData = $this->eventTblCls->SelectEventDetailById($event_id);
            return $selectData;
        }

        //イベント返信情報をSelectするメソッド
        //イベント返信テーブルのevent_reply_statusの値がfalseの場合、その返信は削除済みである
        public function SelectEventCommentByEventId($event_id){
            //EventReplyTblManagerで作成したSelectの処理を使う
            //イベントテーブル・ユーザーテーブルを結合してSelectする
            $selectData = $this->eventReplyTblCls->SelectEventCommentByEventId($event_id);
            return $selectData;
        }

        //イベント返信情報をSelectするメソッド
        public function SelectEventReplyByEventReplyId($event_reply_id){
            //EventReplyTblManagerで作成したSelectの処理を使う
            $selectData = $this->eventReplyTblCls->SelectEventReplyByEventReplyId($event_reply_id);
            return $selectData;
        }

        //イベント情報をInsertするメソッド
        public function InsertEventTbl($user_id, $eve_cate_code, $title, $comment, $building_num, $held_datetime, $end_datetime){
            //EventTblManagerで作成したInsertの処理を使う
            //日時はSQL文の中で現在日時を取得してInsertする
            $last_insert_id = $this->eventTblCls->InsertEventTbl($user_id, $eve_cate_code, $title, $comment, $building_num, $held_datetime, $end_datetime);
            return $last_insert_id;
        }

        //画像情報をInsertするメソッド
        public function InsertImageTbl($event_id, $image_path){
            //ImageTblManagerで作成したInsertの処理を使う
            $this->imageTblCls->InsertImageTbl($event_id, $image_path);
        }

        //イベントカテゴリー情報をSelectするメソッド
        public function SelectEventCategoryTbl(){
            //EventTblManagerで作成したSelectの処理を使う
            $selectData = $this->eventCategoryTblCls->SelectEventCategoryTbl();
            return $selectData;
        }

        //イベント返信情報をInsertするメソッド
        public function InsertEventReplyTbl($event_id, $user_id, $reply_content){
            //EventReplyTblManagerで作成したInsertの処理を使う
            $this->eventReplyTblCls->InsertEventReplyTbl($event_id, $user_id, $reply_content, null);
        }

        //イベント返信情報をInsertするメソッド
        //返信に対する返信の情報をInsertする
        public function InsertEventReplyTblForReply($event_id, $user_id, $reply_content, $parent_event_reply_id){
            //EventReplyTblManagerで作成したInsertの処理を使う
            $this->eventReplyTblCls->InsertEventReplyTbl($event_id, $user_id, $reply_content, $parent_event_reply_id);
        }

        //イベント情報をUpdateするメソッド
        public function UpdateEventTblByEventId($event_id, $eve_cate_code, $title, $comment, $building_num, $held_datetime, $end_datetime){
            //EventTblManagerで作成したUpdateの処理を使う
            $this->eventTblCls->UpdateEventTblByEventId($event_id, $eve_cate_code, $title, $comment, $building_num, $held_datetime, $end_datetime);
        }

        //画像情報をSelectするメソッド
        public function SelectImageTblById($event_id){
            //ImageTblManagerで作成したSelectの処理を使う
            $selectData = $this->imageTblCls->SelectImageTblById($event_id);
            return $selectData;
        }

        //画像情報をUpdateするメソッド
        public function UpdateImageTblByEventId($event_id, $image_path){
            //EventTblManagerで作成したInsertの処理を使う
            $this->imageTblCls->UpdateImageTblByEventId($event_id, $image_path);
        }

        //イベント返信情報をUpdateするメソッド
        public function DeleteEventReplyByEventReplyId($event_reply_id){
            //EventReplyTblManagerで作成したUpdateの処理を使う
            //EventReplyテーブルのevent_reply_statusカラムの値をfalseにする
            $this->eventReplyTblCls->UpdateEventReplyStatusByEventReplyId($event_reply_id);
        }

        //掲示板情報をSelectするメソッド
        public function SelectForumTbl(){
            //ForumTblManagerで作成したSelectの処理を使う
            $selectData = $this->forumTblCls->SelectForumTbl();
            return $selectData;
        }

        public function SelectForumCategoryTbl(){
            $selectData = $this->forumTblCls->SelectForumCategoryTbl();
            return $selectData;
        }
        
        //掲示板情報をcategory_codeでSelectするメソッド
        public function SelectForumTblByCategoryCode($category_code){
            //ForumTblManagerで作成したSelectの処理を使う
            $selectData = $this->forumTblCls->SelectForumTblByCategoryCode($category_code);
            return $selectData;
        }

        //掲示板詳細情報をSelectするメソッド
        public function SelectForumDetailById($forum_id){
            //ForumTblManagerで作成したSelectの処理を使う
            //掲示板テーブル・掲示板メッセージテーブルを結合してSelectする
            $selectData = $this->forumTblCls->SelectForumDetailById($forum_id);
            return $selectData;
        }

        //掲示板情報をInsertするメソッド
        public function InsertForumTbl($user_id, $for_cate_code, $building_num, $title, $post_content){
            //ForumTblManagerで作成したInsertの処理を使う
            //日時はSQL文の中で現在日時を取得してInsertする
            $this->forumTblCls->InsertForumTbl($user_id, $for_cate_code, $building_num, $title, $post_content);
        }

        //掲示板情報をUpdateするメソッド
        public function UpdateForumTbl($forum_id,$title,$post_content,$for_cate_code,$building_num){
            //ForumTblManagerで作成したUpdateの処理を使う
            $this->forumTblCls->UpdateForumTbl($forum_id,$title,$post_content,$for_cate_code,$building_num);
        }

        //掲示板メッセージ情報をInsertするメソッド
        public function InsertForumMessageTbl($event_id, $user_id, $message_content){
            //ForumMessageTblManagerで作成したInsertの処理を使う
            $this->forumMessageTblCls->InsertForumMessageTbl($event_id, $user_id, $message_content);
        }

        //掲示板メッセージ情報をUpdateするメソッド
        public function DeleteForumMessageByForumMessageId($forum_message_id){
            //ForumMessageyTblManagerで作成したUpdateの処理を使う
            //ForumMessageテーブルのforum_message_statusカラムの値をfalseにする
            $this->forumMessageTblCls->DeleteForumMessageByForumMessageId($forum_message_id);
        }

        public function SelectForumMessageByForumId($forum_id){
            $selectData = $this->forumMessageTblCls->SelectForumMessageByForumId($forum_id);
            return $selectData;
        }

        //カレンダー情報をevent_id,user_idでSelectするメソッド
        public function SelectCalendarTblByEventIdUserId($event_id, $user_id){
            //CalendarTblManagerで作成したSelectの処理を使う
            $selectData = $this->calendarTblCls->SelectCalendarTblByEventIdUserId($event_id, $user_id);
            return $selectData;
        }

        //カレンダー情報をuser_idでSelectするメソッド
        public function SelectCalendarTblByUserId($user_id){
            //CalendarTblManagerで作成したSelectの処理を使う
            //カレンダーテーブル・イベントテーブルを結合してSelectする
            $selectData = $this->calendarTblCls->SelectCalendarTblByUserId($user_id);
            return $selectData;
        }

        //カレンダー情報をSelectするメソッド
        //開催時間が１日前のイベントをカレンダーに登録しているユーザーで取得する
        public function SelectCalendarTblByNow(){
            //CalendarTblManagerで作成したSelectの処理を使う
            //カレンダーテーブル・イベントテーブルを結合してSelectする
            $selectData = $this->calendarTblCls->SelectCalendarTblByNow();
            return $selectData;
        }

        //カレンダー情報をInsertするメソッド
        public function InsertCalendarTbl($user_id, $event_id){
            //CalendarTblManagerで作成したInsertの処理を使う
            $this->calendarTblCls->InsertCalendarMessageTbl($event_id, $user_id);
        }

        //カレンダー情報をUpdateするメソッド
        public function UpdateRegistrationStatusTrue($calendar_id){
            //CarendarTblManagerで作成したUpdateの処理を使う
            //Calendarテーブルのregistration_statusカラムの値をtrueにする
            $this->calendarTblCls->UpdateRegistrationStatusTrue($calendar_id);
        }

        //カレンダー情報をUpdateするメソッド
        public function UpdateRegistrationStatusFalse($calendar_id){
            //CarendarTblManagerで作成したUpdateの処理を使う
            //Calendarテーブルのregistration_statusカラムの値をfalseにする
            $this->calendarTblCls->UpdateRegistrationStatusFalse($calendar_id);
        }

        //ユーザー情報をUpdateするメソッド
        public function UpdateUserTbl($user_name,$school_code,$school_year,$major,$comment,$icon,$user_id){
            //UserTblManagerで作成したUpdateの処理を使う
            $this->userTblCls->UpdateUserTbl($user_name,$school_code,$school_year,$major,$comment,$icon,$user_id);
        }
    }
?>