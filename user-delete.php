<?php

include 'dbConnect.php';

if ($_SESSION['user_role'] == '0') {
	header("location: post.php");
}

$rcv_id = $_GET['user_id'];

$query = "DELETE FROM users WHERE user_id = '{$rcv_id}'";

$result = mysqli_query($db_conn, $query);

if ($result) {
	header("location: users.php");
} else {
	echo "Can't Delete User.";
}

mysqli_close($db_conn);
