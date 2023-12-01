<?php
    class DBConnect{
        public function dbConnect(){
            $pdo = new PDO('mysql:host=localhost;dbname=aso;charset=utf8','root','');
		    return $pdo;
        }
    }
?>