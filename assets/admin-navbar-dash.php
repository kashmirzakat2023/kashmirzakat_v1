<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<!--<div id="loading">-->
<!--    <img id="loading-image" src="images/hug.gif" alt="Loading..." />-->
<!--</div>-->
<head>
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
</head>
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
<header class="header d-flex justify-content-between body-pd" id="header">
    <div class="header_toggle"> <i class='bx bx-menu bx-x' id="header-toggle"></i> </div>
    <div class="header_toggle d-flex flex-row align-content-center">
        <a href="index.php" class=" text-dark mt-1">
            <small class=" d-flex justify-content-around"><i class='bx bx-home  px-1 fs-3'></i> Home</small>
        </a>

    </div>
</header>