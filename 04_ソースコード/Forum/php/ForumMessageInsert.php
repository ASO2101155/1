<?php 
     require_once '../../DBManager/DBAccess.php';
     $cls = new DBAccess();
     try {
         //ForumPost.htmlからpostで受け取ったデータを引数にしてInsert処理
         $cls->InsertForumMessageTbl($_POST['forum_id'],$_POST['user_id'],$_POST['message_content']);
     } catch (Exception $ex) {
         //throw $th;
         header('Location: ../ForumDetail.htmlforum_id='.$_POST['forum_id']);
         exit;
     }
     //掲示板詳細画面に遷移
     header('Location: ../ForumDetail.html?forum_id='.$_POST['forum_id']);
     exit;
?>