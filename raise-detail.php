<?php
include 'assets/nav-links.php'; ?>
<html prefix="og: https://ogp.me/ns#">

<head>
    <?php
    $id = $_GET['campaign'];
    include 'assets/connection.php';
    $result = mysqli_query($db, " SELECT * FROM form_data where id = '$id' and status='Accepted'");
    while ($data = mysqli_fetch_array($result)) {
    ?>

        <link rel="stylesheet" href="css/success.css">
        <meta property="og:site_name" content="Kashmir Zakat">
        <meta property="og:title" content="<?php echo $data['cause_title']; ?>">
        <meta property="og:description" content="<?php echo $data['cause_summary']; ?>">
        <meta property="og:image" content="<?php echo 'https://kashmirzakat.com/images/' . $data['profile_pic']; ?>">
        <meta property="og:image:secure_url" content="<?php echo 'https://kashmirzakat.com/images/' . $data['profile_pic']; ?>" />
        <meta property="og:image:type" content="image/jpeg">
        <meta property="og:image:width" content="200">
        <meta property="og:image:height" content="200">
        <meta property="og:url" content="http://www.kashmirzakat.com">
        <link itemprop="thumbnailUrl" href="<?php echo 'https://kashmirzakat.com/images/' . $data['profile_pic']; ?>">
        <span itemprop="thumbnail" itemscope itemtype="http://schema.org/ImageObject">
            <link itemprop="url" href="<?php echo 'https://kashmirzakat.com/images/' . $data['profile_pic']; ?>">
        </span>
        <title><?php echo $data['cause_title']; ?></title>

    <?php
    }
    ?>
</head>

