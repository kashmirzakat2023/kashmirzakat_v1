<?php
include 'assets/nav-links.php'
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home | Kashmirzakat.com</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <meta property="og:image" content="https://kashmirzakat.com/images/logo.jpeg">
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:width" content="200px">
    <meta property="og:image:height" content="200px">

</head>

<body>
    <?php
    include 'assets/navbar.php';
    ?>

    <div id="carouselExampleIndicators" class="carousel carousel-dark slide " data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
        </div>
        <div class="d-flex justify-content-center mx-auto me-auto">

            <div class="carousel-inner car-img" style="height: 93vh; width:100%;">

                <div class="carousel-item active " data-bs-interval="4000">
                    <img src="images/c1.png" style="height: 95vh; width:100%;" class="d-block car-img" alt="...">
                </div>
                <div class="carousel-item" data-bs-interval="4000">
                    <img src="images/c2.png" style="height: 95vh; width:100%;" class="d-block car-img" alt="...">
                </div>
                <div class="carousel-item" data-bs-interval="4000">
                    <img src="images/c3.png" style="height: 95vh; width:100%;" class="d-block car-img" alt="...">
                </div>
                <div class="carousel-item" data-bs-interval="4000">
                    <img src="images/c4.png" style="height: 95vh; width:100%;" class="d-block car-img" alt="...">
                </div>
                <div class="carousel-item" data-bs-interval="4000">
                    <img src="images/c5.png" style="height: 95vh; width:100%;" class="d-block car-img" alt="...">
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next " type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div id="carouselExampleInterval" class="carousel slide mb-5 " data-bs-ride="carousel">

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <h1 class="fw-bolder text-center mt-5 ">Discover</h1>
    <div class="row row-cols-1 row-cols-md-3 row-cols-lg-5 row-cols-sm-2 g-4 m-3 mb-3 fontawesome">
        <div class="col ">
            <div class="card">
                <!-- <i class="fas fa-user-graduate"></i> -->
                <img src="images/education.png" height="200px" class="card-img-top" alt="images/helping-hands.jpg">
                <a class="btn btn-outline-success m-2 fw-bold" href="education.php">Education</a>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <!-- <i class="fas fa-briefcase-medical"></i> -->
                <img src="images/healthcare.png" class="card-img-top" height="200px" alt="images/helping-hands.jpg">
                <a class="btn btn-outline-success m-2 fw-bold" href="healthcare.php">Healthcare</a>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <!-- <i class="fas fa-home"></i> -->
                <img src="images/livelihood.png" height="200px" class="card-img-top" alt="images/helping-hands.jpg">
                <a class="btn btn-outline-success m-2 fw-bold" href="livelihood.php">Livelihood</a>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <!-- <i class="fas fa-graduation-cap"></i> -->
                <img src="images/scholarship.png" height="200px" class="card-img-top" alt="images/helping-hands.jpg">
                <a class="btn btn-outline-success m-2 fw-bold" href="scholarship.php">Scholarship</a>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <!-- <i class="fas fa-hand-holding-water"></i> -->
                <img src="images/others.png" height="200px" class="card-img-top" alt="images/helping-hands.jpg">
                <a class="btn btn-outline-success m-2 fw-bold" href="others.php">Others</a>
            </div>
        </div>
    </div>
        
    <div class="kashmir_banner1 py-3 my-5">
        <div class=" bg-aubergine mb-3 py-5 jumbtron mt-5">
            <div class=" mb-2">
                <h1 class=" text-center mb-5 mt-3">Why <b class="bg-blue rounded-2 p-2 fw-bolder">Kashmirzakat</b> ?</h1>
                <div class=" row row-cols-1 row-cols-lg-3 row-cols-3  d-flex flex-row justify-content-around mt-5">
                    <div class=" d-flex justify-content-center  align-items-center col-7 col-lg-3 col-md-3 feat">
                        <h6 class=" d-flex justify-content-center align-content-center"><i class="fas fa-book fs-1 feature-list"></i>
                            &nbsp &nbsp <p><b>SHARIYAH'S</b> <br>Compliant</p>
                        </h6>
                    </div>
                    <div class=" d-flex justify-content-center  align-items-center col-7 col-lg-3 col-md-3 feat">
                        <h6 class=" d-flex justify-content-center align-content-center"><i class="fa fa-check-circle fs-1 feature-list"></i> &nbsp &nbsp <p><b>GENIUNE</b> <br>Verified Causes</p>
                        </h6>
                    </div>
                    <div class=" d-flex justify-content-center  align-items-center col-7 col-lg-3 col-md-3 feat">
                        <h6 class=" d-flex justify-content-center align-content-center"><i class="fa fa-shield-check fs-1 feature-list"></i> &nbsp &nbsp <p><b>SAFE & SECURE</b> <br>payment Gateway</p>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
        <?php
        include 'assets/connection.php';
        $result = mysqli_query($db, "SELECT * FROM accepted_form  where status='Accepted'");
        $query = mysqli_query($db, "SELECT * FROM payments  where status='complete'");
        $donations = 0;
        while ($row = mysqli_fetch_array($query))
            $donations += $row['amount'];
        ?>
        <div class="count row row-cols-1 row-cols-lg-3 row-cols-md-3 d-flex justify-content-around mr-0">
            <div class="counter col-11 col-md-4 mt-1 col-lg-4 w-25 w-sm-100 ">
                <p class="counter-logo"><i class="fa-2x fa fa-user fs-1"></i></p>
                <h1 class="timer count-title count-number" data-to="<?php echo mysqli_num_rows($query); ?>" data-speed="1500"><?php echo mysqli_num_rows($query); ?></h1>
                <h3 class="count-text">Donars</h3>
            </div>
            <div class="counter col-11 col-md-4 mt-1 col-lg-4 w-25 w-sm-100 ">
                <p class="counter-logo"><i class="fa-2x bx bxs-megaphone fs-1"></i></p>
                <h1 class="timer count-title count-number" data-to="<?php echo mysqli_num_rows($result); ?>" data-speed="1500"><?php echo mysqli_num_rows($result); ?></h1>
                <h3 class="count-text">Causes</h3>
            </div>
            <div class="counter col-11 col-md-4 mt-1 col-lg-4 w-sm-100 ">
                <p class="counter-logo"><i class="fa-2x bx bx-rupee fs-1"></i></p>
                <h1 class="timer count-title count-number" data-to="<?php echo $donations; ?>" data-speed="1500">₹ <?php echo $donations; ?></h1>
                <h3 class="count-text">Donations</h3>
            </div>
        </div>
    </div>
    <br>
    <?php

    include 'assets/connection.php';
    $result1 = mysqli_query($db, "SELECT  * FROM accepted_form where purpose='Education' and status='Accepted' LIMIT 8");
    $result2 = mysqli_query($db, "SELECT  * FROM accepted_form where purpose='Health' and status='Accepted' LIMIT 8");
    $result3 = mysqli_query($db, "SELECT  * FROM accepted_form where purpose='Livelihood' and status='Accepted' LIMIT 8");
    $result4 = mysqli_query($db, "SELECT  * FROM accepted_form where purpose='Scholarship' and status='Accepted' LIMIT 8");
    $result5 = mysqli_query($db, "SELECT  * FROM accepted_form where purpose='Others' and status='Accepted' LIMIT 8");
    $result7 = mysqli_query($db, "SELECT  * FROM accepted_form where status='Accepted' LIMIT 8");
    $result8 = mysqli_query($db, "SELECT  * FROM accepted_form where status='Accepted' LIMIT 8");
    $ramount = 0;
    $amount = 0;
    $percent = 0;

    while ($data = mysqli_fetch_array($result7)) {
    $amount = $data['amount'];
    $ramount = 0;
    $id = $data['id'];
    $resul1 = mysqli_query($db, " SELECT * FROM payments where raiseid = '$id'");
    while ($data1 = mysqli_fetch_array($resul1)) {
        $ramount += $data1['amount'];
    }
    $percent = floor(($ramount / $amount) * 100);
    }
    if ($percent >= 30 and $percent < 100) {
    ?>
    <h1 class=" text-center fw-bold mt-5 mt-5 mb-3">&nbsp&nbsp Featured Cause</h1>
    <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 row-cols-sm-2 g-4 mr-3 m-2 mb-5">
        <?php
        while ($data = mysqli_fetch_array($result7)) {
            $amount = $data['amount'];
            $ramount = 0;
            $id = $data['id'];
            $resul1 = mysqli_query($db, " SELECT * FROM payments where raiseid = '$id' and status='complete'");
            while ($data1 = mysqli_fetch_array($resul1)) {
                $ramount += $data1['amount'];
            }
            $percent = floor(($ramount / $amount) * 100);

            if ($percent >= 30 and $percent < 100) {
                $amount = $data['amount'];
                $id = $data['id'];
                include 'causes.php';
            }
        } ?>
    </div>
    <?php
    }
    while ($data = mysqli_fetch_array($result7)) {
        $amount = $data['amount'];
        $ramount = 0;
        $id = $data['id'];
        $resul1 = mysqli_query($db, " SELECT * FROM payments where raiseid = '$id'");
        while ($data1 = mysqli_fetch_array($resul1)) {
            $ramount += $data1['amount'];
        }

    if ($amount > 0 and $ramount >= $amount) {
    ?>
    <h1 class=" text-center fw-bold mt-5 mb-3">&nbsp&nbsp Successful Cause</h1>
    <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 row-cols-sm-2 g-4 mr-3 m-2 mb-5">
        <?php
        while ($data = mysqli_fetch_array($result8)) {
            $amount = $data['amount'];
            $ramount = 0;
            $id = $data['id'];
            $resul1 = mysqli_query($db, " SELECT * FROM payments where raiseid = '$id'and status='complete'");
            while ($data1 = mysqli_fetch_array($resul1)) {
                $ramount += $data1['amount'];
            }
            if ($ramount >= $amount) {
                $amount = $data['amount'];
                $id = $data['id'];
                $percent = floor(($ramount / $amount) * 100);
                include 'causes.php';
            }
        } ?>
    </div>
    <?php
    } 
    }
    if (mysqli_num_rows($result1) > 0) {
    ?>
        <h1 class=" text-center fw-bold mt-5 mb-3">&nbsp&nbsp Education Cause</h1>
        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 row-cols-sm-2 g-4 mr-3 m-2 mb-5">
            <?php
            while ($data = mysqli_fetch_array($result1)) {
                $amount = $data['amount'];
                $ramount = 0;
                $id = $data['id'];
                $resul1 = mysqli_query($db, " SELECT * FROM payments where raiseid = '$id'and status='complete'");
                while ($data1 = mysqli_fetch_array($resul1)) {
                    $ramount += $data1['amount'];
                }
                $percent = floor(($ramount / $amount) * 100);

                include 'causes.php';
            }
            ?>
        </div>
    <?php
    }
    if (mysqli_num_rows($result2) > 0) {
    ?>
        <h1 class=" text-center fw-bold mt-5 mb-3">&nbsp&nbsp Healthcare Cause</h1>
        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 row-cols-sm-2 g-4 mr-3 m-2 mb-5">
            <?php
            while ($data = mysqli_fetch_array($result2)) {
                $amount = $data['amount'];
                $ramount = 0;
                $id = $data['id'];
                $resul1 = mysqli_query($db, " SELECT * FROM payments where raiseid = '$id'and status='complete'");
                while ($data1 = mysqli_fetch_array($resul1)) {
                    $ramount += $data1['amount'];
                }
                $percent = floor(($ramount / $amount) * 100);

                include 'causes.php';
            } ?>
        </div>
    <?php
    }
    if (mysqli_num_rows($result3) > 0) {
    ?>
        <h1 class=" text-center fw-bold mt-5 mb-3">&nbsp&nbsp Livelihood Cause</h1>
        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 row-cols-sm-2 g-4 mr-3 m-2 mb-5">
            <?php
            while ($data = mysqli_fetch_array($result3)) {
                $amount = $data['amount'];
                $ramount = 0;
                $id = $data['id'];
                $resul1 = mysqli_query($db, " SELECT * FROM payments where raiseid = '$id'and status='complete'");
                while ($data1 = mysqli_fetch_array($resul1)) {
                    $ramount += $data1['amount'];
                }
                $percent = floor(($ramount / $amount) * 100);

                include 'causes.php';
            } ?>
        </div>
    <?php
    }
    if (mysqli_num_rows($result4) > 0) {
    ?>
        <h1 class=" text-center fw-bold mt-5 mb-3">&nbsp&nbsp Scholarship Cause</h1>
        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 row-cols-sm-2 g-4 mr-3 m-2 mb-5">
            <?php
            while ($data = mysqli_fetch_array($result4)) {
                $amount = $data['amount'];
                $ramount = 0;
                $id = $data['id'];
                $resul1 = mysqli_query($db, " SELECT * FROM payments where raiseid = '$id'and status='complete'");
                while ($data1 = mysqli_fetch_array($resul1)) {
                    $ramount += $data1['amount'];
                }
                $percent = floor(($ramount / $amount) * 100);

                include 'causes.php';
            } ?>
        </div>
    <?php
    }
    if (mysqli_num_rows($result5) > 0) {
    ?>
        <h1 class=" text-center fw-bold mt-5 mb-3">&nbsp&nbsp Others Cause</h1>
        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 row-cols-sm-2 g-4 mr-3 m-2 mb-5">
            <?php
            while ($data = mysqli_fetch_array($result5)) {
                $amount = $data['amount'];
                $ramount = 0;
                $id = $data['id'];
                $resul1 = mysqli_query($db, " SELECT * FROM payments where raiseid = '$id'and status='complete'");
                while ($data1 = mysqli_fetch_array($resul1)) {
                    $ramount += $data1['amount'];
                }
                $percent = floor(($ramount / $amount) * 100);

                include 'causes.php';
            } ?>
        </div>

    <?php
    }
    include 'assets/footer.php';
    ?>

