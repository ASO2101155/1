<?php
    if(!isset($_SESSION)){
        session_start();
    }
    require_once '../../DBManager/DBAccess.php';
    $cls = new DBAccess();
    try {
        //signUp2.htmlからpostで受け取ったデータを引数にしてInsert処理
        $cls->InsertUserTbl($_POST['mail'],$_POST['password'],$_POST['user_name'],$_POST['school_code'],$_POST['school_year'],$_POST['major'],$_POST['gender']);
    } catch (Exception $ex) {
        //throw $th;
        header('Location: ../Sign.html?errMsg="データベースとの接続に失敗しました"');
        exit;
    }
    $selectarray = $cls->SelectUserTblByMail($_POST['mail']);
    foreach($selectarray as $row){
        $_SESSION['user_id'] = $row['user_id'];
    }
    //イベント画面に遷移
    header('Location: ../../Event/Event.html');
    exit;
?>