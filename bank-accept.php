<?php
$tid = $_GET['tid'];
include 'assets/connection.php';
if ($_GET['status'] == 'Accept') {
    $sql = "INSERT INTO payments
(raiseid,type,amount,name,email,phone,city,country,comment,method,tran_date,bank_name,tran_id,optional,checked,date,time,status,tip ) SELECT
    raiseid,type,amount,name,email,phone,city,country,comment,method,tran_date,bank_name,tran_id,optional,checked,date,time,'complete',tip FROM bankPayments where tran_id ='$tid'";
    mysqli_query($db, $sql);
    mysqli_query($db, "UPDATE SET bankPayments status='accepted' where tran_id= '$tid'");
} else if ($_GET['status'] == 'Reject') {
    $sql = "UPDATE bankPayments SET status='rejected' where tran_id ='$tid'";
    mysqli_query($db, $sql);
}
echo '<script>history.back();</script>';
