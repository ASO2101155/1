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
            $pdo = $this->dbConnectCls->dbConnect();
            $sql = "INSERT INTO Forum(user_id, forum_category_code, datetime, building_number, title, post_content)
                               VALUES(?, ?, cast(NOW() AS DATETIME), ?, ?, ?)";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1, $user_id, PDO::PARAM_INT);
            $ps->bindValue(2, $for_cate_code, PDO::PARAM_STR);
            $ps->bindValue(3, $building_num, PDO::PARAM_INT);
            $ps->bindValue(4, $title, PDO::PARAM_STR);
            $ps->bindValue(5, $post_content, PDO::PARAM_STR);
            $ps->execute();
        }

        public function UpdateForumTbl($forum_id,$title,$post_content,$for_cate_code,$building_num){
            $pdo = $this->dbConnectCls->dbconnect();
            //update処理
            $sql = "UPDATE Forum SET forum_category_code = ?, datetime = cast(NOW() AS DATETIME), building_number = ?, title = ?, post_content = ? WHERE forum_id = ?";
            $ps = $pdo->prepare($sql);
    
            // 値をバインドしてクエリの実行
            $ps->bindValue(1, $for_cate_code, PDO::PARAM_STR);
            $ps->bindValue(2, $building_num, PDO::PARAM_INT);
            $ps->bindValue(3, $title, PDO::PARAM_STR);
            $ps->bindValue(4, $post_content, PDO::PARAM_STR);
            $ps->bindValue(5, $forum_id, PDO::PARAM_INT);
            $ps->execute();
        }
    }
?>