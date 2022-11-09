<?php 
include 'assets/nav-links.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Successfully Completed</title>
</head>
<body>

    <?php
    include 'assets/navbar.php';
    ?>
    <center>
        <h1 class="mt-3"> Successfully Completed</h1>
    </center>

    <title>Causes</title>
    <?php
    include 'assets/connection.php';
    $result = mysqli_query($db, "SELECT * FROM accepted_form where status='Accepted' ");
    ?>
    <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 row-cols-sm-2 g-4 mr-3 m-2 mb-5">
        <?php
        if(mysqli_num_rows($result) > 0){
        while ($data = mysqli_fetch_array($result)) {
            $amount = $data['amount'];
            $_SESSION['id'] = $data['id'];
            $id = $data['id'];
            $ramount = 0;
            $result1 = mysqli_query($db, " SELECT * FROM payments where raiseid = '$id'and status='complete'");
            while ($data1 = mysqli_fetch_array($result1)) {
                $ramount += $data1['amount'];
            }
            if ($ramount >= $amount) {
                $amount = $data['amount'];
                $id = $data['id'];

                $percent = floor(($ramount / $amount) * 100);
                include 'causes.php';
            }
        }
     } ?>
    </div>


    <?php include 'assets/footer.php'; ?>


</body>

</html>