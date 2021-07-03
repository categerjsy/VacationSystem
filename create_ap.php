<?php
include 'config.php';

session_start();
if(isset($_SESSION['id'])) {
    $this_user = $_SESSION["id"];
    $us = mysqli_query($conn, "select * from user where id_user='$this_user' and type='admin'");
    while ($row = mysqli_fetch_array($us, MYSQLI_ASSOC)) {
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
    <title>Application</title>
    <link rel="stylesheet" href="assets/css/sti.css">

</head>


<body>


<div class="sidebar">
    <a href="emp_homepage.php"><button class='wbtn'>Homepage</button></a>
    <br><br>
    <a href="logout.php"><button class='wbtn'>Log out</button></a>
</div>

<div class="body-text">
    <h1>Vacation System </h1>
    <h2>Application for vacation period</h2>

    <div class="float-container">
        <form action="ap.php" method="post">
            <br>
            <label>
                Vacation Start:  <br>
                <input type="date" name="vs">
            </label>
            <br>  <br>
            <label>
                Vacation End:  <br>
                <input type="date" name="ve">
            </label>
            <br>  <br>
            <label for="reason">Reason:</label>  <br>

            <textarea id="reason" name="reason" <!--rows="4" cols="150"-->

            </textarea>
            <br>  <br>
            <button type = 'submit'  class='wbtn'  >Submit</button>
            <br>
        </form>
    </div>

</div>

</body>

</html>