<?php session_start(); ?>
<html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
<title>Withdrawl Pending</title>
<script src="js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/nav-dash.css">
<script src="js/nav-dash.js"></script>
<?php
include 'assets/connection.php';
$useremail = $_GET['useremail'];
if (isset($_SESSION['username']) && $_SESSION['username'] == 'admin') {
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
                        <a href="admin-donations.php?useremail=<?php echo $useremail; ?>" class="nav_link " title="Donations" data-bs-toggle="tooltip" data-bs-placement="bottom">
                            <i class='bx bx-money nav_icon'></i>
                            <span class="nav_name">Donations</span> </a>
                        <a href="users.php?useremail=<?php echo $useremail; ?>" class="nav_link" title="My Donations" data-bs-toggle="tooltip" data-bs-placement="bottom">
                            <i class='bx bxs-user nav_icon'></i>
                            <span class="nav_name">Users</span> </a>
                        <a href="bank-pending.php?useremail=<?php echo $useremail; ?>" class="nav_link " title="Withdrawls" data-bs-toggle="tooltip" data-bs-placement="bottom">
                            <i class='bx bx-time-five nav_icon'></i>
                            <span class="nav_name">Bank Pending</span> </a>
                        <a href="admin-withdrawls.php?useremail=<?php echo $useremail; ?>" class="nav_link active" title="Withdrawls" data-bs-toggle="tooltip" data-bs-placement="bottom">
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
        <div class="height-100 ">
            <h1>Withdrawl Pending</h1>
            <div class="table-responsive w-100 ">
                <table class="table border">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Cause</th>
                            <th scope="col">Requested</th>
                            <th scope="col">date</th>
                            <th scope="col">Time</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = mysqli_query($db, "SELECT * FROM withdrawl_request");
                        while ($row1 = mysqli_fetch_array($query)) {
                            $id = $row1['raiseid'];
                            $wid = $row1['wid'];
                        ?>
                            <tr>
                                <td><?php echo $row1['raiseid']; ?></td>
                                <td><?php echo $row1['name']; ?></td>

                                <?php
                                $result1 = mysqli_query($db, "SELECT * FROM accepted_form where id='$id' and status='Accepted' ");
                                while ($rows = mysqli_fetch_array($result1)) {
                                ?>
                                    <td>
                                        <a href="raise-detail.php?cause=<?php echo $rows['cause_title']; ?>">
                                            <img src="<?php echo "images/" . $rows['profile_pic']; ?>" width="40px" alt="" srcset=""> <?php echo $rows['cause_title']; ?>
                                            <i class="fas fa-external-link"></i>
                                        </a>
                                    </td>
                                    <td>₹ <?php echo $row1['amount']; ?></td>
                                    <td><?php
                                        $month  = date_format(date_create($row1['date']), "M d,Y");
                                        echo $month; ?></td>
                                    <td><?php echo $row1['time']; ?></td>
                                    <td>
                                        <a class="btn btn-primary p-1" href="withdrawl-review.php?wid=<?php echo $wid; ?>&id=<?php echo $rows['id'];?>">view</a>
                                    </td>
                            </tr>
                    <?php
                                }
                            }
                    ?>

                    </tbody>
                </table>
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