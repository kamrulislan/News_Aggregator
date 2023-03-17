<?php include "header.php";

if ($_SESSION['user_role'] == '0') {
  header("location: post.php");
}


if (isset($_POST['news_cat_update'])) {

  include 'dbConnect.php';

  $news_cat_id = mysqli_real_escape_string($db_conn, $_POST['news_cat_id']);
  $news_cat_name = mysqli_real_escape_string($db_conn, $_POST['news_cat_name']);

  //UPDATE `category` SET `category_name` = 'js' WHERE `category`.`category_id` = 7;

  $query1 = "UPDATE news_cat SET news_cat_name = '{$news_cat_name}' 
               WHERE news_cat_id = '{$news_cat_id}'";

  $result1 = mysqli_query($db_conn, $query1) or die("Update Query faild.");
  if ($result1) {
    header("location: category.php");
  }
}


?>



<div id="admin-content">
  <div class="container">
    <div class="row">

      <div class="col-md-12">
        <h1 class="adin-heading"> Update Category</h1>
      </div>


      <div class="col-md-offset-3 col-md-6">
        <?php

        $category_id = $_GET['news_cat_id'];

        include "dbConnect.php";
        $query = "SELECT * FROM news_cat WHERE news_cat_id = {$category_id}";
        $result = mysqli_query($db_conn, $query) or die("Failed");
        $count = mysqli_num_rows($result);

        if ($count > 0) {
          while ($row = mysqli_fetch_assoc($result)) {

        ?>

            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
              <div class="form-group">
                <input type="hidden" name="news_cat_id" class="form-control" value="<?php echo $row['news_cat_id'] ?>" placeholder="">
              </div>
              <div class="form-group">
                <label>Category Name</label>
                <input type="text" name="news_cat_name" class="form-control" value="<?php echo $row['news_cat_name'] ?>" placeholder="" required>
              </div>
              <input type="submit" name="news_cat_update" class="btn btn-primary" value="Update" required />
            </form>


        <?php
          }
        }

        ?>

      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>