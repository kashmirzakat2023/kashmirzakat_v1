<?php
session_start();
include 'assets/connection.php';
$username = $_SESSION['username'];
if (isset($_POST['submit'])) {
    $password = $_POST['password'];
    $newpassword = $_POST['new-password'];
    $pass = mysqli_query($db,"SELECT * from users where name = '$username'");
    while($data = mysqli_fetch_array($pass))
    $rpassword = $data['PASSWORD'];
    if($password == $rpassword){
        if($newpassword != ""){

            $result = mysqli_query($db, "UPDATE users set PASSWORD='$newpassword' where name='$username'");
            if ($result) {
                echo '<script>alert("Profile Updated Successfully")</script>';
                echo '<script>window.location = "account-setting.php"</script>';
            } else {
                echo '<script>alert("Error in uploading data")</script>';
                echo '<script>window.location = "account-setting.php"</script>';
            }
        }
        else{
            echo '<script>alert("Password can\'t be empty")</script>';
            echo '<script>window.location = "account-setting.php"</script>';
            
        }
    }else{
        echo '<script>alert("Current Password Incorrect")</script>';
        echo '<script>window.location = "account-setting.php"</script>';
    }

}