</body>

</html>
<script>
    window.onload = function() {
        $.ajax({
            url: 'email-reminder.php',
            type: 'POST',
            success: function(response) {

                // alert(response);

            }
        });
    }

    t = 0;
    $(window).on('scroll', function() {
        var y_scroll_pos = window.pageYOffset;
        var scroll_pos_test = 150; // set to whatever you want it to be
        if (y_scroll_pos > scroll_pos_test && t == 0) {
            t++;
            (function($) {
                $.fn.countTo = function(options) {
                    options = options || {};

                    return $(this).each(function() {
                        // set options for current element
                        var settings = $.extend({}, $.fn.countTo.defaults, {
                            from: $(this).data('from'),
                            to: $(this).data('to'),
                            speed: $(this).data('speed'),
                            refreshInterval: $(this).data('refresh-interval'),
                            decimals: $(this).data('decimals')
                        }, options);

                        // how many times to update the value, and how much to increment the value on each update
                        var loops = Math.ceil(settings.speed / settings.refreshInterval),
                            increment = (settings.to - settings.from) / loops;

                        // references & variables that will change with each update
                        var self = this,
                            $self = $(this),
                            loopCount = 0,
                            value = settings.from,
                            data = $self.data('countTo') || {};

                        $self.data('countTo', data);

                        // if an existing interval can be found, clear it first
                        if (data.interval) {
                            clearInterval(data.interval);
                        }
                        data.interval = setInterval(updateTimer, settings.refreshInterval);

                        // initialize the element with the starting value
                        render(value);

                        function updateTimer() {
                            value += increment;
                            loopCount++;

                            render(value);

                            if (typeof(settings.onUpdate) == 'function') {
                                settings.onUpdate.call(self, value);
                            }

                            if (loopCount >= loops) {
                                // remove the interval
                                $self.removeData('countTo');
                                clearInterval(data.interval);
                                value = settings.to;

                                if (typeof(settings.onComplete) == 'function') {
                                    settings.onComplete.call(self, value);
                                }
                            }
                        }

                        function render(value) {
                            var formattedValue = settings.formatter.call(self, value, settings);
                            $self.html(formattedValue);
                        }
                    });
                };

                $.fn.countTo.defaults = {
                    from: 0, // the number the element should start at
                    to: 0, // the number the element should end at
                    speed: 1000, // how long it should take to count between the target numbers
                    refreshInterval: 100, // how often the element should be updated
                    decimals: 0, // the number of decimal places to show
                    formatter: formatter, // handler for formatting the value before rendering
                    onUpdate: null, // callback method for every time the element is updated
                    onComplete: null // callback method for when the element finishes updating
                };

                function formatter(value, settings) {
                    return value.toFixed(settings.decimals);
                }
            }(jQuery));

            jQuery(function($) {
                // custom formatting example
                $('.count-number').data('countToOptions', {
                    formatter: function(value, options) {
                        return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
                    }
                });

                // start all the timers
                $('.timer').each(count);

                function count(options) {
                    var $this = $(this);
                    options = $.extend({}, options || {}, $this.data('countToOptions') || {});
                    $this.countTo(options);
                }
            });
        }
    });
</script>
<style>
    .bg-blue{
     background-color: #4247C9;
     color:#fff;
    }
    .count {
        margin-right: 0 !important;
        margin-left: 0 !important;
    }

    .counter {
        background-color: #C9CBFE;
        padding: 20px 0;
        border-radius: 5px;
    }

    .count-title {
        font-size: 45px;
        font-weight: 600;
        margin-top: 10px;
        margin-bottom: 0;
        text-align: center;
    }

    .count-text {
        font-size: 25px;
        font-weight: normal;
        margin-top: 10px;
        margin-bottom: 0;
        text-align: center;
    }

    .fa-2x {
        margin: 0 auto;
        float: none;
        display: table;
        font-size: 60px !important;
        color: #4247C9;
    }

    @media (max-width:900px) {
        .w-sm-100 {
            width: 90% !important;
        }
    }
    
    .bg-aubergine {
        padding: 10px;
        background-color: #a7aafc;

    }
    
    .kashmir_banner1 {
        background-color: #edeefc;
    }

    .feat p {
        margin: 0 !important;
    }
</style>