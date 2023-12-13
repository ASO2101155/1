<?php 
     require_once '../../DBManager/DBAccess.php';
     require_once '../../Notice/php/ForumNoticeSend.php';
     $cls = new DBAccess();
     $forumnoticesendcls = new ForumNoticeSend();
     if(!isset($_SESSION)){
         session_start();
     }
     $forum_id = $_POST['forum_id'];
     $user_id = $_SESSION['user_id'];

     try {
         //ForumPost.htmlからpostで受け取ったデータを引数にしてInsert処理
         $cls->InsertForumMessageTbl($forum_id,$_POST['user_id'],$_POST['message_content']);
     } catch (Exception $ex) {
         //throw $th;
         header('Location: ../ForumDetail.html?id='.$forum_id,true, 308);
         exit;
     }

     //通知送信
     $searchArray = $cls->SelectForumDetailById($forum_id);
     $forumnoticesendcls->forumNoticeSend($_POST['message_content'], $searchArray[0]['user_id'], $user_id, $_POST['forum_id']);

     //掲示板詳細画面に遷移
     header('Location: ../ForumDetail.html?id='.$forum_id,true, 308);
     exit;
?>