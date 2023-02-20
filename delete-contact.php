<?php
$id = $_GET['id'];
include 'assets/connection.php';
$sql = mysqli_query($db, "delete from user_contact where id = '$id'");
if($sql){
    echo '<script>alert("Deletion successful");</script>';
    echo'<script>location.href="admin-contactlist.php"</script>';
} else {
    echo '<script>alert("Deletion Failed");</script>';
}