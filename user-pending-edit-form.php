<?php include 'assets/nav-links.php';
if (isset($_SESSION['useremail'])) {
?>
    <html>

    <head>
        <link rel="stylesheet" href="css/success.css">
        <script src="js/success.js"></script>
        <?php
        $id = $_GET['id'];
        include 'assets/connection.php';
        $result = mysqli_query($db, " SELECT * FROM form_data where id = '$id'");
        ?>
    </head>

    <body>
        <?php
        include 'assets/navbar.php';
        while ($data = mysqli_fetch_array($result)) {
            // $today = time();
            $_SESSION['id'] = $data['id'];
            $id = $data['id'];
        ?>
            <title>Edit</title>
            <form method="post" class="fund-raise shadow w-75 d-flex mx-auto me-auto mt-5 flex-column mb-3" enctype="multipart/form-data" action="save-pending-edit-form.php?id=<?php echo $id; ?>">
                <h3 class=" text-center fw-bold">Edit Form</h3>
                <div class="row row-cols-1 mt-5 mx-lg-3 mx-md-3 mx-2 mb-5 w-100 " style="margin-right: 0 !important;">
                    <div class="col col-12 mx-auto">
                        <div class="card border-0">

                            <label for="img" class=" text-danger mb-1" style="display: none;" id="size"> *Image size must be less than 2 MB</label>
                            <div class="border-right">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <div class="container1">
                                        <div class="input">
                                            <?php
                                            $pic = "images/" . $data['profile_pic'];
                                            ?>
                                            <input name="profile_pic" accept="image/*" id="file" type="file">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <label for="img" class=" text-danger mb-1" style="display: none;" id="size"> *Image size must be less than 2 MB</label>
                            <div class="card-body">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" value="<?php echo $data['cause_title']; ?>" name="cause_title" placeholder="Enter cause title(max-250 letters)">
                                    <label for="floatingInput">Title of cause</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <select class="form-select" id="floatingSelect" name="purpose" aria-label="Floating label select example">
                                        <option selected><?php echo $data['purpose']; ?></option>
                                        <option value="Education">Education</option>
                                        <option value="Health">Health</option>
                                        <option value="Livelihood">Livelihood</option>
                                        <!-- <option value="Scholarship">scholarship</option> -->
                                        <option value="Others">others</option>
                                    </select>
                                    <label for="floatingSelect">Select</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control" name="amount" value="<?php echo $data['amount']; ?>" id="floatingInput" placeholder="">
                                    <label for="floatingInput">Amount Required(in ₹)</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <select class="form-select" class="form-control" id="floatingSelect" name="location" aria-label="Floating label select example">
                                        <option><?php echo $data['location']; ?></option>
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
                                    <label for="floatingSelect">Select</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <select class="form-select" id="floatingSelect" name="eligible" aria-label="Floating label select example">
                                        <option selected><?php echo $data['eligible']; ?></option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                        <option value="Not sure">Not sure</option>
                                    </select>
                                    <label for="floatingSelect">Select zakat eligible</label>
                                </div>

                                <!-- Tab panes -->
                                <?php
                                $data1 = $data['cause_explain'];
                                $data1 = str_replace('&', '&amp;', $data1);
                                ?>
                                <label for="title" class=" fw-bold ">Explain Cause</label>
                                <textarea class="form-floating mb-5" id="editor" name="cause_explain" rows="50">
		                        <?= $data1 ?>
		                        </textarea>
                                <script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>
                                <script>
                                    ClassicEditor
                                        .create(document.querySelector('#editor'))
                                        .catch(error => {
                                            console.error(error);
                                        });
                                </script>
                                <label for="title" class=" fw-bold ">Summary</label>
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" name="cause_summary" style="height: 100px">
                                            <?php echo $data['cause_summary']; ?>
                                        </textarea>
                                    <label for="floatingTextarea2">Summary</label>
                                </div>
                            </div>
                            <div class=" d-flex justify-content-around p-2 bg-light">
                                <button class="btn btn-primary m-2 col-3 px-12 fs-5 w-100" id="submit" name="submit" type="submit">Save</button>
                            </div>
                        </div>

                    <?php } ?>
                    </div>
                </div>
            </form>
            <?php
            include 'assets/footer.php';
            ?>
    </body>

    </html>
    <style>
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
        }

        @media (max-width:550px) {
            #drop-zone {
                height: 40vh;
            }

            label,
            small,
            body,
            input,
            select {
                font-size: 80%;
            }

            h2 {
                font-size: 180%;
            }
        }

        label {
            font-weight: 500;
        }

        small {
            font-size: 11px;
        }
    </style>

    <script>
        $(function() {
            var container1 = $('.container1'),
                inputFile = $('#file'),
                img, btn, txt = 'Edit Picture',
                txtAfter = 'Change';

            if (!container1.find('#upload').length) {
                container1.find('.input').append('<input type="button" class="rounded-2 mt-2" value="' + txt + '" id="upload">');
                btn = $('#upload');
                container1.prepend('<img src="<?php echo $pic; ?>" class="rounded-1" class="hidden" alt="Uploaded file" id="uploadImg" width="100%" height="400px">');
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
<?php
} else {
    echo '<script>alert("Unauthenticated Access")</script>';
    echo '<script>window.location = "index.php"</script>';
}
