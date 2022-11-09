<?php
session_start(); ?>
<html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
<title>Funds Raised</title>
<script src="js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/nav-dash.css">
<script src="js/nav-dash.js"></script>
<?php
$useremail = $_GET['useremail'];

include 'assets/connection.php';
if (isset($_SESSION['username']) && $_SESSION['username'] == 'admin') {
    $result = mysqli_query($db, "SELECT * FROM form_data  where status='Accepted'");
?>

    <body id="body-pd">
        <?php
        include 'assets/admin-navbar-dash.php';
        ?>
        <script>
            window.onload = (event) => {
                $('#nav-bar').attr('class', 'l-navbar show');
                $('#body-pd').attr('class', 'body-pd');
                $('#donations').addClass("nav_link active");
            }
        </script>
        <!--Container Main start-->

        <br>
        <div class="height-100 ">
            <h1> Funds Raised</h1>
            <div class="table-responsive w-100 ">
                <table class="table border">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Cause</th>
                            <th scope="col">Donated</th>
                            <th scope="col">Tip</th>
                            <th scope="col">Date</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($result)) {
                            $id = $row['id'];
                            $query = mysqli_query($db, "SELECT * FROM payments where raiseid='$id'and status='complete' ");
                            while ($row1 = mysqli_fetch_array($query)) {
                        ?>
                                <tr>
                                    <td><?php echo $row1['raiseid']; ?></td>
                                    <td>Admin</td>

                                    <?php
                                    $result1 = mysqli_query($db, "SELECT * FROM form_data where id='$id' and status='Accepted' ");
                                    while ($rows = mysqli_fetch_array($result1)) {
                                    ?>
                                        <td class="w-50">
                                            <a href="raise-detail.php?campaign=<?php echo $rows['id']; ?>" class="">
                                                <img src="<?php echo "images/" . $rows['profile_pic']; ?>" width="40px" alt="" srcset=""> <?php echo $rows['cause_title']; ?>
                                                <i class="fas fa-external-link"></i>
                                            </a>
                                        </td>
                                        <td>₹ <?php echo $row1['amount']; ?></td>
                                        <td>₹ <?php echo $row1['tip']; ?></td>
                                        <td><?php
                                            $month  = date_format(date_create($row1['date']), "M d,Y");
                                            echo $month; ?></td>
                                        <td>
                                            <a href="payment-details.php?tid=<?php echo $row1['tran_id']; ?>" class="btn btn-success p-1">View</a>
                                        </td>
                                </tr>

                        <?php
                                    }
                                }
                        ?>
                    <?php
                        }
                    ?>

                    </tbody>
                </table>

            </div>
        </div>
        <?php include 'assets/footer-dash.php'; ?>

    </body>
<?php
} else {
    echo '<script>alert("Login/Register to Raise a cause")</script>';
    echo '<script>window.location = "index.php"</script>';
}
?>

</html>