<?php
    require_once '../../DBManager/DBAccess.php';
    $dbaccess = new DBAccess();
    if(!isset($_SESSION)){
        session_start();
    }
    $user_id = $_SESSION['user_id'];
    // 終了日時が入っているかどうか
    if(isset($_POST['end_datetime'])) {
        $dbaccess->InsertEventTbl($user_id, $_POST['eve_cate_code'], $_POST['e_title'], $_POST['e_comment'], $_POST['building_num'], $_POST['held_datetime'], $_POST['end_datetime']);
    }else{
        $dbaccess->InsertEventTbl($user_id, $_POST['eve_cate_code'], $_POST['e_title'], $_POST['e_comment'], $_POST['building_num'], $_POST['held_datetime'], null);
    }
    header('Location: ../Event.html',true, 307);
?>