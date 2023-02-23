<?php 
include 'assets/nav-links.php'; ?>
<html>

<head>
    <?php include 'assets/navbar.php'; ?>
    <title>Reported list</title>
</head>
<?php if (isset($_SESSION['username']) and $_SESSION['username'] == 'admin') { ?>

    <body>
        <h2 class=" text-center mt-5 fw-bold mb-3">Reported list</h2>
        <div class="table-responsive">
            
        <table class="table table-striped ">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Cause</th>
                    <th scope="col">Comment</th>
                </tr>
            </thead>
            <tbody><?php
                    include 'assets/connection.php';
                    $result = (mysqli_query($db, "select * from report"));
                    while ($data = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <th scope="row"><?php echo $data['id']; ?></th>
                        <td><?php echo $data['name']; ?></td>
                        <td><a href="raise-detail.php?campaign=<?php echo $data['cause_title']; ?>">
                                <?php echo $data['cause_title']; ?>
                                <i class="fas fa-external-link"></i>
                            </a></td>
                        <td><?php echo $data['comment']; ?></td>
                        <!-- <td><a class="btn btn-outline-primary m-2" href="pending-fetch.php?id=<?php echo $data['id']; ?>">View</a></td> -->
                    </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
        </div>
    </body>
    <style>
        table {
            border: 1px solid black !important;
            width: 95% !important;
            margin: 20px;
        }
    </style>
    </body>
    <?php include 'assets/footer.php'; ?>

</html>
<?php } else {
    echo '<script>alert("Unauthentic User");</script>';
    echo '<script>window.location = "index.php"</script>';
}
?>