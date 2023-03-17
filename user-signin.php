<?php
include "dbConnect.php";
session_start();
if (isset($_SESSION['user_username'])) {
    header("location: post.php");
}


?>
<!--user login-->
<?php

if (isset($_POST['user_login'])) {
    include "dbConnect.php";

    $user_username = mysqli_real_escape_string($db_conn, $_POST['user_username']);
    $user_pass = md5($_POST['user_pass']);

    $login_query = "SELECT user_id,user_username,user_role FROM users WHERE user_username='{$user_username}' AND user_pass='{$user_pass}'";
    $login_query_run = mysqli_query($db_conn, $login_query) or die("Query Failed.");

    if (mysqli_num_rows($login_query_run) > 0) {

        while ($row = mysqli_fetch_assoc($login_query_run)) {

            session_start();

            $_SESSION['user_username'] = $row['user_username'];
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['user_role'] = $row['user_role'];

            header("location: post.php");
        }
    } else {
        echo "Username and Password are not matched.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home</title>
    <link rel="stylesheet" href="asset/form.css">
</head>

<body>


    <section class="sign-in-banner">
        <div class="lap-head">
            <H2 class="">Login</H2>


            <div class="form-head-sign">


                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                    <div class="textbox">
                        <i class="fas fa-user"></i>
                        <input type="text" name="user_username" placeholder="user name" />
                    </div>

                    <div class="textbox">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="user_pass" placeholder="password" />
                    </div>
                    <input type="submit" name="user_login" value="login" />

                </form>

            </div>

        </div>

    </section>



</body>

</html>