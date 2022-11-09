<?php
session_start(); ?>
<html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
<title>Dashoard</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/nav-dash.css">
<script src="js/nav-dash.js"></script>

<script src="js/bootstrap.bundle.min.js"></script>
<?php
include 'assets/connection.php';
$useremail = $_SESSION['useremail'];
$result = mysqli_query($db, "SELECT * FROM accepted_form  where status='Accepted'");
$user = mysqli_query($db, "SELECT * FROM users ");
$query = mysqli_query($db, "SELECT * FROM payments  where status='complete'");
if (isset($_SESSION['username']) && $_SESSION['username'] == 'admin') {
?>

    <body id="body-pd" class="body-pd">
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
                        <a href="admin-dashboard.php?useremail=<?php echo $useremail; ?>" class="nav_link active ">
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
                        <a href="admin-withdrawls.php?useremail=<?php echo $useremail; ?>" class="nav_link " title="Withdrawls" data-bs-toggle="tooltip" data-bs-placement="bottom">
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
        <div class="height-100 bg-light">
            <h1> Dashboard</h1>
            <div class="row">

                <div class="col-lg-4 col-md-6 col-12 mb-4">
                    <div class="card bg-warning shadow h-100 " style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px !important;">
                        <div class="card-body ">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <h1 class="mb-3 fw-bolder text-light" style="font-size: 40px !important;">
                                        <?php
                                        echo mysqli_num_rows($query);
                                        ?>
                                    </h1>
                                    <div class="text-xs font-weight-bold text-light mb-1">
                                        Donations</div>
                                </div>
                                <div class="col-auto">
                                    <i class='bx bx-donate-heart fs-5' style="color:rgba(0,0,0,0.5); font-size:100px !important;" ;></i>
                                </div>
                            </div>
                        </div>
                        <a href="admin-donations.php?useremail=<?php echo $useremail; ?>">
                            <div class=" text-light text-center p-1 mb-0 " style="background-color: rgba(0,0,0,0.3);">
                                <small>view....</small><i class="fas fa-arrow-circle-right text-light"></i>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 mb-4">
                    <div class="card bg-success shadow h-100 " style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px !important;">
                        <div class="card-body ">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <h1 class="mb-3 fw-bolder text-light" style="font-size: 40px !important;">₹
                                        <?php
                                        $donations = 0;
                                        while ($row = mysqli_fetch_array($query))
                                            $donations += $row['amount'];
                                        echo $donations;
                                        ?>
                                    </h1>
                                    <div class="text-xs font-weight-bold text-light mb-1">
                                        Funds Raised</div>
                                </div>
                                <div class="col-auto">
                                    <i class='fas fa-rupee-sign fs-5' style="color:rgba(0,0,0,0.5); font-size:100px !important;" ;></i>
                                </div>
                            </div>
                        </div>
                        <div class=" text-light text-center p-1 mb-0 " style="background-color: rgba(0,0,0,0.3);">
                            <small>Funds Raised</small>
                            <!-- <a href="#"><i class="fas fa-arrow-circle-right text-light"></i></a> -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 mb-4">
                    <div class="card bg-danger shadow h-100 " style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px !important;">
                        <div class="card-body ">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <h1 class="mb-3 fw-bolder text-light" style="font-size: 40px !important;">
                                        <?php

                                        echo mysqli_num_rows($result);
                                        ?>
                                    </h1>
                                    <div class="text-xs font-weight-bold text-light mb-1">
                                        Causes</div>
                                </div>
                                <div class="col-auto">
                                    <i class='bx bxs-megaphone fs-5' style="color:rgba(0,0,0,0.5); font-size:100px !important;" ;></i>
                                </div>
                            </div>
                        </div>
                        <a href="admin-campaigns.php?useremail=<?php echo $useremail; ?>">
                            <div class=" text-light text-center p-1 mb-0 " style="background-color: rgba(0,0,0,0.3);">
                                <small>view....</small><i class="fas fa-arrow-circle-right text-light"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!--Container Main end-->
            <div class="row row-cols-1 row-cols-lg-2">
                
            <?php
            $sql = "SELECT * FROM payments where status='complete'";
            $result = mysqli_query($db, $sql);
            $chart_data = "";
            while ($row = mysqli_fetch_array($result)) {

                $productname = $row['name'];
                $month[]  = date_format(date_create($row['date']), "M d,Y");
                $sales[] = $row['amount'];
            }
            if (mysqli_num_rows($result) > 0) {
            ?>
            
                <div class="col-12 col-lg-6 col-md-6">
                    <h3 class="page-header py-2">Donations </h3>
                    <canvas id="chartjs_line"></canvas>
                </div>

            <?php
            } ?>
            <div class="col-lg-4 col-md-6 col-12 mb-4 mx-5 float-end">
                    <div class="card bg-info shadow h-50 " style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px !important;">
                        <div class="card-body ">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <h1 class="mb-3 fw-bolder text-light" style="font-size: 40px !important;">₹
                                        <?php
                                        $query = mysqli_query($db, "SELECT * FROM payments  where status='complete'");
                                        $donations = 0;
                                        while ($row = mysqli_fetch_array($query))
                                            $tip += $row['tip'];
                                        echo $tip;
                                        ?>
                                    </h1>
                                    <div class="text-xs font-weight-bold text-light mb-1">
                                        Tips Raised</div>
                                </div>
                                <div class="col-auto">
                                    <i class='fas fa-rupee-sign fs-5' style="color:rgba(0,0,0,0.5); font-size:100px !important;" ;></i>
                                </div>
                            </div>
                        </div>
                        <div class=" text-light text-center p-1" style="background-color: rgba(0,0,0,0.3); margin-top: -20px;">
                            <small>Tips Raised</small>
                            <!-- <a href="#"><i class="fas fa-arrow-circle-right text-light"></i></a> -->
                        </div>
                    </div>
                </div>
            </div>
            <?php
            include 'assets/footer-dash.php'; ?>
    </body>

</html>
<script src=" //code.jquery.com/jquery-1.9.1.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script type="text/javascript">
    var ctx = document.getElementById("chartjs_line").getContext('2d');

    var myChart = new Chart(ctx, {

        type: 'line',

        axisY: {
            lineThickness: 3,
            lineColor: "blue"

        },

        data: {
            labels: <?php echo json_encode($month); ?>,

            datasets: [{
                backgroundColor: [
                    "rgba(0,0,0,0)"
                ],
                color: ["#fff"],
                borderColor: ["rgba(0,0,255)"],
                data: <?php echo json_encode($sales); ?>,
            }]
        },
        options: {

            legend: {
                display: true,
                position: 'bottom',

                labels: {
                    fontColor: '#71748d',
                    fontFamily: 'Circular Std Book',
                    fontSize: 14,
                }
            },


        }
    });
</script>

</div>
<?php
}
?>