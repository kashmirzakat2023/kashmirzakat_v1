<?php
$id = $_GET['id'];
include 'assets/connection.php';
$date=date("Y-m-d");
if (
    mysqli_query($db, "INSERT INTO accepted_form(
     profile_pic,
        cause_title,
        purpose,
        amount, 
        location,
        eligible,
        cause_explain,
        doc1,
        doc2,
        doc3,
        acc_name,
        acc_num,
        bank_name,
        ifsc,
        passbook,
        pan_num,
        pan_copy,
        adhaar_num,
        adhaar_copy,
        optional,
        person,
        cause_summary,
        email,
        status,
        date,
        cause_manager
) SELECT
 profile_pic,
        cause_title,
        purpose,
        amount, 
        location,
        eligible,
        cause_explain,
        doc1,
        doc2,
        doc3,
        acc_name,
        acc_num,
        bank_name,
        ifsc,
        passbook,
        pan_num,
        pan_copy,
        adhaar_num,
        adhaar_copy,
        optional,
        person,
        cause_summary,
        email,
        'Accepted',
        '$date',
        cause_manager
        FROM funds_form where id= '$id'")
) {
    $subject = "Cause Accepted by kashmirzakat team";
    $result = mysqli_query($db, " SELECT * FROM funds_form where id = '$id' ");
    while ($data = mysqli_fetch_array($result)) {
        $to = $data['email'];
    }
        $mailBody = '<html>
            <body>
                <div style="text-center: center; width: 60%; margin: auto; max-width: 100%; font-family: Arial;  ">
                <div>Hi, ' . $_SESSION['username'] . '</div>
                <div><h4>Your cause <h3>'.$cause_title.'</h3> has been successfully accepted by our team </h4></div>
                <div>Our team wish your cause to complete before time</div>
                </div>
            </body>
            </html>';
        $headers = 'From: Kashmirzakat ' . "\r\n" ;
        $headers=  'Reply-To: '.$to . "\r\n" ;
        $headers .= 'MIME-Version: 1.0' . "\r\n";
        $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n" . 'X-Mailer: PHP/' . phpversion();
        mail($to, $subject, $mailBody, $headers);
    $result = mysqli_query($db, "DELETE FROM funds_form where id= '$id'");
    echo '<script>alrt("Cause accepted successfully");</script>';
    echo '<script>window.location = "index.php"</script>';
} else {
    echo '<script>alrt("Error in accepting cause");</script>';
}
