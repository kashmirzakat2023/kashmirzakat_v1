<?php
include 'assets/connection.php';
$name = $_POST['email'];
$id = $_POST['id'];

$query = "UPDATE accepted_form SET 
            cause_manager = '$name' 
            where id = '$id' ";
if(mysqli_query($db, $query)){
    echo true;
} else {
    echo false;
}
?>