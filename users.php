<?php session_start(); ?>

<head>
<title>Users</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/nav-dash.css">
    <script src="js/nav-dash.js"></script>
</head>
<?php
$useremail = $_GET['useremail'];
if (isset($_SESSION['username']) && $_SESSION['username'] == 'admin') {
    include 'assets/connection.php';
    $result = mysqli_query($db, "SELECT * FROM users");
?>

    <body id="body-pd">
        <?php
        include 'assets/admin-navbar-dash.php';
        ?>
        <div class="l-navbar " id="nav-bar">
            <nav class="nav" style="z-index: 100 !important;">
                <div>
                    <a href="admin-dashboard.php?username=<?php echo $useremail; ?> " class="nav_logo">
                        <i class='bx bx-layer nav_logo-icon'></i>
                        <span class="nav_logo-name"><b>DASHBOARD</b></span> </a>
                    <div class="nav_list">
                        <a href="admin-dashboard.php?username=<?php echo $useremail; ?>" class="nav_link ">
                            <i class='bx bx-grid-alt nav_icon'></i>
                            <span class="nav_name">Dashboard</span> </a>
                        <a href="admin-campaigns.php?username=<?php echo $useremail; ?>" class="nav_link " title="Causes" data-bs-toggle="tooltip" data-bs-placement="bottom">
                            <i class='bx bxs-megaphone nav_icon '></i>
                            <span class="nav_name">Causes</span> </a>
                        <a href="admin-donations.php?username=<?php echo $useremail; ?>" class="nav_link" title="Donations" data-bs-toggle="tooltip" data-bs-placement="bottom">
                            <i class='bx bx-money nav_icon'></i>
                            <span class="nav_name">Donations</span> </a>
                        <a href="users.php?username=<?php echo $useremail; ?>" class="nav_link active" title="My Donations" data-bs-toggle="tooltip" data-bs-placement="bottom">
                            <i class='bx bxs-user nav_icon'></i>
                            <span class="nav_name">Users</span> </a>
                        <a href="bank-pending.php?username=<?php echo $useremail; ?>" class="nav_link" title="Withdrawls" data-bs-toggle="tooltip" data-bs-placement="bottom">
                            <i class='bx bx-time-five nav_icon'></i>
                            <span class="nav_name">Bank Pending</span> </a>
                        <a href="admin-withdrawls.php?username=<?php echo $useremail; ?>" class="nav_link" title="Withdrawls" data-bs-toggle="tooltip" data-bs-placement="bottom">
                            <i class='bx bx-money-withdraw nav_icon'></i>
                            <span class="nav_name">Withdrawls</span> </a>
                        <a href="dashboard-scholarship.php?username=<?php echo $useremail; ?>" class="nav_link" title="Scholaarship" data-bs-toggle="tooltip" data-bs-placement="bottom">
                            <i class='bx bxs-graduation nav_icon'></i>
                            <span class="nav_name">Scholarships</span> </a>
                    </div>
                </div>
                <a href="logout.php" class="nav_link">
                    <i class='bx bx-log-out nav_icon' title="Signout" data-bs-toggle="tooltip" data-bs-placement="bottom"></i>
                    <span class="nav_name">SignOut</span> </a>
            </nav>
        </div>
        <h1>Users</h1>
        <table class="table table-striped table-responsive w-100">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">Phone</th>
                    <!--<th scope="col">Delete</th>-->
                </tr>
            </thead>
            <tbody><?php
                    while ($data = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <th scope="row"><?php echo $data['id']; ?></th>
                        <td><img src="<?php echo "images/" . $data['profile_pic']; ?>" class="rounded-circle " height="50px" width="50px" alt="" srcset=""> <?php echo $data['name']; ?></td>
                        <td><?php echo $data['email']; ?></td>
                        <td><?php echo $data['PASSWORD']; ?></td>
                        <td><?php echo $data['phone']; ?></td>
                        <!--<td><a class="btn btn-outline-danger m-2" href="delete.php">Delete</a></td>-->
                    </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
        <?php include 'assets/footer-dash.php'; ?>

    </body>
    <style>
        table {
            margin-left: auto;
            margin-right: auto;
            margin-top: 50px !important;
            width: 180vh !important;
            border: 1px solid black !important;
        }
    </style>
<?php
} else {
    echo '<script>alert("Unauthenticated User")</script>';
    echo '<script>window.location = "index.php"</script>';
}
?>