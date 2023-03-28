<?php
session_start(); ?>
<html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
<title>Pending Bank transaction</title>
<script src="js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/nav-dash.css">
<script src="js/nav-dash.js"></script>
<?php
$useremail = $_SESSION['useremail'];

include 'assets/connection.php';
if (isset($_SESSION['username']) && $_SESSION['username'] == 'admin') {
?>

    <body id="body-pd">
        <script>
            window.onload = (event) => {
                $('#bank_pending').addClass("nav_link active");
                $('#body-pd').attr('class', 'body-pd');
            }
        </script>
        <?php
        include 'assets/navbar-dash.php';
        ?>
        <h3>Bank pending Donations</h3>
        <script>
            let column_fields = ['ID', 'Name', 'Cause', 'Date', 'Transaction_Id'];
            <?php
            $column_data_fields = ['id', 'name', 'cause_title', 'tran_date', 'tran_id'];
            $column_fields = ['ID', 'Name', 'Cause', 'Date', 'Transaction_Id'];
            $result = mysqli_query($db, "SELECT * FROM `bankPayments` as b join form_data as f on f.id = b.raiseid and b.status='pending'");
            ?>
            const columnDefs = [];
            column_fields.forEach(element => {
                columnDefs.push({
                    field: element
                })
            })

            columnDefs.push({
                field: 'Actions',
                cellRenderer: function(params) {
                    return '<a href="pending-payment-details.php?tid=' + params.data.Transaction_Id + '" class="btn btn-outline-primary p-1 me-1">View</a><a href="bank-accept.php?tid=' + params.data.Transaction_Id + '&status=Accept" class="btn btn-outline-success p-1 me-1">Accept</a><a href="bank-accept.php?tid=' + params.data.Transaction_Id + '&status=Rejected" class="btn btn-outline-danger p-1">Reject</a>';
                }
            })
        </script>

        <?php
        include 'assets/grid-system.php'
        ?>



    </body>
<?php
} else {
    echo '<script>alert("Login/Register to Raise a cause")</script>';
    echo '<script>window.location = "index.php"</script>';
}
?>

</html>