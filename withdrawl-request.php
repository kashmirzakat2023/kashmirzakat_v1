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
$id = $_GET['id'];
include 'assets/connection.php';
$useremail = $_SESSION['useremail'];
if (isset($_SESSION['username'])) {
?>

    <body id="body-pd">
        <?php
        include 'assets/navbar-dash.php';
        ?>
        <div class="l-navbar " id="nav-bar">
            <nav class="nav" style="z-index: 100 !important;">
                <div>
                    <a href="user-dashboard.php?useremail=<?php echo $useremail; ?>" class="nav_logo">
                        <i class='bx bx-layer nav_logo-icon'></i>
                        <span class="nav_logo-name"><b>DASHBOARD</b></span> </a>
                    <div class="nav_list">
                        <a href="user-dashboard.php?useremail=<?php echo $useremail; ?>" class="nav_link ">
                            <i class='bx bx-grid-alt nav_icon'></i>
                            <span class="nav_name">Dashboard</span> </a>
                        <a href="campaigns.php?useremail=<?php echo $useremail; ?>" class="nav_link " title="Causes" data-bs-toggle="tooltip" data-bs-placement="bottom">
                            <i class='bx bxs-megaphone nav_icon '></i>
                            <span class="nav_name">Causes</span> </a>
                        <a href="donations.php?useremail=<?php echo $useremail; ?>" class="nav_link" title="Donations" data-bs-toggle="tooltip" data-bs-placement="bottom">
                            <i class='bx bx-money nav_icon'></i>
                            <span class="nav_name">Donations</span> </a>
                        <a href="my-donations.php?useremail=<?php echo $useremail; ?>" class="nav_link" title="My Donations" data-bs-toggle="tooltip" data-bs-placement="bottom">
                            <i class='bx bx-donate-heart nav_icon'></i>
                            <span class="nav_name">My Donations</span> </a>
                        <a href="withdrawls.php?useremail=<?php echo $useremail; ?>" class="nav_link active" title="Withdrawls" data-bs-toggle="tooltip" data-bs-placement="bottom">
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

        <div class="height-100 p-3">
            <h1> Withdrawl Requested</h1>
            <form action="withdrawl-request-process.php?id=<?php echo $id;?>" method="post" class=" border border-2 p-3 rounded-1">
                <label class="control-label form-floating mt-2" for="fname">Enter withdrawl amount in rupees</label>
                <div class="input-group mb-3 flex-nowrap">
                    <span class="input-group-text bg-success text-light fw-bold " id="addon-wrapping">₹</span>
                    <input type="number" class="form-control" id="amount" min="50"  name="amount" placeholder="Minimum amount ₹50 INR " aria-label="amount" aria-describedby="addon-wrapping" required>
                </div>
                <div class="form-group mb-3">
                    <label class="control-label " for="comment">Other Details(Optional)</label>
                    <textarea class="form-control" rows="2" placeholder="Write any optional details" name="optional" id="optional"></textarea>
                </div>
                <button type="submit" class=" btn btn-primary mx-auto me-auto d-flex fs-5"  name="submit">Submit</button>
            </form>
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