<?php
include 'config.php';
$id_ap= $_GET['id'];

$sql = "UPDATE application
				SET status='approved'
				WHERE id_application='$id_ap';";

$qry = mysqli_query($conn, $sql);
if($qry){
    $a = mysqli_query($conn,"select * from application where id_application='$id_ap'");
    while ($row = mysqli_fetch_array($a, MYSQLI_ASSOC)) {
        $sd=$row["date_sub"];
    }
    $d = mysqli_query($conn,"select * from does where id_application='$id_ap'");
    while ($row = mysqli_fetch_array($d, MYSQLI_ASSOC)) {
        $id_u=$row["id_user"];
        $u = mysqli_query($conn,"select * from user where id_user='$id_u'");
        while ($row = mysqli_fetch_array($u, MYSQLI_ASSOC)) {
            $emp_email = $row["email"];
            mail("$emp_email", 'Request time of from work', "Dear employee, your supervisor has accepted your application submitted on
$sd.", 'From: vacationsystem1@gmail.com');
        }
    }
    $location="/VacationSystem/result.php?re=approved";
    header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
}

?>