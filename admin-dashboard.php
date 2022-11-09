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
$result = mysqli_query($db, "SELECT * FROM form_data  where status='Accepted'");
$user = mysqli_query($db, "SELECT * FROM users ");
$query = mysqli_query($db, "SELECT * FROM payments  where status='complete'");
if (isset($_SESSION['username']) && $_SESSION['username'] == 'admin') {
?>

    <body id="body-pd" class="body-pd">
        <?php
        include 'assets/admin-navbar-dash.php';
        ?>
        <script>
            window.onload = (event) => {
                $('#nav-bar').attr('class', 'l-navbar show');
                $('#body-pd').attr('class', 'body-pd');
                $('#dashboard').addClass("nav_link active");
            }
        </script>
        <!--Container Main start-->
        <div class="height-100">
            <h1> Dashboard</h1>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12 mb-4 ">
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
                                    <i class='bx bx-donate-heart  box_icon'></i>
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
                <div class="col-lg-3 col-md-6 col-12 mb-4">
                    <div class="card bg-success shadow h-100 " style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px !important;">
                        <div class="card-body ">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <h1 class="mb-3 fw-bolder text-light" style="font-size: 30px !important;">₹
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
                                    <i class='fas fa-rupee-sign  box_icon'></i>
                                </div>
                            </div>
                        </div>
                        <div class=" text-light text-center p-1 mb-0 " style="background-color: rgba(0,0,0,0.3);">
                            <small>Funds Raised</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12 mb-4">
                    <div class="card bg-danger shadow h-100 " style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px !important;">
                        <div class="card-body ">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <h1 class="mb-3 fw-bolder text-light" style="font-size: 30px !important;">
                                        <?php

                                        echo mysqli_num_rows($result);
                                        ?>
                                    </h1>
                                    <div class="text-xs font-weight-bold text-light mb-1">
                                        Causes</div>
                                </div>
                                <div class="col-auto">
                                    <i class='bx bxs-megaphone '></i>
                                </div>
                            </div>
                        </div>
                        <a href="admin-campaigns.php?useremail=<?php echo $useremail; ?>">
                            <div class="text-light text-center p-1 mb-0 " style="background-color: rgba(0,0,0,0.3);">
                                <small>view....</small><i class="fas fa-arrow-circle-right text-light"></i>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12 mb-4">
                    <div class="card bg-info shadow h-100 " style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px !important;">
                        <div class="card-body ">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <h1 class="mb-3 fw-bolder text-light" style="font-size: 30px !important;">₹
                                        <?php
                                        $query = mysqli_query($db, "SELECT * FROM payments  where status='complete'");
                                        $donations = 0;
                                        $tip = 0;
                                        while ($row = mysqli_fetch_array($query))
                                            $tip += $row['tip'];
                                        echo $tip;
                                        ?>
                                    </h1>
                                    <div class="text-xs font-weight-bold text-light mb-1">
                                        Tips Raised</div>
                                </div>
                                <div class="col-auto">
                                    <i class='bx bx-money box_icon'></i>
                                </div>
                            </div>
                        </div>
                        <div class=" text-light text-center p-1 mb-0 " style="background-color: rgba(0,0,0,0.3);">
                            <small>Tips Raised</small>
                        </div>
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
            </div>
            <?php
            include 'assets/footer-dash.php';
            ?>
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
<style>
    .col-auto i {
        font-size: 50px;
        color: rgba(0, 0, 0, 0.5)
    }

    .card-body {
        padding: 5px 10px;
    }
</style>