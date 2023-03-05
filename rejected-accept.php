<?php
$id = $_GET['id'];
include 'assets/connection.php';
if(
mysqli_query($db, "UPDATE form_data SET status='Accepted' where id= '$id'")){
    echo '<script>window.location = "index.php"</script>';
    echo '<script>alert("Cause accepted successfully");</script>';
}
else{
    echo '<script>alert("Error in accepting cause");</script>';
}

