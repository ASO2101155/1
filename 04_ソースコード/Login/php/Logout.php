<?php
    if(!isset($_SESSION)){
        session_start();
    }
    $_SESSION = array();
    header('Location: ../Login.html', true, 307);
    exit();
?>