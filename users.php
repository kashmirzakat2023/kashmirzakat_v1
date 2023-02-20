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
        include 'assets/navbar-dash.php';
        ?>
        <script>
            window.onload = (event) => {
                // $('#nav-bar').attr('class', 'l-navbar show');
                $('#body-pd').attr('class', 'body-pd');
                $('#users').addClass("nav_link active");
            }
        </script>
        <h3>Users</h3>
        <script>
            let column_fields = ['ID', 'Name', 'Image', 'Email', 'Password', 'Phone', 'Date'];
            const columnDefs = [];
            column_fields.forEach(element => {
                columnDefs.push({
                    field: element
                });
            })

            <?php
            $column_data_fields = ['id', 'name', 'profile_pic', 'email', 'PASSWORD', 'phone', 'date'];
            $column_fields = ['ID', 'Name', 'Image', 'Email', 'Password', 'Phone', 'Date'];
            ?>
            columnDefs.push({
                field: 'Image',
                cellRenderer: function(params) {
                    return '<img src="images/' + params.data.Image + '" width="40px" class=" rounded-circle">';
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
    echo '<script>alert("Unauthenticated User")</script>';
    echo '<script>window.location = "index.php"</script>';
}
?>