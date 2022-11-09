<script>
    localStorage.setItem("curr_address", window.location.href)
</script>
<nav class="navbar main-nav navbar-expand-lg navbar-light bg-light fixed-top mb-5 " id="">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
            <img src="images/logo-croped2.png" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto ">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Discover
                    </a>
                    <ul class="dropdown-menu shadow" aria-labelledby="navbarDropdownMenuLink">
                        <li>
                            <a class="dropdown-item" href="education.php">Education</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="healthcare.php">Healthcare</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="livelihood.php">Livelihood</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="scholarship.php">Scholarship</a>
                        </li>
                        <li><a class="dropdown-item" href="others.php">Others</a></li>
                        <li><a class="dropdown-item" href="successfully-completed.php">Completed</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link raise-btn btn btn-danger" href="fund-raise-form.php"><i class="fas fa-user-edit"></i>
                        Raise Cause</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact-us.php">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about-us.php">About Us</a>
                </li>
                <li class="nav-item search">
                    <a class="nav-link " data-bs-toggle="modal" autocomplete="off" data-bs-target="#searchModal">
                        <i class="fa fa-search" aria-hidden="true"></i>&nbsp; Search
                    </a>
                </li>
                <?php
                if (!isset($_SESSION['username'])) {
                ?>
                    <li class="nav-item">
                        <a class="nav-link" type="button" data-bs-toggle="modal" data-bs-target="#signin">SignIn</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" type="button" data-bs-toggle="modal" data-bs-target="#signup">SignUp</a>
                    </li>
                    <?php
                } else {
                    $useremail = $_SESSION['useremail'];
                    if ($_SESSION['username'] == "admin") {
                    ?>
                        <li class="nav-item dropdown ">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Admin
                            </a>
                            <ul class="dropdown-menu shadow" aria-labelledby="navbarDropdownMenuLink">
                                <li>
                                    <a class="dropdown-item" href="admin-dashboard.php">Dashboard</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="users.php?username=<?php echo $_SESSION['username']; ?>">Users</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="logout.php">logout</a>
                                </li>
                            </ul>
                        </li>
                    <?php
                    } else {
                    ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php
                                echo $_SESSION['username'];
                                ?>
                            </a>
                            <ul class="dropdown-menu shadow" aria-labelledby="navbarDropdownMenuLink">
                                <li>
                                    <a class="dropdown-item" href="user-dashboard.php">Dashboard</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="account-setting.php">Account Settings</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="campaigns.php?useremail=<?php echo $_SESSION['useremail']; ?>">Causes</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="liked-causes.php?username=<?php echo $_SESSION['username']; ?>">Liked</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="logout.php">logout</a>
                                </li>
                            </ul>
                        </li>
                <?php
                    }
                }
                ?>
            </ul>
        </div>
    </div>
</nav>
<div style="height:52px !important;"></div>

<!--//search modal-->
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Search cause</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="text" id="searchmodalbox" name="live_search" autocomplete="off" class="form-control my-2" placeholder="Type Cause name" aria-label="Search" />
                <div id="search_result" class="my-2"></div>
            </div>
        </div>
    </div>
</div>

