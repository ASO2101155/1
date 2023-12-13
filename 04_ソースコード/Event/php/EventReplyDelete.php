<?php
    require_once '../../DBManager/DBAccess.php';
    $dbaccess = new DBAccess();
    $event_id = $_POST['event_id'];
    $dbaccess->DeleteEventReplyByEventReplyId($_POST['event_reply_id']);
    header('Location: ../EventDetail.html?id='.$event_id, true, 307);
?>