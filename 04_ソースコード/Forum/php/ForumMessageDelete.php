<?php
    require_once '../../DBManager/DBAccess.php';
    $cls = new DBAccess();
    $forum_id = $_POST['forum_id'];
    $cls->DeleteForumMessageByForumMessageId($_POST['forum_message_id']);
    header('Location: ../ForumDetail.html?id='.$forum_id,true, 307);
?>