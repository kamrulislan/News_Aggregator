</head>


<?php


//===============Subscriber===============
if (isset($_GET['subscriber'])) {

    $email = $_GET['email'];


    $con = mysqli_connect("localhost", "root", "mysql", "shop");
    $query = "INSERT INTO subs_list (email) values ('$email')";
    $data23 = mysqli_query($con, $query);
    if ($data23) {
        echo "<script> alert('Thanks for joining our subsciber list')</script>";
    }
}


?>







<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/style.css">
    <link rel="icon" type="image/x-icon" href="asset/img/logo.png">

    <!-- Font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js">


    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="footer.css">


    <!-- footer -->
    <section class="footer-background">
        <div class="footer-row container">


            <div class="footer-one-col">
                <h2>Categories</h2>
                <hr>
                <ul>
                    <li><a href=""><i class="fa-solid fa-house"></i> Business</a></li>
                    <li><a href=""><i class="fa-solid fa-headset"></i> Health</a> </li>
                    <li><a href=""><i class="fa-solid fa-circle-question"></i> Entertainment</a></li>

                </ul>
            </div>



            <div class="footer-one-col">
                <h2>Post</h2>
                <hr>
                <ul>
                    <li><a href="http://localhost/newsaggregator/post.php"><i class="fa-solid fa-house"></i> Post
                            show</a></li>
                    <li><a href="http://localhost/newsaggregator/post-add.php"><i class="fa-solid fa-headset"></i> Post
                            add</a> </li>
                    <li><a href="http://localhost/newsaggregator/category-add.php"><i class="fa-solid fa-circle-question"></i> Category Add</a></li>
                    <li><a href="http://localhost/newsaggregator/category.php"><i class="fa-solid fa-user"></i> Category
                            Show</a></li>
                    <li><a href=""><i class="fa-solid fa-right-left"></i> Returns</a></li>
                </ul>
            </div>
            <div class="footer-one-col">
                <h2>Concepts</h2>
                <hr>
                <ul>
                    <li><a href="#" target="_blank"><i class="fa-solid fa-angles-right"></i> Overall idea</a></li>
                    <li><a href="#" target="_blank"><i class="fa-solid fa-angles-right"></i> News Page</a></li>
                    <li><a href="#" target="_blank"><i class="fa-solid fa-angles-right"></i> Home, Images</a></li>

                </ul>
            </div>


            <div class="footer-one-col">
                <h2>Love to join with us?</h2>
                <hr>
                <p>Sign up for our newslater to get latest news</p>
                <form action="" method="get">

                    <input type="email" name="email" placeholder="Your email" required>
                    <input type="submit" id="submit" name="subscriber" value="Subscribe">

                </form>



            </div>


    </section>



    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
    </script>

    <!-- Footer start -->
    </body>

</html>