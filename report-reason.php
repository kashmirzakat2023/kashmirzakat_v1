<?php include 'assets/nav-links.php' ?>

<body>
    <?php include 'assets/navbar.php' ?>
    <form action="" method="post" class="col-8 col-sm-9 mb-5 fund-raise">

        <div class="form-floating mb-3 mt-3 h-50">
            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" name="comment" style="height: 100px" required></textarea>
            <label for="floatingTextarea2">Reason for rejecting Cause <label class=" fw-bold text-danger">*</label></label>
        </div>
        <button type="submit" id="submit" name="submit" class="btn btn-primary mb-3 fs-4">Submit</button>
    </form>
</body>
<?php
include 'assets/footer.php';
?>
<style>
    .fund-raise {
        display: flex;
        justify-content: center;
        margin-left: auto;
        margin-right: auto;
        flex-direction: column;
    }
</style>

<?php
include 'assets/connection.php';
if (isset($_POST['submit'])) {
    $id =   $_GET['id'];
    $result = mysqli_query($db, " SELECT * FROM form_data where id = '$id' and status='Accepted'");
    $username = $_SESSION['username'];
    $comment = $_POST['comment'];
    while ($data = mysqli_fetch_array($result)) {
        $cause = $data['cause_title'];
        $data['cause_title'] = $cause;
    }

    $query = mysqli_query($db, "select * from `report` where raiseid='$id' and name='$username'");
    if (!mysqli_num_rows($query) > 0) {
        if (mysqli_query($db, "INSERT INTO `report` (name,cause_title,raiseid,comment) values ('$username', '$cause','$id','$comment')")) {
            echo '<script>alert("Reported successfully")</script>';
            echo '<script>window.location = "index.php"</script>';
        }
        else{
            echo '<script>alert("Error in Reporting.Please try again")</script>';
        }
    }
}
