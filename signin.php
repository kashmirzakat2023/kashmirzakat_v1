<?php
session_start();
include 'assets/connection.php';
// If upload button is clicked ...
if (isset($_POST['submit'])) {
    $useremail = $_POST['email'];
    $userpass = $_POST['userpass'];
    $result = mysqli_query($db, "SELECT * FROM users");
    $count = 0;
    while ($row = mysqli_fetch_array($result)) {
        if (($useremail == $row['email']) && ($userpass == $row['PASSWORD'])) {
        echo '<script>window.location = localStorage.getItem("curr_address")</script>';
            $res = mysqli_query($db, "SELECT * FROM users where email='$useremail'");
            $_SESSION['useremail'] = $useremail;
            while ($row1 = mysqli_fetch_array($res)) {
                $_SESSION['username'] = $row1['name'];
            }
            echo '<script>alert("Login Successful")</script>';
            $count++;
        }
    }
    if ($count == 0) {
        echo '<script>alert("Incorrect credentials")</script>';
        echo '<script>window.location = localStorage.getItem("curr_address")</script>';
    }
    mysqli_close($db);
}
