<?php
include 'config.php';
 
  session_start();// start session 
	
	$email=$_POST['email'];
	$password=$_POST['pass_word'];
	
if($email && $password){

		$email = stripslashes($email);
		$password = stripslashes($password);

		$query = mysqli_query($conn,"select * from user where password='$password' AND email='$email'");
		
		$rows = mysqli_num_rows($query);
		
		if($rows == 1) {
		 
			$_SESSION["email"] = $email;

			$rid = mysqli_query($conn,"select * from user where password='$password' AND email='$email'");
			 while ($row = mysqli_fetch_array($rid, MYSQLI_ASSOC)) {
                 $id=$row["id_user"];
            }
            $_SESSION["id"] = $id;


            $ad = mysqli_query($conn,"select * from user where type='admin' AND id_user='$id'");
            while ($row = mysqli_fetch_array($ad, MYSQLI_ASSOC)) {
                header("location:homepage.php");
            }
            $ad = mysqli_query($conn,"select * from user where type='employee' AND id_user='$id'");
            while ($row = mysqli_fetch_array($ad, MYSQLI_ASSOC)) {
                header("location:emp_homepage.php");
            }
		}else{

            $location="/VacationSystem/login.php?msg=wrong";
		    header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
		
	}
}
 


 ?>