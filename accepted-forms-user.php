<?php
session_start(); ?>
<html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
<title>Accepted Causes</title>
<script src="js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/nav-dash.css">
<script src="js/nav-dash.js"></script>
<?php
$useremail = $_GET['useremail'];
include 'assets/connection.php';
$result = mysqli_query($db, "SELECT * FROM form_data where email='$useremail' and status='Accepted' ");
if (isset($_SESSION['useremail'])) {
?>

    <body id="body-pd">
        <?php
        include 'assets/navbar-dash.php';
        ?>
        <script>
            window.onload = (event) => {
                $('#campaign').addClass("nav_link active");
                // $('#nav-bar').attr('class', 'l-navbar show');
                $('#body-pd').attr('class', 'body-pd');
            }
        </script>
        <div class="">
            <h1> Accepted Causes</h1>
            <p class="p-2 text-danger">* Funds has been applied commissions payment processor's site:</p>
            <div class="table-responsive w-100 ">
                <table class="table border">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Title</th>
                            <th scope="col">Goal</th>
                            <th scope="col">Funds Raised</th>
                            <th scope="col">Status</th>
                            <th scope="col">Date</th>
                            <th scope="col">Deadline</th>
                            <th scope="col">View</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                            while ($row = mysqli_fetch_array($result)) {
                            ?>
                        <tr>
                            <th scope="row"><?php echo $row['id']; ?></th>
                            <td>
                                <a href="raise-detail.php?campaign=<?php echo $row['id']; ?>" class=" d-flex justify-content-start align-items-start">
                                    <img src="<?php echo "images/" . $row['profile_pic']; ?>" width="50px" alt="" srcset="">
                                    <p class=" text-truncate wrapper text-break" style="  -webkit-line-clamp: 1; height: 20px;"><?php echo $row['cause_title']; ?></p>...&nbsp;
                                    <i class="fas fa-external-link"></i>
                                </a>
                            </td>
                            <td><?php echo $row['amount']; ?></td>
                            <?php
                                $id = $row['id'];
                                $paym = mysqli_query($db, "SELECT * FROM payments where raiseid='$id'and status='complete'");
                                $ramoun = 0;
                                while ($pay = mysqli_fetch_array($paym)) {
                                    $ramoun += $pay['amount'];
                                }
                            ?>
                            <td><?php echo $ramoun ?></td>
                            <?php
                            ?>
                            <td class=" text-success rounded-2 fw-bold"><?php echo $row['status']; ?></td>
                            <td><?php
                                $date1 = date_create($row['date']);
                                echo date_format($date1, "d M,Y");
                                ?></td>
                            <td>
                                <?php
                                $date = date_create($row['date']);
                                date_add($date, date_interval_create_from_date_string("30 days"));
                                echo date_format($date, "d M,Y"); ?>
                            </td>
                            <td>
                                <a class="btn btn-success" href="raise-detail.php?campaign=<?php echo $row['id']; ?>" style="padding: 3px 7px !important;">View</a>
                            </td>
                            <td>
                                <a class="btn btn-primary" href="withdrawl-request.php?id=<?php echo $row['id']; ?>" style="padding: 3px 7px !important;">Make Withdrawl</a>
                            </td>
                        </tr>
                    <?php
                            }
                    ?>
                    </tr>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <?php include 'assets/footer-dash.php'; ?>
    </body>

<?php
} else {
    echo '<script>alert("Unauthorised user")</script>';
    echo '<script>window.location = "index.php"</script>';
}
?>