<?php
if (!isset($_SESSION['username'])) {
?>
    <!-- //signup modal -->
    <div class="modal fade" id="signup" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content signup-form">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">SignUp</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                </head>

                <div class="modal-body " id="hidden">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="name" name="name" placeholder="John Hal" required />
                        <label for="floatingInput">Name</label>
                    </div>
                    <div class="form-floating">
                        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required />
                        <label for="floatingInput">Email address</label>
                    </div>
                    <label for="floatingInput" id="uname_response" class="mb-3"></label>

                    <div class="form-floating mb-4">
                        <input type="password" class="pr-password form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" id="password" onkeyup="checkpass();" name="password" placeholder="Password" required />
                        <label for="floatingPassword">Create Password</label>
                        <div id="strengthMessage" class=""></div>
                    </div>

                    <div class="form-floating">
                        <input type="password" class="form-control" id="rpassword" name="rpassword" onkeyup="checkpass();" placeholder="Password" required />
                        <label for="floatingInput">Re-enter Password</label>
                    </div>
                    <label id="message" class="mb-3"></label>

                    <div class="form-floating mb-3">
                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="+91 1234567890" required />
                        <label for="floatingInput">Mobile No</label>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" name="checkbox" class="form-check-input" id="exampleCheck1" required />
                        <label class="form-check-label mb-2" for="exampleCheck1">I Agree to <a href="#">Terms &
                                conditions</a></label>
                        <br />
                        <label class="form-label" for="exampleCheck2">Already have an account?
                            <a id="signup-btn" class="text-decoration-underline" data-bs-toggle="modal" data-bs-target="#signin" type="button" onclick="close_up()">Login Now</a></label>
                    </div>
                </div>
                <h3 class=" text-center m-3" id="head" style="display: none;">Check mail for OTP</h3>
                <div class="form-floating mb-3 modal-body" id="otpVerify" style="display: none;">
                    <input type="tel" class="form-control py-2" id="otp" name="otp" placeholder="Enter OTP" required />
                    <label for="floatingInput" class="mx-2">Enter OTP</label>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="submit" class="btn btn-primary" onclick="getOTPNumber();">Register</button>
                    <button type="button" name="" id="resendOTP" style="display: none;" class="btn btn-primary" onclick="getOTPNumber(); ">Resend</button>
                    <button type="button" id="submitOTP" style="display: none;" onclick="validateOTP(); " name="" class="btn btn-success">Verify OTP</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        //OTP generation
        var getOTPNumberCode = '';

        function getOTPNumber() {

            let name = jQuery('#name').val();
            let email = jQuery('#email').val();
            let password = jQuery('#password').val();
            let rpassword = jQuery('#rpassword').val();
            let phone = jQuery('#phone').val();

            if (name != '' && email != '' && password != '' && rpassword != '' && phone != '') {
                var data = {
                    'name': name,
                    'email': email,
                    'password': password,
                    'rpassword': rpassword,
                    'phone': phone
                };
                // document.getElementById("submit").disabled = false;
                $.ajax({
                    type: 'POST',
                    url: 'signup.php',
                    data: data,
                    dataType: 'JSON',
                    success: function(data) {
                        console.log(data)
                        getOTPNumberCode = data;
                        document.getElementById('otpVerify').style.display = "block";
                        document.getElementById('resendOTP').style.display = 'block';
                        document.getElementById('submitOTP').style.display = 'block';
                        document.getElementById('head').style.display = 'block';
                        document.getElementById('hidden').style.display = 'none';
                        document.getElementById('submit').style.display = 'none';
                    }
                });
            } else {
                alert("please fill all fields");
            }
        }
    </script>

    <!-- //login modal -->
    <div class="modal fade bg-transparent" id="signin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabe2" aria-hidden="true">
        <div class="modal-dialog bg-transparent">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Login</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="signin.php" method="post">
                    <div class="modal-body" id="user-details">
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="uemail" name="email" placeholder="name@example.com" required />
                            <label for="floatingInput">Enter Email Id</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="upass" name="userpass" placeholder="Password" required />
                            <label for="floatingInput">Enter Password</label>
                        </div>
                        <div class="mb-3 justify-content-between">
                            <div>
                                <label class="form-check-label">Don't an account?
                                    <a class="text-decoration-underline" data-bs-toggle="modal" data-bs-target="#signup" onclick="close_in()">Register Now</a></label>
                            </div>
                            <div>
                                <label class="form-check-label"><a href="forget-password.php" class=" text-primary text-decoration-underline bg-transparent border-0 cursor">Forget password?</a></label>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-primary" id="login-btn">Login</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
<?php
}
?>