<?php
include 'assets/nav-links.php'; ?>
<html>

<head>
    <link rel="stylesheet" href="css/success.css">
    <script src="js/success.js"></script>
    <?php
    $id = $_GET['id'];
    include 'assets/connection.php';
    $result = mysqli_query($db, "SELECT * FROM form_data where (status='Pending' or status = 'Rejected')  and id = '$id' ");
    ?>
</head>

<body>
    <?php
    include 'assets/navbar.php';

    while ($data = mysqli_fetch_array($result)) {
        // $_SESSION['id'] = $data['id'];
        // $id = $data['id'];
        $amount = $data['amount'];
        $result1 = mysqli_query($db, " SELECT * FROM payments where raiseid = '$id'and status='complete'");
        $ramount = 0;
        while ($data1 = mysqli_fetch_array($result1)) {
            $ramount += $data1['amount'];
        }
        $percent = floor(($ramount / $amount) * 100);

        $_SESSION['cause'] = $data['cause_title'];
    ?>
        <title><?php echo $data['cause_title']; ?></title>
        <div class="row row-cols-1 mt-5 mx-lg-3 mx-md-3 mx-2 mb-5" style="margin-right: 0 !important;">
            <div class="col col-lg-7 col-md-7 col-12 mr-0 mx-lg-5 mx-md-3">
                <div class="card border-0">
                    <img src="<?php echo "images/" . $data['profile_pic']; ?>" class="border card-img-top" alt="...">
                    <div class="card-body">
                        <h2 class="card-title fw-bold py-2"><?php echo $data['cause_title']; ?></h2>
                        <hr>
                        <p>
                            <label class=" fw-bold" for="d">My Story : </label><br>
                            <?php echo $data['cause_explain']; ?> <br>
                            <label class=" fw-bold" for="d">Cause Summary : </label><br>
                            <?php echo $data['cause_summary']; ?><br>
                            <label class=" fw-bold" for="d">Pan Number : </label><br>
                            <?php echo $data['pan_num']; ?><br>
                            <label class=" fw-bold" for="d">Adhaar Number : </label><br>
                            <?php echo $data['adhaar_num']; ?><br>
                            <label class=" fw-bold" for="d">Account Number : </label><br>
                            <?php echo $data['acc_num']; ?><br>
                            <label class=" fw-bold" for="d">Bank Name : </label><br>
                            <?php echo $data['bank_name']; ?><br>
                            <label class=" fw-bold" for="d">Account Holder Name : </label><br>
                            <?php echo $data['acc_name']; ?><br>
                            <label class=" fw-bold" for="d">IFSC : </label><br>
                            <?php echo $data['ifsc']; ?><br>
                            <label class=" fw-bold" for="d">Raised By : </label><br>
                            <?php echo $data['person']; ?><br>
                        </p>
                        <!-- ----- -->
                        <h4>Supporting documents</h4>
                        <div class="d-flex">
                            <a type="button" class="rounded-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <img src="<?php echo "images/" . $data['doc1']; ?>" style="height: 15vh; width:90%;" class="cursor rounded-2 p-1 border border-dark">
                            </a>
                            <?php if ($data['doc2'] != '') { ?>
                                <a type="button" class="rounded-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <img src="<?php echo "images/" . $data['doc2']; ?>" style="height: 15vh; width:90%;" class="cursor rounded-2 p-1 border border-dark">
                                </a>
                            <?php }
                            if ($data['doc3'] != '') { ?>
                                <a type="button" class="rounded-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <img src="<?php echo "images/" . $data['doc3']; ?>" style="height: 15vh; width:90%;" class="cursor rounded-2 p-1 border border-dark">
                                </a>
                            <?php }
                            if ($data['pan_copy'] != '') { ?>
                                <a type="button" class="rounded-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <img src="<?php echo "images/" . $data['pan_copy']; ?>" style="height: 15vh; width:90%;" class="cursor rounded-2 p-1 border border-dark">
                                </a>
                            <?php }
                            if ($data['adhaar_copy'] != '') { ?>
                                <a type="button" class="rounded-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <img src="<?php echo "images/" . $data['adhaar_copy']; ?>" style="height: 15vh; width:90%;" class="cursor rounded-2 p-1 border border-dark">
                                </a>
                            <?php } ?>


                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog  modal-fullscreen ">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Attachments</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img src="<?php echo "images/" . $data['doc1']; ?>" class="d-block w-100" alt="...">
                                                    </div>
                                                    <?php if ($data['doc2'] != '') { ?>
                                                        <div class="carousel-item">
                                                            <img src="<?php echo "images/" . $data['doc2']; ?>" class="d-block w-100" alt="...">
                                                        </div>
                                                    <?php }
                                                    if ($data['doc3'] != '') { ?>
                                                        <div class="carousel-item">
                                                            <img src="<?php echo "images/" . $data['doc3']; ?>" class="d-block w-100" alt="...">
                                                        </div>
                                                    <?php }
                                                    if ($data['passbook'] != '') { ?>
                                                        <div class="carousel-item">
                                                            <img src="<?php echo "images/" . $data['passbook']; ?>" class="d-block w-100" alt="...">
                                                        </div>
                                                    <?php }
                                                    if ($data['pan_copy'] != '') { ?>
                                                        <div class="carousel-item">
                                                            <img src="<?php echo "images/" . $data['pan_copy']; ?>" class="d-block w-100" alt="...">
                                                        </div>
                                                    <?php }
                                                    if ($data['adhaar_copy'] != '') { ?>
                                                        <div class="carousel-item">
                                                            <img src="<?php echo "images/" . $data['adhaar_copy']; ?>" class="d-block w-100" alt="...">
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Next</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <div class=" d-flex justify-content-around p-2 bg-light">
                    <a class="btn btn-success m-2 col-3 px-12 fs-5" href="change-campaign-status.php?id=<?php echo $data['id']; ?>&status=accept" name="submit" type="submit">Accept</a>
                    <a class="btn btn-danger m-2 col-3 px-12 fs-5" href="change-campaign-status.php?id=<?php echo $data['id']; ?>&status=reject" name="submit" type="submit">Reject</a>
                    <a class="btn btn-primary m-2 col-3 px-12 fs-5" href="user-edit-form.php?id=<?php echo $data['id']; ?>" name="submit" type="submit">Edit</a>
                    <a class="btn btn-primary m-2 col-3 px-12 fs-5" href="edit-user-form-kyc.php?id=<?php echo $data['id']; ?>" name="submit" type="submit">Edit Kyc</a>

                </div>
            </div>

            <!---------------------------------------------------------------------------------------------------------------->

            <div class="col col-lg-4 col-md-4 col-12 mx-lg-0 mx-md-0 ">
                <div class="card " style="width:100%;">
                    <?php
                    $email = $data['email'];
                    $query1 = mysqli_query($db, "SELECT * FROM users where email = '$email' ");
                    while ($user1 = mysqli_fetch_array($query1)) {
                        if (!empty($user1['profile_pic'])) {
                    ?>
                            <img src="<?php echo "images/" . $user1['profile_pic']; ?>" class=" mt-3 rounded-circle mx-auto" width="200vh" height="200vh" alt="profile">
                        <?php } else {
                        ?>
                            <img src="kz_images/evenly.jpg" class=" mt-3 rounded-circle mx-auto" width="200vh" height="200vh" alt="profile">
                        <?php
                        } ?>
                        <div class="card-body text-center">
                            <h5 class="card-title"><?php echo $user1['name']; ?> <a href="mailto:<?php echo $user1['email']; ?>"><i class="far fa-envelope"></i></a> </h5>
                        <?php
                    }
                        ?>
                        <p class="card-text">Created: <?php echo $data['date']; ?></p>
                        <p class="card-text text-uppercase"><i class="fas fa-map-marker-alt"></i> <?php echo $data['location']; ?></p>


                        </div>
                        <div class=" d-flex justify-content-between mx-4 mt-2 mb-3">
                            <p class="px-2 rounded-1 card-text" style="color: red;"><small> <?php echo $data['purpose']; ?></small> <i class="fas fa-tag"></i></p>
                            <p class="px-2 rounded-1 card-text">
                                <?php
                                if ($data['eligible'] == "Yes") {

                                ?>
                                    <i class="fas fa-check" style="color: rgb(50, 133, 50);"></i><small> Zakat Eligible</small>
                                <?php
                                } else  if ($data['eligible'] == "No") {
                                ?>

                                    <i class="fa fa-times" style="color: rgb(255,0,0);"></i><small> Zakat Not Eligible</small>

                                <?php
                                } else {
                                ?>

                                    <i class="fas fa-not-equal" style="color: rgb(0,0,255);"></i><small> Zakat Eligible Not sure</small>

                                <?php
                                }
                                ?>

                            </p>
                        </div>
                </div>
            </div>
            <!-- --------------------- -->
        </div>
        </div>
    <?php
    }
    include 'assets/footer.php';
    ?>
</body>

</html>