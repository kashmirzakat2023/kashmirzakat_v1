<?php
include 'assets/nav-links.php'; ?>
<html>

<head>
    <?php
    include 'assets/navbar.php';
    include 'assets/connection.php';
    $useremail = $_SESSION['useremail'];
    $funds = mysqli_query($db, "SELECT * FROM accepted_form where email='$useremail' and status='Accepted' ");
    $rej = mysqli_query($db, "SELECT * FROM accepted_form where email='$useremail' and status='Rejected' ");
    $pend = mysqli_query($db, "SELECT * FROM funds_form where email='$useremail' ");
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
                                            <div class="col-12 mb-2"><label class="labels">Name</label><input type="text" name="name" class="form-control" placeholder="Name" value="<?php echo $data['name']; ?>"></div>
                                            <div class="col-12 mb-2"><label class="labels">Email ID</label><input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $data['email']; ?>"></div>
                                            <div class="col-12 mb-2"><label class="labels">Mobile Number</label><input type="text" name="phone" class="form-control" placeholder="Phone number" value="<?php echo $data['phone']; ?>"></div>
                                            <div class="col-12 mb-2"><label class="labels">Country</label>
                                                <select class="form-select" class="form-control" id="floatingSelect" name="country" name="country" aria-label="Floating label select example">
                                                    <option><?php echo $data['country']; ?></option>
                                                    <option value="Afghanistan">Afghanistan</option>
                                                    <option value="Aland">Aland Islands</option>
                                                    <option value="Albania">Albania</option>
                                                    <option value="Algeria">Algeria</option>
                                                    <option value="American">American Samoa</option>
                                                    <option value="Andorra">Andorra</option>
                                                    <option value="Angola">Angola</option>
                                                    <option value="Anguilla">Anguilla</option>
                                                    <option value="Antarctica">Antarctica</option>
                                                    <option value="Antigua">Antigua and Barbuda</option>
                                                    <option value="Argentina">Argentina</option>
                                                    <option value="Armenia">Armenia</option>
                                                    <option value="Aruba">Aruba</option>
                                                    <option value="Australia">Australia</option>
                                                    <option value="Austria">Austria</option>
                                                    <option value="Azerbaijan">Azerbaijan</option>
                                                    <option value="Bahamas">Bahamas</option>
                                                    <option value="Bahrain">Bahrain</option>
                                                    <option value="Bangladesh">Bangladesh</option>
                                                    <option value="Barbados">Barbados</option>
                                                    <option value="Belarus">Belarus</option>
                                                    <option value="Belgium">Belgium</option>
                                                    <option value="Belize">Belize</option>
                                                    <option value="Benin">Benin</option>
                                                    <option value="Bermuda">Bermuda</option>
                                                    <option value="Bhutan">Bhutan</option>
                                                    <option value="Bolivia">Bolivia</option>
                                                    <option value="Bonaire">Bonaire, Sint Eustatius and Saba</option>
                                                    <option value="Bosnia">Bosnia and Herzegovina</option>
                                                    <option value="Botswana">Botswana</option>
                                                    <option value="Bouvet">Bouvet Island</option>
                                                    <option value="Brazil">Brazil</option>
                                                    <option value="British">British Indian Ocean Territory</option>
                                                    <option value="Brunei">Brunei Darussalam</option>
                                                    <option value="Bulgaria">Bulgaria</option>
                                                    <option value="Burkina">Burkina Faso</option>
                                                    <option value="Burundi">Burundi</option>
                                                    <option value="Cambodia">Cambodia</option>
                                                    <option value="Cameroon">Cameroon</option>
                                                    <option value="Canada">Canada</option>
                                                    <option value="Cape">Cape Verde</option>
                                                    <option value="Cayman">Cayman Islands</option>
                                                    <option value="Central">Central African Republic</option>
                                                    <option value="Chad">Chad</option>
                                                    <option value="Chile">Chile</option>
                                                    <option value="China">China</option>
                                                    <option value="Christmas">Christmas Island</option>
                                                    <option value="Cocos">Cocos (Keeling) Islands</option>
                                                    <option value="Colombia">Colombia</option>
                                                    <option value="Comoros">Comoros</option>
                                                    <option value="Congo">Congo</option>
                                                    <option value="Congo">Congo, Democratic Republic of the Congo</option>
                                                    <option value="Cook">Cook Islands</option>
                                                    <option value="Costa">Costa Rica</option>
                                                    <option value="Cote">Cote D'Ivoire</option>
                                                    <option value="Croatia">Croatia</option>
                                                    <option value="Cuba">Cuba</option>
                                                    <option value="Curacao">Curacao</option>
                                                    <option value="Cyprus">Cyprus</option>
                                                    <option value="Czech">Czech Republic</option>
                                                    <option value="Denmark">Denmark</option>
                                                    <option value="Djibouti">Djibouti</option>
                                                    <option value="Dominica">Dominica</option>
                                                    <option value="Dominican">Dominican Republic</option>
                                                    <option value="Ecuador">Ecuador</option>
                                                    <option value="Egypt">Egypt</option>
                                                    <option value="El">El Salvador</option>
                                                    <option value="Equatorial">Equatorial Guinea</option>
                                                    <option value="Eritrea">Eritrea</option>
                                                    <option value="Estonia">Estonia</option>
                                                    <option value="Ethiopia">Ethiopia</option>
                                                    <option value="Falkland">Falkland Islands (Malvinas)</option>
                                                    <option value="Faroe">Faroe Islands</option>
                                                    <option value="Fiji">Fiji</option>
                                                    <option value="Finland">Finland</option>
                                                    <option value="France">France</option>
                                                    <option value="French">French Guiana</option>
                                                    <option value="French">French Polynesia</option>
                                                    <option value="French">French Southern Territories</option>
                                                    <option value="Gabon">Gabon</option>
                                                    <option value="Gambia">Gambia</option>
                                                    <option value="Georgia">Georgia</option>
                                                    <option value="Germany">Germany</option>
                                                    <option value="Ghana">Ghana</option>
                                                    <option value="Gibraltar">Gibraltar</option>
                                                    <option value="Greece">Greece</option>
                                                    <option value="Greenland">Greenland</option>
                                                    <option value="Grenada">Grenada</option>
                                                    <option value="Guadeloupe">Guadeloupe</option>
                                                    <option value="Guam">Guam</option>
                                                    <option value="Guatemala">Guatemala</option>
                                                    <option value="Guernsey">Guernsey</option>
                                                    <option value="Guinea">Guinea</option>
                                                    <option value="Guinea">Guinea-Bissau</option>
                                                    <option value="Guyana">Guyana</option>
                                                    <option value="Haiti">Haiti</option>
                                                    <option value="Heard">Heard Island and Mcdonald Islands</option>
                                                    <option value="Holy">Holy See (Vatican City State)</option>
                                                    <option value="Honduras">Honduras</option>
                                                    <option value="Hong">Hong Kong</option>
                                                    <option value="Hungary">Hungary</option>
                                                    <option value="Iceland">Iceland</option>
                                                    <option value="India">India</option>
                                                    <option value="Indonesia">Indonesia</option>
                                                    <option value="Iran">Iran, Islamic Republic of</option>
                                                    <option value="Iraq">Iraq</option>
                                                    <option value="Ireland">Ireland</option>
                                                    <option value="Isle">Isle of Man</option>
                                                    <option value="Israel">Israel</option>
                                                    <option value="Italy">Italy</option>
                                                    <option value="Jamaica">Jamaica</option>
                                                    <option value="Japan">Japan</option>
                                                    <option value="Jersey">Jersey</option>
                                                    <option value="Jordan">Jordan</option>
                                                    <option value="Kazakhstan">Kazakhstan</option>
                                                    <option value="Kenya">Kenya</option>
                                                    <option value="Kiribati">Kiribati</option>
                                                    <option value="Korea">Korea, Democratic People's Republic of</option>
                                                    <option value="Korea">Korea, Republic of</option>
                                                    <option value="Kosovo">Kosovo</option>
                                                    <option value="Kuwait">Kuwait</option>
                                                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                    <option value="Lao">Lao People's Democratic Republic</option>
                                                    <option value="Latvia">Latvia</option>
                                                    <option value="Lebanon">Lebanon</option>
                                                    <option value="Lesotho">Lesotho</option>
                                                    <option value="Liberia">Liberia</option>
                                                    <option value="Libyan">Libyan Arab Jamahiriya</option>
                                                    <option value="Liechtenstein">Liechtenstein</option>
                                                    <option value="Lithuania">Lithuania</option>
                                                    <option value="Luxembourg">Luxembourg</option>
                                                    <option value="Macao">Macao</option>
                                                    <option value="Macedonia">Macedonia, the Former Yugoslav Republic of</option>
                                                    <option value="Madagascar">Madagascar</option>
                                                    <option value="Malawi">Malawi</option>
                                                    <option value="Malaysia">Malaysia</option>
                                                    <option value="Maldives">Maldives</option>
                                                    <option value="Mali">Mali</option>
                                                    <option value="Malta">Malta</option>
                                                    <option value="Marshall">Marshall Islands</option>
                                                    <option value="Martinique">Martinique</option>
                                                    <option value="Mauritania">Mauritania</option>
                                                    <option value="Mauritius">Mauritius</option>
                                                    <option value="Mayotte">Mayotte</option>
                                                    <option value="Mexico">Mexico</option>
                                                    <option value="Micronesia">Micronesia, Federated States of</option>
                                                    <option value="Moldova">Moldova, Republic of</option>
                                                    <option value="Monaco">Monaco</option>
                                                    <option value="Mongolia">Mongolia</option>
                                                    <option value="Montenegro">Montenegro</option>
                                                    <option value="Montserrat">Montserrat</option>
                                                    <option value="Morocco">Morocco</option>
                                                    <option value="Mozambique">Mozambique</option>
                                                    <option value="Myanmar">Myanmar</option>
                                                    <option value="Namibia">Namibia</option>
                                                    <option value="Nauru">Nauru</option>
                                                    <option value="Nepal">Nepal</option>
                                                    <option value="Netherlands">Netherlands</option>
                                                    <option value="Netherlands">Netherlands Antilles</option>
                                                    <option value="New">New Caledonia</option>
                                                    <option value="New">New Zealand</option>
                                                    <option value="Nicaragua">Nicaragua</option>
                                                    <option value="Niger">Niger</option>
                                                    <option value="Nigeria">Nigeria</option>
                                                    <option value="Niue">Niue</option>
                                                    <option value="Norfolk">Norfolk Island</option>
                                                    <option value="Northern">Northern Mariana Islands</option>
                                                    <option value="Norway">Norway</option>
                                                    <option value="Oman">Oman</option>
                                                    <option value="Pakistan">Pakistan</option>
                                                    <option value="Palau">Palau</option>
                                                    <option value="Palestinian">Palestinian Territory, Occupied</option>
                                                    <option value="Panama">Panama</option>
                                                    <option value="Papua">Papua New Guinea</option>
                                                    <option value="Paraguay">Paraguay</option>
                                                    <option value="Peru">Peru</option>
                                                    <option value="Philippines">Philippines</option>
                                                    <option value="Pitcairn">Pitcairn</option>
                                                    <option value="Poland">Poland</option>
                                                    <option value="Portugal">Portugal</option>
                                                    <option value="Puerto">Puerto Rico</option>
                                                    <option value="Qatar">Qatar</option>
                                                    <option value="Reunion">Reunion</option>
                                                    <option value="Romania">Romania</option>
                                                    <option value="Russian">Russian Federation</option>
                                                    <option value="Rwanda">Rwanda</option>
                                                    <option value="Saint">Saint Barthelemy</option>
                                                    <option value="Saint">Saint Helena</option>
                                                    <option value="Saint">Saint Kitts and Nevis</option>
                                                    <option value="Saint">Saint Lucia</option>
                                                    <option value="Saint">Saint Martin</option>
                                                    <option value="Saint">Saint Pierre and Miquelon</option>
                                                    <option value="Saint">Saint Vincent and the Grenadines</option>
                                                    <option value="Samoa">Samoa</option>
                                                    <option value="San">San Marino</option>
                                                    <option value="Sao">Sao Tome and Principe</option>
                                                    <option value="Saudi">Saudi Arabia</option>
                                                    <option value="Senegal">Senegal</option>
                                                    <option value="Serbia">Serbia</option>
                                                    <option value="Serbia">Serbia and Montenegro</option>
                                                    <option value="Seychelles">Seychelles</option>
                                                    <option value="Sierra">Sierra Leone</option>
                                                    <option value="Singapore">Singapore</option>
                                                    <option value="Sint">Sint Maarten</option>
                                                    <option value="Slovakia">Slovakia</option>
                                                    <option value="Slovenia">Slovenia</option>
                                                    <option value="Solomon">Solomon Islands</option>
                                                    <option value="Somalia">Somalia</option>
                                                    <option value="South">South Africa</option>
                                                    <option value="South">South Georgia and the South Sandwich Islands</option>
                                                    <option value="South">South Sudan</option>
                                                    <option value="Spain">Spain</option>
                                                    <option value="Sri">Sri Lanka</option>
                                                    <option value="Sudan">Sudan</option>
                                                    <option value="Suriname">Suriname</option>
                                                    <option value="Svalbard">Svalbard and Jan Mayen</option>
                                                    <option value="Swaziland">Swaziland</option>
                                                    <option value="Sweden">Sweden</option>
                                                    <option value="Switzerland">Switzerland</option>
                                                    <option value="Syrian">Syrian Arab Republic</option>
                                                    <option value="Taiwan">Taiwan, Province of China</option>
                                                    <option value="Tajikistan">Tajikistan</option>
                                                    <option value="Tanzania">Tanzania, United Republic of</option>
                                                    <option value="Thailand">Thailand</option>
                                                    <option value="Timor">Timor-Leste</option>
                                                    <option value="Togo">Togo</option>
                                                    <option value="Tokelau">Tokelau</option>
                                                    <option value="Tonga">Tonga</option>
                                                    <option value="Trinidad">Trinidad and Tobago</option>
                                                    <option value="Tunisia">Tunisia</option>
                                                    <option value="Turkey">Turkey</option>
                                                    <option value="Turkmenistan">Turkmenistan</option>
                                                    <option value="Turks">Turks and Caicos Islands</option>
                                                    <option value="Tuvalu">Tuvalu</option>
                                                    <option value="Uganda">Uganda</option>
                                                    <option value="Ukraine">Ukraine</option>
                                                    <option value="United">United Arab Emirates</option>
                                                    <option value="United">United Kingdom</option>
                                                    <option value="United">United States</option>
                                                    <option value="United">United States Minor Outlying Islands</option>
                                                    <option value="Uruguay">Uruguay</option>
                                                    <option value="Uzbekistan">Uzbekistan</option>
                                                    <option value="Vanuatu">Vanuatu</option>
                                                    <option value="Venezuela">Venezuela</option>
                                                    <option value="Viet">Viet Nam</option>
                                                    <option value="Virgin">Virgin Islands, British</option>
                                                    <option value="Virgin">Virgin Islands, U.s.</option>
                                                    <option value="Wallis">Wallis and Futuna</option>
                                                    <option value="Western">Western Sahara</option>
                                                    <option value="Yemen">Yemen</option>
                                                    <option value="Zambia">Zambia</option>
                                                    <option value="Zimbabwe">Zimbabwe</option>
                                                </select>
                                            </div>
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
                                <button class="btn btn-danger text-center col-12"id="submit" name="submit">Change Password</button>
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
        #uploadImg{
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