<body>

    <?php
    if (isset($_SESSION['username'])) { ?>
        <script src="js/like.js" defer></script>
    <?php }
    include 'assets/navbar.php';

    $result = mysqli_query($db, " SELECT * FROM form_data where id = '$id' and status='Accepted'");
    while ($data = mysqli_fetch_array($result)) {
        // $today = time();
        $_SESSION['id'] = $data['id'];
        $id = $data['id'];
        $amount = $data['amount'];
        $result1 = mysqli_query($db, " SELECT * FROM payments where raiseid = '$id' and status='complete'");
        $ramount = 0;
        while ($data1 = mysqli_fetch_array($result1)) {
            $ramount += $data1['amount'];
        }
        $percent = floor(($ramount / $amount) * 100);

        $_SESSION['cause'] = $data['cause_title'];
        $CurPageURL = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $useremail1 = $data['email'];

    ?>

        <div class="row row-cols-1 mt-5 mx-lg-3 mx-md-3 mx-2 mb-5" style="margin-right: 0 !important;">
            <div class="col col-lg-7 col-md-7 col-12 mr-0 mx-lg-5 mx-md-3">
                <div class="card border-0">
                    <img src="<?php echo "images/" . $data['profile_pic']; ?>" height="70%" class="img-responsive mx-auto border card-img-top" alt="...">
                    <div class="card-body">
                        <h3 class="card-title fw-bold py-2 cause_title"><?php echo $data['cause_title']; ?></h3>
                        <hr>
                        <div class="row mb-3 mb-sm-1">
                            <div class="col-lg-8 col-sm-4 buttons-group w-100  p-0">
                                <div class="links">
                                    <ul>
                                        <li class=" fw-bold social-share whatsapp btn btn-success mb-2 px-4 "><i class="fab fa-whatsapp"></i> Whatsapp</li>
                                        <li id="ml_share" class=" fw-bold social-share mail btn btn-secondary mb-2 px-4 "><i class="fas fa-at"></i> Mail</li>
                                        <li class="fw-bold social-share facebook btn btn-primary mb-2 px-4 "><i class="fab fa-facebook-f"></i> Facebook</li>
                                        <li class="fw-bold social-share twitter btn btn-info mb-2 px-4 text-light "><i class="fab fa-twitter "></i> Twitter</li>
                                        <li class="fw-bold social-share linkedin btn btn-light mb-2 px-4 border"><i class="fab fa-linkedin text-primary "></i> LinkedIn</li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                        <ul class="nav nav-tabs nav-tabs-items" role="tablist">
                            <li class="nav-item text-center col-4 ">
                                <a class="nav-link active nav-tabs-items" data-bs-toggle="tab" href="#home">Story
                                </a>
                            </li>
                            <li class="nav-item  text-center col-4">
                                <a class="nav-link nav-tabs-items position-relative" data-bs-toggle="tab" href="#menu1">
                                    Donations
                                    <span class="position-absolute top-50 translate-middle badge rounded-pill" style="margin-left: 15px !important; background: var(--bg_dark_blue);">
                                        <?php
                                        $res = mysqli_query($db, "SELECT * FROM payments where raiseid='$id' and status='complete'");
                                        echo mysqli_num_rows($res);
                                        ?>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item  text-center  col-4 ">
                                <a class="nav-link nav-tabs-items position-relative" data-bs-toggle="tab" href="#menu2">Updates
                                    <span class="position-absolute top-50 translate-middle badge rounded-pill" style="margin-left: 15px !important; background: var(--bg_dark_blue);">
                                        <?php
                                        $res = mysqli_query($db, "SELECT * FROM withdrawl_pending where raiseid='$id' and status='accepted'");
                                        echo mysqli_num_rows($res);
                                        ?>
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div id="home" class="container tab-pane active"><br>
                                <p>
                                    <label class=" fw-bold" for="d">My Story : </label><br>
                                    <?php
                                    // $data1 = str_replace('&', '&amp;', $data['cause_explain']);
                                    echo $data['cause_explain'] ?>
                                    <label class=" fw-bold" for="d">Cause Summary : </label><br>
                                    <?php
                                    echo ($data['cause_summary']);
                                    ?>
                                </p>
                                <!-- ----- -->
                                <h4>Supporting documents</h4>
                                <!--<div class="row-cols-1 w-100 row-cols-md-3 row-cols-lg-3">-->
                                <div class="d-flex row supporting">
                                    <a type="button" class="rounded-2 col-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <img src="<?php echo "images/" . $data['doc1']; ?>" width="50%" class="cursor rounded-2 p-1 border border-dark">
                                    </a>
                                    <?php if ($data['doc2'] != '') { ?>
                                        <a type="button" class="rounded-2 col-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <img src="<?php echo "images/" . $data['doc2']; ?>" width="50%" class="cursor rounded-2 p-1 border border-dark">
                                        </a>
                                    <?php }
                                    if ($data['doc3'] != '') { ?>
                                        <a type="button" class="rounded-2 col-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <img src="<?php echo "images/" . $data['doc3']; ?>" width="50%" class="cursor rounded-2 p-1 border border-dark">
                                        </a>
                                    <?php } ?>
                                </div>
                                <!--</div>-->

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
                                                    <div class="carousel-inner" style="overflow:auto">
                                                        <div class="carousel-item active">
                                                            <img src="<?php echo "images/" . $data['doc1']; ?>" class="d-flex mx-auto me-auto h-100" alt="attachment1">
                                                        </div>
                                                        <?php if ($data['doc2'] != '') { ?>
                                                            <div class="carousel-item">
                                                                <img src="<?php echo "images/" . $data['doc2']; ?>" class="d-flex mx-auto me-auto h-100" alt="attachment1">
                                                            </div>
                                                        <?php }
                                                        if ($data['doc3'] != '') { ?>
                                                            <div class="carousel-item">
                                                                <img src="<?php echo "images/" . $data['doc3']; ?>" class="d-flex mx-auto me-auto h-100" alt="attachment1">
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

                                <!-- ---- -->
                                <hr>
                            </div>
                            <div id="menu1" class="container tab-pane "><br>
                                <h3>Donations</h3>
                                <?php
                                $res = mysqli_query($db, "SELECT * FROM payments where raiseid='$id' and status='complete'");
                                if (mysqli_num_rows($res) > 0) {
                                    while ($row2 = mysqli_fetch_array($res)) {
                                        $date = strtotime($row2['tran_date']);
                                        $now = time();
                                        $timeleft = $now - $date;
                                        $days = round($timeleft / (60 * 60 * 24));
                                        $email = $row2['email'];
                                ?>
                                        <div class="media d-flex justify-content-around border  mb-1" style=" padding:10px;">
                                            <?php
                                            $res2 = mysqli_query($db, "SELECT * FROM users where email='$email'");
                                            if (mysqli_num_rows($res2) > 0) {
                                                while ($row3 = mysqli_fetch_array($res2)) {
                                                    if ($row2['checked'] == 'yes') {
                                                        $donar = 'Anonymous';
                                                        $image = 'profile.png';
                                                    } else {
                                                        $image = $row3['profile_pic'];
                                                        $donar = $row3['name'];
                                                    }
                                                }
                                            ?>
                                                <img src="<?php echo "images/" . $image; ?>" height="64px" width="64px" class="rounded-circle " alt="donar_avatar">
                                            <?php
                                            } else {
                                                if ($row2['checked'] == 'yes') {
                                                    $donar = 'Anonymous';
                                                } else {

                                                    $donar = $row2['name'];
                                                }
                                            ?>
                                                <img src="images/profile.png" height="64px" width="64px" class="rounded-circle " alt="anonymous">
                                            <?php
                                            } ?>
                                            <div class="media-body w-75">
                                                <h5 class="mt-0"><?php echo $donar; ?></h5>
                                                <div class=" d-flex justify-content-between">
                                                    <b class="text-success">₹<?php echo $row2['amount']; ?></b>
                                                    <!--<small class=" text-muted">~ <?php echo $days; ?> days ago</small>-->
                                                    <small class=" text-muted">~ <?php
                                                                                    $month  = date_format(date_create($row2['tran_date']), "d M,Y");
                                                                                    echo $month;
                                                                                    ?></small>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }
                                } else { ?>
                                    <h5>No updates.</h5>
                                <?php } ?>
                                <hr>
                            </div>
                            <div id="menu2" class="container tab-pane fade"><br>
                                <h3>Update</h3>
                                <?php
                                $res = mysqli_query($db, "SELECT * FROM withdrawl_pending where raiseid='$id' and status='accepted'");
                                if (mysqli_num_rows($res) > 0) {
                                    while ($row2 = mysqli_fetch_array($res)) {
                                        // $date = strtotime($row2['tran_date']);
                                        // $now = time();
                                        // $timeleft = $now - $date;
                                        // $days = round($timeleft / (60 * 60 * 24));
                                        $name = $row2['name'];
                                ?>
                                        <div class="media d-flex justify-content-around border mb-1" style=" padding:10px;">
                                            <div class="media-body w-75">
                                                <h5 class="mt-0">Amount transfered to Account</h5>
                                                <div class=" d-flex justify-content-between">
                                                    <b class="text-success">₹<?php echo $row2['samount']; ?></b>
                                                    <!--<small class=" text-muted">~ <?php echo $days; ?> days ago</small>-->
                                                    <small class=" text-muted">~
                                                        <?php
                                                        $month  = date_format(date_create($row2['tran_date']), "d M,Y");
                                                        echo $month;
                                                        ?></small>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }
                                } else { ?>
                                    <h5>No updates.</h5>
                                <?php } ?>
                                <hr>
                            </div>
                        </div>

                    </div>
                </div>
                <?php
                if (isset($_SESSION['username']) and $_SESSION['username'] == 'admin') {
                ?>
                    <div class=" d-flex justify-content-around p-2 bg-light">
                        <a class="btn btn-danger m-2 col-3 px-12 fs-5" href="accepted-reject.php?id=<?php echo $data['id']; ?>" name="submit" type="submit">Reject</a>
                        <a class="btn btn-primary m-2 col-3 px-12 fs-5" href="admin-accept-edit-form.php?id=<?php echo $data['id']; ?>" name="submit" type="submit">Edit</a>
                        <a class="btn btn-primary m-2 col-3 px-12 fs-5" href="edit-user-form-kyc.php?id=<?php echo $data['id']; ?>" name="submit" type="submit">Edit Kyc</a>
                    </div>
                <?php
                }
                ?>
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
                            <img src="<?php echo "images/" . $user1['profile_pic']; ?>" class=" mt-3 profile_img rounded-circle mx-auto" width="200vh" height="200vh" alt="profile">
                        <?php
                        } else {
                        ?>
                            <img src=" images/evenly.jpg" class=" mt-3 profile_img rounded-circle mx-auto" width="200vh" height="200vh" alt="profile">
                        <?php
                        } ?>
                        <div class="card-body text-center">
                            <h5 class="card-title"><?php echo $user1['name']; ?>
                                <a href="mailto:<?php echo $user1['email']; ?>"><i class="fas fa-envelope text-info cursor"></i></a>
                            </h5>
                        <?php
                    }
                        ?>
                        <p class="card-text">Created: <?php echo $data['date']; ?></p>
                        <p class="card-text text-uppercase"><i class="fas fa-map-marker-alt"></i> <?php echo $data['location']; ?></p>
                        <?php
                        $date = strtotime($data['date']);
                        $now = time();
                        $timeleft = $now - $date;
                        $days = 30 - round($timeleft / (60 * 60 * 24));
                        if ($days < 0) {
                        ?>
                            <a href="#" class="btn btn-secondary donate  btn-lg box-shadow--8dp w-100 mb-3 " style="padding: 10px; cursor:not-allowed;" disabled>
                                <small class="fs-5"><i class="fas fa-lock"></i> Cause Ended</small>
                            </a>
                        <?php
                        } else if (!($ramount >= $amount)) { ?>
                            <a href="donate.php?id=<?php echo $data['id']; ?>" class="btn btn-success donate  btn-lg box-shadow--8dp w-100 mb-3 fs-5 " style="padding: 10px; ">Donate</a>
                        <?php } else { ?>
                            <a href="#" class="btn btn-secondary donate  btn-lg box-shadow--8dp w-100 mb-3 fs-5 " style="padding: 10px; cursor:not-allowed;" disabled>
                                <small><i class="fas fa-lock"></i> Successfully Completed</small>
                            </a>
                        <?php
                        }
                        ?>
                        <div class=" mb-0 d-flex justify-content-between flex-row">

                            <?php
                            $query3 = mysqli_query($db, "select * from `like` where raiseid='" . $_SESSION['id'] . "'");
                            if (isset($_SESSION['username'])) {
                                $query1 = mysqli_query($db, "select * from `like` where raiseid='" . $_SESSION['id'] . "' and username='" . $_SESSION['username'] . "'");
                                if (mysqli_num_rows($query1) > 0) {
                            ?>
                                    <p class="card-text rounded-1 mb-3 border border-danger w-45" style=" font-size: 40px;   padding: 0px; color: red; ">
                                        <i class="fas fa-heart " value="" style="cursor:pointer;"></i>
                                        <span id="likes">
                                            <?php
                                            echo mysqli_num_rows($query3);
                                            ?>
                                        </span>
                                    </p>
                                <?php
                                } else {
                                ?>
                                    <p class="card-text rounded-1 mb-3 border border-danger w-45" style=" font-size: 40px;padding: 0px; color: red;">
                                        <i class="far fa-heart " value="" style="cursor:pointer;"></i>
                                        <span id="likes">
                                            <?php
                                            echo mysqli_num_rows($query3);
                                            ?>
                                        </span>
                                    </p>

                                <?php
                                }
                            } else {
                                ?>
                                <p class="card-text rounded-1 mb-3 border border-danger w-45" style=" font-size: 40px;  padding: 0px; color: red;">
                                    <i class="far fa-heart " style="cursor:not-allowed;"></i>
                                    <span id="show_like">
                                        <?php
                                        echo mysqli_num_rows($query3);
                                        ?>
                                    </span>
                                </p>
                            <?php
                            }
                            $date = strtotime($data['date']);
                            $now = time();
                            $timeleft = $now - $date;
                            $days = 30 - round($timeleft / (60 * 60 * 24));
                            ?>

                            <p class="card-text rounded-1 w-45 mb-3 d-flex justify-content-center align-items-center" style="border: 1px solid black; padding: 0px;">
                                <b><i class="fas fa-hourglass-half"></i>
                                    <?php
                                    if ($days > 0 and !($ramount >= $amount)) {
                                        echo $days;
                                    } else echo 0;
                                    ?> days left</b>
                            </p>
                        </div>
                        <div class="card-text rounded-1" style="border: 1px solid black; padding: 10px 10px;">
                            <p>
                                <strong class="fs-5 text-success">₹<?php echo $ramount; ?></strong> of ₹<?php echo $amount; ?> goal
                            </p>
                            <?php if (!($ramount >= $amount) and $days > 0) { ?>
                                <div class="progress">
                                    <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo $percent; ?>%" aria-valuemin="0" aria-valuemax="100"><?php echo $percent; ?>%</div>
                                </div>
                            <?php
                            } else {
                            ?>
                                <div class="progress">
                                    <div class="progress-bar bg-success " role="progressbar" style="width: <?php echo $percent; ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $percent; ?>%</div>
                                </div>
                            <?php
                            }
                            ?>
                            <p class="card-text mt-2"> Raised by <b class=" text-success"><?php echo mysqli_num_rows($result1); ?></b> donors</p>
                        </div>
                        </div>
                        <div class=" d-flex justify-content-between mx-4 mt-2 mb-1">
                            <p class="rounded-1 card-text" style="color: red;"><small> <?php echo $data['purpose']; ?></small> <i class="fas fa-tag"></i></p>
                            <p class="rounded-1 card-text">
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
                <?php
                if (isset($_SESSION['username'])) {
                    $query2 = mysqli_query($db, "select * from `report` where raiseid='" . $_SESSION['id'] . "' and name='" . $_SESSION['username'] . "'");
                    if (!mysqli_num_rows($query2) > 0) {
                ?>
                        <!-- <p type="submit" class="btn btn-outline-danger border border-danger text-center p-2 mt-2 rounded-1 w-100 fw-bold report" id="report" onclick="report();" data-bs-toggle="modal" data-bs-target="#exampleModal1">
                            <i class="fal fa-exclamation-triangle fw-bold" value="" style="cursor:pointer;"></i> Report
                        </p> -->
                        <a href="report-reason.php?id=<?php echo $id; ?>" class="btn btn-outline-danger border border-danger text-center p-2 mt-2 rounded-1 w-100 fw-bold report" id="report">
                            <i class="fal fa-exclamation-triangle fw-bold" value="" style="cursor:pointer;"></i> Report
                        </a>

                <?php
                    }
                }
                ?>

                <div class="input-group mt-3">
                    <span type="text" id="text" class="form-control text-truncate" placeholder="link" value="" readonly></span>
                    <button class="btn btn-secondary border input-group-text fw-bold" id="button" onclick="copyToClipboard('#text')">copy</button>
                </div>
                <div class="text-center mt-3 d-flex flex-column mx-auto justify-content-center align-items-center">
                    <h3 class="fw-bold">Scan QR Code</h3>
                    <img src="" class="qr-code img-thumbnail img-responsive w-50" />
                </div>

                <!-- --------------------- -->

            </div>
        </div>

    <?php
    }
    include 'assets/footer.php';
    // }
    ?>
