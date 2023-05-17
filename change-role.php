<?php
session_start();
include 'assets/connection.php';
$uid = $_POST['userId'];
$user_type = $_POST['dropdownValue'];
$sql = mysqli_query($db, "UPDATE users set user_type = '$user_type' where id='$uid'");
// if($sql)
// echo '<script>console.log("ddd")</script>';
// else
// echo '<script>console.log("err")</script>';
