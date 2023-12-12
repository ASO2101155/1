<?php
    require_once '../../DBManager/DBAccess.php';
    require_once '../../Notice/php/EventNoticeSend.php';
    $dbaccess = new DBAccess();
    $eventnoticesendcls = new EventNoticeSend();
    if(!isset($_SESSION)){
        session_start();
    }
    $user_id = $_SESSION['user_id'];
    $event_id = $_POST['event_id'];

    $dbaccess->InsertEventReplyTbl($event_id, $user_id, $_POST['event_reply']);

    // 通知送信
    $searchArray = $dbaccess->SelectEventDetailByEventId($event_id);
    $eventnoticesendcls->eventNoticeSend($_POST['event_reply'], $searchArray['user_id'], $user_id, $event_id);
    header('Location: ../EventDetail.html?insert', true, 307);
?>