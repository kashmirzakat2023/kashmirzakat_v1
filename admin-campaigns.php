<?php
session_start(); ?>
<html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
<title>Campaigns</title>
<script src="js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/nav-dash.css">
<script src="js/nav-dash.js"></script>
<?php
include 'assets/connection.php';
$useremail = $_GET['useremail'];
$result = mysqli_query($db, "SELECT * FROM form_data where status='Accepted'");
if (isset($_SESSION['username']) && $_SESSION['username'] == 'admin') {
?>

    <body id="body-pd">
        <?php
        include 'assets/navbar-dash.php';
        ?>
        <script>
            window.onload = (event) => {
                // // $('#nav-bar').attr('class', 'l-navbar show');
                $('#body-pd').attr('class', 'body-pd');
                $('#campaign').addClass("nav_link active");
            }
        </script>
        <!--Container Main start-->

        <br>
        <div class="">
            <h3>Causes</h1>
            <div class="row">

                <div class="col-lg-4 col-md-6 col-12 mb-4">
                    <div class="card bg-success shadow h-100 " style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px !important;">
                        <div class="card-body ">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <h1 class="mb-3 fw-bolder text-light" style="font-size: 50px !important;">
                                        <?php
                                        $acc = mysqli_query($db, "SELECT * FROM form_data  where status='Accepted' ");
                                        echo mysqli_num_rows($acc);
                                        ?>
                                    </h1>
                                    <div class="text-xs font-weight-bold text-light mb-1">
                                        Accepted Causes</div>
                                </div>
                                <div class="col-auto">
                                    <i class='far fa-check-circle fs-5' style="color:rgba(0,0,0,0.5); font-size:100px !important;" ;></i>
                                </div>
                            </div>
                        </div>
                        <a href="rejected-forms.php?useremail=<?php echo $useremail; ?>&status=Accepted">
                            <div class=" text-light text-center p-1 mb-0 " style="background-color: rgba(0,0,0,0.3);">
                                <small>view....</small><i class="fas fa-arrow-circle-right text-light"></i>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 mb-4">
                    <div class="card bg-warning shadow h-100 " style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px !important;">
                        <div class="card-body ">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <h1 class="mb-3 fw-bolder text-light" style="font-size: 50px !important;">
                                        <?php
                                        $pen = mysqli_query($db, "SELECT * FROM form_data where status='Pending'");
                                        echo mysqli_num_rows($pen);
                                        ?>
                                    </h1>
                                    <div class="text-xs font-weight-bold text-light mb-1">
                                        Pending Causes</div>
                                </div>
                                <div class="col-auto">
                                    <i class='far fa-clock fs-5' style="color:rgba(0,0,0,0.5); font-size:100px !important;" ;></i>
                                </div>
                            </div>
                        </div>
                        <a href="rejected-forms.php?useremail=<?php echo $useremail; ?>&status=Pending">
                            <div class=" text-light text-center p-1 mb-0 " style="background-color: rgba(0,0,0,0.3);">
                                <small>view....</small><i class="fas fa-arrow-circle-right text-light"></i>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 mb-4">
                    <div class="card bg-danger shadow h-100 " style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px !important;">
                        <div class="card-body ">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <h1 class="mb-3 fw-bolder text-light" style="font-size: 50px !important;">
                                        <?php
                                        $rej = mysqli_query($db, "SELECT * FROM form_data where status='Rejected' ");
                                        echo mysqli_num_rows($rej);
                                        ?>
                                    </h1>
                                    <div class="text-xs font-weight-bold text-light mb-1">
                                        Rejected Causes</div>
                                </div>
                                <div class="col-auto">
                                    <i class='far fa-times-circle fs-5' style="color:rgba(0,0,0,0.5); font-size:100px !important;" ;></i>
                                </div>
                            </div>
                        </div>
                        <a href="rejected-forms.php?useremail=<?php echo $useremail;?>&status=Rejected">
                            <div class=" text-light text-center p-1 mb-0 " style="background-color: rgba(0,0,0,0.3);">
                                <small>view....</small><i class="fas fa-arrow-circle-right text-light"></i>
                            </div>
                        </a>
                    </div>
                </div>
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