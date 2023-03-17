<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="asset/users.css">
<?php include "header.php";

if ($_SESSION['user_role'] == '0') {
  header("location: post.php");
}

?>
<div id="admin-content">
  <div class="container">
    <div class="row">


      <div class="user-head">
        <i class="fas fa-newspaper"></i><span>All Categories</span>
      </div>


      <div class="standart-btn" style="margin: 20px 0">
        <a class="add-new" href="category-add.php"><i class="fas fa-newspaper"></i> Add
          category</a>
      </div>


      <div class="col-md-12">

        <?php

        include "dbConnect.php";

        $limit = 3;

        if (isset($_GET['page'])) {
          $page_number = $_GET['page'];
        } else {
          $page_number = 1;
        }

        $offset = ($page_number - 1) * $limit;


        $query = "SELECT * FROM news_cat ORDER BY news_cat_id DESC LIMIT {$offset}, {$limit}";
        $result = mysqli_query($db_conn, $query) or die("Failed");
        $count = mysqli_num_rows($result);

        if ($count > 0) {

        ?>
          <div class="user-table">
            <div class="user-data">

              <table class="content-table" width="100%">
                <thead>
                  <th>S.No.</th>
                  <th>Category Name</th>
                  <th>No. of Posts</th>
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
                      <td><?php echo $row['news_cat_name'] ?></td>
                      <td><?php echo $row['post'] ?></td>


                      <td class='edit'><a href='category-update.php?news_cat_id=<?php echo $row['news_cat_id'] ?>'><i class='fa fa-edit'></i></a></td>


                      <td class='delete'><a onclick="return confirm('Are You Sure?')" href='category-delete.php?news_cat_id=<?php echo $row['news_cat_id'] ?>'><i class="fa-solid fa-trash-can"></i></a></td>


                    </tr>

                  <?php } ?>

                </tbody>
              <?php } ?>
              </table>

            </div>
          </div>

          <?php

          include "dbConnect.php";
          $query2 = "SELECT * FROM news_cat";
          $result2 = mysqli_query($db_conn, $query2) or dir("Failed.");
          if (mysqli_num_rows($result2)) {
            $total_records = mysqli_num_rows($result2);
            $total_page = ceil($total_records / $limit);

            echo "<ul class='pagination admin-pagination'>";
            if ($page_number > 1) {
              echo '<li><a href="category.php?page=' . ($page_number - 1) . '">prev</a></li>';
            }

            for ($i = 1; $i <= $total_page; $i++) {

              if ($i == $page_number) {
                $active = "active";
              } else {
                $active = "";
              }

              echo '<li class=' . $active . '><a href="category.php?page=' . $i . '">' . $i . '</a></li>';
            }
            if ($total_page > $page_number) {
              echo '<li><a href="category.php?page=' . ($page_number + 1) . '">next</a></li>';
            }
            echo "</ul>";
          }


          ?>

      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>