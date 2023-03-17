<?php
include "dbConnect.php";

$post_id = $_GET['id'];
$cat_id = $_GET['catid'];

$query1 = "SELECT * FROM post WHERE post_id = {$post_id}";
$result = mysqli_query($db_conn, $query1) or die("Query Failed : Select");
$row = mysqli_fetch_assoc($result);

unlink("upload/" . $row['post_img']);


$query = "DELETE FROM post WHERE post_id = {$post_id};";
$query .= "UPDATE category SET post = post - 1 WHERE category_id = {$cat_id}";

if (mysqli_multi_query($db_conn, $query)) {
  header("location: post.php");
} else {
  echo "Query Failed";
}
