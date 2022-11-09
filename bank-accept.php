<?php
$tid = $_GET['tid'];
include 'assets/connection.php';
$sql = "INSERT INTO payments
(raiseid,type,amount,name,email,phone,city,country,comment,method,tran_date,bank_name,tran_id,optional,checked,date,time,status,tip ) SELECT
    raiseid,type,amount,name,email,phone,city,country,comment,method,tran_date,bank_name,tran_id,optional,checked,date,time,'complete',tip FROM bank_pending where tran_id ='$tid'";
$ans=    mysqli_query($db,$sql);
$result = mysqli_query($db, "DELETE FROM bank_pending where tran_id= '$tid'");
// echo '<script>window.location = "bank-pending.php"</script>';
header('location:bank-pending.php?username="admin"');
