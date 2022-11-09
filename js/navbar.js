//fields filled
$("#name,#email,#password,#rpassword,#phone").on("keydown", function() {
    if ($("#name").val() != "" && $("#email").val() != "" && $("#password").val() != "" && $("#rpassword").val() != "") {
        document.getElementById("submit").disabled = false;
    } else {
        document.getElementById("submit").disabled = true;
    }
});
// $("#otp").on("keypress", function() {
//     if ($("#otp").val().length >= 5) {
//         document.getElementById("submitOTP").disabled = false;
//     } else {
//         document.getElementById("submitOTP").disabled = true;
//     }
// });

/* trigger when page is ready */
$(document).ready(function() {
    $(".pr-password").passwordRequirements({});
});

function checkpass() {
    if (($('#password').val()) != '' && ($('#rpassword').val()) != '')
        if ($('#rpassword').val() == $('#password').val()) {
            $('#message').html('Password Matched').css('color', 'green');
        }
    else
        $('#message').html('Password Not Matching').css('color', 'red');
    if (($('#password').val()) == '' && ($('#rpassword').val()) == '')
        $('#message').html('');
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

                }
            });
        } else {
            $("#uname_response").html("");
            suces = false;
        }

    });

});

//OTP generation
var getOTPNumberCode = '';

function getOTPNumber() {

    var name = jQuery('#name').val();
    var email = jQuery('#email').val();
    var password = jQuery('#password').val();
    var rpassword = jQuery('#rpassword').val();
    var phone = jQuery('#phone').val();

    var data = {
        'name': name,
        'email': email,
        'password': password,
        'rpassword': rpassword,
        'phone': phone
    };

    $.ajax({
        type: 'POST',
        url: 'signup.php',
        data: data,
        dataType: 'JSON',
        success: function(data) {
            getOTPNumberCode = data;
            document.getElementById('otpVerify').style.display = "block";
            document.getElementById('resendOTP').style.display = 'block';
            document.getElementById('submitOTP').style.display = 'block';
            document.getElementById('head').style.display = 'block';
            document.getElementById('hidden').style.display = 'none';
            document.getElementById('submit').style.display = 'none';
        }
    });
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

    if (otpVerify != getOTPNumberCode) {
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

                getOTPNumberCode = data;

            }
        });
        jQuery('#submitOTP').html('OTP verified');
        alert('OTP is correct,Login Please');
        setTimeout(function() {
            window.location.href = 'index.php';
        }, 3000);

    }
}