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
    <title>Create user</title>
    <link rel="stylesheet" href="assets/css/sti.css">

</head>


<body>


<div class="sidebar">
    <a href="homepage.php"><button class='wbtn'>Homepage</button></a>
    <br>
    <a href="logout.php"><button class='wbtn'>Log out</button></a>
</div>

<div class="body-text">
    <h1>Vacation System </h1>
    <h2>Create user</h2>
    <?php
    if (isset($_GET["msg"]) && $_GET["msg"] == 'plen') {
        print "<p style='color:red'>Length of password must be 5 to 15 characters!<p>"; }
    if (isset($_GET["msg"]) && $_GET["msg"] == 'cp') {
        print "<p style='color:red'>Passwords not matching please try again!<p>"; }
    ?>

    <div class="float-container">
        <form action="cu.php" method="post">
            <br>
            <label for="fname">First Name</label>
            <input type="text" placeholder="First Name" name="fname"  class="form-control name_list" required/>
            <br>
            <label for="lname">Last Name</label>
            <input type="text" placeholder="Last Name" name="lname"  required/>
            <label for="email">Email</label>
            <input type="email" placeholder="E-mail" id="email" name="email"   onblur="validateEmail(this);" required/>
            <br> <span id='messageEmail'></span><br>
            <label for="type">User Type</label>
            <select id="usertype" name="usertype">
                <option value="admin">admin</option>
                <option value="employee">employee</option>
            </select>
            <label for="p1">Password</label>
            <input name="password" id="password" type="password" placeholder="Password" onkeyup='checkP();'  required>
            <label for="p2">Confirm password</label>
            <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm password"  onkeyup='checkP();' required>
            <br><span id='message'></span><br>
            <button type = 'submit'  class='wbtn'> Create user</button>
            <br>
        </form>
    </div>

</div>

</body>
<script src="assets/js/emailcheck.js"></script>
<script src="assets/js/passwordcheck.js"></script>
</html>