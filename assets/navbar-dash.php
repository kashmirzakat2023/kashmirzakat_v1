<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<header class="header d-flex justify-content-between body-pd mb-3" id="header">
    <div class="header_toggle"> <i class='bx bx-menu bx-x' id="header-toggle"></i> </div>
    <div class="header_toggle d-flex flex-row align-content-center">
        <a href="index.php" class=" text-dark mt-1">
            <small class=" d-flex text-dark justify-content-around"><i class='bx bx-home text-dark px-1 fs-3'></i> Home</small>
        </a>
        <div class="header_img mx-3">
            <?php
            $useremail = $_SESSION['useremail'];
            $user = mysqli_query($db, "SELECT * FROM users where email='$useremail'");
            while ($row = mysqli_fetch_array($user)) {
            ?>
                <a href="account-setting.php">
                    <img src="<?php echo "images/" . $row['profile_pic']; ?>" alt="profile_pic">
                    <small class=" text-dark"><?php echo $row['name']; ?> </small>
                </a>
            <?php } ?>
        </div>

    </div>
</header>
<?php
if ($_SESSION['user_type'] != 2 && $_SESSION['user_type'] != 1) {
?>
    <div class="l-navbar show" id="nav-bar">
        <nav class="nav" style="z-index: 100 !important;">
            <div> <a href="user-dashboard.php" class="nav_logo">
                    <i class='bx bx-layer nav_logo-icon'></i>
                    <span class="nav_logo-name"><b>DASHBOARD</b></span> </a>
                <div class="nav_list">
                    <a href="user-dashboard.php" class="nav_link" data-bs-toggle="tooltip" data-bs-placement="right" title="dashboard" id="dashboard">
                        <i class='bx bx-grid-alt nav_icon'></i>
                        <span class="nav_name">Dashboard</span> </a>
                    <a href="campaigns.php" class="nav_link" title="Causes" data-bs-toggle="tooltip" data-bs-placement="right" id="campaign">
                        <i class='bx bxs-megaphone nav_icon '></i>
                        <span class="nav_name">Causes</span> </a>
                    <a href="payments-history.php?type=ot" class="nav_link" title="Donations" data-bs-toggle="tooltip" data-bs-placement="right" id="donations">
                        <i class='bx bx-money nav_icon'></i>
                        <span class="nav_name">Donations</span> </a>
                    <a href="payments-history.php?type=my" class="nav_link" title="My Donations" data-bs-toggle="tooltip" data-bs-placement="right" id="my_donations">
                        <i class='bx bx-donate-heart nav_icon'></i>
                        <span class="nav_name">My Donations</span> </a>
                    <a href="withdrawls.php" class="nav_link" title="Withdrawls" data-bs-toggle="tooltip" data-bs-placement="right" id="withdrawls">
                        <i class='bx bx-money-withdraw nav_icon'></i>
                        <span class="nav_name">Withdrawls</span> </a>
                    <!-- <a href="dashboard-scholarship.php" class="nav_link" title="Scholarship" data-bs-toggle="tooltip" data-bs-placement="bottom">
                    <i class='bx bxs-graduation nav_icon'></i>
                    <span class="nav_name">Scholarships</span> </a> -->
                </div>
            </div>
            <a href="logout.php" class="nav_link">
                <i class='bx bx-log-out nav_icon' title="Signout" data-bs-toggle="tooltip" data-bs-placement="bottom"></i>
                <span class="nav_name">SignOut</span> </a>
        </nav>
    </div>
<?php } else { ?>
    <div class="l-navbar show" id="nav-bar">
        <nav class="nav" style="z-index: 100 !important;">
            <div>
                <a href="admin-dashboard.php " class="nav_logo">
                    <i class='bx bx-layer nav_logo-icon'></i>
                    <span class="nav_logo-name"><b>DASHBOARD</b></span> </a>
                <div class="nav_list">
                    <a href="admin-dashboard.php" class="nav_link " data-bs-toggle="tooltip" data-bs-placement="right" title="dashboard" id="dashboard">
                        <i class='bx bx-grid-alt nav_icon'></i>
                        <span class="nav_name">Dashboard</span> </a>
                    <a href="campaigns.php" class="nav_link " title="Causes" data-bs-toggle="tooltip" data-bs-placement="right" id="campaign">
                        <i class='bx bxs-megaphone nav_icon '></i>
                        <span class="nav_name">Causes</span> </a>
                    <a href="payments-history.php?type=ot" class="nav_link " title="Donations" data-bs-toggle="tooltip" data-bs-placement="right" id="donations">
                        <i class='bx bx-money nav_icon'></i>
                        <span class="nav_name">Donations</span> </a>
                    <a href="payments-history.php?type=my" class="nav_link" title="My Donations" data-bs-toggle="tooltip" data-bs-placement="right" id="my_donations">
                        <i class='bx bx-donate-heart nav_icon'></i>
                        <span class="nav_name">My Donations</span> </a>
                    <?php
                    if ($_SESSION['user_type'] == 1) {
                    ?>
                        <a href="users.php" class="nav_link" title="My Donations" data-bs-toggle="tooltip" data-bs-placement="right" id="users">
                            <i class='bx bxs-user nav_icon'></i>
                            <span class="nav_name">Users</span> </a>
                    <?php
                    }
                    ?>
                    <a href="bank-pending.php" class="nav_link " title="Withdrawls" data-bs-toggle="tooltip" data-bs-placement="right" id="bank_pending">
                        <i class='bx bx-time-five nav_icon'></i>
                        <span class="nav_name">Bank Pending</span> </a>
                    <a href="withdrawls.php" class="nav_link " title="Withdrawls" data-bs-toggle="tooltip" data-bs-placement="right" id="withdrawls">
                        <i class='bx bx-money-withdraw nav_icon'></i>
                        <span class="nav_name">Withdrawls</span> </a>
                    <!-- <a href="dashboard-scholarship.php" class="nav_link" title="Scholaarship" data-bs-toggle="tooltip" data-bs-placement="right" id="scholarship">
                    <i class='bx bxs-graduation nav_icon'></i>
                    <span class="nav_name">Scholarships</span> </a> -->
                </div>
            </div>
            <a href="logout.php" class="nav_link">
                <i class='bx bx-log-out nav_icon' title="Signout" data-bs-toggle="tooltip" data-bs-placement="bottom"></i>
                <span class="nav_name">SignOut</span> </a>
        </nav>
    </div>
<?php } ?>