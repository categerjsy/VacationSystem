<?php
include 'config.php';
session_start();
$vac_s=$_POST['vs'];
$vac_e=$_POST['ve'];
$reason=$_POST['reason'];


$now =  date ('d/m/Y');


    if($vac_s>$now){
        if($vac_e>=$vac_s) {
            $sql = "INSERT INTO application (status, reason,vacation_end, vacation_start)
				VALUES ('pending','$reason', '$vac_e','$vac_s')";

            $qry = mysqli_query($conn, $sql);

            if ($qry) {
                $id_ap = mysqli_insert_id($conn);
                $id_u=$_SESSION["id"] ;

                mysqli_query($conn, "INSERT INTO does (id_user,id_application)
				VALUES (' $id_u','$id_ap')");

                $u = mysqli_query($conn,"select * from user where id_user='$id_u'");
                while ($row = mysqli_fetch_array($u, MYSQLI_ASSOC)) {
                    $fn=$row["first_name"];
                    $ln=$row["last_name"];
                }
                $us = mysqli_query($conn,"select * from user where type='admin'");
                while ($row = mysqli_fetch_array($us, MYSQLI_ASSOC)) {
                    $admin_email=$row["email"];
                    $ve=date("d/m/Y",strtotime($vac_e));
                    $vs=date("d/m/Y",strtotime($vac_s));
                    mail("$admin_email",'Request time of from work',"Dear supervisor, employee $fn $ln requested for some time off, starting on $vs
                            andending on $ve, stating the reason:
                            $reason
                            Click on one of the below links to approve or reject the application: http://localhost/VacationSystem/approve.php?id=$id_ap -
                            http://localhost/VacationSystem/reject.php?id=$id_ap",'From: vacationsystem1@gmail.com');
                }


                $location = "/VacationSystem/emp_homepage.php";
                header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
            }
        }
        else {
            $location = "/VacationSystem/create_ap.php?m=w";
            header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
        }

    }
    else{
        $location="/VacationSystem/create_ap.php?m=w";
        header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
    }

?>