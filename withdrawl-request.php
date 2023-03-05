<?php session_start(); ?>
<html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
<title>Withdrawl Requested</title>
<script src="js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/nav-dash.css">
<script src="js/nav-dash.js"></script>
<?php
$id = $_GET['id'];
include 'assets/connection.php';
$useremail = $_SESSION['useremail'];
if (isset($_SESSION['username'])) {
?>

    <body id="body-pd">
        <?php
        include 'assets/navbar-dash.php';
        ?>
        <script>
            window.onload = (event) => {
                $('#withdrawls').addClass("nav_link active");
                // $('#nav-bar').attr('class', 'l-navbar show');
                $('#body-pd').attr('class', 'body-pd');
            }
        </script>
        <!--Container Main start-->

        <div class=" p-3">
            <h2> Withdrawl Requested</h2>
            <form action="withdrawl-request-process.php?id=<?php echo $id;?>" method="post" class=" border border-2 p-3 rounded-1">
                <label class="control-label form-floating mt-2" for="fname">Enter withdrawl amount in rupees</label>
                <div class="input-group mb-3 flex-nowrap">
                    <span class="input-group-text bg-success text-light fw-bold " id="addon-wrapping">₹</span>
                    <input type="number" class="form-control" id="amount" min="50"  name="amount" placeholder="Minimum amount ₹50 INR " aria-label="amount" aria-describedby="addon-wrapping" required>
                </div>
                <div class="form-group mb-3">
                    <label class="control-label " for="comment">Other Details(Optional)</label>
                    <textarea class="form-control" rows="2" placeholder="Write any optional details" name="optional" id="optional"></textarea>
                </div>
                <button type="submit" class=" btn btn-primary mx-auto me-auto d-flex fs-5"  name="submit">Submit</button>
            </form>
        </div>
                    


    </body>
<?php
} else {
    echo '<script>alert("Login/Register to Raise a cause")</script>';
    echo '<script>window.location = "index.php"</script>';
}
?>

</html>