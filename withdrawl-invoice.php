<?php session_start(); ?>
<html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
<title>Withdrawl Invoice</title>
<script src="js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/nav-dash.css">
<script src="js/nav-dash.js"></script>
<?php
$wid = $_GET['wid'];
include 'assets/connection.php';

$useremail = $_SESSION['useremail'];
if (isset($_SESSION['useremail']) && $_SESSION['useremail'] == 'admin@admin.com') {
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
        <div class=" ">
            <h3> Withdrawl Invoice</h3>
            <div class="table-responsive w-100">
                <table class="table table-borderless d-flex align-self-centre">
                    <tbody>
                        <?php
                        $query = mysqli_query($db, "SELECT * FROM withdrawl_pending where  wid='$wid' ");
                        while ($row1 = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                                <th class=" text-end" scope="col">ID : </th>
                                <td><?php echo $row1['id']; ?></td>
                            </tr>
                            <tr>
                                <th class=" text-end" scope="col">Full Name : </th>
                                <td><?php echo $row1['name']; ?></td>
                            </tr>
                            <tr>
                                <th class=" text-end" scope="col">Amount issued : </th>
                                <td><?php echo $row1['amount']; ?></td>
                            </tr>
                            <tr>
                                <th class=" text-end" scope="col">Cause : </th>
                                <td>
                                    <?php
                                    $id = $row1['raiseid'];
                                    $result = mysqli_query($db, "SELECT * FROM form_data where id='$id' and status='Accepted'  ");
                                    while ($row = mysqli_fetch_array($result)) { ?>
                                        <a href="campaign-details.php?campaign=<?php echo $row['id']; ?>">
                                            <?php echo $row['cause_title']; ?>
                                            <i class="fas fa-external-link"></i>
                                        </a>
                                    <?php } ?>
                                </td>

                            </tr>
                            <tr>
                                <th class=" text-end" scope="col">Transaction id : </th>
                                <td><?php echo $row1['tran_id']; ?></td>
                            </tr>
                            <tr>
                                <th class=" text-end" scope="col">Transaction date : </th>
                                <td><?php echo $row1['tran_date']; ?></td>
                            </tr>
                            <tr>
                                <th class=" text-end" scope="col">Bank name : </th>
                                <td><?php echo $row1['bank_name']; ?></td>
                            </tr>
                            <tr>
                                <th class=" text-end" scope="col">Optional details : </th>
                                <td>
                                    <?php echo $row1['others']; ?>
                                </td>
                            </tr>

                        <?php
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>


    </body>
<?php
} else if (isset($_SESSION['username'])) {
?>

    <body id="body-pd">
        <?php
        include 'assets/navbar-dash.php';
        ?>
        <script>
            window.onload = (event) => {
                $('#withdrawls').addClass("nav_link active");
                // $('#nav-bar').attr('class', 'l-navbar show');
                $('#body-pd').attr('class', 'body-pd');
            }
        </script>
        <!--Container Main start-->
        <br>
        <div class=" ">
            <h2> Funds Raised</h2>
            <div class="table-responsive w-100">
                <table class="table table-borderless d-flex align-self-centre">
                    <tbody>
                        <?php
                        $query = mysqli_query($db, "SELECT * FROM withdrawl_pending where wid='$wid'and status='accepted'");
                        while ($row1 = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                                <th class=" text-end" scope="col">ID : </th>
                                <td><?php echo $row1['id']; ?></td>
                            </tr>
                            <tr>
                                <th class=" text-end" scope="col">Full Name : </th>
                                <td><?php echo $row1['name']; ?></td>
                            </tr>
                            <tr>
                                <th class=" text-end" scope="col">Cause : </th>
                                <td>
                                    <?php
                                    $id = $row1['raiseid'];
                                    $result = mysqli_query($db, "SELECT * FROM form_data where id='$id'  ");
                                    while ($row = mysqli_fetch_array($result)) { ?>
                                        <a href="campaign-details.php?campaign=<?php echo $row['id']; ?>">
                                            <?php echo $row['cause_title']; ?>
                                            <i class="fas fa-external-link"></i>
                                        </a>
                                    <?php } ?>
                                </td>

                            </tr>
                            <tr>
                                <th class=" text-end" scope="col">Donation : </th>
                                <td>₹ <?php echo $row1['amount']; ?></td>
                            </tr>
                            <!-- <tr>
                                <th class=" text-end" scope="col">Payment Gateway : </th>
                                <td>
                                    <?php
                                    if ($row1['method'] == '1')
                                        echo 'Bank';
                                    else echo 'Razorpay';
                                    ?></td>
                            </tr> -->
                            <!-- <tr>
                                <th class=" text-end" scope="col">Comment : </th>
                                <td>
                                    <?php echo $row1['comment']; ?>
                                </td>
                            </tr> -->
                            <tr>
                                <th class=" text-end" scope="col">Date : </th>
                                <td>
                                    <?php echo $row1['date']; ?>
                                </td>
                            </tr>
                            <!-- <tr>
                                <th class=" text-end" scope="col">Ananymous : </th>
                                <td>
                                    <?php echo $row1['checked']; ?>
                                </td>
                            </tr> -->
                            <tr>
                                <th class=" text-end" scope="col">Reward : </th>
                                <td>-</td>
                            </tr>

                        <?php
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>

    </body>
<?php
} else {
    echo '<script>alert("Login/Register to Raise a cause")</script>';
    echo '<script>window.location = "index.php"</script>';
}
?>

</html>