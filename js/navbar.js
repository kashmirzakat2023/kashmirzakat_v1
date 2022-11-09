var dis = true;
$(document).ready(function () {
    $('#password').keyup(function () {
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
            return 'Weak'
        } else if (strength == 2) {
            $('#strengthMessage').removeClass()
            $('#strengthMessage').addClass('Good')
            dis = false;
            return 'Good'
        } else {
            $('#strengthMessage').removeClass()
            $('#strengthMessage').addClass('Strong')
            dis = false;
            return 'Strong'
        }
    }
});

//fields filled
$("#name,#email,#password,#rpassword,#phone").on("keydown", function () {
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
            dis = false;
        }
        else {
            $('#message').html('Password Not Matching').css('color', 'red');
            // document.getElementById("submit").disabled = true;
        }
    if (($('#password').val()) == '' && ($('#rpassword').val()) == '') {
        $('#message').html('');
        // document.getElementById("submit").disabled = true;
    }
}
//email already exists or not 
$(document).ready(function () {

    $("#email").keyup(function () {

        var email = $(this).val().trim();

        if (email != '') {

            $.ajax({
                url: 'email-exists.php',
                type: 'post',
                data: {
                    email: email
                },
                success: function (response) {

                    $('#uname_response').html(response);

                }
            });
        } else {
            $("#uname_response").html("");
            suces = false;
        }

    });

});

// //OTP generation
// var getOTPNumberCode = '';

// function getOTPNumber() {

//     var name = jQuery('#name').val();
//     var email = jQuery('#email').val();
//     var password = jQuery('#password').val();
//     var rpassword = jQuery('#rpassword').val();
//     var phone = jQuery('#phone').val();

//     if (name != '' && email != '' && password != '' && rpassword != '' && phone != '') {
//         var data = {
//             'name': name,
//             'email': email,
//             'password': password,
//             'rpassword': rpassword,
//             'phone': phone
//         };
//         // document.getElementById("submit").disabled = false;
//         $.ajax({
//             type: 'POST',
//             url: 'signup.php',
//             data: data,
//             dataType: 'JSON',
//             success: function (data) {
//                 getOTPNumberCode = data;
//                 document.getElementById('otpVerify').style.display = "block";
//                 document.getElementById('resendOTP').style.display = 'block';
//                 document.getElementById('submitOTP').style.display = 'block';
//                 document.getElementById('head').style.display = 'block';
//                 document.getElementById('hidden').style.display = 'none';
//                 document.getElementById('submit').style.display = 'none';
//             }
//         });
//     } else {
//         alert("please fill all fields");
//     }
// }

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
        success: function (data) {
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
            success: function (data) {
                jQuery('#submitOTP').html('OTP verified');
                alert('OTP is correct,Login Please');
                setTimeout(function () {
                    window.location.href = 'index.php';
                }, 1000);
            }
        });

    }
}

//search function
$(document).ready(function () {
    $("#searchmodalbox").keyup(function () {
        var query = $(this).val();
        if (query != "") {
            $.ajax({
                url: 'ajax-live-search.php',
                method: 'POST',
                data: {
                    query: query
                },
                success: function (data) {
                    $('#search_result').html(data);
                    $('#search_result').css('display', 'block');
                    $("#live_search").focusout(function () {
                        $('#search_result').css('display', 'none');
                    });
                    $("#live_search").focusin(function () {
                        $('#search_result').css('display', 'block');
                    });
                }
            });
        } else {
            $('#search_result').css('display', 'none');
        }
    });
});

