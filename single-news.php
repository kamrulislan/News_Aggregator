<?php include 'header.php'; ?>

<meta http-equiv="refresh" content="500">
<link rel="stylesheet" href="asset/style.css">
<div id="main-content">
    <div class="container">
        <div class="news-first-row">



            <div class="news-first-left">
                <!-- news-container -->
                <?php

                include "dbConnect.php";

                $post_id = $_GET['id'];

                $query = "SELECT post.post_id, post.title, post.description,post.post_img, post.post_date,post.category, news_cat.news_cat_name,users.user_username,post.author FROM post
                    LEFT JOIN news_cat ON post.category = news_cat.news_cat_id
                    LEFT JOIN users ON post.author = users.user_id
                    WHERE post.post_id = {$post_id}";

                $result = mysqli_query($db_conn, $query) or die("Failed");
                $count = mysqli_num_rows($result);

                if ($count > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {

                ?>
                        <div class="news-container">
                            <div class="news-content single-news">
                                <h3><?php echo $row['title'] ?></h3>
                                <div class="news-information">
                                    <h4>
                                        <i class="fa fa-user" aria-hidden="true"></i> Author:
                                        <a href='author.php?author_id=<?php echo $row['author'] ?>'><?php echo $row['user_username'] ?></a>
                                    </h4>
                                    <span>
                                        <i class="fa fa-tags" aria-hidden="true"></i> <b> Category:</b>
                                        <?php echo $row['news_cat_name'] ?>
                                        <!-- <a
                                    href="category.php?cid=<?php echo $row['category'] ?>"><?php echo $row['news_cat_name'] ?></a> -->

                                    </span>

                                    <span>
                                        <i class="fa fa-calendar" aria-hidden="true"></i> <b>Published date: </b>
                                        <?php echo $row['post_date'] ?>
                                    </span>
                                </div>
                                <div class="single-feature-image">
                                    <img class="" src="upload/<?php echo $row['post_img'] ?>" alt="" />
                                </div>

                                <div class="single-news-description">
                                    <p><?php echo $row['description'] ?></p>
                                </div>
                            </div>
                        </div>


                <?php }
                } else {
                    echo "No Record Found.";
                }

                ?>

                <!-- /news-container -->
            </div>



            <!-- sidebar -->

            <div class="news-first-right">


                <!-- Featured News  Start -->




                <section class="single-news-heading">
                    <div class="container">
                        <div class="section-title">
                            <h2 class="">Recent News</h2>
                        </div>
                        <div class="featured-news-row">



                            <?php

                            include "dbConnect.php";
                            $limit = 5;

                            if (isset($_GET['page'])) {
                                $page_number = $_GET['page'];
                            } else {
                                $page_number = 1;
                            }

                            $offset = ($page_number - 1) * $limit;


                            $query = "SELECT post.post_id, post.title, post.description,post.post_img, post.post_date,post.category, news_cat.news_cat_name,users.user_username,post.author FROM post
                            LEFT JOIN news_cat ON post.category = news_cat.news_cat_id
                            LEFT JOIN users ON post.author = users.user_id
                            ORDER BY post.post_id DESC LIMIT {$offset},{$limit}";

                            $result = mysqli_query($db_conn, $query) or die("Failed");
                            $count = mysqli_num_rows($result);

                            if ($count > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {

                            ?>

                                    <div class="single-news-sidebar-col">

                                        <div class="single-news-sidebar-content">
                                            <div class="single-news-sidebar-content-img">
                                                <a class="post-img" href="single.php?id=<?php echo $row['post_id'] ?>"><img src="upload/<?php echo $row['post_img'] ?>" alt="" /></a>
                                            </div>

                                            <div class="single-news-sidebar-content-text">
                                                <p>
                                                    <!-- <span class="post-cat">

                                                <a
                                                    href='category.php?cid=<?php echo $row['category'] ?>'><?php echo $row['news_cat_name'] ?></a>
                                                <i class="fa fa-tags" aria-hidden="true"></i>
                                            </span> -->

                                                    <!-- <span class="post-date">
                                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                                        <?php echo $row['post_date'] ?>
                                                    </span> -->


                                                </p>

                                                <h3><a href='single-news.php?id=<?php echo $row['post_id'] ?>'><?php echo $row['title'] ?></a>
                                                </h3>




                                            </div>
                                        </div>
                                    </div>



                            <?php }
                            } else {
                                echo "No Record Found.";
                            }



                            ?>





                        </div>
                    </div>
                </section>

                <!-- Featured News  End -->

                <section class="container">
                    <div class="sidbar-adv single-news-heading">
                        <h2>Advertisement</h2>
                        <img src="asset/img/24.jpg" alt="">
                    </div>
                </section>

            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>