<?php
$id = $_GET['id'];
include 'assets/connection.php';
if(
mysqli_query($db, "UPDATE form_data SET status='Accepted' where id= '$id'")){
    echo '<script>window.location = "index.php"</script>';
    echo '<script>alrt("Cause accepted successfully");</script>';
}
else{
    echo '<script>alrt("Error in accepting cause");</script>';
}

