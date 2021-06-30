<?php
session_start();

?>
<html>
<head>
    <title>Log in</title>
    <link rel="stylesheet" href="assets/css/man.css">
    <script>
        function checkforblank(){
            if(document.getElementById('ps').value == ""){
                alert('Please enter your password!');
                document.getElementById('ps').style.borderColor= "red";
                return false;
            }
        }
    </script>
</head>

<body>

<div class="sign-in">

    <h1>Vacation System</h1>
    <?php
    if (isset($_GET["msg"]) && $_GET["msg"] == 'wrong') {
    print "<p style='color:red'>Please try again!<p>"; }
    ?>
    <h2>Please log in.</h2>

    <form action="check_user_pass.php" method="post" onsubmit="return checkforblank()" enctype="multipart/form-data" >
        <label for="email">E-mail</label>
        <input type="email" id="email" class="input-box" name="email" onblur="validateEmail(this);"  placeholder="E-mail">
        <br> <span id='messageEmail'></span>
        <br>
        <label for="password">Password</label>
        <input type="password" id="ps" class="input-box" name="pass_word" placeholder="Password">

        <input type="submit" name="" value="Login">
    </form>
</div>

</body>
<script src="assets/js/emailcheck.js"></script>
</html>