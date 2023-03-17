<?php

include "header.php";

if ($_SESSION['user_role'] == '0') {
    header("location: post.php");
}

if (isset($_POST['user_update'])) {

    include 'dbConnect.php';

    $user_id = mysqli_real_escape_string($db_conn, $_POST['user_id']);
    $user_yourname = mysqli_real_escape_string($db_conn, $_POST['user_yourname']);
    $user_username = mysqli_real_escape_string($db_conn, $_POST['user_username']);
    $user_email = mysqli_real_escape_string($db_conn, $_POST['user_email']);
    $user_role = mysqli_real_escape_string($db_conn, $_POST['user_role']);

    //UPDATE `user` SET `first_name` = 'Nirobz' WHERE `user`.`user_id` = 1;

    $query1 = "UPDATE users SET 
    user_yourname = '{$user_yourname}', 
    user_username = '{$user_username}',
    user_email = '{$user_email}',
    user_role = '{$user_role}' WHERE user_id = '{$user_id}'";

    $result1 = mysqli_query($db_conn, $query1) or die("Query faild.");
    if ($result1) {
        header("location: users.php");
    }
}

?>

<?php
session_start();
if (!isset($_SESSION['user_username'])) {
    header("location: user-signin.php");
}


?>
<link rel="stylesheet" href="asset/form.css">

<div id="admin-content">
    <div class="container">




        <div class="user-head">
            <i class="fa-solid fa-users"></i><span>Modify User Details</span>
        </div>
        <div class="user-update-form">
            <div class="col-md-offset-4 col-md-4">
                <!-- Form Start -->

                <?php

                $user_id = $_GET['user_id'];

                include "dbConnect.php";
                $query = "SELECT * FROM users WHERE user_id = {$user_id}";
                $result = mysqli_query($db_conn, $query) or die("Failed");
                $count = mysqli_num_rows($result);

                if ($count > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {

                ?>

                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">

                            <div class="form-group">
                                <input type="hidden" name="user_id" class="form-control" value="<?php echo $row['user_id'] ?>" placeholder="">
                            </div>
                            <div class="form-group">
                                <label>Your Name</label>
                                <input type="text" name="user_yourname" class="form-control" value="<?php echo $row['user_yourname'] ?>" placeholder="Your Name" required>

                            </div>
                            <div class="form-group">
                                <label>User Name</label>
                                <input type="text" name="user_username" class="form-control" value="<?php echo $row['user_username'] ?>" placeholder="user_username" required>

                            </div>

                            <div class="form-group">
                                <label>user_email</label>

                                <input type="email" name="user_email" class="form-control" value="<?php echo $row['user_email'] ?>" placeholder="user_email" required>

                            </div>

                            <div class="form-group">
                                <label>User Role</label>
                                <select class="form-control" name="user_role" value="<?php echo $row['user_role']; ?>">
                                    <?php
                                    if ($row['user_role'] == 1) {

                                        echo  "<option value='0'>Moderator</option>";
                                        echo  "<option value='1' selected >Admin</option>";
                                    } else {

                                        echo  "<option value='0' selected >Moderator</option>";
                                        echo  "<option value='1'>Admin</option>";
                                    }
                                    ?>

                                </select>
                            </div>
                            <input type="submit" name="user_update" class="btn btn-primary" value="Update user" required />
                        </form>
                        <!-- /Form -->

                <?php
                    }
                }

                ?>



            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>