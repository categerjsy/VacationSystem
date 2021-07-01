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
            <th>Date submitted</th>
            <th>Days requested</th>
            <th>Reason</th>
            <th>Days</th>
            <th>Status</th>
        </tr>
        <?php
        $this_user=$_SESSION["id"];
        $us = mysqli_query($conn,"select * from does where id_user='$this_user'");
        while ($row = mysqli_fetch_array($us, MYSQLI_ASSOC)) {
            $id_ap=$row["id_application"];
            $u = mysqli_query($conn,"select * from application where id_application='$id_ap'");
            while ($row = mysqli_fetch_array($u, MYSQLI_ASSOC)) {
                $date_sub=$row["date_sub"];
                $start = $row["vacation_start"];
                $end =$row["vacation_end"];
                $diff = abs(strtotime($end) - strtotime($start))/86400 ;
                $r=$row["reason"];
                $st=$row["status"];
                echo "<tr>
                <td>$date_sub</td>
                <td>$start - $end</td> 
                <td>$r</td>
                <td>$diff</td>    
                <td>$st</td>
              </tr>";
            }
        }
        ?>
    </table>
</div>

</body>
</html>
