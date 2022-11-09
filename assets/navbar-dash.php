<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<!--<div id="loading">-->
<!--    <img id="loading-image" src="images/hug.gif" alt="Loading..." />-->
<!--</div>-->

<style>
    #loading {
        position: fixed;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        opacity: 0.7;
        /* background-color: #fff; */
        z-index: 99;
    }

    #loading-image {
        width: 20vh;
        z-index: 100;
    }
</style>

<header class="header d-flex justify-content-between body-pd mb-3" id="header">
    <div class="header_toggle"> <i class='bx bx-menu bx-x' id="header-toggle"></i> </div>
    <div class="header_toggle d-flex flex-row align-content-center">
        <a href="index.php" class=" text-dark mt-1">
            <small class=" d-flex text-dark justify-content-around"><i class='bx bx-home text-dark px-1 fs-3'></i> Home</small>
        </a>
        <div class="header_img mx-3">
            <?php
            $user = mysqli_query($db, "SELECT * FROM users where email='$useremail'");
            while ($row = mysqli_fetch_array($user)) {
            ?>
                <a href="account-setting.php">
                    <img src="<?php echo "images/" . $row['profile_pic']; ?>" alt="profile_pic">
                    <small class=" text-dark"><?php echo $row['name']; ?> </small>
                </a>
            <?php } ?>
        </div>

    </div>
</header>