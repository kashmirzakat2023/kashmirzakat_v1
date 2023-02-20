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
$useremail = $_GET['useremail'];
$status = $_GET['status'];
include 'assets/connection.php';
if (isset($_SESSION['username']) && $_SESSION['username'] == 'admin') {
?>

    <body id="body-pd">
        <?php
        include 'assets/navbar-dash.php';
        ?>
        <script>
            window.onload = (event) => {
                // $('#nav-bar').attr('class', 'l-navbar show');
                $('#body-pd').attr('class', 'body-pd');
                $('#withdrawls').addClass("nav_link active");
            }
        </script>
        <!--Container Main start-->
        <div class=" ">
            <h3> Withdrawl Updated</h3>
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
                if($status == 'accepted')
                    $result = mysqli_query($db, "SELECT * FROM withdrawl_pending as wp join form_data as f on f.id=wp.raiseid  and f.status='Accepted'  and wp.status='accepted'");
                else if($status == 'pending')
                    $result = mysqli_query($db, "SELECT * FROM withdrawl_request as wp join form_data as f on f.id=wp.raiseid  and f.status='Accepted'  and wp.status='accepted'");
                else
                    $result = mysqli_query($db, "SELECT * FROM withdrawl_pending as wp join form_data as f on f.id=wp.raiseid  and f.status='Accepted'  and wp.status='rejected'");
                $column_data_fields = ['id', 'name', 'cause_title', 'samount', 'date', 'status', 'wid'];
                $column_fields = ['ID', 'Name', 'cause', 'Requested', 'Date & Time', 'Status', 'Wid'];
                ?>
                columnDefs.push({
                    field: 'View',
                    cellRenderer: function(params) {
                        return '<a class="btn btn-outline-primary p-1" href="withdrawl-invoice.php?wid=' + params.data.Wid + '">view</a>';
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