<div class="col ht">
    <div class="card shadow">
        <?php
        if ($ramount >= $amount) {
        ?>
            <!-- <a class="btn btn-success" style="position: absolute; z-index:1000; "><i class="fas fa-thumbs-up"></i> Successfully Completed</a> -->
            <span class="span"></span>
        <?php
        }
        ?>
        <img src="<?php echo "images/" . $data['profile_pic']; ?>" class="card-img-top" alt="image">
        <div class="card-body" style="font-size: 90%;">
            <b><a class="card-title text-dark wrapper" style="  -webkit-line-clamp: 1;
                        height: 20px;" role="button" href="raise-detail.php?campaign=<?php echo $data['id']; ?>"><?php echo $data['cause_title']; ?></a></b>
            <p class="card-text wrapper" style="  -webkit-line-clamp: 1;
                    height: 20px;"><?php echo $data['name']; ?></p>
            <small class="card-text wrapper mb-2" style="  -webkit-line-clamp: 3;
                    height: 60px;"> <?php echo $data['cause_summary']; ?></small>

            <div class=" d-flex justify-content-between " style="margin-bottom: -20px;">
                <p class="card-text"><i class="fas fa-map-marker-alt "></i> <?php echo $data['location']; ?></p>
                <?php 
                        $date = strtotime($data['date']);
                        $now = time();
                        $timeleft = $now - $date;
                        $days = 30 - round($timeleft / (60 * 60 * 24));
                if($days>0 and !($ramount >= $amount)){ 
                ?>
                <p class="card-text"><b>
                        <?php
                        echo $days;
                        ?></b> days left</p>
                        <?php } else{ ?>
                        <p class="text-danger fw-bold">Cause Ended</p>
                        <?php } ?>
            </div>
        </div>


        <div class="card-footer">
            <?php if (!($ramount >= $amount) and $days>0) { ?>
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

<script>
    // function copy(id) {
    //     <?php $_SESSION['key'] ?> = this.id;
    // }
</script>
<style>
    .ht {
        height: 533px;
    }
    .ht:hover {
        transform: translateY(-2px);
    }
    .card:hover {
        box-shadow: rgba(14, 30, 37, 0.12) 0px 4px 6px 0px, rgba(14, 30, 37, 0.32) 0px 4px 20px 0px !important;
        
    }
    .card {
        /*box-shadow: rgba(14, 30, 37, 0.12) 0px 1px 2px 0px, rgba(14, 30, 37, 0.32) 0px 1px 12px 0px !important;*/
    }
    
    .card .card-img-top {
        height: 225px;
    }

    .card .span {
        position: absolute;
        top: -10px;
        left: -10px;
        width: 150px;
        height: 150px;
        display: flex;
        justify-content: center;
        align-items: center;
        overflow: hidden;
    }

    .card .span::before {
        content: 'Successful';
        display: flex;
        position: absolute;
        justify-content: center;
        align-items: center;
        text-transform: uppercase;
        font-weight: 600;
        color: white;
        width: 150%;
        height: 40px;
        background-color: rgb(16, 129, 16);
        letter-spacing: 0.1em;
        transform: rotate(-45deg) translateY(-20px);
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);

    }

    .card .span::after {
        content: '';
        position: absolute;
        width: 10x;
        height: 10px;
        left: 0;
        bottom: 0;
        background: rgb(30, 39, 30);
        box-shadow: 140px -140px rgb(8, 126, 8);
        z-index: -1;
    }
</style>