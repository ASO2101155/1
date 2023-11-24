<?php
    require_once 'DBConnect.php';
    class ForumMessageTblManager{

        private $dbConnectCls;
        //DBConnectクラス
        public function __construct(){
            $this->dbConnectCls = new DBconnect();
        }
    
        public function InsertForumMessageTbl($forum_id, $user_id, $message_content){
            $pdo = $this->dbConnectCls->dbConnect();
            $sql = "INSERT INTO ForumMessage(forum_id, user_id, message_content)
                               VALUES(?, ?, ?)";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1, $forum_id, PDO::PARAM_INT);
            $ps->bindValue(2, $user_id, PDO::PARAM_INT);
            $ps->bindValue(3, $message_content, PDO::PARAM_STR);
            $ps->execute();
        }

        public function UpdateForumMessageStatusByEventId($forum_message_id){

        }

        public function SelectForumMessageByForumId($forum_id){
            $pdo = $this->dbConnectCls->dbConnect();
            $sql = "SELECT * FROM ForumMessage INNER JOIN User ON User.user_id = ForumMessage.user_id AND forum_id = ?";
		    $ps = $pdo->prepare($sql);
		    $ps->bindValue(1,$forum_id,PDO::PARAM_INT);
		    $ps->execute();

		    $selectData = $ps->fetchAll();
		    return $selectData;
        }
    }
?>