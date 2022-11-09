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
$useremail = $_GET['useremail'];

include 'assets/connection.php';
if (isset($_SESSION['username']) && $_SESSION['username'] == 'admin') {
?>

    <body id="body-pd">
                <?php
        include 'assets/admin-navbar-dash.php';
        ?>
        <script>
            window.onload = (event) => {
                $('#nav-bar').attr('class', 'l-navbar show');
                $('#body-pd').attr('class', 'body-pd');
                $('#bank_pending').addClass("nav_link active");
            }
        </script>
        <!--Container Main start-->

        <br>
        <div class="height-100 ">
            <h1> Pending Bank transaction</h1>
            <div class="table-responsive w-100 ">
                <table class="table border">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Cause</th>
                            <th scope="col">Donated</th>
                            <th scope="col">Trans date</th>
                            <th scope="col">Trans id</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $query = mysqli_query($db, "SELECT * FROM bank_pending ");
                            while ($row1 = mysqli_fetch_array($query)) {
                                $id = $row1['raiseid'];
                        ?>
                                <tr>
                                    <td><?php echo $row1['raiseid']; ?></td>
                                    <td><?php echo $row1['name']; ?></td>

                                    <?php
                                    $result1 = mysqli_query($db, "SELECT * FROM form_data where id='$id' and status='Accepted' ");
                                    while ($rows = mysqli_fetch_array($result1)) {
                                    ?>
                                        <td>
                                            <a href="raise-detail.php?campaign=<?php echo $rows['cause_title']; ?>">
                                                <img src="<?php echo "images/" . $rows['profile_pic']; ?>" width="40px" alt="" srcset=""> <?php echo $rows['cause_title']; ?>
                                                <i class="fas fa-external-link"></i>
                                            </a>
                                        </td>
                                        <td>₹ <?php echo $row1['amount']; ?></td>
                                        <td><?php
                                            $month  = date_format(date_create($row1['tran_date']), "M d,Y");
                                            echo $month; ?></td>
                                            <td><?php echo $row1['tran_id']; ?></td>
                                        <td>
                                            <a href="pending-payment-details.php?tid=<?php echo $row1['tran_id']; ?>" class="btn btn-primary p-1">View</a>
                                            <a href="bank-accept.php?tid=<?php echo $row1['tran_id']; ?>" class="btn btn-success p-1">Accept</a>
                                            <a href="bank-reject.php?tid=<?php echo $row1['tran_id']; ?>" class="btn btn-danger p-1">Reject</a>
                                        </td>
                                </tr>

                        <?php
                                    }
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