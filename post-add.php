<?php include "header.php"; ?>


<link rel="stylesheet" href="asset/form.css">

<div id="admin-content">

    <div class="container">
        <div class="post-add">




            <div class="user-head">
                <h2>Add New News</h2>
            </div>

            <div class="">
                <!-- Form -->
                <form action="post-save.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="post_title">Title</label>
                        <input type="text" name="post_title" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1"> Description</label><br>
                        <textarea name="postdesc" class="form-control" rows="5" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Category</label><br>
                        <select name="category" class="form-control">
                            <option disabled selected> Select Category</option>

                            <?php

                            include "dbConnect.php";
                            $query = "SELECT * FROM news_cat";
                            $result = mysqli_query($db_conn, $query) or die("query failed.");

                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value='{$row['news_cat_id']}'> {$row['news_cat_name']} </option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Post image</label>
                        <input type="file" name="fileToUpload" required>
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary" value="Save" required />
                </form>
                <!--/Form -->
            </div>
        </div>
    </div>
</div>
<!-- footer section open -->
<?php include_once('footer.php'); ?>
<!-- footer section close -->