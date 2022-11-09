<?php session_start(); ?>
<title>Pending Forms</title>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <script src="js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="css/nav-dash.css">
    <script src="js/nav-dash.js"></script>
</head>
<?php
$_SESSION['useremail']= $_GET['useremail'];
$username= $_GET['username'];
$useremail= $_GET['useremail'];
if (isset($_SESSION['username']) && $_SESSION['username'] == "admin") {
    include 'assets/connection.php';
    $result = mysqli_query($db, "SELECT * FROM funds_form");
?>
<body id="body-pd">
    <?php include 'assets/admin-navbar-dash.php'; ?>
    <div class="l-navbar " id="nav-bar">
        <nav class="nav" style="z-index: 100 !important;">
            <div>
                    <a href="admin-dashboard.php?useremail=<?php echo $useremail; ?> " class="nav_logo">
                        <i class='bx bx-layer nav_logo-icon'></i>
                        <span class="nav_logo-name"><b>DASHBOARD</b></span> </a>
                    <div class="nav_list">
                        <a href="admin-dashboard.php?useremail=<?php echo $useremail; ?>" class="nav_link  ">
                            <i class='bx bx-grid-alt nav_icon'></i>
                            <span class="nav_name">Dashboard</span> </a>
                        <a href="admin-campaigns.php?useremail=<?php echo $useremail; ?>" class="nav_link active" title="Causes" data-bs-toggle="tooltip" data-bs-placement="bottom">
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
                </div> <a href="logout.php" class="nav_link">
                <i class='bx bx-log-out nav_icon' title="Signout" data-bs-toggle="tooltip" data-bs-placement="bottom"></i>
                <span class="nav_name">SignOut</span> </a>
        </nav>
    </div>
    <h1>Pending  Causes</h1>
    <div class=" table-responsive">
    <table class="table table-striped w-100">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Cause Title</th>
                <th scope="col">Amount</th>
                <th scope="col">Eligible</th>
                <th scope="col">Date</th>
                <th scope="col">Cause Manager</th>
                <th scope="col">Know More</th>
                <th scope="col">Accept</th>
                <th scope="col">Reject</th>
            </tr>
        </thead>
        <tbody><?php
                while ($data = mysqli_fetch_array($result)) {
                ?>
                <tr>
                    <th scope="row"><?php echo $data['id']; ?></th>
                    <td><?php echo $data['cause_title']; ?></td>
                    <td><?php echo $data['amount']; ?></td>
                    <td><?php echo $data['eligible']; ?></td>
                    <td><?php echo $data['date']; ?></td>
                    <td>
                    <?php
                    if ($useremail == 'causemanager@causemanager.com' ) {
                        echo $data['cause_manager'];
                    } else {
                    ?>
                    <div class="input-group mb-3">
                      <input type="text" class="form-control save" name="cmname" placeholder="CM Name" id="<?php echo $data['id'];?>" value="<?php echo $data['cause_manager']; ?>" aria-label="CM Name" aria-describedby="button-addon2">
                      <!--<button class="btn btn-outline-secondary save"  type="button" id="<?php echo $data['id'];?>" >save</button>-->
                    </div>
                    <?php
                    }
                    ?>
                    </td>
                    <td><a class="btn btn-outline-primary m-2" href="pending-fetch.php?id=<?php echo $data['id']; ?>">View</a></td>
                    <td><a class="btn btn-outline-success m-2" href="accept.php?id=<?php echo $data['id']; ?>">Accept</a></td>
                    <td><a class="btn btn-outline-danger m-2" href="reject.php?id=<?php echo $data['id']; ?>">Reject</a></td>
                </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
    </div>
    <p class=" bg-success text-light px-3 rounded-1 saved fs-4" style="width:fit-content; display:none; position:absolute; right:60px; bottom:50px; ">saved...</p>
    <p class=" bg-danger text-light px-3 rounded-1 nsaved fs-4" style="width:fit-content; display:none; position:absolute; right:60px; bottom:50px; ">Not saved...</p>
    
    <script>
    $(document).ready(function() {
            $(".save").keyup(function() {
                var email = $(this).val();
                var ids = $(this).closest("input").attr('id');
                    $.ajax({
                        url: 'cm-add.php',
                        type: 'post',
                        data: {
                            email: email,
                            id : ids
                        },
                        success: function(response) {
                            if(response)
                            $('.saved').show(1).fadeIn().animate({right:10, opacity:"show"}, 1500).delay(1000).hide(0.3);
                            else
                            $('.nsaved').show(1).fadeIn().animate({right:10, opacity:"show"}, 1500).delay(1000).hide(0.3);
                        }
                    });
            });

        });
        
    </script>
    <?php include 'assets/footer-dash.php'; ?>

    </body>
    <style>
        table {
            margin-left: auto;
            margin-right: auto;
            margin-top: 10px !important;
            width: 180vh !important;
            border: 1px solid black !important;
        }
    </style>
<?php
} else {
    echo '<script>alert("Unauthentic User");</script>';
    echo '<script>window.location = "index.php"</script>';
} ?>