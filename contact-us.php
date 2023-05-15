<?php
include 'assets/nav-links.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Contact Us</title>
    <link rel="stylesheet" href="css/contact-us.css">
</head>

<body>
    <?php
    include 'assets/navbar.php';
    ?>
    <div class="container contact">
        <div class="row contact-left shadow p-lg-3 p-0 mb-lg-5 mt-lg-5 m-1 bg-body rounded">
            <div class="col-md-3 ">
                <div class="contact-info">
                    <img src="https://image.ibb.co/kUASdV/contact-image.png" alt="image" width="100px" />
                    <h2 class=" fw-bold">Contact Us</h2>
                    <h3>We would love to hear from you !</h3>
                </div>
            </div>
            <div class="col-md-9 ">
                <form method="POST" action="" class="contact-form" id="form">
                    <div class="form-group mb-3">
                        <label class="control-label form-floating col-sm-2" for="fname">First Name:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="fname" id="fname" placeholder="Enter First Name" name="fname" required>
                        </div>
                    </div>
                    <div class="form-group mb-3 ">
                        <label class="control-label col-sm-2" for="lname">Last Name:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="lname" id="lname" placeholder="Enter Last Name" name="lname">
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label class="control-label col-sm-2" for="email">Email:</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="email" id="contact_email" placeholder="Enter email" required>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label class="control-label col-sm-2" for="comment">Comment:</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="3" name="comment" placeholder="Write brief reason for contact" id="comment" required></textarea>
                        </div>
                    </div>
                    <div class="g-recaptcha" style="overflow:hidden;" data-sitekey="6LewkakgAAAAABdcyzp8zqq_MkWU4tMlCJwZrBO6"></div>

                    <div class="form-group mb-3 mt-3">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                        </div>
                    </div>


                </form>
            </div>
        </div>
    </div>

    <style>
        @media (max-width:500px) {

            .rc-anchor-normal {
                width: 65vw !important;
            }
        }
    </style>

    <script src="https://www.google.com/recaptcha/api.js" defer> </script>
    <?php

    include 'assets/footer.php';
    if (isset($_POST['submit']) && isset($_POST['g-recaptcha-response'])) {
        $captcha = $_POST['g-recaptcha-response'];
        $ip = $_SERVER['REMOTE_ADDR'];
        $key = '6LewkakgAAAAAMUmYkL0qS3MNTAt6H98pXgxYg3E';
        $url = 'https://www.google.com/recaptcha/api/siteverify';

        // RECAPTCH RESPONSE
        $recaptcha_response = file_get_contents($url . '?secret=' . $key . '&response=' . $captcha . '&remoteip=' . $ip);
        $data = json_decode($recaptcha_response);

        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $comment = $_POST['comment'];
        $sql = "INSERT into `user_contact` (fname,lname,email,comment) values ('$fname','$lname', '$email','$comment')";
        include 'assets/connection.php';
        if (isset($data->success) &&  $data->success === true) {
            if (mysqli_query($db, $sql)) {
                echo '<script>alert("Your form is successfully submitted. Our team will contact you shortly.")</script>';

                $mailBody = '<div style="text-center: center; width: 60%; margin: auto; max-width: 100%; font-family: Arial;">
                                <div>
                                    <h3>Contact Us form filles</h3>
                                    <h5>Mr. ' . $fname . ' filled the form</h5>
                                    <p>Name: ' . $fname . ' ' . $lname . '</p>
                                    <p>Email: ' . $email . '</p>
                                    <p>Comment: ' . $comment . '</p>
                                </div>
                                <div>Please use the above details and contact him as required.</div>
                            </div>';
                $subject = "Contact Us";
                $to = $email;
                $headers .= 'Reply-To: ' . $to . "\r\n";
                $headers .= 'MIME-Version: 1.0' . "\r\n";
                $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n" . 'X-Mailer: PHP/' . phpversion();
                mail($email, $subject, $mailBody, $headers);
                mail('Kashmirzakat@gmail.com', $subject, $mailBody, $headers);
                mail('info@kashmirzakat.com', $subject, $mailBody, $headers);
            } else {
                echo '<script>alert("Error in sending message. Please try again")</script>';
            }
        } else {
            echo '<script>alert("Please check \" I\'m not robot \" ")</script>';
        }
    }
    ?>

</html>