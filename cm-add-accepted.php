<?php
include 'assets/connection.php';
$name = $_POST['name'];
$id = $_POST['id'];

$query = "UPDATE campaigns_data SET 
            cause_manager = '$name' 
            where id = '$id' ";
if(mysqli_query($db, $query)){
    echo true;
} else {
    echo false;
}
?>