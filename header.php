<?php
include "dbConnect.php";
session_start();
if (!isset($_SESSION['user_username'])) {
    header("location: user-signin.php");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/style.css">
    <link rel="icon" type="image/x-icon" href="asset/img/bestnews.png">

    <!-- Font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js">


    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Latest compiled and minified  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
   CSS -->


</head>

<body>
    <!--header-->
    <header>
        <div class="header-top container">
            <div class="header-logo">
                <a href="index.php"><img src="asset/img/bestnews.png" alt=""></a>
            </div>
            <div class="header-search">
                <form action="">
                    <input type="text" placeholder="Search for news">
                    <input type="submit" value="Search">
                </form>
            </div>
            <div class="header-cart">
            </div>
        </div>

        <div class="header-btm container">
            <div class="header-category">



                <li>
                    hi,<?php echo $_SESSION['user_username'] ?>,
                    <?php $val = $_SESSION['user_role'];
                    if ($val == '1') {
                        echo "you logged in as Admin";
                    } else {
                        echo "You logged in as Moderator";
                    }
                    ?>

                </li>



            </div>
            <div class="header-menu">
                <ul>
                    <li class=""><a href="index.php">Home</a></li>

                    <li><a href="user-registration.php">Registration</a></li>

                    <li><a href="logout.php"><i class="fa-solid fa-user-lock"></i> Logout</a></li>



                    <?php if ($_SESSION['user_role'] == '1') { ?>

                        <li>
                            <a href="post-add.php">Post Add</a>
                        </li>
                        <li>
                            <a href="users.php">Users</a>
                        </li>

                        <li>
                            <a href="category-add.php">category</a>
                        </li>

                    <?php } ?>

                </ul>
            </div>
            <div class="header-meta">
                <a href="user-signin.php"><i class="fa-solid fa-user-lock"></i> Sign in</a>

            </div>
        </div>

    </header>

</body>

</html>