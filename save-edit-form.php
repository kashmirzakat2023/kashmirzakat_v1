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
    if ($_SESSION['user_type'] == 2 || $_SESSION['user_type'] == 1)
        $date = $_POST['date'];
    $cause_explain = $_POST['cause_explain'];
    $cause_summary = $_POST['cause_summary'];
    function generateFileName()
    {
        $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789_";
        $name = "";
        for ($i = 0; $i < 20; $i++)
            $name .= $chars[rand(0, strlen($chars) - 1)];
        return $name;
    }
    if (!empty($profile_pic))
        $profile_pic = generateFileName() . '.' . pathinfo($_FILES["profile_pic"]["name"], PATHINFO_EXTENSION);
    else
        $profile_pic = $_FILES["profile_pic"]["name"];
    $tempname9 = $_FILES["profile_pic"]["tmp_name"];
    $folder9 = "images/" . $profile_pic;

    if ($_SESSION['user_type'] == 2 || $_SESSION['user_type'] == 1) {
        if (!empty($profile_pic)) {
            $result = mysqli_query($db, "UPDATE campaigns_data set cause_title='$cause_title',location='$location',eligible='$eligible',profile_pic='$profile_pic',amount='$amount',cause_explain='$cause_explain', cause_summary='$cause_summary', date = '$date' where id='$id'");
            if (!move_uploaded_file($tempname9, $folder9))
                echo ('<script>alert("Error in uploading Image")</script>');
        } else
            $result = mysqli_query($db, "UPDATE campaigns_data set cause_title='$cause_title',location='$location',eligible='$eligible',amount='$amount',cause_explain='$cause_explain',cause_summary='$cause_summary', date = '$date' where id='$id'");
    } else {
        if (!empty($profile_pic)) {
            $result = mysqli_query($db, "UPDATE campaigns_data set cause_title='$cause_title',location='$location',eligible='$eligible',profile_pic='$profile_pic',amount='$amount',cause_explain='$cause_explain',cause_summary='$cause_summary' where id='$id'");
            if (!move_uploaded_file($tempname9, $folder9))
                echo ('<script>alert("Error in uploading Image")</script>');
        } else
            $result = mysqli_query($db, "UPDATE campaigns_data set cause_title='$cause_title',location='$location',eligible='$eligible',amount='$amount',cause_explain='$cause_explain',cause_summary='$cause_summary' where id='$id'");
    }
    if ($result) {
        echo '<script>alert("Data Updated Successfully")</script>';
    } else {
        echo '<script>alert("Error in uploading data")</script>';
    }
?>
    <script>
        let id = <?= $id ?>;
        let prevPageAddress = <?= $id ?>;
    </script>
<?php
    echo '<script>history.back();</script>';
}
