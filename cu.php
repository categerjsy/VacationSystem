<?php
include 'config.php';

$firstname=$_POST['fname'];
$lastname=$_POST['lname'];
$email=$_POST['email'];
$type=$_POST['usertype'];
$pass=$_POST['password'];
$cpass=$_POST['confirm_password'];

if((strlen($pass)<4)||(strlen($pass)>16)){
    $location="/VacationSystem/create_user.php?msg=plen";
    header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);

}
else{
    if($pass==$cpass) {

            $sql = "INSERT INTO user (first_name, last_name,type, email, password)
				VALUES ('$firstname','$lastname', '$type','$email', '$pass')";

            $qry = mysqli_query($conn, $sql);

            if($qry){
                // Redirecting To Other Page
                $location="/VacationSystem/homepage.php";
                header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
            }




    }else{
        $location="/VacationSystem/create_user.php?msg=cp";
        header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);


    }

}

?>