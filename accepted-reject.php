<?php 
include 'assets/nav-links.php' ;
$id=$_GET['id'];
?>

<body>
    <?php include 'assets/navbar.php' ?>
    <form action="" method="post" class="col-8 col-sm-9 mb-5 fund-raise">
        <div class="form-floating mb-3 mt-3 h-50">
            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" name="reject_reason" style="height: 100px" required></textarea>
            <label for="floatingTextarea2">Reason for rejecting Cause <label class=" fw-bold text-danger">*</label></label>
        </div>
        <button type="submit" id="submit" name="submit" class="btn btn-primary mb-3 fs-4">Submit</button>
    </form>
</body>
<script>
    $(window).on('load', function() {
        $('#loading').hide();
    })
</script>
<?php include 'assets/footer.php' ?>
<?php
$id = $_GET['id'];
include 'assets/connection.php';
if (isset($_POST['submit'])) {
    $reject_reason = $_POST['reject_reason'];
    if (mysqli_query($db, "UPDATE form_data SET status = 'Rejected' where id='$id'")) {
        // $result = mysqli_query($db, "DELETE FROM form_data where id= '$id'");
        echo '<script>alert("Cause rejected successfully");</script>';
        echo '<script>window.location = "index.php"</script>';
    } else {
        echo '<script>alert("Error in rejecting data");</script>';
    }
}
?>
<style>
    #drop-zone {
        max-width: 450vw;
        width: 100%;
        height: 60vh;
        border: 2px dashed grey;
        border-radius: 10px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #drop-zone img {
        object-fit: contain;
        /* object-position: center; */
        height: 100%;
        width: 100%;
        display: none;
    }

    .fund-raise {
        display: flex;
        justify-content: center;
        margin-left: auto;
        margin-right: auto;
        flex-direction: column;
    }

    @media (max-width:450px) {

        label,
        small,
        body,
        input,
        select {
            font-size: 80%;
        }

        h1 {
            font-size: 180%;
        }
    }

    label {
        font-weight: 500;
    }

    small {
        font-size: 11px;
    }
</style>