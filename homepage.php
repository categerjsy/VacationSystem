<?php
    include 'config.php';

  session_start();
  ?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Homepage</title>
    <link rel="stylesheet" href="assets/css/st.css">

</head>
<style> tr td:nth-child(5){background-color: #b8b8b8;} </style>

<body>

<div class="sidebar">
    <a href="create_user.php"><button class='wbtn'>Create user</button></a>
    <br>
    <a href="logout.php"><button class='wbtn'>Log out</button></a>
</div>

<div class="body-text">
    <h1>Vacation System </h1>
    <h2>Existing users</h2>
    <table id="employees">
        <tr>
            <th>First Name</th>
            <th>Last name</th>
            <th>Email</th>
            <th>Type</th>
        </tr>
        <?php
        $us = mysqli_query($conn,"select * from user");
        while ($row = mysqli_fetch_array($us, MYSQLI_ASSOC)) {
            $first_name=$row['first_name'];
            $last_name=$row['last_name'];
            $email=$row['email'];
            $type=$row['type'];
            $id=$row['id_user'];
            echo "<tr>
                <td>$first_name</td>
                <td>$last_name</td>
                <td>$email</td>
                <td>$type</td>
                <td> <form  action='eu.php'  method='post'>
                    <button type ='submit' name='user' class='wbtn' value='$id'>Edit User</button></form></td>
              </tr>";
        }
        ?>
    </table>
</div>

</body>
</html>