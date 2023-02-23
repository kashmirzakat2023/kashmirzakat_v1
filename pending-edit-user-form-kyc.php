<?php include 'assets/nav-links.php'; ?>
<html>

<head>
    <link rel="stylesheet" href="css/success.css">
    <script src="js/success.js"></script>
    <?php
    $id = $_GET['id'];
    
    include 'assets/connection.php';
    $result = mysqli_query($db, " SELECT * FROM form_data where status='Pending' and id = '$id'");
    ?>
</head>

<body>
        <?php
    include 'assets/navbar.php';
    if (isset($_SESSION['username'])) {

        while ($data = mysqli_fetch_array($result)) {
            // $today = time();
            $_SESSION['id'] = $data['id'];
            $id = $data['id'];
        ?>
            <title>Edit</title>
            <form method="post" enctype="multipart/form-data" action="">

                <div class="row row-cols-1 mt-5 mx-lg-3 mx-md-3 mx-2 mb-5 " style="margin-right: 0 !important;">
                    <div class="col col-10 mx-auto">
                        <center>
                            <h2>Beneficiary Bank Details</h2>
                        </center>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="acc_name" value="<?php echo $data['acc_name']; ?>" id="floatingInput" placeholder="bank" required>
                            <label for="floatingInput">Account Holder Name <label class=" fw-bold text-danger">*</label></label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="acc_num" value="<?php echo $data['acc_num']; ?>" id="floatingInput" placeholder="bank" required>
                            <label for="floatingInput">Beneficiary Account Number <label class=" fw-bold text-danger">*</label></label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="bank_name" value="<?php echo $data['bank_name']; ?>" id="floatingInput" placeholder="bank" required>
                            <label for="floatingInput">Bank Name <label class=" fw-bold text-danger">*</label></label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="ifsc" id="floatingInput" value="<?php echo $data['ifsc'];?>" placeholder="bank" required>
                            <label for="floatingInput">IFSC Code <label class=" fw-bold text-danger">*</label></label>
                        </div>

                        <div class=" d-flex justify-content-around p-2 bg-light">
                            <button class="btn btn-primary m-2 col-3 px-12 fs-5" name="submit" type="submit">Save</button>
                        </div>
                    </div>
                <?php } ?>
                </div>
                </div>
            </form>
        <?php

        include 'assets/footer.php';
        // }
    } else {
        echo '<script>alert("Unauthenticated Access")</script>';
        echo '<script>window.location = "index.php"</script>';
    }
        ?>
</body>

</html>


<style>
    .container1 {
        /* width: 200px; */
        margin: 50px auto;
        font-family: sans-serif;
    }

    .hidden {
        display: none;
    }

    #file {
        display: none;
        margin: 0 auto;
    }

    #upload {
        display: block;
        padding: 10px 25px;
        border: 0;
        margin: 0 auto;
        font-size: 15px;
        letter-spacing: 0.05em;
        cursor: pointer;
        background: #216e69;
        color: #fff;
        outline: none;
        transition: .3s ease-in-out;
    }

    img {
        display: block;
        margin: 0 auto 15px;
    }
</style>

<?php
session_start();
include 'assets/connection.php';
$username = $_SESSION['username'];
$useremail = $_SESSION['useremail'];
if (isset($_POST['submit'])) {

    $ifsc = $_POST['ifsc'];
    $bank_name = $_POST['bank_name'];
    $acc_num = $_POST['acc_num'];
    $acc_name = $_POST['acc_name'];

    $result = mysqli_query($db, "UPDATE form_data set 
        ifsc='$ifsc',
        bank_name='$bank_name',
        acc_num='$acc_num',
        acc_name='$acc_name'
        where id='$id' and status = 'Pending' ");

    if ($result) {
        echo '<script>alert("Kyc details Updated Successfully")</script>';
    } else {
        echo '<script>alert("Error in updating data")</script>';
    }
}
