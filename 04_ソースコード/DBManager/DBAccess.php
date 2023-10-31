<?php
    require_once 'UserTblManager.php';
    require_once 'SchoolTblManager.php';
    class DBAccess{
        private $userTblCls;
        private $schoolTblCls;

        public function __construct()
        {
            $this->userTblCls = new UserTblManager();
            $this->schoolTblCls = new SchoolTblManager();
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

        //ユーザー情報をmailでSelectするメソッド
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
    }
?>