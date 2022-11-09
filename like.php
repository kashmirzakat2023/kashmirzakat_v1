<?php
session_start();
include 'assets/connection.php';
if (isset($_POST['like'])) {
	$id =   $_SESSION['id'];
	$username = $_SESSION['username'];
	$query = mysqli_query($db, "select * from `like` where raiseid='$id' and username='$username'");

	if (mysqli_num_rows($query) > 0) {
		mysqli_query($db, "delete from `like` where username='$username' and raiseid='$id'");
	} else {
		mysqli_query($db, "insert into `like` (username,raiseid) values ('$username', '$id')");
	}
}
