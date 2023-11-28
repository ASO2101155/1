<?php
    require_once '../../DBManager/DBAccess.php';
    $dbaccess = new DBAccess();
    $raw = file_get_contents('php://input');
	$data = json_decode($raw,true);

    try{
        $dbaccess->InsertCalendarTbl($data['user_id'], $data['event_id']);
        $searchArray = $dbaccess->SelectCalendarTblByEventIdUserId($data['event_id'], $data['user_id']);
        $res = $searchArray[0]['calendar_id'];
        // $res = 'INSERTOK';
    }catch(Exception $e){
        $res = $e;
    }
    
    echo json_encode($res);
?>