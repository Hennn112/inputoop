<?php
    session_start();
    if(!isset($_SESSION["nama"])) {
        header("location: login.php");
        exit();
    }
?>