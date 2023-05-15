<?php
include 'assets/connection.php';
$email = $_POST['email'];
$password = md5($_POST['password']);

$query = "UPDATE users set PASSWORD='$password' where email = '$email'";
if (mysqli_query($db, $query)){
    $pass = "true";
}else{
    $pass = "false";
}
echo $pass;
