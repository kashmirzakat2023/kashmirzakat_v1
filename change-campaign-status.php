<?php
$id = $_GET['id'];
$status = $_GET['status'];
include 'assets/connection.php';
if (strtolower($status) == 'reject') {
    include 'assets/nav-links.php';
?>

    <body>
        <?php include 'assets/navbar.php' ?>
        <form action="" method="post" class="col-8 col-sm-9 mb-5 fund-raise d-flex justify-content-center flex-column mx-auto me-auto mt-5">
            <div class="form-floating mb-3 mt-3 h-50">
                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" name="reject_reason" style="height: 100px" required></textarea>
                <label for="floatingTextarea2">Reason for rejecting Cause <label class=" fw-bold text-danger">*</label></label>
            </div>
            <button type="submit" id="submit" name="submit" class="btn btn-primary mb-3 fs-4 w-100">Submit</button>
        </form>
    </body>
<?php
    include 'assets/footer.php';
    if (isset($_POST['submit'])) {
        $reject_reason = $_POST['reject_reason'];
        if (mysqli_query($db, "UPDATE campaigns_data SET status = 'Rejected', reason = '$reject_reason' where id='$id'")) {
            $result = mysqli_query($db, " SELECT * FROM campaigns_data where id = '$id' ");
            $to = '';
            $cause_title = '';
            while ($data = mysqli_fetch_array($result)) {
                $to = $data['email'];
                $cause_title = $data['cause_title'];
            }
            $subject = "Cause Rejected by kashmirzakat team";
            $mailBody = '<html>
            <body>
                <div style="text-center: center; width: 60%; margin: auto; max-width: 100%; font-family: Arial;  ">
                <div>Hi, ' . 'User' . '</div>
                <div><h4>Your cause <h3>' . $cause_title . '</h3> has been <span class="text-danger">Rejected</span> by our team </h4></div>
                <div>Reason: ' . $reject_reason . '</div>
                <div>Please contact for more details.</div>
                </div>
            </body>
            </html>';
            $headers = 'From: Kashmirzakat ' . "\r\n" . 'Reply-To: ' . $to . "\r\n" . 'MIME-Version: 1.0' . "\r\n" . "Content-type:text/html;charset=iso-8859-1" . "\r\n" . 'X-Mailer: PHP/' . phpversion();
            mail($to, $subject, $mailBody, $headers);
            mail('Kashmirzakat@gmail.com', $subject, $mailBody, $headers);
            mail('info@kashmirzakat.com', $subject, $mailBody, $headers);
            echo '<script>alert("Cause rejected successfully");</script>';
        } else {
            echo '<script>alert("Error in rejecting data");</script>';
        }
        echo '<script>history.go(-2)</script>';
    }
} else if (strtolower($status) == 'accept') {
    if (mysqli_query($db, "UPDATE campaigns_data set status = 'Accepted', approved_date = date('Y-m-d') where id= '$id' ")) {
        $result = mysqli_query($db, " SELECT * FROM campaigns_data where id = '$id' ");
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
                <div><h4>Your cause <h3>' . $cause_title . '</h3> has been successfully <span class="text-success">Accepted</span> by our team </h4></div>
                <div>Our team wish your cause to complete before time</div>
                </div>
            </body>
            </html>';
        $headers = 'From: Kashmirzakat ' . "\r\n" . 'Reply-To: ' . $to . "\r\n" . 'MIME-Version: 1.0' . "\r\n" . "Content-type:text/html;charset=iso-8859-1" . "\r\n" . 'X-Mailer: PHP/' . phpversion();
        mail($to, $subject, $mailBody, $headers);
        mail('Kashmirzakat@gmail.com', $subject, $mailBody, $headers);
        mail('info@kashmirzakat.com', $subject, $mailBody, $headers);
        echo '<script>alert("Cause accepted successfully");</script>';
    } else {
        echo '<script>alert("Error in accepting cause! Try Again.");</script>';
    }
    echo '<script>history.back()</script>';
}
