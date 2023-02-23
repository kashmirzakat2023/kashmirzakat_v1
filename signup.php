<?php
include 'assets/connection.php';

if (isset($_POST['email'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $phone = $_POST['phone'];

  $six_digit_number = random_int(100000, 999999);
  $to      = $email;
  $subject = 'Kashmir Zakat - OTP (One Time Password)';

  $mailBody = '<html><body>
  <div style="text-center: center; width: 60%; margin: auto; max-width: 100%; font-family: Arial;  ">
    <div><h2>OTP Verification Number</h2></div>
    <div>Hi, ' . $name . '</div>
    <div style="margin: 20px 0px;"><h2 style=" padding: 10px; font-size:30px; color:#E8582E;">' . $six_digit_number . '</h2></div>
    <div>Please use the above OTP to complete registration</div>
    </div>
    </body>
    </html>';
  $headers = 'From: Kashmirzakat ' . "\r\n";
  $headers .=  'Reply-To: ' . $email . "\r\n";
  $headers .= 'MIME-Version: 1.0' . "\r\n";
  $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n" . 'X-Mailer: PHP/' . phpversion();

  if (mail($to, $subject, $mailBody, $headers)){
    echo $six_digit_number*786;
  }
  else
    echo 'otp not sent';
}
