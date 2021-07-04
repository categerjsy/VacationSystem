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
    <title>Homepage</title>
    <link rel="stylesheet" href="assets/css/st.css">
    <link rel="stylesheet" href="assets/css/list.css">
</head>

<body>

<div class="sidebar">
    <a href="create_user.php"><button class='wbtn'>Create user</button></a>
    <br><br>
    <a href="logout.php"><button class='wbtn'>Log out</button></a>
</div>

<div class="body-text">
    <h1>Vacation System </h1>
    <h2>Existing users</h2>
    <?php
    if (isset($_GET["msg"]) && $_GET["msg"] == 'changed') {
        print "<p style='color:red'>User were updated!<p>"; }
    ?>

    <ul id="myUL">
        <?php
        $us = mysqli_query($conn,"select * from user");
        while ($row = mysqli_fetch_array($us, MYSQLI_ASSOC)) {
            $first_name=$row['first_name'];
            $last_name=$row['last_name'];
            $email=$row['email'];
            $type=$row['type'];
            $id=$row['id_user'];
            echo "<li id='$id' value='$id' onclick='edituser(this)'> $first_name $last_name &emsp; $email  &emsp;$type</li>";

        }
        ?>

    </ul>
</div>
<script>
    function edituser(elm) {
        var x = elm.getAttribute('value');
       document.cookie='fcookie='+x;
      
       window.location.assign("http://localhost/VacationSystem/eu.php");


    }
</script>

</body>
</html>