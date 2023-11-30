<?php
    require_once '../../DBManager/DBAccess.php';
    $dbaccess = new DBAccess();
    $raw = file_get_contents('php://input');
	$data = json_decode($raw,true);

    if($data['flg'] == 1){
        try{
            $dbaccess->UpdateRegistrationStatusTrue($data['calendar_id']);
            $res = 'UPDATEOK';
        }catch(Exception $e){
            $res = $e;
        }
    }else{
        try{
            $dbaccess->UpdateRegistrationStatusFalse($data['calendar_id']);
            $res = 'UPDATEOK';
        }catch(Exception $e){
            $res = $e;
        }
    }

    echo json_encode($res);
?>