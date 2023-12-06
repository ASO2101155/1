<?php
    session_start();
    require_once '../../DBManager/DBAccess.php';
    $cls = new DBAccess();
    try {
        //login.htmlからpostで受け取ったデータを引数にしてSelect処理
        $selectData = $cls->SelectUserTblByMail($_POST['mail']);
        foreach($selectData as $row){
            //postで受け取ったpasswordと検索したデータのpasswordが一致するか判定
            if(password_verify($_POST['password'],$row['password'])){
                //一致していたらセッションにユーザーIDを登録しイベント画面へ遷移
                $_SESSION['user_id'] = $row['user_id'];
                header('Location:../../Event/Event.html');
                exit;
            } else {
                //一致しなければログイン画面に遷移しエラーメッセージを表示する
                header('Location:../Login.html?err');
                exit;
            }
        }
        header('Location:../Login.html?err');
    } catch (Exception $ex) {
        //throw $th;
        header('Location:../Login.html?dataerr');
        exit;
    }
?>