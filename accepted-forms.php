<?php
session_start(); ?>

<head>
    <title>Accepted Forms</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <script src="js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/nav-dash.css">
    <script src="js/nav-dash.js"></script>
</head>
<?php
$_SESSION['useremail'] = $_GET['useremail'];
$useremail = $_GET['useremail'];
if (isset($_SESSION['useremail']) && $_SESSION['username'] == "admin") {
    include 'assets/connection.php';
    $result = mysqli_query($db, "SELECT * FROM form_data where status='Accepted'");
?>
    <script>
        window.onload = (event) => {
            $('#campaign').addClass("nav_link active");
            // $('#nav-bar').attr('class', 'l-navbar show');
            $('#body-pd').attr('class', 'body-pd');
        }
    </script>

    <body id="body-pd">
        <?php include 'assets/admin-navbar-dash.php'; ?>
        <h1>Accepted Causes</h1>
        <div class="table-responsive">
            <table class="table table-striped w-100">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Cause Title</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Funds Raised</th>
                        <th scope="col">Date</th>
                        <th scope="col">CM name</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody><?php
                        while ($data = mysqli_fetch_array($result)) {
                            $query = mysqli_query($db, "SELECT * FROM payments  where status='complete'");
                            $donations = 0;
                            while ($row = mysqli_fetch_array($query))
                                $donations += $row['amount'];
                        ?>
                        <tr>
                            <th scope="row"><?php echo $data['id']; ?></th>
                            <td><?php echo $data['cause_title']; ?></td>
                            <td><?php echo $data['amount']; ?></td>
                            <td><?php echo $donations; ?></td>
                            <td><?php
                                echo date('d-m-Y', strtotime($data['date']))
                                // echo date( 'Y-m-d',$data['date']); 
                                ?></td>
                            <td>
                                <?php
                                if ($useremail == 'causemanager@causemanager.com') {
                                    echo $data['cause_manager'];
                                } else {
                                ?>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control save" name="cmname" placeholder="CM Name" id="<?php echo $data['id']; ?>" value="<?php echo $data['cause_manager']; ?>" aria-label="CM Name" aria-describedby="button-addon2">
                                        <!--<button class="btn btn-outline-secondary save"  type="button" id="<?php echo $data['id']; ?>" >save</button>-->
                                    </div>
                                <?php
                                }
                                ?>
                            </td>
                            <td><a class="btn btn-outline-success m-2" href="raise-detail.php?campaign=<?php echo $data['id']; ?>">View</a>
                            <a class="btn btn-outline-danger m-2" href="accepted-reject.php?id=<?php echo $data['id']; ?>">Reject</a>
                            <?php
                            if ($useremail == 'admin@admin.com') {
                            ?>
                                <a class="btn btn-outline-primary m-2" href="admin-accept-edit-form.php?id=<?php echo $data['id']; ?>">Edit</a>
                                <?php
                            }
                            ?>
                            </td>
                        </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <p class=" bg-success text-light px-3 rounded-1 saved fs-4" style="width:fit-content; display:none; position:absolute; right:60px; bottom:50px; ">saved...</p>
        <p class=" bg-danger text-light px-3 rounded-1 nsaved fs-4" style="width:fit-content; display:none; position:absolute; right:60px; bottom:50px; ">Not saved...</p>

        <?php include 'assets/footer-dash.php'; ?>
    </body>
    <script>
        $(document).ready(function() {
            $(".save").keyup(function() {
                var email = $(this).val();
                var ids = $(this).closest("input").attr('id');
                $.ajax({
                    url: 'cm-add-accepted.php',
                    type: 'post',
                    data: {
                        email: email,
                        id: ids
                    },
                    success: function(response) {
                        if (response)
                            $('.saved').show(1).fadeIn().animate({
                                right: 10,
                                opacity: "show"
                            }, 1500).delay(1000).hide(0.3);
                        else
                            $('.nsaved').show(1).fadeIn().animate({
                                right: 10,
                                opacity: "show"
                            }, 1500).delay(1000).hide(0.3);
                    }
                });
            });

        });
    </script>
    <style>
        table {
            margin-left: auto;
            margin-right: auto;
            margin-top: 10px !important;
            width: 200% !important;
            border: 1px solid black !important;
        }
    </style>
<?php
} else {
    echo '<script>alert("Unauthentic User");</script>';
    echo '<script>window.location = "index.php"</script>';
} ?>