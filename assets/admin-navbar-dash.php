<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<!--<div id="loading">-->
<!--    <img id="loading-image" src="images/hug.gif" alt="Loading..." />-->
<!--</div>-->

<head>
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
</head>
<style>
    #loading {
        position: fixed;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        opacity: 0.7;
        /* background-color: #fff; */
        z-index: 99;
    }

    #loading-image {
        width: 20vh;
        z-index: 100;
    }
</style>
<header class="header d-flex justify-content-between body-pd" id="header">
    <div class="header_toggle"> <i class='bx bx-menu bx-x' id="header-toggle"></i> </div>
    <div class="header_toggle d-flex flex-row align-content-center">
        <a href="index.php" class=" text-dark mt-1">
            <small class=" d-flex justify-content-around"><i class='bx bx-home  px-1 fs-3'></i> Home</small>
        </a>
    </div>
</header>
<div class="l-navbar show" id="nav-bar">
    <nav class="nav" style="z-index: 100 !important;">
        <div>
            <a href="admin-dashboard.php?useremail=<?php echo $useremail; ?> " class="nav_logo">
                <i class='bx bx-layer nav_logo-icon'></i>
                <span class="nav_logo-name"><b>DASHBOARD</b></span> </a>
            <div class="nav_list">
                <a href="admin-dashboard.php?useremail=<?php echo $useremail; ?>" class="nav_link " data-bs-toggle="tooltip" data-bs-placement="right" title="dashboard" id="dashboard">
                    <i class='bx bx-grid-alt nav_icon'></i>
                    <span class="nav_name">Dashboard</span> </a>
                <a href="admin-campaigns.php?useremail=<?php echo $useremail; ?>" class="nav_link " title="Causes" data-bs-toggle="tooltip" data-bs-placement="right" id="campaign">
                    <i class='bx bxs-megaphone nav_icon '></i>
                    <span class="nav_name">Causes</span> </a>
                <a href="admin-donations.php?useremail=<?php echo $useremail; ?>" class="nav_link " title="Donations" data-bs-toggle="tooltip" data-bs-placement="right" id="donations">
                    <i class='bx bx-money nav_icon'></i>
                    <span class="nav_name">Donations</span> </a>
                <a href="users.php?useremail=<?php echo $useremail; ?>" class="nav_link" title="My Donations" data-bs-toggle="tooltip" data-bs-placement="right" id="users">
                    <i class='bx bxs-user nav_icon'></i>
                    <span class="nav_name">Users</span> </a>
                <a href="bank-pending.php?useremail=<?php echo $useremail; ?>" class="nav_link " title="Withdrawls" data-bs-toggle="tooltip" data-bs-placement="right" id="bank_pending">
                    <i class='bx bx-time-five nav_icon'></i>
                    <span class="nav_name">Bank Pending</span> </a>
                <a href="admin-withdrawls.php?useremail=<?php echo $useremail; ?>" class="nav_link " title="Withdrawls" data-bs-toggle="tooltip" data-bs-placement="right" id="withdrawls">
                    <i class='bx bx-money-withdraw nav_icon'></i>
                    <span class="nav_name">Withdrawls</span> </a>
                <!-- <a href="dashboard-scholarship.php?useremail=<?php echo $useremail; ?>" class="nav_link" title="Scholaarship" data-bs-toggle="tooltip" data-bs-placement="right" id="scholarship">
                    <i class='bx bxs-graduation nav_icon'></i>
                    <span class="nav_name">Scholarships</span> </a> -->
            </div>
        </div>
        <a href="logout.php" class="nav_link">
            <i class='bx bx-log-out nav_icon' title="Signout" data-bs-toggle="tooltip" data-bs-placement="bottom"></i>
            <span class="nav_name">SignOut</span> </a>
    </nav>
</div>