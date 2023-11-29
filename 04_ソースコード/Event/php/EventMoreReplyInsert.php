<?php
    require_once '../../DBManager/DBAccess.php';
    require_once '../../Notice/php/EventReplyNoticeSend.php';
    $dbaccess = new DBAccess();
    $eventreplynoticesendcls = new EventReplyNoticeSend();
    if(!isset($_SESSION)){
        session_start();
    }
    $user_id = $_SESSION['user_id'];
    $event_id = $_POST['event_id'];
    $parent_event_reply_id = $_POST['parent_event_reply_id'];

    $dbaccess->InsertEventReplyTblForReply($event_id, $user_id, $_POST['event_more_reply'], $parent_event_reply_id);

    // 通知送信
    $searchArray = $dbaccess->SelectEventReplyByEventReplyId($parent_event_reply_id);
    $eventreplynoticesendcls->eventReplyNoticeSend($_POST['event_more_reply'], $searchArray[0]['re_user_id'], $user_id, $event_id);
    // echo $searchArray[0]['re_user_id'];
    header('Location: ../EventDetail.html', true, 307);
?>