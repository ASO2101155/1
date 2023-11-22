<?php
    require_once '../../DBManager/DBAccess.php';
    $dbaccess = new DBAccess();
    if(!isset($_SESSION)){
        session_start();
    }
    $user_id = $_SESSION['user_id'];
    $dbaccess->InsertEventReplyTbl($_POST['event_id'], $user_id, $_POST['event_reply']);
    header('Location: ../EventDetail.html', true, 307);
?>