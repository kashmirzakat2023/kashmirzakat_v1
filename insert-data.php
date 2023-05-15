<?php
include 'assets/connection.php';
$name = $_POST['name'];
$email = $_POST['email'];
$password = md5($_POST['password']);
$phone = $_POST['phone'];

$query = "INSERT INTO users(name, email, PASSWORD, phone) VALUES ('$name','$email','$password','$phone')";

if(mysqli_query($db, $query)){
    echo true;
} else {
    echo false;
}
?>