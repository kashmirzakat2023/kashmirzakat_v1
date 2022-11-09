<?php
$id = $_GET['id'];
include 'assets/connection.php';
$date = date("Y-m-d");
if (mysqli_query($db, "UPDATE form_data set status = 'Accepted' where id= '$id' ")) {
    $result = mysqli_query($db, " SELECT * FROM form_data where id = '$id' ");
    $to = '';
    $cause_title = '';
    while ($data = mysqli_fetch_array($result)) {
        $to = $data['email'];
        $cause_title = $data['cause_title'];
    }
    $subject = "Cause Accepted by kashmirzakat team";
    $mailBody = '<html>
            <body>
                <div style="text-center: center; width: 60%; margin: auto; max-width: 100%; font-family: Arial;  ">
                <div>Hi, ' . 'User' . '</div>
                <div><h4>Your cause <h3>' . $cause_title . '</h3> has been successfully accepted by our team </h4></div>
                <div>Our team wish your cause to complete before time</div>
                </div>
            </body>
            </html>';
    $headers = 'From: Kashmirzakat ' . "\r\n". 'Reply-To: ' . $to . "\r\n".'MIME-Version: 1.0' . "\r\n". "Content-type:text/html;charset=iso-8859-1" . "\r\n" . 'X-Mailer: PHP/' . phpversion();
    // mail($to, $subject, $mailBody, $headers);
    echo '<script>alrt("Cause accepted successfully");</script>';
    echo '<script>window.location = "index.php"</script>';
} else {
    echo '<script>alrt("Error in accepting cause");</script>';
}
