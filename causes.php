<div class="col ht cause_card" data-bs-toggle="tooltip" data-bs-placement="bottom" title="<?php echo $data['cause_title']; ?>">
    <div class="card shadow">
        <?php
        $email = $data['email'];
        $name = '';
        $profile_img = '';
        $usersql = mysqli_query($db, "SELECT * FROM users where email = '$email' ");
        while ($row = mysqli_fetch_array($usersql)) {
            $name = $row['name'];
            $profile_img = $row['profile_pic'];
        }
        if ($ramount >= $amount) {
        ?>
            <span class="span"></span>
        <?php
        }
        ?>
        <script>
            $(".cause_card").click(function(param) {
                window.location.href = "raise-detail.php?campaign=<?php echo $data['id']; ?>"
            })
        </script>
        <img src="<?php echo "images/" . $data['profile_pic']; ?>" class="card-img-top" alt="image">
        <div class="card-body" style="font-size: 90%;">
            <b><p class="card-title text-dark wrapper text-decoration-underline" style="  -webkit-line-clamp: 1;
                        height: 20px;" role="button" href=""><?php echo $data['cause_title']; ?></p></b>
            <p class="card-text wrapper" style="  -webkit-line-clamp: 1;
                    height: 25px;"><img class=" me-2 " style="border-radius: 50% !important;" width="20px" src="<?php echo "images/" . $profile_img; ?>" alt="profile_pic"><?php echo $name; ?></p>
            <small class="card-text wrapper mb-2" style="  -webkit-line-clamp: 3;
                    height: 60px;"> <?php echo $data['cause_summary']; ?></small>

            <div class=" d-flex justify-content-between " style="margin-bottom: -20px;">
                <p class="card-text"><i class="fas fa-map-marker-alt "></i> <?php echo $data['location']; ?></p>
                <?php
                $date = strtotime($data['date']);
                $now = time();
                $timeleft = $now - $date;
                $days = 30 - round($timeleft / (60 * 60 * 24));
                if ($days > 0 and !($ramount >= $amount)) {
                ?>
                    <p class="card-text"><b>
                            <?php
                            echo $days;
                            ?></b> days left</p>
                <?php } else { ?>
                    <p class="text-danger fw-bold">Cause Ended</p>
                <?php } ?>
            </div>
        </div>

        <div class="card-footer">
            <?php if (!($ramount >= $amount) and $days > 0) { ?>
                <div class="progress">
                    <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo $percent; ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $percent; ?>%</div>
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
            <div class=" d-flex justify-content-between py-2">
                <small class="">Raised :<br> <b class=" text-success">₹<?php echo $ramount; ?></b></small>
                <small class="">Goal :<br> <b>₹<?php echo $data['amount']; ?></b></small>
            </div>
        </div>
    </div>
</div>

<style>
    .card .card-img-top {
        height: 225px;
    }

    .cause_card {
        cursor: pointer;
    }
</style>