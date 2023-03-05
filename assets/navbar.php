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
                <li class="nav-item search">
                    <a class="nav-link " data-bs-toggle="modal" autocomplete="off" data-bs-target="#searchModal">
                        <i class="fa fa-search" style="font-weight: 100;" aria-hidden="true"></i>&nbsp; Search
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Discover
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li>
                            <a class="dropdown-item" href="cause-category.php?purpose=Education">Education</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="cause-category.php?purpose=Healthcare">Healthcare</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="cause-category.php?purpose=Livelihood">Livelihood</a>
                        </li>
                        <!-- <li>
                            <a class="dropdown-item" href="scholarship.php">Scholarship</a>
                        </li> -->
                        <li>
                            <a class="dropdown-item" href="cause-category.php?purpose=Others">Others</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="cause-category.php?purpose=Completed">Completed</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link raise-btn btn btn-danger" href="create-campaign.php"><i class="fas fa-user-edit"></i>
                        Raise Cause</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about-us.php">About Us</a>
                </li>
                <?php
                if (!isset($_SESSION['username'])) {
                ?>
                    <li class="nav-item">
                        <a class="nav-link" href="contact-us.php">Contact</a>
                    </li>
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
                        <li class="nav-item">
                            <a class="nav-link" href="admin-contactlist.php">Contact List</a>
                        </li>
                        <li class="nav-item dropdown ">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Admin
                            </a>
                            <ul class="dropdown-menu                                                                                                                                                                                                                                                                                                                                                                                                                                                                            " aria-labelledby="navbarDropdownMenuLink">
                                <li>
                                    <a class="dropdown-item" href="admin-dashboard.php">Dashboard</a>
                                </li>
                                <!-- <li>
                                    <a class="dropdown-item" href="users-list.php?useremail=admin@admin.com">Users</a>
                                </li> -->
                                <li>
                                    <a class="dropdown-item" href="reportslist.php">Reports List</a>
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
                    <button type="button" id="submit" class="btn btn-primary register" onclick="getOTPNumber();">Register</button>
                    <button type="button" name="" id="resendOTP" style="display: none;" class="btn btn-primary" onclick="getOTPNumber(); ">Resend</button>
                    <button type="button" id="submitOTP" style="display: none;" onclick="validateOTP(); " name="" class="btn btn-success">Verify OTP</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        //OTP generation
        var dis = true;
        $(document).ready(function() {
            $('#password').keyup(function() {
                $('#strengthMessage').html(checkStrength($('#password').val()))
            })

            function checkStrength(password) {
                var strength = 0
                if (password.length < 6) {
                    $('#strengthMessage').removeClass()
                    $('#strengthMessage').addClass('Short')
                    // document.getElementById("submit").disabled = true;
                    return 'Too short'
                }
                if (password.length > 7) strength += 1
                // If password contains both lower and uppercase characters, increase strength value.  
                if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) strength += 1
                // If it has numbers and characters, increase strength value.  
                if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)) strength += 1
                // If it has one special character, increase strength value.  
                if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
                // If it has two special characters, increase strength value.  
                if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
                // Calculated strength value, we can return messages  
                // If value is less than 2  
                if (strength < 2) {
                    $('#strengthMessage').removeClass()
                    $('#strengthMessage').addClass('Weak')
                    // document.getElementById("submit").disabled = true;
                    $(".register").prop("disabled", true);
                    return 'Weak'
                } else if (strength == 2) {
                    $('#strengthMessage').removeClass()
                    $('#strengthMessage').addClass('Good')
                    $(".register").prop("disabled", false);

                    return 'Good'
                } else {
                    $('#strengthMessage').removeClass()
                    $('#strengthMessage').addClass('Strong')
                    $(".register").prop("disabled", false);
                    return 'Strong'
                }
            }
        });

        //fields filled
        $("#name,#email,#password,#rpassword,#phone").on("keydown", function() {
            if ($("#name").val() != "" && $("#email").val() != "" && $("#password").val() != "" && $("#rpassword").val() != "") {
                // document.getElementById("submit").disabled = false;
                dis = false;
            } else {
                // document.getElementById("submit").disabled = true;
            }
        });

        function checkpass() {
            if (($('#password').val()) != '' && ($('#rpassword').val()) != '')
                if ($('#rpassword').val() == $('#password').val()) {
                    $('#message').html('Password Matched').css('color', 'green');
                    // document.getElementById("submit").disabled = false;
                    $(".register").prop("disabled", false);
                    dis = false;
                }
            else {
                $('#message').html('Password Not Matching').css('color', 'red');
                $(".register").prop("disabled", true);
                // document.getElementById("submit").disabled = true;
            }
            if (($('#password').val()) == '' && ($('#rpassword').val()) == '') {
                $('#message').html('');
                $(".register").prop("disabled", true);
                // document.getElementById("submit").disabled = true;
            }
        }
        //email already exists or not 
        $(document).ready(function() {

            $("#email").keyup(function() {

                var email = $(this).val().trim();

                if (email != '') {

                    $.ajax({
                        url: 'email-exists.php',
                        type: 'post',
                        data: {
                            email: email
                        },
                        success: function(response) {

                            $('#uname_response').html(response);
                            $(".register").prop("disabled", true);
                            if (response == "<span style='color: green;'>Available.</span>")
                                $(".register").prop("disabled", false);
                        }
                    });
                } else {
                    $("#uname_response").html("");
                    suces = false;
                }

            });

        });

        // //OTP generation
        var getOTPNumberCode = '';

        function getOTPNumber() {

            var name = jQuery('#name').val();
            var email = jQuery('#email').val();
            var password = jQuery('#password').val();
            var rpassword = jQuery('#rpassword').val();
            var phone = jQuery('#phone').val();
            // if ($("#isAgeSelected").is(':checked'))
            //     $("#txtAge").show(); // checked
            // else
            //     $("#txtAge").hide(); // unchecked

            if (name != '' && email != '' && password != '' && rpassword != '' && phone != '' && $("#exampleCheck1").is(':checked')) {
                var data = {
                    'name': name,
                    'email': email,
                    'password': password,
                    'phone': phone
                }
                // document.getElementById("submit").disabled = false;
                $.ajax({
                    type: 'POST',
                    url: 'signup.php',
                    data: data,
                    dataType: 'JSON',
                    success: function(data) {
                        getOTPNumberCode = data;
                        $('#otpVerify').css({
                            "display": "block"
                        });
                        $('#resendOTP').css({
                            "display": 'block'
                        });
                        $('#submitOTP').css({
                            "display": 'block'
                        });
                        $('#head').css({
                            "display": 'block'
                        });
                        $('#hidden').css({
                            "display": 'none'
                        });
                        $('#submit').css({
                            "display": 'none'
                        });
                        // document.getElementById('otpVerify').style.display = "block";
                        // document.getElementById('resendOTP').style.display = 'block';
                        // document.getElementById('submitOTP').style.display = 'block';
                        // document.getElementById('head').style.display = 'block';
                        // document.getElementById('hidden').style.display = 'none';
                        // document.getElementById('submit').style.display = 'none';
                    },
                    error: function(e) {
                        console.log(e, "error at otp mail");
                    }
                });
            } else {
                alert("please fill all fields");
            }
        }

        //OTP valuation
        function resendOTPNumber() {
            var email = jQuery('#email').val();
            var data = {
                'email': email
            };
            $.ajax({
                type: 'POST',
                url: 'signup.php',
                data: data,
                dataType: 'JSON',
                success: function(data) {
                    getOTPNumberCode = data;
                }
            });
        }

        function validateOTP() {
            var name = jQuery('#name').val();
            var email = jQuery('#email').val();
            var password = jQuery('#password').val();
            var phone = jQuery('#phone').val();

            var otpVerify = jQuery('#otp').val();

            if (otpVerify != getOTPNumberCode / 786) {
                alert('Please Check your email again OTP is wrong.');
                return false;
            } else {
                var data = {
                    'name': name,
                    'email': email,
                    'password': password,
                    'phone': phone
                };

                $.ajax({
                    type: 'POST',
                    url: 'insert-data.php',
                    data: data,
                    dataType: 'JSON',
                    success: function(data) {
                        jQuery('#submitOTP').html('OTP verified');
                        alert('OTP is correct,Login Please');
                        setTimeout(function() {
                            window.location.href = 'index.php';
                        }, 1000);
                    }
                });

            }
        }

        //search function
        $(document).ready(function() {
            $("#searchmodalbox").keyup(function() {
                var query = $(this).val();
                if (query != "") {
                    $.ajax({
                        url: 'ajax-live-search.php',
                        method: 'POST',
                        data: {
                            query: query
                        },
                        success: function(data) {
                            $('#search_result').html(data);
                            $('#search_result').css('display', 'block');
                            $("#live_search").focusout(function() {
                                $('#search_result').css('display', 'none');
                            });
                            $("#live_search").focusin(function() {
                                $('#search_result').css('display', 'block');
                            });
                        }
                    });
                } else {
                    $('#search_result').css('display', 'none');
                }
            });
        });
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
                                <label class="form-check-label">Create account
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