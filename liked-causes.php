<?php 
include 'assets/nav-links.php'; ?>
<!DOCTYPE html>
<html lang="en">
<?php
$username = $_GET['username'];
?>

<body>

    <?php
    include 'assets/navbar.php';
    ?>
    <center>

        <h2 class="mt-3"> Liked Causes</h2>
    </center>
    <?php
    include 'assets/connection.php';
    ?>
    <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 row-cols-sm-2 g-4 mr-3 m-2 mb-5">
        <?php
        $liked = mysqli_query($db, "SELECT * FROM `like` where username='$username' ");
        while ($lik = mysqli_fetch_array($liked)) {
            $raiseid = $lik['raiseid'];
            $result = mysqli_query($db, "SELECT * FROM form_data where id='$raiseid' and status='Accepted' ");
            while ($data = mysqli_fetch_array($result)) {
                $amount = $data['amount'];
                $ramount = 0;
                $id = $data['id'];
                $result1 = mysqli_query($db, " SELECT * FROM payments where raiseid = '$id'and status='complete'");
                while ($data1 = mysqli_fetch_array($result1)) {
                    $ramount += $data1['amount'];
                }
                $percent = floor(($ramount / $amount) * 100);
                $days = 30;
                include 'causes.php';
            }
        }
        ?>
    </div>


    <?php include 'assets/footer.php'; ?>


</body>

</html>