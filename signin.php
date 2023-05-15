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
        if (($useremail == $row['email']) && (md5($userpass) == $row['PASSWORD'])) {
            $_SESSION['user_type'] = $row['user_type'];
            $res = mysqli_query($db, "SELECT * FROM users where email='$useremail'");
            $_SESSION['useremail'] = $useremail;
            while ($row1 = mysqli_fetch_array($res)) {
                $_SESSION['username'] = $row1['name'];
            }
            echo '<script>alert("Login Successful")</script>';
            $count++;
            echo '<script>history.back()</script>';
        }
    }
    if ($count == 0) {
        echo '<script>alert("Incorrect credentials")</script>';
        echo '<script>history.back()</script>';
    }
    mysqli_close($db);
}
