<?php
    require_once '../../DBManager/DBAccess.php';
    $dbaccess = new DBAccess();
    if(!isset($_SESSION)){
        session_start();
    }
    // 開催日時が入っているかどうか
    if(isset($_POST['held_datetime'])) {
        $dbaccess->UpdateEventTblByEventId($_POST['event_id'], $_POST['eve_cate_code'], $_POST['e_title'], $_POST['e_comment'], $_POST['building_num'], $_POST['held_datetime'], $_POST['end_datetime']);
    }else{
        $dbaccess->UpdateEventTblByEventId($_POST['event_id'], $_POST['eve_cate_code'], $_POST['e_title'], $_POST['e_comment'], $_POST['building_num'], $_POST['held_datetime'], null);
    }
    header('Location: ../Event.html',true, 307);
?>