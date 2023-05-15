<?php
include 'assets/nav-links.php';
if (isset($_SESSION['username'])) {
?>
    <html>

    <head>
        <?php
        include 'assets/navbar.php';
        include 'assets/connection.php';
        include 'countries.php';
        $useremail = $_SESSION['useremail'];
        $funds = mysqli_query($db, "SELECT * FROM campaigns_data where email='$useremail' and status='Accepted' ");
        $rej = mysqli_query($db, "SELECT * FROM campaigns_data where email='$useremail' and status='Rejected' ");
        $pend = mysqli_query($db, "SELECT * FROM campaigns_data where email='$useremail'and status='Pending' ");
        $users = mysqli_query($db, "SELECT * FROM users where email='$useremail' ");
        ?>
        <title>Account Settings</title>
    </head>

    <body>

        <div class="row row-col-1 row-col-lg-2 row-col-md-1 d-flex justify-content-around mx-5">
            <div class="d-flex align-items-center col-12 col-lg-2 ">
                <div class="nav flex-column nav-pills mx-auto mr-auto" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <button class="nav-link active border mt-2 border-primary " id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Profile</button>
                    <button class="nav-link border mt-2 border-primary " id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Password</button>
                </div>
            </div>
            <div class="tab-content col-12 col-lg-10 " id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                    <div class="container rounded bg-white mt-lg-5 mt-2 mb-5 mx-auto mr-auto shadow rounded-1">
                        <div class="row">
                            <?php
                            while ($data = mysqli_fetch_array($users)) {
                            ?>
                                <form action="profile-edit.php" class=" d-flex justify-content-around mx-ato mr-auto row row-col-1 row-col-lg-2" enctype="multipart/form-data" method="POST">
                                    <div class="col-lg-4 col-10 border-right">
                                        <div class="d-flex flex-column align-items-center text-center">
                                            <div class="container1">
                                                <div class="input">
                                                    <?php
                                                    $pic = "images/" . $data['profile_pic'];
                                                    ?>
                                                    <input name="profile_pic" id="file" type="file">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-7 col-12 border-right">
                                        <div class="p-lg-3 py-lg-5">
                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <h4 class="text-right">Profile Settings</h4>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-12 mb-2">
                                                    <label class="labels">Name</label>
                                                    <input type="text" name="name" class="form-control" placeholder="Name" value="<?php echo $data['name']; ?>" required>
                                                </div>
                                                <div class="col-12 mb-2">
                                                    <label class="labels">Email ID</label>
                                                    <input type="email" name="email" class="form-control" placeholder="example@gmail.com" value="<?php echo $data['email']; ?>" required>
                                                </div>
                                                <div class="col-12 mb-2">
                                                    <label class="labels">Mobile Number</label>
                                                    <input type="text" name="phone" class="form-control" placeholder="+91 XXXXX XXXXX" value="<?php echo $data['phone']; ?>" required>
                                                </div>
                                                <div class="col-12 mb-2">
                                                    <label class="labels">City</label>
                                                    <input type="text" name="country" class="form-control" placeholder="Country" value="<?php echo $data['country']; ?>">
                                                </div>
                                                <!-- <select class="form-select" class="form-control" id="floatingSelect" name="country" aria-label="Floating label select example"> -->
                                                <?php
                                                // for ($i = 0; $i < sizeof($countries); $i++) {
                                                ?>
                                                <!-- <option <?php if ($data['country'] == $countries[$i]) echo 'selected'; ?> value="<?= $countries[$i] ?>"><?= $countries[$i] ?></option> -->
                                                <?php
                                                // }
                                                ?>
                                                <!-- </select> -->
                                                <div class="mt-lg-5 mt-3 mb-0 text-center"><button class="btn btn-primary profile-button" name="submit" type="submit">Save Profile</button></div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                <center>
                    <h2 class="mt-3">Change/Update password</h2>
                </center>
                <form action="update-password.php" method="post">
                    <div class="row row-col-1 m-lg-5 mb-3 shadow rounded-1">
                        <div class="col-12">
                            <div class="card p-lg-5 border-0" style="height:max-content;">
                                <div class="card-body d-flex flex-column align-content-center">
                                    <div class="col-12 mb-3"><label class="labels">Current Password</label><input type="password" class="form-control" name="password" placeholder="Enter Current Password" value="" required></div>
                                    <div class="col-12 mb-3"><label class="labels">New Password</label><input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" onkeyup="checkpass();" id="password" class="pr-password form-control" name="new-password" placeholder="Set New Password" value="" required>
                                        <div id="strengthMessage" class=" "></div>
                                    </div>
                                    <div class="col-12 mb-1"><label class="labels">Reenter New Password</label><input type="password" onkeyup="checkpass();" id="rpassword" class="form-control" name="rnew-password" placeholder="Set New Password" value="" required></div>
                                    <label id="message" class="mb-3"></label>
                                    <button class="btn btn-danger text-center col-12" id="submit" name="submit">Change Password</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        </div>
        <?php
        include 'assets/footer.php';
        ?>
    </body>
    <script>
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

        $(document).ready(function() {
            $('#password').keyup(function() {
                $('#strengthMessage').html(checkStrength($('#password').val()))
            })

            function checkStrength(password) {
                var strength = 0
                if (password.length < 6) {
                    $('#strengthMessage').removeClass()
                    $('#strengthMessage').addClass('Short')
                    document.getElementById("submit").disabled = true;
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
                    document.getElementById("submit").disabled = true;
                    return 'Weak'
                } else if (strength == 2) {
                    $('#strengthMessage').removeClass()
                    $('#strengthMessage').addClass('Good')
                    document.getElementById("submit").disabled = false;

                    return 'Good'
                } else {
                    $('#strengthMessage').removeClass()
                    $('#strengthMessage').addClass('Strong')
                    document.getElementById("submit").disabled = false;

                    return 'Strong'
                }
            }
        });
    </script>
    <style>
        .Short {
            width: 100%;
            background-color: #dc3545;
            margin-top: 5px;
            height: 3px;
            color: #dc3545;
            font-weight: 500;
            font-size: 16px;
        }

        .Weak {
            width: 100%;
            background-color: #ffc107;
            margin-top: 5px;
            height: 3px;
            color: #ffc107;
            font-weight: 500;
            font-size: 16px;
        }

        .Good {
            width: 100%;
            background-color: #28a745;
            margin-top: 5px;
            height: 3px;
            color: #28a745;
            font-weight: 500;
            font-size: 16px;
        }

        .Strong {
            width: 100%;
            background-color: #d39e00;
            margin-top: 5px;
            height: 3px;
            color: #d39e00;
            font-weight: 500;
            font-size: 16px;
        }

        .container {
            padding-top: 0;
            padding-bottom: 5px;
        }

        .row {
            --bs-gutter-x: 0rem !important;
        }

        @media (max-width: 600px) {
            #uploadImg {
                width: 120%;
                height: 120%;
            }

            .form {
                width: 95% !important;
            }
        }

        table {
            margin-left: auto;
            margin-right: auto;
            width: 180vh !important;
            border: 1px solid black !important;
        }

        .container1 {
            /* width: 200px; */
            margin: 50px auto;
            font-family: sans-serif;
        }

        .hidden {
            display: none;
        }

        #file {
            display: none;
            margin: 0 auto;
        }

        #upload {
            display: block;
            padding: 10px 25px;
            border: 0;
            margin: 0 auto;
            font-size: 15px;
            letter-spacing: 0.05em;
            cursor: pointer;
            background: #216e69;
            color: #fff;
            outline: none;
            transition: .3s ease-in-out;
        }

        #uploadImg {
            display: block;
            margin: 0 auto 15px;
            margin-top: 0 !important;
        }
    </style>

    <script>
        $(function() {
            var container1 = $('.container1'),
                inputFile = $('#file'),
                img, btn, txt = 'Edit Picture',
                txtAfter = 'Change';

            if (!container1.find('#upload').length) {
                container1.find('.input').append('<input type="button" class="rounded-2 mt-lg-2" value="' + txt + '" id="upload">');
                btn = $('#upload');
                container1.prepend('<img src="<?php echo $pic; ?>" class="rounded-circle" class="hidden" alt="Uploaded file" id="uploadImg" width="250px" height="250px">');
                img = $('#uploadImg');
            }

            btn.on('click', function() {
                img.animate({
                    opacity: 0
                }, 300);
                inputFile.click();
            });

            inputFile.on('change', function(e) {
                container1.find('label').html(inputFile.val());

                var i = 0;
                for (i; i < e.originalEvent.srcElement.files.length; i++) {
                    var file = e.originalEvent.srcElement.files[i],
                        reader = new FileReader();

                    reader.onloadend = function() {
                        img.attr('src', reader.result).animate({
                            opacity: 1
                        }, 700);
                    }
                    reader.readAsDataURL(file);
                    img.removeClass('hidden');
                }

                btn.val(txtAfter);
            });
        });
    </script>

    </html>
<?php
} else {
    echo '<script>alert("Login to view account settings")</script>';
    echo '<script>window.location = "index.php"</script>';
}
