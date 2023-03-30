<?php session_start(); ?>
<html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
<title>My Donations</title>
<script src="js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/nav-dash.css">
<script src="js/nav-dash.js"></script>
<?php
include 'assets/connection.php';
$useremail = $_SESSION['useremail'];
if (isset($_SESSION['username'])) {
?>

    <body id="body-pd">
        <?php
        include 'assets/navbar-dash.php';
        ?>
        <script>
            let column_fields = [];
            let columnDefs = [];
        </script>
        <?php
        if ($_GET['type'] == 'my') {
        ?>
            <script>
                window.onload = (event) => {
                    $('#my_donations').addClass("nav_link active");
                    $('#body-pd').attr('class', 'body-pd');
                }
            </script>
            <h3>My Donations</h3>
            <script>
                column_fields = ['ID', 'Cause', 'Date', 'Donated', 'Tip', 'Transaction_Id'];
                <?php
                $column_data_fields = ['id', 'cause_title', 'date', 'amount', 'tip', 'tran_id'];
                $column_fields = ['ID', 'Cause', 'Date', 'Donated', 'Tip', 'Transaction_Id'];
                $result = mysqli_query($db, "SELECT * FROM payments as p join form_data as f on f.id = p.raiseid and p.status='complete' and p.email='$useremail'");
                ?>
                columnDefs = [];
                column_fields.forEach(element => {
                    columnDefs.push({
                        field: element
                    })
                })
                columnDefs.push({
                    field: 'Actions',
                    cellRenderer: function(params) {
                        return '<a href="payment-details.php?tid=' + params.data.Transaction_Id + '" class="btn btn-outline-success p-1">View</a>';
                    }
                })
            </script>
        <?php
        } else if ($_GET['type'] == 'ot') {
        ?>
            <script>
                window.onload = (event) => {
                    $('#donations').addClass("nav_link active");
                    $('#body-pd').attr('class', 'body-pd');
                }
            </script>
            <h3>Funds Raised</h3>
            <script>
                column_fields = ['ID', 'Name', 'Cause', 'Date', 'Donated', 'Tip', 'Transaction_Id'];
                <?php
                $column_data_fields = ['id', 'name', 'cause_title', 'date', 'amount', 'tip', 'tran_id'];
                $column_fields = ['ID', 'Name', 'Cause', 'Date', 'Donated', 'Tip', 'Transaction_Id'];
                $result = mysqli_query($db, "SELECT * FROM payments as p join form_data as f on f.id = p.raiseid and p.status='complete' and f.email='$useremail'");
                if ($_SESSION['useremail'] == 'admin@admin.com')
                    $result = mysqli_query($db, "SELECT * FROM payments as p join form_data as f on f.id = p.raiseid and p.status='complete'");
                ?>
                columnDefs = [];
                column_fields.forEach(element => {
                    columnDefs.push({
                        field: element
                    })
                })
                columnDefs.push({
                    field: 'Actions',
                    cellRenderer: function(params) {
                        return '<a href="payment-details.php?tid=' + params.data.Transaction_Id + '" class="btn btn-outline-success p-1">View</a>';
                    }
                })
            </script>

        <?php
        }
        ?>
        <?php
        include 'assets/grid-system.php';
        ?>
    </body>
<?php
} else {
    echo '<script>alert("Login/Register to Raise a cause")</script>';
    echo '<script>window.location = "index.php"</script>';
}
?>

</html>