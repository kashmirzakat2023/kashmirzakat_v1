<?php
include 'assets/nav-links.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <script src="js/drag-drop.js" defer></script>
    <script>
        window.addEventListener('beforeunload', function(e) {
            // Cancel the event
            e.preventDefault(); // If you prevent default behavior in Mozilla Firefox prompt will always be shown
            // Chrome requires returnValue to be set
            e.returnValue = '';
        });
    </script>
    <title>Fund Raise Form</title>

</head>

<body>
    <?php
    if (isset($_SESSION['username'])) {
        include 'assets/navbar.php';
    ?>

        <form class="col-8 col-sm-9 mb-5 fund-raise " method="post" enctype="multipart/form-data" action="funds-store.php">
            <h1 class="text-center fw-bolder py-2">Basic Information</h1>

            <label for="img" class=" text-danger mb-1" style="display: none;" id="size"> *Image size must be less than 2 MB</label>
            <label for="img" class=" text-danger mb-1" style="display: none;" id="reso"> *Image Image resolution must be more than 800*400 px</label>
            <div id="drop-zone" class="mb-4" style="cursor: pointer;">
                <img src="" id="img" alt="profile image">
                <p class=" text-center card-text p-5" id="para">
                    <i class="fas fa-cloud-upload text-secondary" style="font-size: 150px;"></i> <br><br>
                    <b> Drag and Drop an image / Click to Select an image</b> <br><br>
                    Max file size is 2 MB. Allowed file types : JPEG, PNG and JPG <br> Minimum size 800*400
                </p>
                <input type="file" id="myfile" name="profile_pic" onchange="Filevalidation(this.id); " accept="image/png,image/jpeg,image/jpg" hidden>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="cause_title" placeholder="Enter cause title(max-250 letters)">
                <label for="floatingInput">Title of cause <label class=" fw-bold text-danger">*</label></label>
            </div>

            <div class="form-floating mb-3">
                <select class="form-select" id="floatingSelect" name="purpose" aria-label="Floating label select example">
                    <option selected>Purpose for Raising Funds</option>
                    <option value="Education">Education</option>
                    <option value="Health">Health</option>
                    <option value="Livelihood">Livelihood</option>
                    <!-- <option value="Scholarship">scholarship</option> -->
                    <option value="Others">others</option>
                </select>
                <label for="floatingSelect">Select <label class=" fw-bold text-danger">*</label></label>
            </div>
            <div class="form-floating mb-3">
                <input type="number" class="form-control" name="amount" id="floatingInput" placeholder="amount">
                <label for="floatingInput">Amount (in ₹) <label class=" fw-bold text-danger">*</label></label>
            </div>

            <div class="form-floating mb-3">
                <select class="form-select" id="floatingSelect" name="country" aria-label="Floating label select example">
                    <!-- <input type="text" class="form-control" name="location" id="floatingInput" placeholder="" > -->
                    <option>Select your country</option>
                    <option value="AF">Afghanistan</option>
                    <option value="AX">Aland Islands</option>
                    <option value="AL">Albania</option>
                    <option value="DZ">Algeria</option>
                    <option value="AS">American Samoa</option>
                    <option value="AD">Andorra</option>
                    <option value="AO">Angola</option>
                    <option value="AI">Anguilla</option>
                    <option value="AQ">Antarctica</option>
                    <option value="AG">Antigua and Barbuda</option>
                    <option value="AR">Argentina</option>
                    <option value="AM">Armenia</option>
                    <option value="AW">Aruba</option>
                    <option value="AU">Australia</option>
                    <option value="AT">Austria</option>
                    <option value="AZ">Azerbaijan</option>
                    <option value="BS">Bahamas</option>
                    <option value="BH">Bahrain</option>
                    <option value="BD">Bangladesh</option>
                    <option value="BB">Barbados</option>
                    <option value="BY">Belarus</option>
                    <option value="BE">Belgium</option>
                    <option value="BZ">Belize</option>
                    <option value="BJ">Benin</option>
                    <option value="BM">Bermuda</option>
                    <option value="BT">Bhutan</option>
                    <option value="BO">Bolivia</option>
                    <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                    <option value="BA">Bosnia and Herzegovina</option>
                    <option value="BW">Botswana</option>
                    <option value="BV">Bouvet Island</option>
                    <option value="BR">Brazil</option>
                    <option value="IO">British Indian Ocean Territory</option>
                    <option value="BN">Brunei Darussalam</option>
                    <option value="BG">Bulgaria</option>
                    <option value="BF">Burkina Faso</option>
                    <option value="BI">Burundi</option>
                    <option value="KH">Cambodia</option>
                    <option value="CM">Cameroon</option>
                    <option value="CA">Canada</option>
                    <option value="CV">Cape Verde</option>
                    <option value="KY">Cayman Islands</option>
                    <option value="CF">Central African Republic</option>
                    <option value="TD">Chad</option>
                    <option value="CL">Chile</option>
                    <option value="CN">China</option>
                    <option value="CX">Christmas Island</option>
                    <option value="CC">Cocos (Keeling) Islands</option>
                    <option value="CO">Colombia</option>
                    <option value="KM">Comoros</option>
                    <option value="CG">Congo</option>
                    <option value="CD">Congo, Democratic Republic of the Congo</option>
                    <option value="CK">Cook Islands</option>
                    <option value="CR">Costa Rica</option>
                    <option value="CI">Cote D'Ivoire</option>
                    <option value="HR">Croatia</option>
                    <option value="CU">Cuba</option>
                    <option value="CW">Curacao</option>
                    <option value="CY">Cyprus</option>
                    <option value="CZ">Czech Republic</option>
                    <option value="DK">Denmark</option>
                    <option value="DJ">Djibouti</option>
                    <option value="DM">Dominica</option>
                    <option value="DO">Dominican Republic</option>
                    <option value="EC">Ecuador</option>
                    <option value="EG">Egypt</option>
                    <option value="SV">El Salvador</option>
                    <option value="GQ">Equatorial Guinea</option>
                    <option value="ER">Eritrea</option>
                    <option value="EE">Estonia</option>
                    <option value="ET">Ethiopia</option>
                    <option value="FK">Falkland Islands (Malvinas)</option>
                    <option value="FO">Faroe Islands</option>
                    <option value="FJ">Fiji</option>
                    <option value="FI">Finland</option>
                    <option value="FR">France</option>
                    <option value="GF">French Guiana</option>
                    <option value="PF">French Polynesia</option>
                    <option value="TF">French Southern Territories</option>
                    <option value="GA">Gabon</option>
                    <option value="GM">Gambia</option>
                    <option value="GE">Georgia</option>
                    <option value="DE">Germany</option>
                    <option value="GH">Ghana</option>
                    <option value="GI">Gibraltar</option>
                    <option value="GR">Greece</option>
                    <option value="GL">Greenland</option>
                    <option value="GD">Grenada</option>
                    <option value="GP">Guadeloupe</option>
                    <option value="GU">Guam</option>
                    <option value="GT">Guatemala</option>
                    <option value="GG">Guernsey</option>
                    <option value="GN">Guinea</option>
                    <option value="GW">Guinea-Bissau</option>
                    <option value="GY">Guyana</option>
                    <option value="HT">Haiti</option>
                    <option value="HM">Heard Island and Mcdonald Islands</option>
                    <option value="VA">Holy See (Vatican City State)</option>
                    <option value="HN">Honduras</option>
                    <option value="HK">Hong Kong</option>
                    <option value="HU">Hungary</option>
                    <option value="IS">Iceland</option>
                    <option value="IN">India</option>
                    <option value="ID">Indonesia</option>
                    <option value="IR">Iran, Islamic Republic of</option>
                    <option value="IQ">Iraq</option>
                    <option value="IE">Ireland</option>
                    <option value="IM">Isle of Man</option>
                    <option value="IL">Israel</option>
                    <option value="IT">Italy</option>
                    <option value="JM">Jamaica</option>
                    <option value="JP">Japan</option>
                    <option value="JE">Jersey</option>
                    <option value="JO">Jordan</option>
                    <option value="KZ">Kazakhstan</option>
                    <option value="KE">Kenya</option>
                    <option value="KI">Kiribati</option>
                    <option value="KP">Korea, Democratic People's Republic of</option>
                    <option value="KR">Korea, Republic of</option>
                    <option value="XK">Kosovo</option>
                    <option value="KW">Kuwait</option>
                    <option value="KG">Kyrgyzstan</option>
                    <option value="LA">Lao People's Democratic Republic</option>
                    <option value="LV">Latvia</option>
                    <option value="LB">Lebanon</option>
                    <option value="LS">Lesotho</option>
                    <option value="LR">Liberia</option>
                    <option value="LY">Libyan Arab Jamahiriya</option>
                    <option value="LI">Liechtenstein</option>
                    <option value="LT">Lithuania</option>
                    <option value="LU">Luxembourg</option>
                    <option value="MO">Macao</option>
                    <option value="MK">Macedonia, the Former Yugoslav Republic of</option>
                    <option value="MG">Madagascar</option>
                    <option value="MW">Malawi</option>
                    <option value="MY">Malaysia</option>
                    <option value="MV">Maldives</option>
                    <option value="ML">Mali</option>
                    <option value="MT">Malta</option>
                    <option value="MH">Marshall Islands</option>
                    <option value="MQ">Martinique</option>
                    <option value="MR">Mauritania</option>
                    <option value="MU">Mauritius</option>
                    <option value="YT">Mayotte</option>
                    <option value="MX">Mexico</option>
                    <option value="FM">Micronesia, Federated States of</option>
                    <option value="MD">Moldova, Republic of</option>
                    <option value="MC">Monaco</option>
                    <option value="MN">Mongolia</option>
                    <option value="ME">Montenegro</option>
                    <option value="MS">Montserrat</option>
                    <option value="MA">Morocco</option>
                    <option value="MZ">Mozambique</option>
                    <option value="MM">Myanmar</option>
                    <option value="NA">Namibia</option>
                    <option value="NR">Nauru</option>
                    <option value="NP">Nepal</option>
                    <option value="NL">Netherlands</option>
                    <option value="AN">Netherlands Antilles</option>
                    <option value="NC">New Caledonia</option>
                    <option value="NZ">New Zealand</option>
                    <option value="NI">Nicaragua</option>
                    <option value="NE">Niger</option>
                    <option value="NG">Nigeria</option>
                    <option value="NU">Niue</option>
                    <option value="NF">Norfolk Island</option>
                    <option value="MP">Northern Mariana Islands</option>
                    <option value="NO">Norway</option>
                    <option value="OM">Oman</option>
                    <option value="PK">Pakistan</option>
                    <option value="PW">Palau</option>
                    <option value="PS">Palestinian Territory, Occupied</option>
                    <option value="PA">Panama</option>
                    <option value="PG">Papua New Guinea</option>
                    <option value="PY">Paraguay</option>
                    <option value="PE">Peru</option>
                    <option value="PH">Philippines</option>
                    <option value="PN">Pitcairn</option>
                    <option value="PL">Poland</option>
                    <option value="PT">Portugal</option>
                    <option value="PR">Puerto Rico</option>
                    <option value="QA">Qatar</option>
                    <option value="RE">Reunion</option>
                    <option value="RO">Romania</option>
                    <option value="RU">Russian Federation</option>
                    <option value="RW">Rwanda</option>
                    <option value="BL">Saint Barthelemy</option>
                    <option value="SH">Saint Helena</option>
                    <option value="KN">Saint Kitts and Nevis</option>
                    <option value="LC">Saint Lucia</option>
                    <option value="MF">Saint Martin</option>
                    <option value="PM">Saint Pierre and Miquelon</option>
                    <option value="VC">Saint Vincent and the Grenadines</option>
                    <option value="WS">Samoa</option>
                    <option value="SM">San Marino</option>
                    <option value="ST">Sao Tome and Principe</option>
                    <option value="SA">Saudi Arabia</option>
                    <option value="SN">Senegal</option>
                    <option value="RS">Serbia</option>
                    <option value="CS">Serbia and Montenegro</option>
                    <option value="SC">Seychelles</option>
                    <option value="SL">Sierra Leone</option>
                    <option value="SG">Singapore</option>
                    <option value="SX">Sint Maarten</option>
                    <option value="SK">Slovakia</option>
                    <option value="SI">Slovenia</option>
                    <option value="SB">Solomon Islands</option>
                    <option value="SO">Somalia</option>
                    <option value="ZA">South Africa</option>
                    <option value="GS">South Georgia and the South Sandwich Islands</option>
                    <option value="SS">South Sudan</option>
                    <option value="ES">Spain</option>
                    <option value="LK">Sri Lanka</option>
                    <option value="SD">Sudan</option>
                    <option value="SR">Suriname</option>
                    <option value="SJ">Svalbard and Jan Mayen</option>
                    <option value="SZ">Swaziland</option>
                    <option value="SE">Sweden</option>
                    <option value="CH">Switzerland</option>
                    <option value="SY">Syrian Arab Republic</option>
                    <option value="TW">Taiwan, Province of China</option>
                    <option value="TJ">Tajikistan</option>
                    <option value="TZ">Tanzania, United Republic of</option>
                    <option value="TH">Thailand</option>
                    <option value="TL">Timor-Leste</option>
                    <option value="TG">Togo</option>
                    <option value="TK">Tokelau</option>
                    <option value="TO">Tonga</option>
                    <option value="TT">Trinidad and Tobago</option>
                    <option value="TN">Tunisia</option>
                    <option value="TR">Turkey</option>
                    <option value="TM">Turkmenistan</option>
                    <option value="TC">Turks and Caicos Islands</option>
                    <option value="TV">Tuvalu</option>
                    <option value="UG">Uganda</option>
                    <option value="UA">Ukraine</option>
                    <option value="AE">United Arab Emirates</option>
                    <option value="GB">United Kingdom</option>
                    <option value="US">United States</option>
                    <option value="UM">United States Minor Outlying Islands</option>
                    <option value="UY">Uruguay</option>
                    <option value="UZ">Uzbekistan</option>
                    <option value="VU">Vanuatu</option>
                    <option value="VE">Venezuela</option>
                    <option value="VN">Viet Nam</option>
                    <option value="VG">Virgin Islands, British</option>
                    <option value="VI">Virgin Islands, U.s.</option>
                    <option value="WF">Wallis and Futuna</option>
                    <option value="EH">Western Sahara</option>
                    <option value="YE">Yemen</option>
                    <option value="ZM">Zambia</option>
                    <option value="ZW">Zimbabwe</option>
                </select>
                <label for="floatingSelect">Select <label class=" fw-bold text-danger">*</label></label>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput city" name="location" placeholder="Enter location">
                <label for="floatingInput">Enter City name <label class=" fw-bold text-danger">*</label></label>
            </div>

            <div class="form-floating mb-3">
                <select class="form-select" id="floatingSelect" name="eligible" aria-label="Floating label select example">
                    <option selected>Is the cause zakat eligible</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                    <option value="Not sure">Not sure</option>
                </select>
                <label for="floatingSelect">Select <label class=" fw-bold text-danger">*</label></label>
            </div>
            <textarea id="editor" placeholder="Explain your cause" name="cause_explain"></textarea>
            <script>
                ClassicEditor
                    .create(document.querySelector('#editor'))
                    .catch(error => {
                        console.error(error);
                    });
            </script>

            <div class="form-floating mb-3 mt-3">
                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" name="cause_summary" style="height: 100px"></textarea>
                <label for="floatingTextarea2">Summary of Your Cause <label class=" fw-bold text-danger">*</label></label>
            </div>
            <label for="exmp">Upload supporting documents(Atleast One document is <b>Mandatory</b>)</label>
            <div class="form-floating mb-3">
                <input accept="image/png,image/jpeg,image/jpg" type="file" class="form-control" id="file1" onchange="Filevalidation(this.id)" placeholder="" name="doc1" style="padding-left: 30px; padding-top: 16px ;">
            </div>
            <div class="form-floating mb-3">
                <input accept="image/png,image/jpeg,image/jpg" type="file" class="form-control" id="file2" onchange="Filevalidation(this.id)" placeholder="" name="doc2" style="padding-left: 30px; padding-top: 16px ;">
            </div>
            <!--<div class="form-floating mb-1">-->
            <!--    <input accept="image/png,image/jpeg,image/jpg" type="file" class="form-control" id="file3" onchange="Filevalidation(this.id)" placeholder="" name="doc3" style="padding-left: 30px; padding-top: 16px ;">-->
            <!--</div>-->
            <small class=" mb-1">Max file size is 2 MB. Allowed file types : JPEG, PNG and JPG</small>
            <small class=" mb-3">Documents to be uploaded can be medical records, school marksheet, college fee structure etc.</small>
            <hr>
            <center>
                <h1>Beneficiary Bank Details</h1>
            </center>
            <div class="mb-3 ">
                <label for="e"> Raising this cause for: &nbsp;&nbsp;&nbsp;</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="self" name="person" value="Self">
                    <label class="form-check-label" for="self">Self</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="ngo" name="person" value="NGO">
                    <label class="form-check-label" for="ngo">NGO</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="others" name="person" value="others">
                    <label class="form-check-label" for="others">Others</label>
                </div>
            </div>
            </div>
            <div class="ngo-list" style="display:none;">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="ngo_name" id="floatingInput" placeholder="bank">
                    <label for="floatingInput">NGO Name <label class=" fw-bold text-danger">*</label></label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="ngo_num" id="floatingInput" placeholder="bank">
                    <label for="floatingInput">NGO Registration Number <label class=" fw-bold text-danger">*</label></label>
                </div>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="acc_name" id="floatingInput" placeholder="bank">
                <label for="floatingInput">Account Holder Name <label class=" fw-bold text-danger">*</label></label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="acc_num" id="floatingInput" placeholder="bank">
                <label for="floatingInput">Beneficiary Account Number <label class=" fw-bold text-danger">*</label></label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="bank_name" id="floatingInput" placeholder="bank">
                <label for="floatingInput">Bank Name <label class=" fw-bold text-danger">*</label></label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="ifsc" id="floatingInput" placeholder="bank">
                <label for="floatingInput">IFSC Code <label class=" fw-bold text-danger">*</label></label>
            </div>
            <!--<label for="exmp">Upload Bank Passbook/Cheque leaf(Optional)</label>-->
            <!--<div class="form-floating">-->
            <!--    <input accept="image/png,image/jpeg,image/jpg" type="file" class="form-control mb-1" id="file4" onchange="Filevalidation(this.id)" placeholder="" name="passbook" style="padding-left: 30px; padding-top: 16px ;">-->
            <!--</div>-->
            <!--<small class=" mb-3">Max file size is 2 MB. Allowed file types : JPEG, PNG and JPG</small>-->
            <hr>
            <center>
                <h1>KYC Details</h1>
            </center>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="pan_num" id="floatingInput" placeholder="pan">
                <label for="floatingInput">PAN Card Number <label class=" fw-bold text-danger">*</label></label>
            </div>
            <label for="exmp">Upload PAN Card Copy <label class=" fw-bold text-danger">*</label></label>
            <div class="form-floating">
                <input accept="image/png,image/jpeg,image/jpg" type="file" class="form-control mb-1" id="file5" onchange="Filevalidation(this.id)" placeholder="" name="pan_copy" style="padding-left: 30px; padding-top: 16px ;">
            </div>
            <small class=" mb-3">Max file size is 2 MB. Allowed file types : JPEG, PNG and JPG</small>
            <div class="form-floating mb-3">
                <input type="text" class="form-control mb-1" name="adhaar_num" id="floatingInput" placeholder="adhaar">
                <label for="floatingInput">Aadhaar Card Number <label class=" fw-bold text-danger">*</label></label>
            </div>
            <label for="exmp">Upload Adhaar Card Copy <label class=" fw-bold text-danger">*</label></label>
            <div class="form-floating ">
                <input accept="image/png,image/jpeg,image/jpg" type="file" class="form-control mb-1" id="file6" onchange="Filevalidation(this.id)" placeholder="" name="adhaar_copy" style="padding-left: 30px; padding-top: 16px ;">
            </div>
            <small class=" mb-3">Max file size is 2 MB. Allowed file types : JPEG, PNG and JPG</small>


            <label for="exmp">Additional details(Optional)</label>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="optional" id="floatingInput" placeholder="max of 250 chars">
                <label for="floatingInput">Enter any optional details</label>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="checkbox">
                <label class="form-check-label" for="exampleCheck1">I Agree to share aadhar details with Kashmir Zakat for
                    verfication <label class=" fw-bold text-danger">*</label></label>
            </div>
            <label for="s"><label class=" fw-bold text-danger mb-3">* </label> are mandatory fields</label>

            <button type="submit" id="submit" name="submit" class="btn btn-primary mb-3 fs-4">Submit</button>
        </form>
        <?php include 'assets/footer.php'; ?>
</body>

</html>
<style>
    label,
    small,
    body,
    input,
    select {
        font-size: 80%;
    }
</style>
<script>
    $(document).ready(function() {
        $("input[type='radio']").click(function() {
            var radioValue = $("input[name='person']:checked").val();
            if (radioValue == 'NGO') {
                $(".ngo-list").show();
            } else {
                $(".ngo-list").hide();
            }
        });
    });
</script>

<?php } else {
        echo '<script>alert("Login/Register to Raise a cause")</script>';
        echo '<script>window.location = "index.php"</script>';
    }
?>