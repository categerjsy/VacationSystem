<?php
include 'config.php';
session_start();
$vac_s=$_POST['vs'];
$vac_e=$_POST['ve'];
$reason=$_POST['reason'];


$now =  date ('d/m/Y');
//$vs_date = date('d/m/Y', $vac_s);
//$ve_date = date('d/m/Y', $vac_e);
echo "ve $vac_e";
echo "vs $vac_s";
    if($vac_s>$now){
        if($vac_e>$vac_s) {
            $sql = "INSERT INTO application (status, reason,vacation_end, vacation_start)
				VALUES ('pending','$reason', '$vac_e','$vac_s')";

            $qry = mysqli_query($conn, $sql);

            if ($qry) {
                $id_ap = mysqli_insert_id($conn);
                $id_u=$_SESSION["id"] ;
                mysqli_query($conn, "INSERT INTO does (id_user,id_application)
				VALUES (' $id_u','$id_ap')");
                // Redirecting To Other Page
                $location = "/VacationSystem/emp_homepage.php";
                header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
            }
        }
        else {
            $location = "/VacationSystem/create_ap.php";
            header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
        }

    }
    else{
        $location="/VacationSystem/create_ap.php";
        header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
    }

?>