<?php include "header.php";

if ($_SESSION['user_role'] == '0') {
  header("location: post.php");
}

?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading">Update Post</h1>
            </div>
            <div class="col-md-offset-3 col-md-6">
                <!-- Form for show edit-->

                <?php
        include "dbConnect.php";
        $post_id = $_GET['id'];

        $query = "SELECT post.post_id, post.title, post.description, post.post_img, post.category, news_cat.news_cat_name FROM post
  LEFT JOIN news_cat ON post.category = news_cat.news_cat_id
  LEFT JOIN users ON post.author = users.user_id
  WHERE post.post_id = {$post_id}";

        $result = mysqli_query($db_conn, $query) or die("Failed");
        $count = mysqli_num_rows($result);

        if ($count > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
        ?>



                <form action="post-update-save.php" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <div class="form-group">
                        <input type="hidden" name="post_id" class="form-control" value="<?php echo $row['post_id']; ?>"
                            placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputTile">Title</label>
                        <input type="text" name="post_title" class="form-control" id="exampleInputUsername"
                            value="<?php echo $row['title']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1"> Description</label>
                        <textarea name="postdesc" class="form-control" required rows="5">
                    <?php echo $row['description']; ?>
                </textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputCategory">Category</label>
                        <select class="form-control" name="category">
                            <option disabled selected> Select Category</option>

                            <?php

                  include "dbConnect.php";
                  $query1 = "SELECT * FROM news_cat";
                  $result1 = mysqli_query($db_conn, $query1) or die("query failed.");

                  if (mysqli_num_rows($result1) > 0) {
                    while ($row1 = mysqli_fetch_assoc($result1)) {

                      if ($row['category'] == $row1['news_cat_id']) {
                        $selected = "selected";
                      } else {
                        $selected = "";
                      }

                      echo "<option {$selected} value='{$row1['news_cat_id']}'> {$row1['news_cat_name']} </option>";
                    }
                  }
                  ?>


                        </select>

                        <input type="hidden" name="old_category" value="<?php echo $row['category']; ?>">

                    </div>
                    <div class="form-group">
                        <label for="">Post image</label>
                        <input type="file" name="new-image">
                        <img src="upload/<?php echo $row['post_img']; ?>" height="150px">
                        <input type="hidden" name="old_image" value="<?php echo $row['post_img']; ?>">
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary" value="Update" />
                </form>

                <?php }
        } else {
          echo "Result not found.";
        }

        ?>



                <!-- Form End -->
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>