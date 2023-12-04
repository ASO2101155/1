<?php
    session_start();
    require_once '../../DBManager/DBAccess.php';
    $cls = new DBAccess();
    if(isset($_POST['icon'])){
            // アップロードされたファイルの情報を取得
  $file = $_FILES['icon'];

  // ファイルの一時保存パス
  $tmpFilePath = $file['tmp_name'];

  // ユーザーID
  $userId = $_POST['user_id'];

  // ファイルを保存するディレクトリ
  $uploadDir = '../../IconImage/';

  // ファイルの拡張子
  $extension = pathinfo($file['name'], PATHINFO_EXTENSION);

  // 新しいファイル名
  $fileName = $userId . '.' . $extension;

  // ファイルの保存先パス
  $filePath = $uploadDir . $fileName;

  // 既存のファイルを削除
  if (file_exists($filePath)) {
    unlink($filePath);
  }

  // ファイルを移動して保存
  if (move_uploaded_file($tmpFilePath, $filePath)) {
    // ここでファイルの保存先パスなどの情報をデータベースに保存するなどの処理を行うことができます。
    // データベースの更新処理
    $icon = $fileName;
    $cls->UpdateUserTbl($_POST['user_name'],$_POST['school_code'],$_POST['school_year'],$_POST['major'],$_POST['comment'],$icon,$_POST['user_id']);
    header('Location: ../Profile.html');
    exit;
  } else {
    // リダイレクト
    header('Location:../Profile.html?error=1');
    exit;
  }
    } else {
  $data = $cls->SelectUserTblById($_POST['user_id']);
        foreach($data as $row){
            $icon = $row['icon'];
        }
    }
  $cls->UpdateUserTbl($_POST['user_name'],$_POST['school_code'],$_POST['school_year'],$_POST['major'],$_POST['comment'],$icon,$_POST['user_id']);
    header('Location: ../Profile.html');
    exit;
?>