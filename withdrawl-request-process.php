<?php
session_start();
if (isset($_POST['submit'])) {
    $id = $_GET['id'];
    include 'assets/connection.php';
    $name = $_SESSION['username'];
    $email = $_SESSION['useremail'];
    $amount = $_POST['amount'];
    $optional = $_POST['optional'];

    $sql = "INSERT INTO withdrawl_request(amount,name,optional,raiseid,email ) values ('$amount','$name','$optional','$id','$email')";

    if (mysqli_query($db, $sql)) {
        echo '<script>alert("Your request have been submited successfully.Our team will update you soon")</script>';
    } else {
        echo '<script>alert("Error in uploading data")</script>';
    }
    echo '<script>window.location.href="withdrawls-list.php?status=Accepted"</script>';
}
