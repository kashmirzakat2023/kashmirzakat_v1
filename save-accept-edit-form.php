<?php
session_start();
include 'assets/connection.php';
$id = $_GET['id'];
if (isset($_POST['submit'])) {

    $cause_title = $_POST['cause_title'];
    $location = $_POST['location'];
    $purpose = $_POST['purpose'];
    $eligible = $_POST['eligible'];
    $amount = $_POST['amount'];
    $date = $_POST['date'];
    $cause_explain = $_POST['cause_explain'];
    $cause_summary = $_POST['cause_summary'];

    $profile_pic = $_FILES["profile_pic"]["name"];
    $tempname9 = $_FILES["profile_pic"]["tmp_name"];
    $folder9 = "images/" . $profile_pic;
    $result = false;
    if (!empty($profile_pic)) {
        $result = mysqli_query($db, "UPDATE form_data set cause_title='$cause_title',location='$location',eligible='$eligible',profile_pic='$profile_pic',amount='$amount',cause_explain='$cause_explain', cause_summary='$cause_summary', date = '$date' where id='$id'");
        if (!move_uploaded_file($tempname9, $folder9))
            echo ('<script>alert("Error in uploading Image")</script>');
    } else {
        $result = mysqli_query($db, "UPDATE form_data set cause_title='$cause_title',location='$location',eligible='$eligible',amount='$amount',cause_explain='$cause_explain',cause_summary='$cause_summary', date = '$date' where id='$id'");
    }


    if ($result) {
        echo '<script>alert("Profile Updated Successfully")</script>';
    } else {
        echo '<script>alert("Error in uploading data")</script>';
    }
    echo '<script>window.location = "index.php"</script>';
}
