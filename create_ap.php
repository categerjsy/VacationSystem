<?php
include 'config.php';

session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Application</title>
    <link rel="stylesheet" href="assets/css/sti.css">
    <script src="https://smtpjs.com/v3/smtp.js"></script>
    <script type="text/javascript">
        function sendEmail() {
            Email.send({
                Host: "smtp.gmail.com",
                Username: "vacationsystem1@gmail.com",
                Password: "vacsyst1",
                To: 'katerinagerak99@gmail.com',
                From: "vacationsystem1@gmail.com",
                Subject: "Sending Email using javascript",
                Body: "Well that was easy!!",
                Attachments: [
                    {
                        name: "File_Name_with_Extension",
                        path: "Full Path of the file"
                    }]
            })
                .then(function (message) {
                    alert("Mail has been sent successfully")
                });
        }
    </script>
</head>


<body>


<div class="sidebar">
    <button class='wbtn'><a href="emp_homepage.php">Homepage</a></button>
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
            <button type = 'submit'  class='wbtn' onclick="sendMail()" >Submit</button>
            <br>
        </form>
    </div>

</div>

</body>

</html>