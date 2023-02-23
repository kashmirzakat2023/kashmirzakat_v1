<?php session_start(); ?>
<html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
<title>Withdrawls</title>
<script src="js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/nav-dash.css">
<script src="js/nav-dash.js"></script>
<?php
$useremail = $_GET['useremail'];
$status = $_GET['status'];
include 'assets/connection.php';
if (isset($_SESSION['username'])) {
?>

    <body id="body-pd">
        <?php
        include 'assets/navbar-dash.php';
        ?>
        <script>
            window.onload = (event) => {
                $('#body-pd').attr('class', 'body-pd');
                $('#withdrawls').addClass("nav_link active");
            }
        </script>
        <!--Container Main start-->
        <br>
        <?php
        if ($status == 'Accepted') {
        ?>
            <h3>Accepted Withdrawls</h3>
        <?php
            $result = mysqli_query($db, "SELECT * FROM withdrawl_pending as wp join form_data as f on f.id=wp.raiseid and f.status='Accepted' and wp.status='accepted' and wp.email = '$useremail'");
            if ($useremail == 'admin@admin.com')
                $result = mysqli_query($db, "SELECT * FROM withdrawl_pending as wp join form_data as f on f.id=wp.raiseid and f.status='Accepted'  and wp.status='accepted'");
        } else if ($status == 'Pending') {
        ?>
            <h3>Pending Withdrawls</h3>
        <?php
            $result = mysqli_query($db, "SELECT * FROM withdrawl_request as wp join form_data as f on f.id=wp.raiseid and f.status='Accepted' and wp.email = '$useremail'");
            if ($useremail == 'admin@admin.com')
                $result = mysqli_query($db, "SELECT * FROM withdrawl_request as wp join form_data as f on f.id=wp.raiseid  and f.status='Accepted'");
        } else {
        ?>
            <h3>Rejected Withdrawls</h3>
        <?php
            $result = mysqli_query($db, "SELECT * FROM withdrawl_pending as wp join form_data as f on f.id=wp.raiseid  and f.status='Accepted'  and wp.status='rejected' and wp.email = '$useremail'");
            if ($useremail == 'admin@admin.com')
                $result = mysqli_query($db, "SELECT * FROM withdrawl_pending as wp join form_data as f on f.id=wp.raiseid  and f.status='Accepted'  and wp.status='rejected'");
        }
        ?>
        <div>
            <script>
                let column_fields = ['ID', 'Name', 'cause', 'Requested', 'Date & Time', 'Status'];
                const columnDefs = [];
                column_fields.forEach(element => {
                    columnDefs.push({
                        field: element
                    });
                })
                columnDefs.push({
                    field: 'wid',
                    hide: true
                });

                <?php
                $column_data_fields = ['id', 'name', 'cause_title', 'samount', 'date', 'status', 'wid'];
                $column_fields = ['ID', 'Name', 'cause', 'Requested', 'Date & Time', 'Status', 'Wid'];
                ?>
                columnDefs.push({
                    field: 'View',
                    cellRenderer: function(params) {
                        if ('<?= $status ?>' == 'Pending')
                            return '<a class="btn btn-outline-primary p-1" href="withdrawl-review.php?wid=' + params.data.Wid + '&id=' + params.data.ID + '">Review</a>';
                        else if ('<?= $status ?>' == 'Accepted')
                            return '<a class="btn btn-outline-primary p-1" href="withdrawl-invoice.php?wid=' + params.data.Wid + '">view</a>';
                        // else
                        // return '<a class="btn btn-outline-primary p-1" href="withdrawl-invoice.php?wid=' + params.data.Wid + '">view</a>';
                    }
                })
            </script>
            <?php
            include 'assets/grid-system.php'
            ?>
            <?php include 'assets/footer-dash.php'; ?>
    </body>
<?php
} else {
    echo '<script>alert("Login/Register to Raise a cause")</script>';
    echo '<script>window.location = "index.php"</script>';
}
?>

</html>