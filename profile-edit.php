<?php
session_start();
include 'assets/connection.php';
$useremail = $_SESSION['useremail'];
if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $country = $_POST['country'];

    $profile_pic = $_FILES["profile_pic"]["name"];
    $tempname8 = $_FILES["profile_pic"]["tmp_name"];
    $folder8 = "images/" . $profile_pic;
    if (!empty($profile_pic))
        $result = mysqli_query($db, "UPDATE users set name='$name',email='$email',phone='$phone',profile_pic='$profile_pic',country='$country' where email='$useremail'");
    else
        $result = mysqli_query($db, "UPDATE users set name='$name',email='$email',phone='$phone',country='$country' where email='$useremail'");


    if (!move_uploaded_file($tempname8, $folder8))
        echo ("Image Upload problem");
    if ($result) {
        echo '<script>alert("Profile Updated Successfully")</script>';
        echo '<script>window.location = "account-setting.php"</script>';
    } else {
        echo '<script>alert("Error in uploading data")</script>';
        echo '<script>window.location = "account-setting.php"</script>';
    }
}
