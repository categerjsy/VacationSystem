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
    <link rel="stylesheet" href="assets/css/st.css">

</head>


<body>

<div class="sidebar">
    <a href="create_ap.php"><button class='wbtn'>Submit request</button></a>
    <br><br>
    <a href="logout.php"><button class='wbtn'>Log out</button></a>
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
        if(isset($_SESSION['id'])) {
            $this_user = $_SESSION["id"];
            $us = mysqli_query($conn, "select * from does where id_user='$this_user'");
            while ($row = mysqli_fetch_array($us, MYSQLI_ASSOC)) {
                $id_ap = $row["id_application"];
                $u = mysqli_query($conn, "select * from application where id_application='$id_ap' order by date_sub desc");
                while ($row = mysqli_fetch_array($u, MYSQLI_ASSOC)) {
                    $date_sub = $row["date_sub"];
                    $ds = date("d/m/Y", strtotime($date_sub));
                    $start = $row["vacation_start"];
                    $s = date("d/m/Y", strtotime($start));
                    $end = $row["vacation_end"];
                    $en = date("d/m/Y", strtotime($end));
                    $diff = abs(strtotime($end) - strtotime($start)) / 86400 + 1;
                    $r = $row["reason"];
                    $st = $row["status"];
                    echo "<tr>
                <td>$ds</td>
                <td>$s- $en</td> 
                <td>$r</td>
                <td>$diff</td>    
                <td>$st</td>
              </tr>";
                }
            }
        }
        ?>
    </table>
</div>

</body>
</html>
