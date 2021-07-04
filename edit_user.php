<?php
include 'config.php';

session_start();
if(isset($_SESSION['id'])) {
    $this_user = $_SESSION["id"];
    $us = mysqli_query($conn, "select * from user where id_user='$this_user' and type='employee'");
    while ($row = mysqli_fetch_array($us, MYSQLI_ASSOC)) {
        $location = "/VacationSystem/emp_homepage.php";
        header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
    }
    if(isset($_SESSION['ch_id'])) {
        $ch = $_SESSION["ch_id"];
    }
    else{
        $location = "/VacationSystem/homepage.php";
        header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
    }
}
else {
    $location = "/VacationSystem/login.php";
    header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit user</title>
    <link rel="stylesheet" href="assets/css/sti.css">

</head>


<body>


<div class="sidebar">
    <a href="homepage.php"><button class='wbtn'>Homepage</button></a>
    <br><br>
    <a href="logout.php"><button class='wbtn'>Log out</button></a>
</div>

<div class="body-text">
    <h1>Vacation System </h1>
    <h2>Edit user</h2>

        <?php
        if(isset($_SESSION['ch_id'])) {

            $us = mysqli_query($conn, "select * from user where id_user='$ch'");
            while ($row = mysqli_fetch_array($us, MYSQLI_ASSOC)) {
                $first_name = $row['first_name'];
                $last_name = $row['last_name'];
                $email = $row['email'];
                $type = $row['type'];
            }
        }
        else{
            $location = "/VacationSystem/homepage.php";
            header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
        }
        if(isset($_SESSION['ch_id'])) {
        ?>
    <div class="float-container">
        <form action="change_edited.php" method="post">
            <br>
            <label for="fname">First Name</label>
           <input type="text" value="<?php echo "$first_name";  ?>" name="fname">
            <br>
            <label for="lname">Last Name</label>
            <input type="text" value="<?php   echo "$last_name"; ?>" name="lname">
            <br>
            <label for="email">Email</label>
           <input type="email" value="<?php echo "$email"; ?>" id="email" name="email"   onblur="validateEmail(this);">
            <br> <span id='messageEmail'></span>
            <br>
            <label for="type">User Type</label>
            <select id="usertype" name="usertype">
                <?php
                }
                if(isset($_SESSION['ch_id'])) {
                    if ($type == "admin") {
                        echo "<option value='$type'>$type</option>";
                        echo '<option value="employee">employee</option>';
                    } else {
                        echo '<option value="employee">employee</option>?>
                          <option value="admin">admin</option>';
                    }
                }
                            ?>
                        </select>
            <button type = 'submit' name='u' class='wbtn'> Change</button>

        </form>
    </div>

</div>

</body>
<script src="assets/js/emailcheck.js"></script>
</html>
