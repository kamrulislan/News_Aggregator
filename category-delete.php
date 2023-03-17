<?php

include 'dbConnect.php';

if ($_SESSION['user_role'] == '0') {
	header("location: post.php");
}

$rev_news_cat_id = $_GET['news_cat_id'];

$query = "DELETE FROM news_cat WHERE news_cat_id = '{$rev_news_cat_id}'";

$result = mysqli_query($db_conn, $query);

if ($result) {
	header("location: category.php");
} else {
	echo "Can't Delete Category.";
}

mysqli_close($db_conn);
