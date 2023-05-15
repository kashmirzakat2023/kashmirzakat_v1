<?php session_start(); ?>
<html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
<title>Withdrawl Review</title>
<script src="js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/nav-dash.css">
<script src="js/nav-dash.js"></script>
<?php
$wid = $_GET['wid'];
$id = $_GET['id'];
include 'assets/connection.php';
$query1 = mysqli_query($db, "SELECT * FROM withdrawl_pending where wid = '$wid' and raiseid=$id ");
$query2 = mysqli_query($db, "SELECT * FROM payments where raiseid= $id and status='Accepted'");
$query3= mysqli_query($db, "SELECT * FROM campaigns_data where id= $id");
$tamt=0;
$email;

while($row = mysqli_fetch_array($query3)){
    $email=$row['email'];
}
while($row = mysqli_fetch_array($query2)){
    $tamt+=$row['amount'];
}
$amt=0;
while($row = mysqli_fetch_array($query1)){
    $amt+=$row['amount'];
}
$query = mysqli_query($db, "SELECT * FROM withdrawl_request where wid = '$wid' ");
// if ($amt >= $tamt) {
    
//     echo '<script>alert("User amount crossed its limit")</script>';
// }
    if (isset($_SESSION['username']) && $_SESSION['user_type'] == 2 || $_SESSION['user_type'] == 1) { ?>

        <body id="body-pd">
            <?php
            include 'assets/navbar-dash.php';
            ?>
            <!--Container Main start-->
            <div class=" p-3">

                <h2> Withdrawl Invoice</h2>
                <?php
                while ($row1 = mysqli_fetch_array($query)) {
                ?>
                    <form action="" method="post" class=" border border-2 p-3 rounded-1">
                        <div class="form-group mb-3">
                            <label class="control-label form-floating " for="fname">User Name</label>
                            <input type="text" class="form-control" value="<?php echo $row1['name']; ?>" id="" placeholder="Enter Bank Name" value="" name="name" required>
                        </div>
                        <label class="control-label form-floating " for="fname">Requested Amount</label>
                        <div class="input-group mb-3 flex-nowrap">
                            <span class="input-group-text bg-success text-light fw-bold " id="addon-wrapping">₹</span>
                            <input type="number" value="<?php echo $row1['amount']; ?>" class="form-control" name="amount" placeholder="Minimum amount ₹50 INR " aria-label="amount" aria-describedby="addon-wrapping" required>
                        </div>
                        <?php $raiseid = $row1['raiseid'];
                        $result1 = mysqli_query($db, "SELECT * FROM campaigns_data where id='$raiseid' and status='Accepted' ");
                        while ($rows = mysqli_fetch_array($result1)) {
                        ?>
                            <label for="">Cause Title</label>
                            <div class="form-group mb-3 border border-1 p-2 rounded-1">
                                <a href="campaign-details.php?campaign=<?php echo $rows['cause_title']; ?>">
                                    <img src="<?php echo "images/" . $rows['profile_pic']; ?>" width="40px" alt="" srcset=""> <?php echo $rows['cause_title']; ?>
                                    <i class="fas fa-external-link"></i>
                                </a>
                            </div>

                        <?php } ?>
                        <div class="form-group mb-3">
                            <label class="control-label form-floating " for="fname">Transaction Date</label>
                            <input type="date" class="form-control" id="" value="" name="tran_date">
                        </div>
                        <div class="form-group mb-3">
                            <label class="control-label form-floating " for="fname">Bank Name</label>
                            <input type="text" class="form-control" id="" placeholder="Enter Bank Name" value="" name="bank_name">
                        </div>
                        <div class="form-group mb-3">
                            <label class="control-label form-floating " for="fname">Transaction ID</label>
                            <input type="text" class="form-control" id="" placeholder="Enter Transaction ID / Reference No. " value="" name="tran_id">
                        </div>
                        <div class="form-group mb-3">
                            <label class="control-label " for="comment">Other Details(Optional)</label>
                            <textarea class="form-control" rows="1" placeholder="Write any optional details" name="optional" id="optional"><?php echo $row1['optional']; ?></textarea>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class=" btn btn-success me-2  fs-5" name="submit">Accept</button>
                            <button type="submit" class=" btn btn-danger fs-5" name="reject">Reject</button>
                        </div>

                    </form>
                    

        </body>
    <?php
                }
    ?>
    </div>
    <?php
        // $db = mysqli_connect("localhost", "root", "", "db");
        // if (!$db) die('could not connect Mysql server');
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $amount = $_POST['amount'];
            $tran_date = $_POST['tran_date'];
            $bank_name = $_POST['bank_name'];
            $tran_id = $_POST['tran_id'];
            $optional = $_POST['optional'];
            $status = 'accepted';
            $total_amount = $amt+$amount;
            $sql = "INSERT INTO withdrawl_pending(
                name,raiseid,amount,tran_date,bank_name,tran_id,others,status,wid, email ) values
                ('$name','$raiseid','$amount','$tran_date','$bank_name','$tran_id','$optional','$status','$wid', '$email') ";
            $sql2="update campaigns_data set withdrawl_amount='$total_amount' where id='$id'";
            if (mysqli_query($db, $sql) && mysqli_query($db,$sql2)) {
                
                $result = mysqli_query($db, "DELETE FROM withdrawl_request where wid= '$wid'");
                $to      = $email;
                    $subject = 'Withdrawl requested accepted';

                    $mailBody = '<html><body>
                    <div style="text-center: center; width: 60%; margin: auto; max-width: 100%; font-family: Arial;  ">
                    <div>Hi, ' . $name . '</div>
                    <div style="margin: 20px 0px;"><h2 style=" padding: 10px; font-size:40px; color:#E8582E;"><b>₹'.$amount.' </b></h2>has been transfered in your account</div>
                    
                    <div>You can contact <b>admin</b> or mail at <b>Kashmirzakat@gmail.com</b> for any queries</div>
                    </div>
                    </div>
                    </body>
                    </html>';
                    $headers = 'From: Kashmirzakat ' . "\r\n";
                    $headers =  'Reply-To: ' . $email . "\r\n";
                    $headers .= 'MIME-Version: 1.0' . "\r\n";
                    $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n" . 'X-Mailer: PHP/' . phpversion();
                    mail($to, $subject, $mailBody, $headers);
                    mail('Kashmirzakat@gmail.com', $subject, $mailBody, $headers);
                    mail('info@kashmirzakat.com', $subject, $mailBody, $headers);
                echo '<script>alert("Withdrawl Requested accepted by Admin")</script>';
                echo '<script>history.back()</script>';
            } else {
                echo '<script>alert("Error in uploading data.Try again")</script>';
            }
        }

        if (isset($_POST['reject'])) {
            $name = $_POST['name'];
            $amount = $_POST['amount'];
            $optional = $_POST['optional'];
            $status = 'rejected';
            $sql = "INSERT INTO withdrawl_pending(
                name,raiseid,amount,others,status,wid,email ) values
                ('$name','$raiseid','$amount','$optional','$status','$wid', '$email') ";

            if (mysqli_query($db, $sql)) {
                $result = mysqli_query($db, "DELETE FROM withdrawl_request where wid= '$wid'");
                $to      = $email;
                    $subject = 'Withdrawl requested rejected';

                    $mailBody = '<html><body>
                    <div style="text-center: center; width: 60%; margin: auto; max-width: 100%; font-family: Arial;  ">
                    <div>Hi, ' . $name . '</div>
                    <div style="margin: 20px 0px;"><h2 style=" padding: 10px; font-size:40px; color:#E8582E;"><b>'.$amount.' </b></h2>request has been decliend due to '.$optional.'</div>
                    
                    <div>You can contact <b>admin</b> or mail at <b>Kashmirzakat@gmail.com</b> for any queries</div>
                    </div>
                    </div>
                    </body>
                    </html>';
                    $headers = 'From: Kashmirzakat ' . "\r\n";
                    $headers =  'Reply-To: ' . $email . "\r\n";
                    $headers .= 'MIME-Version: 1.0' . "\r\n";
                    $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n" . 'X-Mailer: PHP/' . phpversion();
                    mail($to, $subject, $mailBody, $headers);
                    mail('Kashmirzakat@gmail.com', $subject, $mailBody, $headers);
                    mail('info@kashmirzakat.com', $subject, $mailBody, $headers);
                echo '<script>alert("Withdrawl request Rejected by Admin")</script>';
                echo '<script>history.back()</script>';
            } else {
                echo '<script>alert("Error in uploading data.Try again")</script>';
            }
        }

    ?>

<?php
    } else {
        echo '<script>alert("Action Not Allowed")</script>';
        echo '<script>window.location = "index.php"</script>';
    }
?>

</html>