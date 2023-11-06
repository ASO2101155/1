<?php 
    require_once 'DBConnect.php';
    class UserTblManager{
        private $dbConnectCls;
        //DBConnectクラス
        public function __construct(){
            $this->dbConnectCls = new DBconnect();
        }
        //private function DBconnect(){
          //  $dbConnectCls = new DBConnect();
            //return $dbConnectCls;
        //}

        public function SelectUserTblById($user_id){
            $pdo = $this->dbConnectCls->dbconnect();
            //select処理
            $sql = "SELECT User.*, School.school_name
            FROM User
            INNER JOIN School ON User.school_code = School.school_code
            WHERE User.user_id = ?";
		    $ps = $pdo->prepare($sql);
		    $ps->bindValue(1,$user_id,PDO::PARAM_INT);
		    $ps->execute();

		    $selectData = $ps->fetchAll();
		    return $selectData;
        }

        //loginするときに使う入力されたメールアドレスでのユーザー検索
        public function SelectUserTblByMail($mail){
            $pdo = $this->dbConnectCls->dbconnect();
            //select処理
            $sql = "SELECT * FROM User WHERE mail = ?";
		    $ps = $pdo->prepare($sql);
		    $ps->bindValue(1,$mail,PDO::PARAM_STR);
		    $ps->execute();

		    $selectData = $ps->fetchAll();
		    return $selectData;
        }

        public function InsertUserTbl($mail,$password,$user_name,$school_code,$school_year,$major,$gender){
            $pdo = $this->dbConnectCls->dbconnect();
            //insert処理
            $sql = "INSERT INTO User(mail,password,user_name,school_code,school_year,major,gender) VALUES (?,?,?,?,?,?,?)";
		    $ps = $pdo->prepare($sql);
		    $ps->bindValue(1, $mail,PDO::PARAM_INT);
		    $ps->bindValue(2, password_hash($password,PASSWORD_DEFAULT),PDO::PARAM_STR);
            $ps->bindValue(3, $user_name,PDO::PARAM_STR);
            $ps->bindValue(4, $school_code, PDO::PARAM_STR);
            $ps->bindValue(5, $school_year, PDO::PARAM_INT);
            $ps->bindValue(6, $major, PDO::PARAM_STR);
            $ps->bindValue(7, $gender, PDO::PARAM_STR);
		    $ps->execute();
        }

        public function UpdateUserTbl(){

        }
    }
?>