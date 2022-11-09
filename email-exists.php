<?php
include 'assets/connection.php';

if (isset($_POST['email'])) {
    $email = $_POST['email'];

    $query = "SELECT * from users where email='$email'";

    $result = mysqli_query($db, $query);
    $response = "<span style='color: green;'>Available.</span>";
    if (mysqli_num_rows($result) > 0) {
        $response = "<span style='color: red;'>Email already taken</span>";
    }

    echo $response;
    die;
}
