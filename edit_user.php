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
<!-- HTML -->

<body>

<div class="sidebar">
    <a herf="#"><div>Existing users</div></a>
    <div>Menu Item 2</div>
    <div>Menu Item 3</div>
</div>

<div class="body-text">
    <h1>Vacation System </h1>
    <h2>Edit user</h2>
        <?php
        $ch=$_POST['user'];
        $us = mysqli_query($conn,"select * from user where id_user='$ch'");
        while ($row = mysqli_fetch_array($us, MYSQLI_ASSOC)) {
            $first_name=$row['first_name'];
            $last_name=$row['last_name'];
            $email=$row['email'];
            $type=$row['type'];
        }
        ?>

        <form action="change_edited.php" method="post">
            <br>
            <label for="fname"><b>First Name</b></label>
            <table class="table table-bordered" id="telephone">
                <tr>
                    <td><input type="text" value="<?php echo "$first_name"; ?>" name="fname"  class="form-control name_list" /></td>
                    <td>
                  <button type = 'submit' name='firstname' class='wbtn'> Change</button>
                    </td>
                </tr>
            </table>
        </form>
        <form action="change_edited.php" method="post">
            <br>
            <label for="lname"><b>Last Name</b></label>
            <table class="table table-bordered" id="telephone">
                <tr>
                    <td><input type="text" value="<?php echo "$last_name"; ?>" name="lname"  class="form-control name_list" /></td>
                    <td>
                        <button type = 'submit' name='lastname' class='wbtn'> Change</button>
                    </td>
                </tr>
            </table>
        </form>
        <form action="change_edited.php" method="post">
            <br>
            <label for="email"><b>Last Name</b></label>
            <table class="table table-bordered" id="telephone">
                <tr>
                    <td><input type="text" value="<?php echo "$email"; ?>" name="email"  class="form-control name_list" /></td>
                    <td>
                        <button type = 'submit' name='email' class='wbtn'> Change</button>
                    </td>
                </tr>
            </table>
        </form>
        <form action="change_edited.php" method="post">
            <br>
            <label for="type">User Type</label>
            <table class="table table-bordered" id="telephone">
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
                        <button type = 'submit' name='email' class='wbtn'> Change</button>
                    </td>
                </tr>
            </table>
        </form>


</div>

</body>
</html>