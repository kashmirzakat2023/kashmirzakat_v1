<?php session_start(); ?>
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
if (isset($_SESSION['username'])) {
    $useremail = $_SESSION['useremail'];
    $result = mysqli_query($db, "SELECT * FROM form_data where email='$useremail' and status='Accepted'");
    $user = mysqli_query($db, "SELECT * FROM users where email='$useremail'");
    $query = mysqli_query($db, "SELECT * FROM payments where email='$useremail'and status='complete'");
?>

    <body id="body-pd">
        <?php
        include 'assets/navbar-dash.php';
        ?>
        <script>
            window.onload = (event) => {
                $('#dashboard').addClass("nav_link active");
                // $('#nav-bar').attr('class', 'l-navbar show');
                $('#body-pd').attr('class', 'body-pd');
            }
        </script>
        <!--Container Main start-->
        <div class=" ">
            <h2> Dashboard</h2>
            <div class="row">

                <div class="col-lg-4 col-md-6 col-12 mb-4">
                    <div class="card bg-warning shadow h-100 " style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px !important;">
                        <div class="card-body ">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <h2 class="mb-3 fw-bolder text-light" style="font-size: 50px !important;">
                                        <?php
                                        $quer1 = mysqli_query($db, "SELECT * FROM form_data where email='$useremail' and status='Accepted'");
                                        $sum = 0;
                                        while ($row3 = mysqli_fetch_array($quer1)) {
                                            $id = $row3['id'];
                                            $pay = mysqli_query($db, "SELECT * FROM payments where raiseid='$id' and status='complete'");
                                            $sum += mysqli_num_rows($pay);
                                        }
                                        echo $sum;

                                        ?>
                                    </h2>
                                    <div class="text-xs font-weight-bold text-light mb-1">
                                        Donations</div>
                                </div>
                                <div class="col-auto">
                                    <i class='bx bx-donate-heart fs-5' style="color:rgba(0,0,0,0.5); font-size:100px !important;" ;></i>
                                </div>
                            </div>
                        </div>
                        <a href="payments-history.php?type=ot">
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
                                    <h2 class="mb-3 fw-bolder text-light" style="font-size: 50px !important;">₹
                                        <?php
                                        $donations = 0;
                                        $quer = mysqli_query($db, "SELECT * FROM payments as p join form_data as f on f.id = p.raiseid and f.email='$useremail'and p.status='complete'");
                                        while ($row = mysqli_fetch_array($quer))
                                            $donations += $row['amount'];
                                        echo $donations;
                                        ?></h2>
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
                                    <h2 class="mb-3 fw-bolder text-light" style="font-size: 50px !important;">
                                        <?php
                                        echo mysqli_num_rows($result);
                                        ?>
                                    </h2>
                                    <div class="text-xs font-weight-bold text-light mb-1">
                                        Causes</div>
                                </div>
                                <div class="col-auto">
                                    <i class='bx bxs-megaphone fs-5' style="color:rgba(0,0,0,0.5); font-size:100px !important;" ;></i>
                                </div>
                            </div>
                        </div>
                        <a href="campaigns.php">
                            <div class=" text-light text-center p-1 mb-0 " style="background-color: rgba(0,0,0,0.3);">
                                <small>view....</small><i class="fas fa-arrow-circle-right text-light"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!--Container Main end-->

            <?php
            $sql = "SELECT * FROM payments where email='$useremail'and status='Complete'";
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

            <div class="row row-cols-1 mt-2 row-cols-md-2 row-cols-lg-2 g-4 mb-3">
                <div class="col col-12 col-lg-6 col-md-6">
                    <?php
                    $quer1 = mysqli_query($db, "SELECT * FROM form_data where email='$useremail' and status='Accepted'");
                    while ($row3 = mysqli_fetch_array($quer1)) {
                        $id = $row3['id'];
                        $res = mysqli_query($db, "SELECT * FROM payments where raiseid='$id'and status='complete' LIMIT 1");
                        if (mysqli_num_rows($res) > 0) {
                            while ($row2 = mysqli_fetch_array($res)) {
                                $date  = date_format(date_create($row2['date']), "M d,Y");
                                $name = $row2['name'];
                                if ($row2['checked'] == 'yes') {
                                    $donar = 'Anonymous';
                                } else {
                                    $donar = $row2['name'];
                                }
                                $email = $row2['email'];
                    ?>
                                <div class="card h-100 rounded-1 shadow">
                                    <h5 class="card-title p-2 text-muted">Recent Donations</h5>
                                    <div class="media d-flex justify-content-around border" style=" padding:10px;">
                                        <?php
                                        $res2 = mysqli_query($db, "SELECT * FROM users where email='$email' ");
                                        if (mysqli_num_rows($res2) > 0) {
                                            while ($row3 = mysqli_fetch_array($res2)) {
                                                if ($row2['checked'] == 'yes') {
                                                    $image = 'profile.png';
                                                } else {
                                                    $image = $row3['profile_pic'];
                                                }
                                        ?>
                                                <img src="<?php echo "images/" . $image; ?>" height="64px" width="64px" class="rounded-circle " alt="...">
                                            <?php
                                            }
                                            $days = 1;
                                        } else { ?>
                                            <img src="images/profile.png" height="64px" width="64px" class="rounded-circle " alt="...">
                                        <?php
                                        } ?>
                                        <div class="media-body card-body w-75">
                                            <?php
                                            $quer1 = mysqli_query($db, "SELECT * FROM form_data where id='$id' and status='Accepted' ");
                                            while ($row3 = mysqli_fetch_array($quer1)) {
                                            ?>
                                                <a href="payment-details.php?tid=<?php echo $row2['tran_id']; ?>"><?php echo $row3['cause_title']; ?></a>
                                                <div class=" d-flex justify-content-between">
                                                <?php } ?>
                                                <h6 class="mt-0 text-muted mt-1">by <?php echo $donar; ?> | <?php echo $date ?></h6>
                                                <b class="text-success">₹<?php echo $row2['amount']; ?></b>
                                                </div>
                                        </div>
                                    </div>
                                    <a class="card-title border-top p-1 text-center" href="campaigns.php">View all</a>
                        <?php }
                        }
                    } ?>
                                </div>
                </div>
                <div class="col col-12 col-lg-6 col-md-6  ">
                    <?php
                    $res = mysqli_query($db, "SELECT * FROM form_data where email='$useremail' and status='Accepted' LIMIT 1");
                    if (mysqli_num_rows($res) > 0) {
                        while ($row2 = mysqli_fetch_array($res)) {
                            $date  = date_format(date_create($row2['date']), "M d,Y"); ?>
                            <div class="card rounded-1 shadow">
                                <h5 class="card-title p-2 text-muted">Recent Causes</h5>
                                <div class="media d-flex justify-content-around border" style=" padding:10px;">
                                    <img src="<?php echo "images/" . $row2['profile_pic']; ?>" height="64px" width="64px" class="rounded-circle " alt="...">
                                    <?php
                                    ?>
                                    <div class="media-body card-body w-75">
                                        <?php
                                        $quer1 = mysqli_query($db, "SELECT * FROM form_data where id='$id' and status='Accepted'");
                                        while ($row3 = mysqli_fetch_array($quer1)) {
                                            // $username = '';
                                            // $email5 = '';
                                            // $userret = mysqli_query($db, "SELECT * FROM users where email = '$useremail' ");
                                            // while ($userdata = mysqli_fetch_array($userret)) {
                                            //     $username = $userdata['name'];
                                            // }
                                        ?>
                                            <a href="payment-details.php?tid=<?php echo $row2['cause_title']; ?>"><?php echo $row2['cause_title']; ?></a>
                                        <?php
                                        } ?>
                                        <div class=" d-flex justify-content-between">
                                            <h6 class="mt-0 text-muted mt-1"> <?php echo $date ?></h6>
                                        </div>
                                    </div>
                                </div>
                                <a class="card-title border-top p-1 text-center" href="campaigns.php">View all</a>
                        <?php
                        }
                    } ?>
                            </div>
                </div>
            </div>
        </div>
        
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
} else {
    echo '<script>alert("Unauthorised user")</script>';
    echo '<script>window.location = "index.php"</script>';
}
?>