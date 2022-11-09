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
    $cause_explain = $_POST['cause_explain'];
    $cause_summary = $_POST['cause_summary'];

    $profile_pic = $_FILES["profile_pic"]["name"];
    $tempname9 = $_FILES["profile_pic"]["tmp_name"];
    $folder9 = "images/" . $profile_pic;
    if (!empty($profile_pic)) {
        if (!move_uploaded_file($tempname9, $folder9))
            echo ('<script>alert("Error in uploading Image")</script>');
        $result = mysqli_query($db, "UPDATE form_data set cause_title='$cause_title',location='$location',eligible='$eligible',profile_pic='$profile_pic',amount='$amount',cause_explain='$cause_explain',cause_summary='$cause_summary'  where id='$id' and status='Pending' ");
    } else {
        $result = mysqli_query($db, "UPDATE form_data set cause_title='$cause_title',location='$location',eligible='$eligible',amount='$amount',cause_explain='$cause_explain',cause_summary='$cause_summary' where id='$id' and status='Pending'");
    }
?>
    <script>
        let id = <?= $id ?>;
    </script>
<?php
    if ($result) {
        echo '<script>alert("Data Updated Successfully")</script>';
    } else {
        echo '<script>alert("Error in uploading data")</script>';
        // echo '<script>window.location = "index.php"</script>';
    }
    // header("Location: https://kashmirzakat.com/user-pending-edit-form.php");
    echo '<script>window.location = "user-pending-edit-form.php?id="+id</script>';
    exit();
}
