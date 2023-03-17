<?php include "header.php"; ?>


<link rel="stylesheet" href="asset/form.css">


<div id="admin-content">
    <div class="container">
        <div class="">



            <div class="user-head">
                <i class="fa-solid fa-users"></i><span>Add New Category</span>
            </div>
            <div class="">
                <?php

        if (isset($_POST['news_cat_sub'])) {

          include 'dbConnect.php';

          $news_cat_name = mysqli_real_escape_string($db_conn, $_POST['news_cat_name']);

          $new_cat_query = "SELECT news_cat_name FROM news_cat WHERE news_cat_name='{$news_cat_name}'";
          $new_cat_query_run = mysqli_query($db_conn, $new_cat_query) or die("Query faild.");

          $count = mysqli_num_rows($new_cat_query_run);
          if ($count > 0) {
            echo "Category Already Exists.";
          } else {
            $new_cat_add_query = "INSERT INTO news_cat (news_cat_name) VALUE ('$news_cat_name')";
            $new_cat_add_query_run = mysqli_query($db_conn, $new_cat_add_query) or die("Query Failed.");

            if ($new_cat_add_query_run) {
              header("location: category.php");
            }
          }
        }


        ?>


                <!-- Form Start -->
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">
                    <div class="form-group">
                        <label>News Category</label>
                        <input type="text" name="news_cat_name" class="form-control" placeholder="Category Name"
                            required>
                    </div>
                    <input type="submit" name="news_cat_sub" class="" value="Save" required />
                </form>
                <!-- /Form End -->
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>