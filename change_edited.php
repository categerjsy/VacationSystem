<?php
include 'config.php';

session_start();
$ch=$_SESSION["ch_id"];
if (isset($_POST['u'])){
    $email=$_POST['email'];

    $sql = "UPDATE user
			SET email='$email'
			WHERE id_user='$ch';";

        $qry = mysqli_query($conn, $sql);

    $lname=$_POST['lname'];

    $sql = "UPDATE user
				SET last_name='$lname'
				WHERE id_user='$ch';";

    $qry1 = mysqli_query($conn, $sql);

    $fname=$_POST['fname'];

    $sql = "UPDATE user
				SET first_name='$fname'
				WHERE id_user='$ch';";

    $qry2 = mysqli_query($conn, $sql);



    $usertype=$_POST['usertype'];

    $sql = "UPDATE user
				SET type='$usertype'
				WHERE id_user='$ch';";

    $qry3 = mysqli_query($conn, $sql);
    if($qry&&$qry1&&$qry2&&$qry3){
        $location="/VacationSystem/homepage.php?msg=changed";
        header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
    }

}

?>