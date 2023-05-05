<?php session_start(); ?>
<html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
<title><?php $id = $_GET['tid'];
        echo $id; ?></title>
<script src="js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/nav-dash.css">
<script src="js/nav-dash.js"></script>
<?php
$tid = $_GET['tid'];
$username = $_SESSION['username'];
$useremail = $_SESSION['useremail'];
include 'assets/connection.php';

if (isset($_SESSION['username']) and $_SESSION['user_type'] == 2 || $_SESSION['user_type'] == 1) {
?>

    <body id="body-pd">
                <?php
        include 'assets/navbar-dash.php';
        ?>
        <script>
            window.onload = (event) => {
                // $('#nav-bar').attr('class', 'l-navbar show');
                $('#body-pd').attr('class', 'body-pd');
                $('#bank_pending').addClass("nav_link active");
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
                        $query = mysqli_query($db, "SELECT * FROM bankPayments where  tran_id='$tid' ");
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
                                    $result = mysqli_query($db, "SELECT * FROM form_data where id='$id' and status='Accepted' ");
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
                            <tr>
                                <th class=" text-end" scope="col">Payment Gateway : </th>
                                <td>
                                    <?php
                                    if ($row1['method'] == '1')
                                        echo 'Bank';
                                    else echo 'Razorpay';
                                    ?></td>
                            </tr>
                            <tr>
                                <th class=" text-end" scope="col">Comment : </th>
                                <td>
                                    <?php echo $row1['comment']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th class=" text-end" scope="col">Date : </th>
                                <td>
                                    <?php echo $row1['date']; ?>
                                </td>
                            </tr>
                            <!-- <tr>
                                <th class=" text-end" scope="col">Time : </th>
                                <td>
                                    <?php echo $row1['time']; ?>
                                </td>
                            </tr> -->
                            <tr>
                                <th class=" text-end" scope="col">Ananymous : </th>
                                <td>
                                    <?php echo $row1['checked']; ?>
                                </td>
                            </tr>
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
} else if (isset($_SESSION['username']) and ($_SESSION['user_type'] == 2 || $_SESSION['user_type'] == 1)) {
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
                        $query = mysqli_query($db, "SELECT * FROM payments where  tran_id='$tid'and status='complete' ");
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
                                    $result = mysqli_query($db, "SELECT * FROM form_data where id='$id' and status='Accepted' ");
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
                            <tr>
                                <th class=" text-end" scope="col">Payment Gateway : </th>
                                <td>
                                    <?php
                                    if ($row1['method'] == '1')
                                        echo 'Bank';
                                    else echo 'Razorpay';
                                    ?></td>
                            </tr>
                            <tr>
                                <th class=" text-end" scope="col">Comment : </th>
                                <td>
                                    <?php echo $row1['comment']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th class=" text-end" scope="col">Date : </th>
                                <td>
                                    <?php echo $row1['date']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th class=" text-end" scope="col">Ananymous : </th>
                                <td>
                                    <?php echo $row1['checked']; ?>
                                </td>
                            </tr>
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