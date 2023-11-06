<?php
    require_once '../../DBManager/DBAccess.php';
    $cls = new DBAccess();
    try {
        //signUp2.htmlからpostで受け取ったデータを引数にしてInsert処理
        $cls->InsertUserTbl($_POST['mail'],$_POST['password'],$_POST['user_name'],$_POST['school_code'],$_POST['school_year'],$_POST['major'],$_POST['gender']);
    } catch (Exception $ex) {
        //throw $th;
        header('Location: InsertError.html');
        exit;
    }
    //イベント画面に遷移
    header('Location: ../Event/Event.html');
    exit;
?>