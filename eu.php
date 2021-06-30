<?php
include 'config.php';

session_start();
$_SESSION["ch_id"]=$_POST['user'];

header("location:edit_user.php");
?>