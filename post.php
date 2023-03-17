<?php include "header.php"; ?>
<link rel="stylesheet" href="asset/users.css">
<link rel="stylesheet" href="asset/style.css">
<div id="admin-content">
    <div class="container">
        <div class="row">

            <div class="user-head">
                <i class="fa-regular fa-newspaper"></i><span>All NEWS</span>
            </div>


            <div class="standart-btn" style="margin: 20px 0">
                <a class="r" href="post-add.php"><i class="fa-regular fa-newspaper"></i> Add news</a>
            </div>
            <div class="col-md-12">

                <?php

        include "dbConnect.php";
        $limit = 5;

        if (isset($_GET['page'])) {
          $page_number = $_GET['page'];
        } else {
          $page_number = 1;
        }

        $offset = ($page_number - 1) * $limit;


        if ($_SESSION['user_role'] == '1') {
          $query = "SELECT post.post_id, post.title, post.description,post.post_img, post.post_date,post.category, news_cat.news_cat_name,users.user_yourname FROM post
  LEFT JOIN news_cat ON post.category = news_cat.news_cat_id
  LEFT JOIN users ON post.author = users.user_id
  ORDER BY post.post_id DESC LIMIT {$offset},{$limit}";
        } elseif ($_SESSION['user_role'] == '0') {
          $query = "SELECT post.post_id, post.title, post.description,post.post_img, post.post_date,post.category, news_cat.news_cat_name,users.user_username FROM post
  LEFT JOIN news_cat ON post.category = news_cat.news_cat_id
  LEFT JOIN users ON post.author = users.user_id
  WHERE post.author = {$_SESSION['user_id']}
  ORDER BY post.post_id DESC LIMIT {$offset},{$limit}";
        }

        $result = mysqli_query($db_conn, $query) or die("Failed to 1");
        $count = mysqli_num_rows($result);

        if ($count > 0) {

        ?>

                <div class="user-table">
                    <div class="user-data">


                        <table class="content-table" width="100%">
                            <thead>
                                <th>S.No.</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Date</th>
                                <th>Author</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </thead>
                            <tbody>
                                <?php
                  $serial_number = 1;
                  while ($row = mysqli_fetch_assoc($result)) {

                  ?>
                                <tr>
                                    <td class='id'><?php echo $serial_number++ ?></td>
                                    <td><img height="50px" src="upload/<?php echo $row['post_img'] ?>"></td>
                                    <td><?php echo $row['title'] ?></td>
                                    <td><?php echo $row['news_cat_name'] ?></td>
                                    <td><?php echo $row['post_date'] ?></td>
                                    <td><?php echo $row['user_yourname'] ?></td>

                                    <td class='edit'><a href='post-update.php?id=<?php echo $row['post_id'] ?>'><i
                                                class='fa fa-edit'></i></a></td>
                                    <td class='delete'><a onclick="return confirm('Are You Sure?')"
                                            href='post-delete.php?id=<?php echo $row['post_id'] ?>&catid=<?php echo $row['category'] ?>'><i
                                                class="fa-solid fa-trash-can"></i></a></td>


                                </tr>
                                <?php } ?>
                            </tbody>
                            <?php } ?>
                        </table>

                    </div>
                </div>
                <?php

          include "dbConnect.php";
          $query2 = "SELECT * FROM post";
          $result2 = mysqli_query($db_conn, $query2) or dir("Failed to 2.");
          if (mysqli_num_rows($result2)) {
            $total_records = mysqli_num_rows($result2);
            $total_page = ceil($total_records / $limit);

            echo "<ul class='pagination admin-pagination'>";
            if ($page_number > 1) {
              echo '<li><a href="post.php?page=' . ($page_number - 1) . '">prev</a></li>';
            }

            for ($i = 1; $i <= $total_page; $i++) {

              if ($i == $page_number) {
                $active = "active";
              } else {
                $active = "";
              }

              echo '<li class=' . $active . '><a href="post.php?page=' . $i . '">' . $i . '</a></li>';
            }
            if ($total_page > $page_number) {
              echo '<li><a href="post.php?page=' . ($page_number + 1) . '">next</a></li>';
            }
            echo "</ul>";
          }


          ?>

            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>