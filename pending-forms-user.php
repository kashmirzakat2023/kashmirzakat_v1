<?php session_start(); ?>
<html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
<title>Pending Causes</title>
<script src="js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/nav-dash.css">
<script src="js/nav-dash.js"></script>
<?php
include 'assets/connection.php';
$useremail = $_SESSION['useremail'];
$result1 = mysqli_query($db, "SELECT * FROM form_data where status='Pending' and email='$useremail'");
if (isset($_SESSION['username'])) {
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
            <h1> Pending Causes</h1>
            <p class="p-2 text-danger">* Funds has been applied commissions payment processor's site:</p>
            <div class="table-responsive w-100 ">
                <table class="table border">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Title</th>
                            <th scope="col">Goal</th>
                            <th scope="col">Status</th>
                            <th scope="col">Date</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                            while ($row = mysqli_fetch_array($result1)) {
                            ?>
                        <tr>
                            <th scope="row"><?php echo $row['id']; ?></th>
                            <td>
                                <img src="<?php echo "images/" . $row['profile_pic']; ?>" width="40px" alt="" srcset=""> <?php echo $row['cause_title']; ?>
                            </td>
                            <td><?php echo $row['amount']; ?></td>
                            <?php
                            ?>
                            <td class=" text-warning fw-bold"><?php echo $row['status']; ?></td>
                            <td><?php
                                $date1 = date_create($row['date']);
                                echo date_format($date1, "d M,Y");
                                ?></td>
                            <td>
                                 <a class="btn btn-success" href="user-pending-edit-form.php?id=<?php echo $row['id']; ?>" style="padding: 3px 7px !important;">Edit</a> 
                                <a class="btn btn-success" href="edit-user-form-kyc.php?id=<?php echo $row['id']; ?>" style="padding: 3px 7px !important;">Edit Kyc</a>
                            </td>
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
    echo '<script>alert("Unauthorised user")</script>';
    echo '<script>window.location = "index.php"</script>';
}
?>