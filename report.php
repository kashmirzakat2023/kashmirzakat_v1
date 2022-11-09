<?php
session_start();
include 'assets/connection.php';
if (isset($_POST['report'])) {
	$id =   $_SESSION['id'];
	$cause =   $_SESSION['cause'];
	$username = $_SESSION['username'];
	$query = mysqli_query($db, "select * from `report` where raiseid='$id' and name='$username'");

	if (!mysqli_num_rows($query) > 0) {
		mysqli_query($db, "insert into `report` (name,cause_title,raiseid) values ('$username', '$cause','$id')");
	}
}
