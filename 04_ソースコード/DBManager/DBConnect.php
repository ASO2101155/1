<?php
    class DBConnect{
        public function dbConnect(){
            $pdo = new PDO('mysql:host=mysql219.phy.lolipop.lan;dbname=LAA1417860-grp1db;charset=utf8',
							'LAA1417860', 'grp1db');
		    return $pdo;
        }
    }
?>
