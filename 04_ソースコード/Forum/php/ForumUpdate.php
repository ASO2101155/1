<?php
    require_once '../../DBManager/DBAccess.php';
    $cls = new DBAccess();
    try {
        //ForumEdit.htmlからpostで受け取ったデータを引数にしてUpdate処理
        $cls->UpdateForumTbl($_POST['forum_id'],$_POST['title'],$_POST['post_content'],$_POST['for_cate_code'],$_POST['building_num']);
    } catch (Exception $ex) {
        //throw $th;
        header('Location: ../ForumEdit.html');
        exit;
    }
    //プロフィール画面に遷移
    header('Location: ../../Profile/Profile.html');
    exit;
?>