<?php

include_once('header.php');
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="refresh" content="">
    <title>Home</title>
</head>

<body>

    <!-- body first row open -->
    <section class="container">
        <div class="firt-row">
            <div class="home-banner">
                <div class="recent post">
                    <h2 class="title">Latest News</h2>
                    <h2>Make Money Online Creating Websites</h2>
                    <p>Libero non, blandit blandit, sed odio lectus. Senectus donec, lacus scelerisque, vestibulum id
                        tristique. Suspendisse ut dignissim. Etiam posuere netus, libero condimentum eu. Aenean a ut.
                        Elit aliquet porttitor.</p>

                    <img src="asset\img\5.jpg" alt="" class="alignleft" />
                    <p>A cras tincidunt, ut tellus et. Gravida scelerisque, ipsum sed iaculis, nunc non nam. Placerat
                        sed phasellus, purus purus elit. Cras ante eros.</p>
                    <p>A cras tincidunt, ut tellus et. Gravida scelerisque, ipsum sed iaculis, nunc non nam. Placerat
                        sed phasellus, purus purus elit. Cras ante eros. Erat vel. Donec vestibulum sed, vel euismod
                        donec.</p>
                    <p>Cras ante eros. Erat vel. Donec vestibulum sed, vel euismod donec. Gravida scelerisque, ipsum sed
                        iaculis, nunc non nam. Placerat sed phasellus, purus purus elit. Cras ante eros.</p>


                </div>
            </div>

            <div class="home-category">


                <a href="categoires.php">
                    <div class="home-cat home-cat-first-row">

                        <div class="home-cat-l">Recent news</div>
                        <!-- <div class="home-cat-r"><i class="fa-solid fa-arrow-right-to-bracket"></i></div> -->

                    </div>
                </a>


                <a href="shop.php">
                    <div class="home-cat">

                        <img src="asset\img\21.jpg" alt="">
                        <h1>Vestibulum ut est augue, in varius</h1>

                    </div>

                </a>


                <a href="shop.php">
                    <div class="home-cat">

                        <img src="asset\img\21.jpg" alt="">
                        <h1>Vestibulum ut est augue, in varius</h1>

                    </div>
                </a>

            </div>






        </div>

    </section>

    <!-- body first row close -->

    <!-- Featured News Slider End -->




    <section class="featured-news">
        <div class="container">
            <div class="section-title">
                <h2 class="">Technology</h2>
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

                        <div class="featured-news-col">

                            <div class="featured-news-content">
                                <a class="post-img" href="single.php?id=<?php echo $row['post_id'] ?>"><img src="upload/<?php echo $row['post_img'] ?>" alt="" /></a>
                                <div class="featured-news-content-text">
                                    <p>
                                        <span class="post-cat">
                                            <!-- 
                                    <a
                                        href='category.php?cid=<?php echo $row['category'] ?>'><?php echo $row['news_cat_name'] ?></a> -->
                                            <i class="fa fa-tags" aria-hidden="true"></i> <?php echo $row['news_cat_name'] ?>

                                        </span>

                                        <span class="post-date">
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                            <?php echo $row['post_date'] ?>
                                        </span>


                                    </p>

                                    <h3><?php echo $row['title'] ?></h3>

                                    <p class="description">
                                        <?php echo substr($row['description'], 0, 150) . "..." ?>
                                    </p>
                                    <div class="standart-btn">
                                        <a class='read-more pull-right' href='single-news.php?id=<?php echo $row['post_id'] ?>'>read
                                            more</a>
                                    </div>

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


    <!-- Books Start -->

    <section class="top-books">
        <div class="container">
            <div class="section-title">
                <h2 class="">Top Books</h2>
            </div>


            <div class="featured-news-row">





                <?php


                $api_books = file_get_contents("https://api.nytimes.com/svc/books/v3/lists/current/hardcover-fiction.json?api-key=4VbuYdCxGyHn3SK31pXDYouqxW3ycGia");
                $api_books_news = json_decode($api_books, true);
                echo "<pre>";
                //print_r($news['results'][0]['title']);
                echo "</pre>";

                ?>



                <?php
                for ($i = 4; $i < 8; $i++) {

                ?>



                    <div class="featured-news-col">

                        <div class="featured-news-content">
                            <img src="<?php echo $api_books_news['results']['books'][$i]['book_image'] ?>" alt="">
                            <div class="featured-news-content-text">

                                <p> <span class="post-cat"><?php echo $api_books_news['results']['books'][$i]['publisher'] ?>
                                    </span>

                                </p>

                                <h3><?php echo $api_books_news['results']['books'][$i]['title'] ?> </h3>

                                <p><?php echo $api_books_news['results']['books'][$i]['description'] ?></p>
                                <p><?php echo $api_books_news['results']['books'][$i]['display_name'] ?></p>
                                <div class="standart-btn">


                                    <a href="<?php echo $api_books_news['results']['books'][$i]['amazon_product_url'] ?>" target="_blank">Read
                                        More</a>
                                </div>
                            </div>
                        </div>
                    </div>



                <?php } ?>








            </div>
        </div>
    </section>

    <!-- Books End -->


    <!-- Business News Start -->

    <section class="featured-news">
        <div class="container">
            <div class="section-title">
                <h2 class="">Business</h2>
            </div>
            <div class="featured-news-row">





                <?php


                $businessapi = file_get_contents("https://api.nytimes.com/svc/news/v3/content/nyt/business.json?api-key=4VbuYdCxGyHn3SK31pXDYouqxW3ycGia");
                $businessapinews = json_decode($businessapi, true);

                ?>



                <?php
                for ($i = 8; $i < 12; $i++) {

                ?>



                    <div class="featured-news-col">

                        <div class="featured-news-content">
                            <img src="<?php echo $businessapinews['results'][$i]['thumbnail_standard'] ?>" alt="">
                            <div class="featured-news-content-text">

                                <p> <span class="post-cat"><?php echo $businessapinews['results'][$i]['section'] ?> </span>
                                    <span class="post-date"><?php echo $businessapinews['results'][$i]['published_date'] ?></span>
                                </p>

                                <h3><?php echo $businessapinews['results'][$i]['title'] ?> </h3>

                                <p><?php echo $businessapinews['results'][$i]['abstract'] ?></p>
                                <p><?php echo $businessapinews['results'][$i]['type'] ?></p>
                                <div class="standart-btn">
                                    <a href="<?php echo $businessapinews['results'][$i]['url'] ?>" target="_blank">Read
                                        More</a>
                                </div>

                            </div>
                        </div>
                    </div>



                <?php } ?>








            </div>
        </div>
    </section>




    <!-- footer section open -->
    <?php include_once('footer.php'); ?>
    <!-- footer section close -->
</body>

</html>