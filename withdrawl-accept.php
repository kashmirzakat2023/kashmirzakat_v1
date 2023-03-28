<?php session_start(); ?>
<html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
<title>Withdrawl Requested</title>
<script src="js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/nav-dash.css">
<script src="js/nav-dash.js"></script>
<?php
$useremail = $_SESSION['useremail'];
include 'assets/connection.php';
if (isset($_SESSION['username']) && $_SESSION['username'] == 'admin') {
?>

    <body id="body-pd">
                <?php
        include 'assets/navbar-dash.php';
        ?>
        <script>
            window.onload = (event) => {
                // $('#nav-bar').attr('class', 'l-navbar show');
                $('#body-pd').attr('class', 'body-pd');
                $('#withdrawls').addClass("nav_link active");
            }
        </script>
        <!--Container Main start-->

        <br>
        <div class=" p-3">
            <h2> Withdrawl Requested Invoice</h2>
            <form action="" method="post" class=" border border-2 p-3 rounded-1">
                <label class="control-label form-floating " for="fname">Enter withdrawl amount in rupees</label>
                <div class="input-group mb-3 flex-nowrap">
                    <span class="input-group-text bg-success text-light fw-bold " id="addon-wrapping">₹</span>
                    <input type="number" class="form-control" name="amount" placeholder="Minimum amount ₹50 INR " aria-label="amount" aria-describedby="addon-wrapping" required>
                </div>
                <div class="form-group mb-3">
                    <label class="control-label form-floating " for="fname">Transaction Date</label>
                    <input type="date" class="form-control" id="" value="" name="tran_date" required>
                </div>
                <div class="form-group mb-3">
                    <label class="control-label form-floating " for="fname">Bank Name</label>
                    <input type="text" class="form-control" id="" placeholder="Enter Bank Name" value="" name="bank_name" required>
                </div>
                <div class="form-group mb-3">
                    <label class="control-label form-floating " for="fname">Transaction ID</label>
                    <input type="text" class="form-control" id="" placeholder="Enter Transaction ID / Reference No. " value="" name="tran_id" required>
                </div>
                <div class="form-group mb-3">
                    <label class="control-label " for="comment">Other Details(Optional)</label>
                    <textarea class="form-control" rows="1" placeholder="Write any optional details" name="optional" id="optional"></textarea>
                </div>
                <button type="submit" class=" btn btn-primary mx-auto me-auto d-flex fs-5" name="submit">Submit</button>
            </form>
        </div>
        <?php
        if (isset($_POST['submit'])) {
            if (isset($_POST['submit'])) {
                $amount = $_POST['amount'];
                $tran_date = $_POST['tran_date'];
                $bank_name = $_POST['bank_name'];
                $tran_id = $_POST['tran_id'];
                $optional = $_POST['optional'];
                $sql = "INSERT INTO withdrawl_pending(
                amount,tran_date,bank_name,tran_id,optional, email ) values
                ('$amount','$tran_date','$bank_name','$tran_id','$optional', '$useremail')";

                if (mysqli_query($db, $sql)) {
                    $subject = "Amount of '.$amount.' transfered to your account";
                    // $result = mysqli_query($db, " SELECT * FROM form_data where id = '$id' ");
                    // while ($data = mysqli_fetch_array($result)) {
                    $to = $useremail;
                    // }
                    $mailBody = '<html>
            <body>
                <div style="text-center: center; width: 60%; margin: auto; max-width: 100%; font-family: Arial;  ">
                <div>Hi, ' . $_SESSION['username'] . '</div>
                <div><h4>Your withdraw request has been accepted and an amount of<b>' . $amount . '</b> has been transfered with Transaction id :  <b>' . $tran_id . '</b> </h4></div>
                <div>Contact : info@kashmirzakat.com , kashmirzakat@gmail.com </div>
                </div>
            </body>
            </html>';
                    $headers = 'From: Kashmirzakat ' . "\r\n";
                    $headers =  'Reply-To: ' . $to . "\r\n";
                    $headers .= 'MIME-Version: 1.0' . "\r\n";
                    $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n" . 'X-Mailer: PHP/' . phpversion();
                    mail($to, $subject, $mailBody, $headers);
                    echo '<script>window.location = "payment-successful.php"</script>';
                    // header('location:index.php');
                } else {
                    echo '<script>alert("Error in uploading data")</script>';
                }
            }
        }
        ?>

    </body>
<?php
} else {
    echo '<script>alert("Login/Register to Raise a cause")</script>';
    echo '<script>window.location = "index.php"</script>';
}
?>

</html>