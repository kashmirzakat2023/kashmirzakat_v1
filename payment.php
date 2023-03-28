<?php
include 'assets/connection.php';
if (isset($_POST['submit'])) {
    $id = $_GET['id'];
    // $username = $_SESSION['username'];
    $type = $_POST['type'];
    $amt = $_POST['amount'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $comment = $_POST['comment'];
    $method = $_POST['method'];
    $optional = $_POST['optional'];
    $utip = $_POST['tip'];
    if($utip == 'other'){
        $utip = $_POST['other'];
    }
    $tip = $utip * $amt / 100;
    if (!empty($_POST['checked'])) {
        $checked = $_POST['checked'];
    } else {
        $checked = '';
    }

    $tran_date = $_POST['tran_date'];
    $bank_name = $_POST['bank_name'];
    $tran_id = $_POST['tran_id'];
    $sql = "INSERT INTO bankPayments(
        raiseid,type,amount,name,email,phone,city,country,comment,method,tran_date,bank_name,tran_id,optional,checked,status,tip )values
    ('$id','$type','$amt','$name','$email','$phone','$city','$country','$comment','$method','$tran_date','$bank_name','$tran_id','$optional','$checked','pending','$tip')";

    if (mysqli_query($db, $sql)) {
        $mailBody = '<div style="text-center: center; width: 60%; margin: auto; max-width: 100%; font-family: Arial;  ">
        <div>Hi,</div>
        <div><h4>'.$name.' has dontated '.$amt.' on a cause </h4></div>
        <div><h3>'.$cause_title.'</h3></div>
        <div>Our team wish you for more donations within time</div>
        </div>';
        
        $subject = "Kashmir Zakat - Donations";
        $to = $email;            
        if(isset($_SESSION['useremail']))
            $to = $_SESSION['useremail'];            
        $emailFrom = 'Kashmir zakat';
        $headers = 'From: ' . $emailFrom . "\r\n";
        $headers .= 'Reply-To: ' . $to . "\r\n";
        $headers .= 'MIME-Version: 1.0' . "\r\n";
        $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n" . 'X-Mailer: PHP/' . phpversion();
        mail($to, $subject, $mailBody, $headers);
        
        $mailBody1 = '<div style="text-center: center; width: 60%; margin: auto; max-width: 100%; font-family: Arial;  ">
        <div>Hi, '.$name.'</div>
        <div><h4>Thank you for donating '.$amt.' on a cause </h4></div>
        <div><h3>'.$cause_title.'</h3></div>
        </div>';
        $to1 = $_SESSION['useremail'];
        
        mail($to1, $subject, $mailBody1 , $headers);
        echo '<script>alert("Payment Successful")</script>';
        echo '<script>window.location = "payment-successful.php"</script>';
    } else {
        echo '<script>alert("Error in uploading data")</script>';
    }
}
