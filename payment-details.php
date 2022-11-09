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
$useremail = $_SESSION['useremail'];
include 'assets/connection.php';

if (isset($_SESSION['username']) and $_SESSION['username'] == 'admin') {
?>
    <body id="body-pd">
        <?php
        include 'assets/admin-navbar-dash.php';
        ?>
        <div class="l-navbar " id="nav-bar">
            <nav class="nav" style="z-index: 100 !important;">
                <div>
                    <a href="admin-dashboard.php?useremail=<?php echo $useremail; ?> " class="nav_logo">
                        <i class='bx bx-layer nav_logo-icon'></i>
                        <span class="nav_logo-name"><b>DASHBOARD</b></span> </a>
                    <div class="nav_list">
                        <a href="admin-dashboard.php?useremail=<?php echo $useremail; ?>" class="nav_link ">
                            <i class='bx bx-grid-alt nav_icon'></i>
                            <span class="nav_name">Dashboard</span> </a>
                        <a href="admin-campaigns.php?useremail=<?php echo $useremail; ?>" class="nav_link " title="Causes" data-bs-toggle="tooltip" data-bs-placement="bottom">
                            <i class='bx bxs-megaphone nav_icon '></i>
                            <span class="nav_name">Causes</span> </a>
                        <a href="admin-donations.php?useremail=<?php echo $useremail; ?>" class="nav_link active" title="Donations" data-bs-toggle="tooltip" data-bs-placement="bottom">
                            <i class='bx bx-money nav_icon'></i>
                            <span class="nav_name">Donations</span> </a>
                        <a href="users.php?useremail=<?php echo $useremail; ?>" class="nav_link" title="My Donations" data-bs-toggle="tooltip" data-bs-placement="bottom">
                            <i class='bx bxs-user nav_icon'></i>
                            <span class="nav_name">Users</span> </a>
                        <a href="bank-pending.php?useremail=<?php echo $useremail; ?>" class="nav_link " title="Withdrawls" data-bs-toggle="tooltip" data-bs-placement="bottom">
                            <i class='bx bx-time-five nav_icon'></i>
                            <span class="nav_name">Bank Pending</span> </a>
                        <a href="admin-withdrawls.php?useremail=<?php echo $useremail; ?>" class="nav_link" title="Withdrawls" data-bs-toggle="tooltip" data-bs-placement="bottom">
                            <i class='bx bx-money-withdraw nav_icon'></i>
                            <span class="nav_name">Withdrawls</span> </a>
                        <a href="dashboard-scholarship.php?useremail=<?php echo $useremail; ?>" class="nav_link" title="Scholaarship" data-bs-toggle="tooltip" data-bs-placement="bottom">
                            <i class='bx bxs-graduation nav_icon'></i>
                            <span class="nav_name">Scholarships</span> </a>
                    </div>
                </div>
                <a href="logout.php" class="nav_link">
                    <i class='bx bx-log-out nav_icon' title="Signout" data-bs-toggle="tooltip" data-bs-placement="bottom"></i>
                    <span class="nav_name">SignOut</span> </a>
            </nav>
        </div>
        <!--Container Main start-->

        <br>
        <div class="height-100 ">
            <h1> Funds Raised</h1>
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
                                <th class=" text-end" scope="col">Email : </th>
                                <td><?php echo $row1['email']; ?></td>
                            </tr>
                            <tr>
                                <th class=" text-end" scope="col">Phone no : </th>
                                <td><?php echo $row1['phone']; ?></td>
                            </tr>
                            <tr>
                                <th class=" text-end" scope="col">Cause : </th>
                                <td>
                                    <?php
                                    $id = $row1['raiseid'];
                                    $result = mysqli_query($db, "SELECT * FROM accepted_form where id='$id' and status='Accepted'  ");
                                    while ($row = mysqli_fetch_array($result)) { ?>
                                        <a href="raise-detail.php?cause=<?php echo $row['cause_title']; ?>">
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
                                <th class=" text-end" scope="col">Transaction Id : </th>
                                <td>
                                    <?php echo $tid; ?>
                                </td>
                            </tr>
                            <tr>
                                <th class=" text-end" scope="col">Tip : </th>
                                <td>
                                    <?php echo $row1['tip']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th class=" text-end" scope="col">Comment : </th>
                                <td>
                                    <?php echo $row1['comment']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th class=" text-end" scope="col">Date & Time : </th>
                                <td>
                                    <?php echo $row1['date']; ?>
                                </td>
                            </tr>
                            <!--<tr>-->
                            <!--    <th class=" text-end" scope="col">Time : </th>-->
                            <!--    <td>-->
                            <!--        <?php echo $row1['time']; ?>-->
                            <!--    </td>-->
                            <!--</tr>-->
                            <tr>
                                <th class=" text-end" scope="col">Ananymous : </th>
                                <td>
                                    <?php echo $row1['checked']; ?>
                                </td>
                            </tr>
                            <!--<tr>-->
                            <!--    <th class=" text-end" scope="col">Reward : </th>-->
                            <!--    <td>-</td>-->
                            <!--</tr>-->

                        <?php
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
        
        <?php include 'assets/footer-dash.php'; ?>
    </body>
<?php
} else if (isset($_SESSION['username']) ) {
?>

    <body id="body-pd">
        <?php
        include 'assets/navbar-dash.php';
        ?>
        <div class="l-navbar " id="nav-bar">
            <nav class="nav" style="z-index: 100 !important;">
                <div> <a href="user-dashboard.php" class="nav_logo">
                        <i class='bx bx-layer nav_logo-icon'></i>
                        <span class="nav_logo-name"><b>DASHBOARD</b></span> </a>
                    <div class="nav_list">
                        <a href="user-dashboard.php?useremail=<?php echo $useremail; ?>" class="nav_link ">
                            <i class='bx bx-grid-alt nav_icon'></i>
                            <span class="nav_name">Dashboard</span> </a>
                        <a href="campaigns.php?useremail=<?php echo $useremail; ?>" class="nav_link " title="Causes" data-bs-toggle="tooltip" data-bs-placement="bottom">
                            <i class='bx bxs-megaphone nav_icon '></i>
                            <span class="nav_name">Causes</span> </a>
                        <a href="donations.php?useremail=<?php echo $useremail; ?>" class="nav_link active" title="Donations" data-bs-toggle="tooltip" data-bs-placement="bottom">
                            <i class='bx bx-money nav_icon'></i>
                            <span class="nav_name">Donations</span> </a>
                        <a href="my-donations.php?useremail=<?php echo $useremail; ?>" class="nav_link " title="My Donations" data-bs-toggle="tooltip" data-bs-placement="bottom">
                            <i class='bx bx-donate-heart nav_icon'></i>
                            <span class="nav_name">My Donations</span> </a>
                        <a href="withdrawls.php?useremail=<?php echo $useremail; ?>" class="nav_link " title="Withdrawls" data-bs-toggle="tooltip" data-bs-placement="bottom">
                            <i class='bx bx-money-withdraw nav_icon'></i>
                            <span class="nav_name">Withdrawls</span> </a>
                        <a href="dashboard-scholarship.php?useremail=<?php echo $useremail; ?>" class="nav_link" title="Scholaarship" data-bs-toggle="tooltip" data-bs-placement="bottom">
                            <i class='bx bxs-graduation nav_icon'></i>
                            <span class="nav_name">Scholarships</span> </a>
                    </div>
                </div> <a href="logout.php" class="nav_link">
                    <i class='bx bx-log-out nav_icon' title="Signout" data-bs-toggle="tooltip" data-bs-placement="bottom"></i>
                    <span class="nav_name">SignOut</span> </a>
            </nav>
        </div>
        <!--Container Main start-->

        <br>
        <div class="height-100 ">
            <h1> Funds Raised</h1>
            <div class="table-responsive w-100">
                <table class="table table-borderless d-flex align-self-centre">
                    <tbody>
                        <?php
                        $query = mysqli_query($db, "SELECT * FROM payments where  tran_id='$tid' and status='complete'");
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
                                <th class=" text-end" scope="col">Email : </th>
                                <td><?php echo $row1['email']; ?></td>
                            </tr>
                            <tr>
                                <th class=" text-end" scope="col">Phone no : </th>
                                <td><?php echo $row1['phone']; ?></td>
                            </tr>
                            <tr>
                                <th class=" text-end" scope="col">Cause : </th>
                                <td>
                                    <?php
                                    $id = $row1['raiseid'];
                                    $result = mysqli_query($db, "SELECT * FROM accepted_form where id='$id' and status='Accepted' ");
                                    while ($row = mysqli_fetch_array($result)) { ?>
                                        <a href="raise-detail.php?cause=<?php echo $row['cause_title']; ?>">
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

        <?php include 'assets/footer-dash.php'; ?>

    </body>
<?php
} else {
    echo '<script>alert("Login/Register to Raise a cause")</script>';
    echo '<script>window.location = "index.php"</script>';
}
?>

</html>