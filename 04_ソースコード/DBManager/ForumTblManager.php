<?php
    require_once 'DBConnect.php';
    class ForumTblManager{

        private $dbConnectCls;
        //DBConnectクラス
        public function __construct(){
            $this->dbConnectCls = new DBconnect();
        }
    
        public function SelectForumTbl(){

        }

        public function SelectForumTblByCategoryCode($category_code){

        }

        public function SelectForumDetailById($forum_id){

        }

        public function InsertForumTbl($user_id, $for_cate_code, $building_num, $title, $post_content){

        }
    }
?>