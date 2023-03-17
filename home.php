<?php include 'header.php'; ?>
<link rel="stylesheet" href="style.css">


<!-- Featured News  Start -->




<section class="featured-news">
    <div class="container">
        <div class="section-title">
            <h2 class="">Featured News</h2>
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
                    <a class="post-img" href="single.php?id=<?php echo $row['post_id'] ?>"><img
                            src="upload/<?php echo $row['post_img'] ?>" alt="" /></a>
                    <div class="featured-news-content-text">
                        <p>
                            <span class="post-cat">

                                <a
                                    href='category.php?cid=<?php echo $row['category'] ?>'><?php echo $row['news_cat_name'] ?></a>
                                <i class="fa fa-tags" aria-hidden="true"></i>
                            </span>

                            <span class="post-date">
                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                <?php echo $row['post_date'] ?>
                            </span>


                        </p>

                        <h3><a href='single-news.php?id=<?php echo $row['post_id'] ?>'><?php echo $row['title'] ?></a>
                        </h3>

                        <p class="description">
                            <?php echo substr($row['description'], 0, 170) . "..." ?>
                        </p>

                        <a class='read-more pull-right' href='single.php?id=<?php echo $row['post_id'] ?>'>read
                            more</a>
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




<?php include 'footer.php'; ?>