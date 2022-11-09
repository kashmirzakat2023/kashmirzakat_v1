<?php
session_start();
include 'assets/connection.php';
// if (isset($_POST['showlike'])){
$query2 = mysqli_query($db, "select * from `like` where raiseid='" . $_SESSION['id'] . "'");
$rows = mysqli_num_rows($query2);
// }
echo $rows;
