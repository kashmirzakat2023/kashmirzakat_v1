<?php
session_start();
include 'assets/connection.php';

if (isset($_POST['totalAmount'])) {
    $id = $_SESSION['id'];
    $select = $_POST['select'];
    $amt = $_POST['totalAmount'];
    $name = $_POST['fname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $comment = $_POST['comment'];
    $checked = $_POST['checked'];
    $utip = $_POST['tip'];
    date_default_timezone_set("Asia/Calcutta");
    $time = date("H:i:s");
    $date = date("Y-m-d");
    $sql = "INSERT INTO payments(
        raiseid,type,amount,name,email,phone,city,country,comment,method,tran_date,time,optional,checked,status,tip )values
    ('$id','$select','$amt','$name','$email','$phone','$city','$country','$comment','Razorpay','$date','$time','$optional','$checked','pending','$utip')";
    mysqli_query($db, $sql);
    $_SESSION['OID'] = mysqli_insert_id($db);
}

if (isset($_POST['payment_id']) && isset($_SESSION['OID'])) {
    $payment_id = $_POST['payment_id'];
    mysqli_query($db, "UPDATE payments set status='complete',tran_id='$payment_id' where id='" . $_SESSION['OID'] . "'");
}
