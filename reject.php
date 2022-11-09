<?php include 'assets/nav-links.php' ?>

<body>
    <?php include 'assets/navbar.php' ?>
    <form action="" method="post" class="col-8 col-sm-9 mb-5 fund-raise">

        <div class="form-floating mb-3 mt-3 h-50">
            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" name="reject_reason" style="height: 100px" required></textarea>
            <label for="floatingTextarea2">Reason for rejecting Cause <label class=" fw-bold text-danger">*</label></label>
        </div>
        <button type="submit" id="submit" name="submit" class="btn btn-primary mb-3 fs-4">Submit</button>
    </form>
</body>
<style>
        #drop-zone {
            max-width: 450vw;
            width: 100%;
            height: 60vh;
            border: 2px dashed grey;
            border-radius: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #drop-zone img {
            object-fit: contain;
            /* object-position: center; */
            height: 100%;
            width: 100%;
            display: none;
        }

        .fund-raise {
            display: flex;
            justify-content: center;
            margin-left: auto;
            margin-right: auto;
            flex-direction: column;
        }

        @media (max-width:450px) {

            label,
            small,
            body,
            input,
            select {
                font-size: 80%;
            }

            h1 {
                font-size: 180%;
            }
        }

        label {
            font-weight: 500;
        }

        small {
            font-size: 11px;
        }
    </style>
<?php include 'assets/footer.php' ?>
<?php
$id = $_GET['id'];
if (isset($_POST['submit'])) {
include 'assets/connection.php';
    $reject_reason=$_POST['reject_reason'];
        if(mysqli_query( $db, "INSERT INTO accepted_form 
        (profile_pic,
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
        email,
        date,
        status,
        reason,
        cause_manager)
        SELECT 
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
        email,
        date,
        'Rejected',
        '$reject_reason',
        cause_manager
        FROM funds_form where id= '$id' ")
    ) {
        $subject = "Cause Rejected by kashmirzakat team";
        $result = mysqli_query($db, " SELECT * FROM accepted_form where id = '$id' ");
        while ($data = mysqli_fetch_array($result)) {
            $to = $data['email'];
        }
        $mailBody = '<html>
            <body>
                <div style="text-center: center; width: 60%; margin: auto; max-width: 100%; font-family: Arial;  ">
                <div>Hi, ' . $_SESSION['username'] . '</div>
                <div><h4>Your cause ' . $cause_title. ' is rejected by team due to <b>'.$reject_reason.'</b> </h4></div>
                <div>Contact : info@kashmirzakat.com , kashmirzakat@gmail.com </div>
                </div>
            </body>
            </html>';
        $headers = 'From: Kashmirzakat ' . "\r\n" ;
        $headers=  'Reply-To: '.$to . "\r\n" ;
        $headers .= 'MIME-Version: 1.0' . "\r\n";
        $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n" . 'X-Mailer: PHP/' . phpversion();
        mail($to, $subject, $mailBody, $headers);
        $result = mysqli_query($db, "DELETE FROM funds_form where id= '$id'");
        echo '<script>alert("Cause rejected successfully");</script>';
        echo '<script>window.location = "index.php"</script>';
    } else {
        echo '<script>alert("Error in rejecting data");</script>';
    }
}
