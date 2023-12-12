<?php
    require_once '../../DBManager/DBAccess.php';
    $cls = new DBAccess();
    $cls->DeleteForumMessageByForumMessageId($_POST['forum_message_id']);
    header('Location: ../ForumDetail.html',true, 307);
?>