</body>

</html>
<script>
    function htmlEncode(value) {
        return $('<div/>').text(value)
            .html();
    }

    function copyToClipboard(element) {
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val($(element).text()).select();
        document.execCommand("copy");
        document.getElementById('button').innerHTML = 'Copied';
        document.getElementById('button').style.backgroundColor = '#5cb85c';
        $temp.remove();
    }

    window.onload = function() {
        let finalURL = 'https://chart.googleapis.com/chart?cht=qr&chl=' + htmlEncode(location.href) + '&chs=160x160&chld=L|0'
        // Replace the src of the image with
        // the QR code image
        $('.qr-code').attr('src', finalURL);
        document.getElementById('text').innerHTML = location.href;
    }
    setShareLinks();

    function socialWindow1(url) {
        window.open(url, "_self");

    }

    function socialWindow(url) {
        var left = (screen.width - 570) / 2;
        var top = (screen.height - 570) / 2;
        var params = "menubar=no,toolbar=no,status=no,width=570,height=570,top=" + top + ",left=" + left;
        window.open(url, "NewWindow", params);
    }

    function setShareLinks() {
        var pageUrl = encodeURIComponent(document.URL);
        var tweet = encodeURIComponent(jQuery("meta[property='og:description']").attr("content"));

        jQuery(".social-share.facebook").on("click", function() {
            url = "https://www.facebook.com/sharer/sharer.php?u=" + pageUrl + "&quote = *<?php echo $data['cause_title']; ?>*" + "%0D%0A %0D%0A" + "<?php echo $data['cause_summary']; ?>" + " %0D%0A %0D%0A Read more - " + pageUrl + " %0D%0A %0D%0A Donate - " + " <?php echo 'https://kashmirzakat.com/donate.php?id=' . $id; ?>";
            socialWindow(url);
        });

        jQuery(".social-share.twitter").on("click", function() {
            url = "https://twitter.com/intent/tweet?url=" + pageUrl + "&text= *<?php echo $data['cause_title']; ?>*" + "%0D%0A %0D%0A" + "<?php echo $data['cause_summary']; ?>" + " %0D%0A %0D%0A Read more - " + pageUrl + " %0D%0A %0D%0A Donate - " + " <?php echo 'https://kashmirzakat.com/donate.php?id=' . $id; ?>";;
            socialWindow(url);
        });

        jQuery(".social-share.linkedin").on("click", function() {
            url = "https://www.linkedin.com/shareArticle?mini=true&url=" + pageUrl;
            socialWindow(url);
        });

        jQuery(".social-share.mail").on("click", function(e) {
            e.preventDefault();
            location.href = "mailto:?subject=<?php echo $data['cause_title']; ?>&body=" + "<?php echo $data['cause_title']; ?> %0D%0A %0D%0A <?php echo $data['cause_summary']; ?> %0D%0A %0D%0A Read more - " + pageUrl + "%0D%0A %0D%0A";
        });

        jQuery(".social-share.whatsapp").on("click", function() {
            url = "whatsapp://send?text=" + "*<?php echo $data['cause_title']; ?>*" + "%0D%0A %0D%0A" + "<?php echo $data['cause_summary']; ?>" + " %0D%0A %0D%0A Read more - " + pageUrl + " %0D%0A %0D%0A Donate - " + " <?php echo 'https://kashmirzakat.com/donate.php?id=' . $id; ?>";
            socialWindow1(url);
        });
    }
</script>
<style>
    .nav-tabs-items {
        color: black !important;
    }

    @media (max-width:600px) {
        .nav-tabs-items {
            padding: 5px;
        }

        .cause_title {
            font-size: 18px;
        }

        .container {
            padding: 0 !important;
        }

        .profile_img {
            width: 50vw;
            height: 50vw;
        }
    }

    table {
        width: fit-content;
        border-collapse: collapse;
    }

    table,
    td {
        border: 2px solid black;
        padding: 8px 2px;
    }

    .w-45 {
        width: 49%;
    }
</style>