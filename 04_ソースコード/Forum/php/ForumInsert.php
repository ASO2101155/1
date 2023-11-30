<?php 
     require_once '../../DBManager/DBAccess.php';
     $cls = new DBAccess();
     try {
         //ForumPost.htmlからpostで受け取ったデータを引数にしてInsert処理
         $cls->InsertForumTbl($_POST['user_id'],$_POST['for_cate_code'],$_POST['building_num'],$_POST['title'],$_POST['post_content']);
     } catch (Exception $ex) {
         //throw $th;
         header('Location: ../ForumPost.html');
         exit;
     }
     //掲示板詳細画面に遷移
     header('Location: ../Forum.html');
     exit;
?>