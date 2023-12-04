<?php
// cronの設定名 [カレンダー一日毎存在チェック]
// 日付 ( 月 ) [毎月]
// 日付 ( 日 ) [毎日]
// 曜日 [毎日]
// 時間 ( 時 ) [9時]
// 時間 ( 分 ) [0分]
// 実行ファイルパス [AsokoryuApp/Notice/php/CalendarNoticeSend.php]
    require_once '../../DBManager/DBAccess.php';
    require_once 'NoticeSend.php';

    $dbaccess = new DBAccess();
    $noticeSendCls = new NoticeSend();

    $searchUser = $dbaccess->SelectCalendarTblByNow();    

    foreach($searchUser as $row){
        $rec_user_id = $row['calendar_user_id'];
        $event_id = $row['event_id'];
        $content = 'イベントの終了日時が１日前になりました';

        // DBに通知情報登録
        try {
            $dbaccess->InsertNoticeTblForCalendar($rec_user_id, $event_id);
        }catch(Exception $e) {
            echo $e;
        }
        // 通知送信
        try {
            $noticeSendCls->sendCalendarNotificaion($content, $rec_user_id);
        }catch(Exception $e){
            echo $e;
        }
    }
?>