<?php
include 'assets/nav-links.php'; ?>
<html>

<head>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <?php include 'assets/navbar.php'; ?>
    <title>Reported list</title>
</head>
<?php if ($_SESSION['user_type'] == 2 || $_SESSION['user_type'] == 1) {
    include 'assets/connection.php';
?>

    <body>
        <h3 class=" text-center mt-5 fw-bold mb-3">Reported list</h3>
        <div class="m-2">
            <script>
                let column_fields = ['ID', 'Name', 'Cause_Id', 'Cause', 'Comment'];
                const columnDefs = [];
                column_fields.forEach(element => {
                    columnDefs.push({
                        field: element,
                    });
                })
                <?php
                $result = mysqli_query($db, "select * from report");
                $column_data_fields = ['id', 'name', 'raiseid', 'cause_title', 'comment'];
                $column_fields = ['ID', 'Name', 'Cause_Id', 'Cause', 'Comment'];
                ?>
                columnDefs.push({
                    field: 'Reply',
                    cellRenderer: function(params) {
                        return '<a class="btn btn-outline-primary me-1 p-1" href="campaign-details.php?campaign=' + params.data.Cause_Id + '">View Cause</a>';
                    }
                })
            </script>

            <?php
            include 'assets/grid-system.php'
            ?>
        </div>
        <?php include 'assets/footer.php'; ?>
    </body>

</html>
<?php } else {
    echo '<script>alert("Unauthentic User");</script>';
    echo '<script>window.location = "index.php"</script>';
}
?>