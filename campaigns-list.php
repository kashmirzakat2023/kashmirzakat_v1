<?php session_start(); ?>
<title><?= $_GET['status'] ?> Forms</title>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <script src="js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/nav-dash.css">
    <script src="js/nav-dash.js"></script>
</head>
<?php
$status = $_GET['status'];
$_SESSION['useremail'] = $_SESSION['useremail'];
$useremail = $_SESSION['useremail'];
if (isset($_SESSION['username'])) {
    include 'assets/connection.php';
?>
    <script>
        window.onload = (event) => {
            $('#campaign').addClass("nav_link active");
            $('#body-pd').attr('class', 'body-pd');
        }
    </script>

    <body id="body-pd">
        <?php include 'assets/navbar-dash.php';
        ?>
        <h2><?= $status ?> Causes</h3>
            <script>
                let column_fields;
                if ("<?= $_SESSION['username'] ?>" == "admin") {
                    if ('<?= $status ?>' == 'Rejected')
                        column_fields = ['ID', 'Cause', 'Purpose', 'Goal', 'Date', 'CM', 'Email', 'Phone'];
                    else if ('<?= $status ?>' == 'Accepted')
                        column_fields = ['ID', 'Cause', 'Purpose', 'Goal', 'Date', 'CM', 'Email', 'Phone'];
                    else
                        column_fields = ['ID', 'Cause', 'Purpose', 'Goal', 'Date', 'CM', 'Email', 'Phone'];
                } else {
                    if ('<?= $status ?>' == 'Rejected')
                        column_fields = ['ID', 'Cause', 'Purpose', 'Goal', 'Date'];
                    else if ('<?= $status ?>' == 'Accepted')
                        column_fields = ['ID', 'Cause', 'Purpose', 'Goal', 'Date'];
                    else
                        column_fields = ['ID', 'Cause', 'Purpose', 'Goal', 'Date'];
                }
                const columnDefs = [];
                column_fields.forEach(element => {
                    columnDefs.push({
                        field: element,
                        editable: (element == 'CM') ? true : false,
                    });
                })

                <?php
                $result = mysqli_query($db, "SELECT * FROM form_data where status = '$status'");
                if ($_SESSION['username'] == "admin") {
                    $column_data_fields = ['id', 'cause_title', 'purpose', 'amount', 'date', 'cause_manager', 'beneficiary_email', 'beneficiary_phone'];
                    $column_fields = ['ID', 'Cause', 'Purpose', 'Goal', 'Date', 'CM', 'Email', 'Phone'];
                } else {
                    $result = mysqli_query($db, "SELECT * FROM form_data where status = '$status' and email= '$useremail'");
                    $column_data_fields = ['id', 'cause_title', 'purpose', 'amount', 'date'];
                    $column_fields = ['ID', 'Cause', 'Purpose', 'Goal', 'Date'];
                }
                ?>
                columnDefs.push({
                    field: 'Actions',
                    minWidth: 420,
                    cellRenderer: function(params) {
                        if ("<?= $_SESSION['username'] ?>" == "admin") {
                            if ('<?= $status ?>' == 'Rejected')
                                return '<a class="btn btn-outline-primary me-2" href="campaign-details.php?campaign=' + params.data.ID + '">View</a><a class="btn btn-outline-success me-2" href="change-campaign-status.php?id=' + params.data.ID + '&status=accept">Accept</a><a class="btn btn-outline-success me-2" href="admin-accept-edit-form.php?id=' + params.data.ID + '">Edit</a><a class="btn btn-outline-success" href="edit-user-form-kyc.php?id=' + params.data.ID + '" name="submit" type="submit">Edit Kyc</a>';
                            else if ('<?= $status ?>' == 'Accepted')
                                return '<a class="btn btn-outline-primary me-2" href="campaign-details.php?campaign=' + params.data.ID + '">View</a><a class="btn btn-outline-danger me-2" href="change-campaign-status.php?id=' + params.data.ID + '&status=reject">Reject</a><a class="btn btn-outline-success me-2" href="admin-accept-edit-form.php?id=' + params.data.ID + '">Edit</a><a class="btn btn-outline-success" href="edit-user-form-kyc.php?id=' + params.data.ID + '" name="submit" type="submit">Edit Kyc</a>';
                            else
                                return '<a class="btn btn-outline-primary me-2" href="campaign-details.php?campaign=' + params.data.ID + '">View</a><a class="btn btn-outline-success me-2" href="change-campaign-status.php?id=' + params.data.ID + '&status=accept">Accept</a><a class="btn btn-outline-danger me-2" href="change-campaign-status.php?id=' + params.data.ID + '&status=reject">Reject</a><a class="btn btn-outline-success me-2" href="admin-accept-edit-form.php?id=' + params.data.ID + '">Edit</a><a class="btn btn-outline-success" href="edit-user-form-kyc.php?id=' + params.data.ID + '" name="submit" type="submit">Edit Kyc</a>';
                        } else {
                            if ('<?= $status ?>' == 'Rejected')
                                return '<a class="btn btn-outline-primary me-2" href="campaign-details.php?campaign=' + params.data.ID + '">View</a><a class="btn btn-outline-success" href="user-edit-form.php?id=' + params.data.ID + '" >Edit</a>';
                            else if ('<?= $status ?>' == 'Accepted')
                                return '<a class="btn btn-outline-primary me-2" href="campaign-details.php?campaign=' + params.data.ID + '">View</a><a class="btn btn-outline-success" href="withdrawl-request.php?id=' + params.data.ID + '" >Make Withdrawl</a>';
                            else
                                return '<a class="btn btn-outline-primary me-2" href="campaign-details.php?campaign=' + params.data.ID + '">View</a><a class="btn btn-outline-success me-2" href="user-edit-form.php?id=' + params.data.ID + '" >Edit</a><a class="btn btn-outline-success" href="edit-user-form-kyc.php?id=' + params.data.ID + '" name="submit" type="submit">Edit Kyc</a>';
                        }
                    }
                })
            </script>
            <?php
            include 'assets/grid-system.php'
            ?>
            <p class=" bg-success text-light px-3 rounded-1 saved fs-4" style="width:fit-content; display:none; position:absolute; right:60px; bottom:50px; ">saved...</p>
            <p class=" bg-danger text-light px-3 rounded-1 nsaved fs-4" style="width:fit-content; display:none; position:absolute; right:60px; bottom:50px; ">Not saved...</p>

            
    </body>
<?php
} else {
    echo '<script>alert("Unauthentic User");</script>';
    echo '<script>window.location = "index.php"</script>';
} ?>