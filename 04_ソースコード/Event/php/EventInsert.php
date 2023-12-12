<?php
    require_once '../../DBManager/DBAccess.php';
    $dbaccess = new DBAccess();
    if(!isset($_SESSION)){
        session_start();
    }
    $user_id = $_SESSION['user_id'];
    $event_image = $_FILES['event_image'];
    // 号館が入っているかどうか
    if(isset($_POST['building_num'])) $building_num = $_POST['building_num'];
    else $building_num = null;
    
    // 開催日時が入っているかどうか
    if(isset($_POST['held_datetime'])) $held_datetime = $_POST['held_datetime'];
    else $held_datetime = null;

    $last_insert_id = $dbaccess->InsertEventTbl($user_id, $_POST['eve_cate_code'], $_POST['e_title'], $_POST['e_comment'], $building_num, $held_datetime, $_POST['end_datetime']);

    // 画像が入っているかどうか
    if($event_image['size'][0] > 0){
        for($i = 0; $i < count($event_image['size']) && $event_image['size'][$i] > 0; $i++){
            $kakutyousi = substr(basename($event_image['name'][$i]), strrpos(basename($event_image['name'][$i]), '.') + 1); // 拡張子取得
            $event_image['name'][$i] = 'e'.$last_insert_id[0]['event_id'].'_i'.($i+1).'.'.$kakutyousi; // 画像の名前変更
            move_uploaded_file($event_image['tmp_name'][$i], '../../Image/Event/'.$event_image['name'][$i]); // サーバーに保存
            $dbaccess->InsertImageTbl($last_insert_id[0]['event_id'], $event_image['name'][$i]); // DBにファイル名保存
        }
    }
    header('Location: ../Event.html',true, 307);
?>