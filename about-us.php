<?php 
include 'assets/nav-links.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <title>About Us</title>
</head>

<body>
    <?php
    if (isset($_SESSION['useremail'])) {
        include 'assets/navbar.php';
        }else
        {
             include 'assets/navbar.php';
        }
            ?>
    
    <h1 class="mt-3 fw-bolder text-center" style="font-family:roboto !important; ">About Us</h1>
    <div class="card m-lg-5 m-2 mt-4 p-4 shadow bg-light">
    <div class="row row-cols-1 row-cols-lg-2 "  >
        <div class="col-lg-4 d-flex align-items-center">
            <img src="images/about.svg" class="mb-3" width="90%">
        </div>
        <div class="col-lg-8">
            <h1 class="  text-decoration-underline" style="font-family:Arial, Helvetica, sans-serif !important;">Who we are -</h1> 
            <p style="font-family:roboto !important;"><b class='fs-5'>Kashmirzakat.com</b>
                is a first-of-its-kind Social Crowdfunding platform launched by the Sahuliyat Kashmir
                Voluntary Trust (SKVT) with the goal of uniting Zakat Seekers and Zakat Givers. Its goal is to carry out its
                operations solely for the purpose of bringing socioeconomic transformation to the lives of the people,
                rather than to make a profit. Zakat is an obligatory donation that Muslims must give if their wealth
                exceeds a certain threshold each year. Although the majority of people distribute the required Zakat
                amount, it is largely unorganised. Such haphazard allocation isn&#39;t a long-term answer to the
                community&#39;s poverty. As a result, SKVT has decided to launch an initiative to develop a collective Zakat
                system. This platform, KashmirZakat.com, is a step toward organising Zakat, Sadqa, Fitra, and other
                charitable collections in a collaborative manner and channelling these collections to assist the
                impoverished and backward parts of society for their general survival, upliftment, development, and
                growth.
            </p>
        </div>
    </div>
    </div>

    <?php include 'assets/footer.php'; ?>


</body>

</html>