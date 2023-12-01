<?php
    class DBConnect{
        public function dbConnect(){
            $pdo = new PDO('mysql:host=localhost;dbname=asokoryu;charset=utf8','root','root');
		    return $pdo;
        }
    }
?>
