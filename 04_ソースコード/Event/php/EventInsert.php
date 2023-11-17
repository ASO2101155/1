<?php
    require_once '../../DBManager/DBAccess.php';
    $dbaccess = new DBAccess();
    if(!isset($_SESSION)){
        session_start();
    }
    $user_id = $_SESSION['user_id'];
    $event_image = $_FILES['event_image'];
    // 終了日時が入っているかどうか
    if(isset($_POST['end_datetime'])) {
        $last_insert_id = $dbaccess->InsertEventTbl($user_id, $_POST['eve_cate_code'], $_POST['e_title'], $_POST['e_comment'], $_POST['building_num'], $_POST['held_datetime'], $_POST['end_datetime']);
    }else{
        $last_insert_id = $dbaccess->InsertEventTbl($user_id, $_POST['eve_cate_code'], $_POST['e_title'], $_POST['e_comment'], $_POST['building_num'], $_POST['held_datetime'], null);
    }
    // 画像が入っているかどうか
    if($event_image['size'][0] > 0){
        for($i = 0; $i < count($event_image['size']) && $event_image['size'][$i] > 0; $i++){
            $kakutyousi = substr(basename($event_image['name'][$i]), strrpos(basename($event_image['name'][$i]), '.') + 1);
            $event_image['name'][$i] = uniqid().'.'.$kakutyousi;
            move_uploaded_file($event_image['tmp_name'][$i], '../../image/Event/'.$event_image['name'][$i]);
            $dbaccess->InsertImageTbl($last_insert_id[0]['event_id'], $event_image['name'][$i]);
        }
    }
    header('Location: ../Event.html',true, 307);
    // echo count($event_image['size']);
    // echo $last_insert_id[0]['event_id'];
?>