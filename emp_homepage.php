<?php
include 'config.php';

session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Application</title>
    <link rel="stylesheet" href="assets/css/st.css">

</head>


<body>

<div class="sidebar">
    <button class='wbtn'><a href="create_ap.php">Create application</a></button>
</div>

<div class="body-text">
    <h1>Vacation System </h1>
    <h2>My applications </h2>
    <table id="employees">
        <tr>
            <th>Date from</th>
            <th>Date to</th>
            <th>Reason</th>
            <th>Type</th>
        </tr>
        <?php
//        $us = mysqli_query($conn,"select * from user");
//        while ($row = mysqli_fetch_array($us, MYSQLI_ASSOC)) {
//            $first_name=$row['first_name'];
//            $last_name=$row['last_name'];
//            $email=$row['email'];
//            $type=$row['type'];
//            $id=$row['id_user'];
//            echo "<tr>
//                <td>$first_name</td>
//                <td>$last_name</td>
//                <td>$email</td>
//                <td>$type</td>
//                <td> <form  action='eu.php'  method='post'>
//                    <button type ='submit' name='user' class='wbtn' value='$id'>Edit User</button></form></td>
//              </tr>";
//        }
        ?>
    </table>
</div>

</body>
</html>
