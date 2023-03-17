<?php

include "header.php";

if ($_SESSION['user_role'] == '0') {
  header("location: post.php");
}



?>

<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="stylesheet" href="asset/users.css">
</head>


<div id="admin-content">
    <div class="container">


        <div class="user-head">
            <i class="fa-solid fa-users"></i><span>All Users</span>
        </div>


        <div class="">

            <?php

      include "dbConnect.php";
      $limit = 5;

      if (isset($_GET['page'])) {
        $page_number = $_GET['page'];
      } else {
        $page_number = 1;
      }

      $offset = ($page_number - 1) * $limit;


      $query = "SELECT * FROM users ORDER BY user_id DESC LIMIT {$offset}, {$limit}";
      $result = mysqli_query($db_conn, $query) or die("Failed");
      $count = mysqli_num_rows($result);

      if ($count > 0) {

      ?>

            <div class="user-table">
                <div class="user-data">


                    <table class="content-table" width="100%">
                        <thead>

                            <th>Full Name</th>
                            <th>User Name</th>
                            <th>Role</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>

                            <?php
                while ($row = mysqli_fetch_assoc($result)) {

                ?>
                            <tr>
                                <!--<td class='id'><?php echo $row['user_id'] ?></td>-->
                                <td><?php echo $row['user_yourname'] . " " . $row['user_username'] ?></td>
                                <td><?php echo $row['user_username'] ?></td>
                                <td>
                                    <?php

                      if ($row['user_role'] == 1) {
                        echo "Admin";
                      } else {
                        echo "Moderator";
                      }

                      ?>
                                </td>
                                <td class='edit'><a href='user-update.php?user_id=<?php echo $row['user_id'] ?>'><i
                                            class='fa fa-edit'></i></a></td>


                                <td class='delete'><a onclick="return confirm('Are You Sure?')"
                                        href='user-delete.php?user_id=<?php echo $row['user_id'] ?>'><i
                                            class="fa-solid fa-trash-can"></i></a></td>
                            </tr>

                            <?php } ?>

                        </tbody>

                        <?php } ?>
                    </table>





                </div>
            </div>

            <div class="standart-btn">
                <a class="add-new-user" href="user-registration.php"><i class="fa-solid fa-user-plus"></i> Add
                    user</a>
            </div>


            <?php


        /*paganation*/
        include "dbConnect.php";
        $paganation = "SELECT * FROM users";
        $paganation_run = mysqli_query($db_conn, $paganation) or dir("Failed.");
        if (mysqli_num_rows($paganation_run)) {
          $total_records = mysqli_num_rows($paganation_run);
          $total_page = ceil($total_records / $limit);

          echo "<ul class='pagination admin-pagination'>";
          if ($page_number > 1) {
            echo '<li><a href="users.php?page=' . ($page_number - 1) . '">prev</a></li>';
          }

          for ($i = 1; $i <= $total_page; $i++) {

            if ($i == $page_number) {
              $active = "active";
            } else {
              $active = "";
            }

            echo '<li class=' . $active . '><a href="users.php?page=' . $i . '">' . $i . '</a></li>';
          }
          if ($total_page > $page_number) {
            echo '<li><a href="users.php?page=' . ($page_number + 1) . '">next</a></li>';
          }
          echo "</ul>";
        }


        ?>



        </div>

    </div>
</div>
<?php include "footer.php"; ?>