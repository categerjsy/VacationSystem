<?php
include 'config.php';

session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vacation System</title>
    <link rel="stylesheet" href="assets/css/st.css">

</head>

<body>

<div class="sidebar">
    <a href="login.php"><button class='wbtn'>Log In</button></a>
</div>

<div class="body-text">
    <h1>Vacation System </h1>
    <?php
    if (isset($_GET["re"]) && $_GET["re"] == 'approved') {
    echo "<h2>Application approved</h2>";
    }
    if (isset($_GET["re"]) && $_GET["re"] == 'rejected') {
        echo "<h2>Application rejected</h2>";
    }
    ?>
    <h2></h2>

</div>

</body>
</html>