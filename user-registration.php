<?php

//include_once('header.php');
//include_once('lap-code.php');

?>

<?php

if (isset($_POST['user_reg'])) {

    include 'dbConnect.php';

    $user_yourname = mysqli_real_escape_string($db_conn, $_POST['user_yourname']);
    $user_username = mysqli_real_escape_string($db_conn, $_POST['user_username']);
    $user_email = mysqli_real_escape_string($db_conn, $_POST['user_email']);
    $user_pass = mysqli_real_escape_string($db_conn, md5($_POST['user_pass']));
    $user_role = mysqli_real_escape_string($db_conn, $_POST['user_role']);

    $query = "SELECT user_username FROM users WHERE user_username='$user_username'";
    $result = mysqli_query($db_conn, $query) or die("Query faild.");

    $count = mysqli_num_rows($result);
    if ($count > 0) {
        echo "UserName Already Exists.";
    } else {
        $query1 = "INSERT INTO users (user_yourname,user_username,user_email,user_pass,user_role) 
      VALUE ('$user_yourname','$user_username','$user_email','$user_pass','$user_role')";
        $result = mysqli_query($db_conn, $query1) or die("Query Failed.");

        if ($result) {

            header("location: {$hosturl}users.php");
        }
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Registration</title>
    <link rel="icon" type="image/x-icon" href="asset/img/bestnews.png">
    <link rel="stylesheet" href="asset/form.css">
</head>

<body>

    <!-- registraton form-->



    <section class="sign-in-banner">
        <div class="lap-head">
            <H2 class="">Registration</H2>


            <div class="form-head-sign">

                <!-- Form Start -->
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                    <div class="textbox">
                        <i class="fas fa-user"></i>
                        <input type="text" name="user_yourname" placeholder="Your Name">

                    </div>
                    <div class="textbox">
                        <i class="fas fa-user"></i>
                        <input type="text" name="user_username" placeholder="user Name">

                    </div>

                    <div class="textbox">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="email" name="user_email" placeholder="Your email" required>
                    </div>

                    <div class="textbox">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="user_pass" placeholder="password" required>
                    </div>

                    <div class="textbox">
                        <i class="fas fa-lock"></i>
                        <label>User Role</label>
                        <select class="form-control" name="user_role" placeholder="password">
                            <option value="0">Moderator</option>
                            <option value="1">Admin</option>
                        </select>
                    </div>
                    <input type="submit" name="user_reg" value="Signup" />

                </form>





            </div>

        </div>

    </section>







    <!-- footer section open -->
    <?php include_once('footer.php'); ?>
    <!-- footer section close -->
</body>

</html>