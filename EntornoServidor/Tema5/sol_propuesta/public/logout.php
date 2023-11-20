<?php
    session_start();
    if(isset($_SESSION['user'])){
        unset($_SESSION['user']);
    }
    if(isset($_SESSION['booked_events'])){
        unset($_SESSION['booked_events']);
    }
    header('Location: ./login.php');
    exit;
?>