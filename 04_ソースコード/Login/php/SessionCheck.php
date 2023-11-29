<?php 
    class SessionCheck{
        //セッションをチェックするメソッド
        public function checkSession(){
		    session_start();
            if (!isset($_SESSION['user_id'])) {
                // セッションがない場合はログインページにリダイレクト
                header("Location: ../login.html");
                exit();
            }
        }
    }
?>