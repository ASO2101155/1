<?php
    require_once '../../DBManager/DBAccess.php';
    $dbaccess = new DBAccess();
    $dbaccess->DeleteEventReplyByEventReplyId($_POST['event_reply_id']);
    header('Location: ../EventDetail.html', true, 307);
?>