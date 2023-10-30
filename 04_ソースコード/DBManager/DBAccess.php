<?php
    class DBAccess{
        
        //UserTblManagerクラス
        require_once 'UserTblManager.php';
        $userTblCls = new UserTblManager();

        require_once 'SchoolTblManager.php';
        $schoolTblCls = new SchoolTblManager();

        //ユーザー情報をInsertするメソッド
        public function InsertUserTbl($mail,$password,$user_name,$school_code,$school_year,$major,$gender){
            //UserTblManagerで作成したInsertの処理を使う
            $userTblCls->InsertUserTbl($mail,$password,$user_name,$school_code,$school_year,$major,$gender);
        }

        //ユーザー情報をidでSelectするメソッド
        public function SelectUserTblById($user_id){
            //UserTblManagerで作成したSelect(idで検索)の処理を使う
            $selectData = $userTblCls->SelectUserTblById($user_id);
            return $selectData;
        }

        //ユーザー情報をmailでSelectするメソッド
        public function SelectUserTblById($mail){
            //UserTblManagerで作成したSelect(idで検索)の処理を使う
            $selectData = $userTblCls->SelectUserTblById($mail);
            return $selectData;
        }

        //学校情報をSelectするメソッド
        public function SelectSchoolTbl(){
            //SchoolTblManagerで作成したSelectの処理を使う
            $selectData = $schoolTblCls->SelectSchoolTbl();
            return $selectData;
        }
    }
?>