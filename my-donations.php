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
$result = mysqli_query($db, "SELECT * FROM payments where email='$useremail'and status='complete' ");
if (isset($_SESSION['username'])) {
?>

    <body id="body-pd">
        <?php
        include 'assets/navbar-dash.php';
        ?>
        <script>
            window.onload = (event) => {
                $('#my_donations').addClass("nav_link active");
                $('#nav-bar').attr('class', 'l-navbar show');
                $('#body-pd').attr('class', 'body-pd');
            }
        </script>
        <!--Container Main start-->

        <br>
        <div class="height-100">
            <h1> My Donations</h1>
            <div class="table-responsive w-100 ">
                <table class="table border">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Title</th>
                            <th scope="col">User</th>
                            <th scope="col">Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                            while ($row = mysqli_fetch_array($result)) {
                            ?>
                        <tr>
                            <?php
                                $id = $row['raiseid'];
                                $query = mysqli_query($db, "SELECT * FROM form_data where id='$id' and status='Accepted' ");
                                while ($row1 = mysqli_fetch_array($query)) {
                            ?>
                                <td><?php echo $row['raiseid']; ?></td>
                                <td>
                                    <a href="raise-detail.php?campaign=<?php echo $row1['id']; ?>">
                                        <img src="<?php echo "images/" . $row1['profile_pic']; ?>" width="40px" alt="" srcset=""> <?php echo $row1['cause_title']; ?>
                                        <i class="fas fa-external-link"></i>
                                    </a>
                                </td>
                            <?php
                                }
                            ?>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['amount']; ?></td>
                        </tr>
                    <?php
                            }
                    ?>
                    </tr>
                    </tbody>
                </table>
            </div>

        </div>
        <?php
        include 'assets/footer-dash.php';
        ?>
    </body>

<?php
} else {
    echo '<script>alert("Login/Register to Raise a cause")</script>';
    echo '<script>window.location = "index.php"</script>';
}
?>

</html>