<?php
include 'config.php';

session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit user</title>
    <link rel="stylesheet" href="assets/css/sti.css">

</head>


<body>


<div class="sidebar">
    <button class='wbtn'><a href="create_user.php">Create user</a></button>
</div>

<div class="body-text">
    <h1>Vacation System </h1>
    <h2>Edit user</h2>
    <?php
    if (isset($_GET["msg"]) && $_GET["msg"] == 'changed') {
        print "<p style='color:red'>Data were updated!<p>"; }
    ?>

        <?php
        $ch=$_SESSION["ch_id"];
        $us = mysqli_query($conn,"select * from user where id_user='$ch'");
        while ($row = mysqli_fetch_array($us, MYSQLI_ASSOC)) {
            $first_name=$row['first_name'];
            $last_name=$row['last_name'];
            $email=$row['email'];
            $type=$row['type'];
        }
        ?>
    <div class="float-container">
        <form action="change_edited.php" method="post">
            <br>
            <label for="fname">First Name</label>
            <table class="table table-bordered" id="f-name">
                <tr>
                    <td><input type="text" value="<?php echo "$first_name"; ?>" name="fname"  class="form-control name_list" /></td>
                    <td>
                  <button type = 'submit' name='f-name' class='wbtnm'> Change</button>
                    </td>
                </tr>
            </table>
        </form>
        <form action="change_edited.php" method="post">
            <br>
            <label for="lname">Last Name</label>
            <table class="table table-bordered" id="l-name">
                <tr>
                    <td><input type="text" value="<?php echo "$last_name"; ?>" name="lname"  class="form-control name_list" /></td>
                    <td>
                        <button type = 'submit' name='l-name' class='wbtnm'> Change</button>
                    </td>
                </tr>
            </table>
        </form>
        <form action="change_edited.php" method="post">
            <br>
            <label for="email">Email</label>
            <table class="table table-bordered" id="e-mail">
                <tr>
                    <td><input type="email" value="<?php echo "$email"; ?>" id="email" name="email"   onblur="validateEmail(this);" class="form-control name_list" /></td>
                    <td>
                        <button type = 'submit' name='e-mail' class='wbtnm'> Change</button>
                    </td>
                </tr>
            </table>
            <br> <span id='messageEmail'></span>
        </form>
        <form action="change_edited.php" method="post">
            <br>
            <label for="type">User Type</label>
            <table class="table table-bordered" id="u-type">
                <tr>
                    <td>
                        <select id="usertype" name="usertype">
                            <?php  if($type=="admin"){
                                    echo "<option value='$type'>$type</option>";
                                    echo '<option value="employee">employee</option>';
                                    }else{
                                    echo '<option value="employee">employee</option>?>
                                            <option value="admin">admin</option>';
                                    }
                            ?>
                        </select></td>
                    <td>
                        <button type = 'submit' name='u-type' class='wbtnm'> Change</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>

</div>

</body>
<script src="assets/js/emailcheck.js"></script>
</html>