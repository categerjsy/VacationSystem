<?php
include 'config.php';

session_start();
if(isset($_COOKIE["fcookie"])) {
    $ch = $_COOKIE["fcookie"];
    $_SESSION["ch_id"] = $ch;
    $location = "/VacationSystem/edit_user.php";
    header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
}

