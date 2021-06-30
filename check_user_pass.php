<?php
include 'config.php';
 
  session_start();// start session 
	
	$email=$_POST['email'];
	$password=$_POST['pass_word'];
	
if($email && $password){
		echo "$email<br>";
		echo "$password<br>";
		
		$email = stripslashes($email);
		$password = stripslashes($password);
		
		
		
		
		$query = mysqli_query($conn,"select * from user where password='$password' AND email='$email'");
		
		$rows = mysqli_num_rows($query);
		
		if($rows == 1) {
		 
			$_SESSION["email"] = $email;
            
			echo "Session variables are set.";
            
			$rid = mysqli_query($conn,"select * from user where password='$password' AND email='$email'");
			 while ($row = mysqli_fetch_array($rid, MYSQLI_ASSOC)) {
                printf ("ID: %s ", $row["id_user"]);
                 $id=$row["id_user"];
            }
            $_SESSION["id"] = $id;
			// Redirecting To Other Page
			header("location:homepage.php");
			
		}else{
			$error = "Username or Password is invalid";
			echo "$error";
            // Redirecting To this Page
            $location="/VacationSystem/login.php?msg=wrong";
		header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
		
	}
}
 


 ?>