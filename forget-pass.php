<?php
if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $six_digit_number = random_int(100000, 999999);

    $mailBody = '<div style="text-center: center; width: 60%; margin: auto; max-width: 100%; font-family: Arial;  ">
    <div><h2>Forget Password</h2><h2>OTP Verification Number</h2></div>
    <div style="margin: 20px 0px;"><span style=" padding: 10px;  ">' . $six_digit_number . '</span></div>
    <div>Please use the above OTP to complete registration</div>
    </div>';


    $subject = "Kashmir Zakat - OTP (One Time Password)";
    // $from = 'mdroshan2003@gmail.com';
    $to = $email;
    // $emailFrom = 'Roshan Hussain';
    // $headers = 'From: ' . $emailFrom . "\r\n";
    $headers .= 'Reply-To: ' . $to . "\r\n";
    $headers .= 'MIME-Version: 1.0' . "\r\n";
    $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n" . 'X-Mailer: PHP/' . phpversion();


    if ($email != '') {
        mail($email, $subject, $mailBody, $headers);
        echo $six_digit_number*786;
    } else {
        echo ("mail send faild");
    }
}