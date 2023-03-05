<?php 
include 'assets/nav-links.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Forget Password</title>
    <?php
    include 'assets/navbar.php';
    include 'assets/connection.php';
    $result = mysqli_query($db, "SELECT * FROM form_data where purpose='Education' and status='Accepted'");
    ?>
</head>

<body>

    <center>
        <h2 class="mt-3"> Forget Password</h2>
    </center>
    <div class="col-8 mb-5 fund-raise">
        <div>
            <br>
            <h5 for="floatingInput" id="hide" class="fw-bold">Enter registered mail id</h5>
            <div class="form-floating" id="temail">
                <input type="email" class="form-control" id="cemail" name="email" placeholder="name@example.com" required />
                <label for="floatingInput">Email address</label>
            </div>
            <label for="floatingInput" id="uname_response1" class="mb-3"></label>
            <h3 class=" text-center m-3" id="head1" style="display: none;">Check mail for OTP</h3>
            <div class="form-floating mb-3 modal-body" id="otpVerify1" style="display: none;">
                <input type="tel" class="form-control py-2" id="otp1" name="otp" placeholder="Enter OTP" required />
                <label for="floatingInput" class="mx-2">Enter OTP</label>
            </div>
            <div class="form-floating mb-3" style="display: none;" id="npass">
                <input type="password" class="pr-password form-control" id="password1" onkeyup="checkpass();" name="password" placeholder="Password" required />
                <label for="floatingPassword">Create Password</label>
            </div>
            <div class="form-floating" style="display: none;" id="nrpass">
                <input type="password" class="form-control" id="rpassword1" name="rpassword" onkeyup="checkpass();" placeholder="Password" required />
                <label for="floatingInput">Re-enter Password</label>
            </div>
            <label id="message1" class="mb-3"></label>
            <div class=" text-center d-flex flex-row justify-content-center">
                <button type="button" id="sendOTP" class=" mb-3 btn btn-primary" onclick="sendOTPNumber();">Send OTP</button>
                <button type="button" id="uresendOTP" class="mx-3 mb-3 btn btn-primary" onclick="resendOTP();" style="display: none;">Resend</button>
                <button type="button" id="usubmitOTP" class="mx-3 mb-3 btn btn-success" onclick="rvalidateOTP();" style="display: none;">Verify OTP</button>
                <button type="button" id="changepass" class="mx-3 mb-3 btn btn-success" onclick="changepass();" style="display: none;" disabled>Change Password</button>
            </div>
        </div>
    </div>
    <?php include 'assets/footer.php'; ?>
</body>
<script>
    //user otp
    var getOTPNumberCode1 = '';

    function sendOTPNumber() {
        var email = jQuery('#cemail').val();

        var data = {
            'email': email
        };

        $.ajax({
            type: 'POST',
            url: 'forget-pass.php',
            data: data,
            dataType: 'JSON',
            success: function(data) {
                getOTPNumberCode1 = data;
                document.getElementById('head1').style.display = 'block';
                document.getElementById('otpVerify1').style.display = 'block';
                document.getElementById('uresendOTP').style.display = 'block';
                document.getElementById('usubmitOTP').style.display = 'block';
                document.getElementById('hide').style.display = 'none';
                document.getElementById('sendOTP').style.display = 'none';
                document.getElementById('temail').style.display = 'none';
                document.getElementById('uname_response1').style.display = 'none';
            }
        });
    }

    function checkpass() {
        if (($('#password1').val()) != '' && ($('#rpassword1').val()) != '')
            if ($('#rpassword1').val() == $('#password1').val()) {
                $('#message1').html('Password Matched').css('color', 'green');
                document.getElementById('changepass').disabled = false;
            }
        else {
            $('#message1').html('Password Not Matching').css('color', 'red');
            document.getElementById('changepass').disabled = true;
        }
        if (($('#password1').val()) == '' && ($('#rpassword1').val()) == '') {
            document.getElementById('changepass').disabled = true;

            $('#message1').html('');
        }
    }

    function changepass() {
        var email = jQuery('#cemail').val();
        var password = $('#rpassword1').val();
        var data = {
            'email': email,
            'password': password
        };
        $.ajax({
            type: 'POST',
            url: 'insert-pass.php',
            data: data,
            dataType: 'JSON',
            success: function(pass) {
                // getOTPNumberCode1 = data;
                if (pass == 'true') {
                    alert('Error in changing Password');
                    window.location.href = "password-change.php";
                } else {
                    alert('Password changed successfully');
                    window.location.href = "index.php";
                }
            }
        });

    }

    function resendOTP() {
        var email = jQuery('#cemail').val();
        var data = {
            'email': email
        };
        $.ajax({
            type: 'POST',
            url: 'forget-pass.php',
            data: data,
            dataType: 'JSON',
            success: function(data) {
                getOTPNumberCode1 = data;
            }
        });
    }

    function rvalidateOTP() {
        var email = jQuery('#email').val();

        var otpVerify = jQuery('#otp1').val();

        if (otpVerify != getOTPNumberCode1/786) {
            alert('Please Check your email again OTP is wrong.');
            return false;
        } else {
            jQuery('#usubmitOTP').html('OTP verified');
            document.getElementById('npass').style.display = 'block';
            document.getElementById('nrpass').style.display = 'block';
            document.getElementById('changepass').style.display = 'block';

            document.getElementById('head1').style.display = 'none';
            document.getElementById('otpVerify1').style.display = 'none';
            document.getElementById('uresendOTP').style.display = 'none';
            document.getElementById('usubmitOTP').style.display = 'none';
        }
    }

    //email exists or not
    $(document).ready(function() {

        $("#cemail").keyup(function() {

            var email = $(this).val().trim();

            if (email != '') {

                $.ajax({
                    url: 'email-present.php',
                    type: 'post',
                    data: {
                        email: email,
                    },
                    success: function(response) {
                        $('#uname_response1').html(response);

                        if (response == "<span style='color: red;'>Email not found</span>") {
                            document.getElementById("sendOTP").disabled = true;
                        } else
                            document.getElementById("sendOTP").disabled = false;

                    }
                });
            } else {
                $("#uname_response1").html("");
            }

        });

    });

    // $("#otp1").on("keypress", function() {
    // if ($("#otp1").val().length >= 4) {
    // document.getElementById("usubmitOTP").disabled = false;
    // } else {
    // document.getElementById("usubmitOTP").disabled = true;
    // }
    // });
</script>

</html>

<style>
    .fund-raise {
        display: flex;
        justify-content: center;
        margin-left: auto;
        margin-right: auto;
        flex-direction: column;
    }

    @media (max-width:450px) {

        body,
        input,
        select {
            font-size: 80%;
        }

        h2 {
            font-size: 180%;
        }
    }
</style>