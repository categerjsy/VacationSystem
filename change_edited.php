<?php
include 'config.php';

session_start();
$ch=$_SESSION["ch_id"];

if (isset($_POST['e-mail'])){
    $email=$_POST['email'];

        $sql = "UPDATE user
				SET email='$email'
				WHERE id_user='$ch';";

        $qry = mysqli_query($conn, $sql);
        if($qry){
            $location="/VacationSystem/edit_user.php?msg=changed";
            header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
        }

}
if (isset($_POST['l-name'])){
    $lname=$_POST['lname'];

    $sql = "UPDATE user
				SET last_name='$lname'
				WHERE id_user='$ch';";

    $qry = mysqli_query($conn, $sql);
    if($qry){
        $location="/VacationSystem/edit_user.php?msg=changed";
        header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
    }

}
if (isset($_POST['f-name'])){
    $fname=$_POST['fname'];

    $sql = "UPDATE user
				SET first_name='$fname'
				WHERE id_user='$ch';";

    $qry = mysqli_query($conn, $sql);
    if($qry){
        $location="/VacationSystem/edit_user.php?msg=changed";
        header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
    }

}
if (isset($_POST['u-type'])){
    $usertype=$_POST['usertype'];

    $sql = "UPDATE user
				SET type='$usertype'
				WHERE id_user='$ch';";

    $qry = mysqli_query($conn, $sql);
    if($qry){
        $location="/VacationSystem/edit_user.php?msg=changed";
        header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
    }

}

?>