<?php 
include 'assets/nav-links.php'; ?>
<html>

<head>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <?php include 'assets/navbar.php'; ?>
    <title>Contact list</title>
</head>
<?php if (isset($_SESSION['username']) and $_SESSION['username'] == 'admin') { ?>

    <body>
        <h1 class=" text-center mt-5 fw-bold mb-3">Contact list</h1>
        <div class="table-responsive">
            
        <table class="table table-striped ">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Fname</th>
                    <th scope="col">Lname</th>
                    <th scope="col">Email</th>
                    <th scope="col">Comment</th>
                </tr>
            </thead>
            <tbody><?php
                    include 'assets/connection.php';
                    $result = (mysqli_query($db, "select * from user_contact"));
                    while ($data = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <th scope="row"><?php echo $data['id']; ?></th>
                        <td><?php echo $data['fname']; ?></td>
                        <td><?php echo $data['lname']; ?></td>
                        <td><a href="mailto:<?php echo $data['email']; ?>"><?php echo $data['email']; ?></a></td>
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