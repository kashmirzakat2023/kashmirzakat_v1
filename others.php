<?php 
include 'assets/nav-links.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Others</title>


</head>

<body>

    <?php
    include 'assets/navbar.php';
    ?>
    <center>

        <h2 class="mt-3"> Others</h2>
    </center>

    <title>Causes</title>
<?php

include 'assets/connection.php';
$result = mysqli_query($db, "SELECT * FROM form_data where purpose='Others' and status='Accepted' ");
?>
<div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 row-cols-sm-2 g-4 mr-3 m-2 mb-5">
    <?php
    while ($data = mysqli_fetch_array($result)) {
        $amount = $data['amount'];
        $ramount = 0;
        $id = $data['id'];
        $result1 = mysqli_query($db, " SELECT * FROM payments where raiseid = '$id'and status='complete'");
        while ($data1 = mysqli_fetch_array($result1)) {
            $ramount += $data1['amount'];
        }
        $percent = floor(($ramount / $amount) * 100);
        include 'causes.php';
    } ?>
</div>


    <?php include 'assets/footer.php'; ?>


</body>

</html>