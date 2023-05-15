<?php
include 'assets/nav-links.php'; ?>
<html>

<head>
    <?php
    $id = $_GET['id'];
    include 'assets/connection.php';
    $result = mysqli_query($db, " SELECT * FROM campaigns_data where id = '$id' and status='Accepted'");
    ?>
</head>

<body>
    <?php
    include 'assets/navbar.php';
    include 'countries.php';
    while ($data = mysqli_fetch_array($result)) {
        $id = $data['id'];
        $amount = $data['amount'];
        $ramount = 0;
        $result1 = mysqli_query($db, " SELECT * FROM payments where raiseid = '$id'and status='complete'");
        while ($data1 = mysqli_fetch_array($result1)) {
            $ramount += $data1['amount'];
        }

        $percent = floor(($ramount / $amount) * 100);
    ?>
        <title><?php echo $data['cause_title']; ?></title>
        <div class="donate-head text-center p-4 text-light " style="background-color: var(--bg_dark_blue);">
            <h2 class=" fw-bolder">Donate</h2>
            <h3><?php echo $data['cause_title']; ?></h3>
        </div>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-2 mt-5 mx-lg-3 mx-md-3 mx-2 mb-5" style="margin-right: 0 !important;">
            <div class="col col-lg-7 col-md-7 col-12 mr-0 mx-lg-5 mx-md-3">
                <div class="card border-0 ">
                    <div class="contact-form">
                        <form method="POST" action="payment.php?id=<?php echo $id; ?>">
                            <label class="control-label form-floating " for="fname">Donation Type</label>
                            <select class="form-select mb-3" aria-label="Default select example" id="select" name="type" required>
                                <option value="none" selected>Select</option>
                                <option value="Zakat">Zakat</option>
                                <option value="Sadqua">Sadqua</option>
                                <option value="Fitra">Fitra</option>
                                <option value="Kaffara">Kaffara</option>
                                <option value="Interest">Interest Loadoff</option>
                                <option value="General">General Donation</option>
                            </select>
                            <div class="alert alert-danger" style="display: none;" id="amt" role="alert">
                                Amount must be greater than ₹50
                            </div>
                            <label class="control-label form-floating " for="fname">Donation in rupees</label>
                            <div class="input-group mb-3 flex-nowrap">
                                <span class="input-group-text bg-success text-light fw-bold " id="addon-wrapping">₹</span>
                                <input type="number" class="form-control" oninput="amt()" value="1000" min="50" name="amount" id="amount" placeholder="Minimum amount ₹50 INR " aria-label="amount" aria-describedby="addon-wrapping" required>
                            </div>
                            <div class="alert alert-danger" style="display: none;" id="tip" role="alert">
                                To facilitate website please select any tip
                            </div>
                            <div class="bg-success py-2 px-3 mb-4 mt-4 rounded-2 text-light">
                                <p class=" fw-bold p-1">By supporting kashmirzakat, you are helping us reach out to more campaigns like this and scale our impact.
                                    We'll use a portion of your tip to promote campaigns, manage logistics and also donate to various causes. </p>
                                <div class="row ">
                                    <div class="form-group mb-3 col-6">
                                        <label class="control-label form-floating " for="select1">Support us by adding a tip of :</label>
                                        <select class="form-select mb-1" aria-label="Default select example" id="select1" name="tip" required>
                                            <option value="0">Select one</option>
                                            <option value="2">2% </option>
                                            <option value="5">5% </option>
                                            <option value="8">8% </option>
                                            <option value="12">12% </option>
                                            <option value="15">15% </option>
                                            <option value="20">20% </option>
                                            <option value="other">Other </option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-1 col-6 fw-bold">
                                        <label class="control-label " for="city">Total Amount:</label>
                                        <input type="number" class="form-control " id="tamount" placeholder="Total Amount" name="city" disabled>
                                    </div>
                                </div>
                                <div class="custom-tip" style="display:none;">
                                    <div class="form-group mb-3 col-6 fw-bold">
                                        <label class="control-label " for="city">Custom tip:</label>
                                        <input type="number" class="form-control " value="" id="camount" placeholder="Custom Tip Amount" name="other">
                                    </div>
                                </div>
                            </div>
                            <?php
                            if (isset($_SESSION['username'])) {
                                $useremail = $_SESSION['useremail'];
                                $query = mysqli_query($db, "SELECT * FROM users where email = '$useremail' ");
                                while ($user = mysqli_fetch_array($query)) {
                            ?>
                                    <div class="form-group mb-3">
                                        <label class="control-label form-floating " for="fname">Full Name</label>
                                        <input type="text" class="form-control" id="fname" placeholder="Enter Full Name" value="<?php echo $user['name']; ?>" name="name" required>
                                    </div>
                                    <div class="row">
                                        <div class="form-group mb-3 col-6 ">
                                            <label class="control-label " for="email">Email</label>
                                            <input type="email" class="form-control" id="email" placeholder="Enter Email" value="<?php echo $user['email']; ?>" name="email" required>
                                        </div>
                                        <div class="form-group mb-3 col-6 ">
                                            <label class="control-label " for="city">Mobile</label>
                                            <input type="text" class="form-control" id="phone" placeholder="Enter Mobile No" value="<?php echo $user['phone']; ?>" name="phone" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group mb-3 col-6 ">
                                            <label class="control-label " for="city">City</label>
                                            <input type="text" class="form-control" id="city" placeholder="Enter City" name="city">
                                        </div>
                                        <div class="form-group mb-3 col-6 ">
                                            <label class="control-label " for="email">Country</label>
                                            <select class="form-select" class="form-control" id="country" name="country" aria-label="Floating label select example">
                                                <?php
                                                for ($i = 0; $i < sizeof($countries); $i++) {
                                                ?>
                                                    <option <?php if ($data['location'] == $countries[$i]) echo 'selected'; ?> value="<?= $countries[$i] ?>"><?= $countries[$i] ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                <?php
                                }
                            } else {
                                ?>

                                <div class="form-group mb-3">
                                    <label class="control-label form-floating " for="fname">Full Name</label>
                                    <input type="text" class="form-control" id="fname" placeholder="Enter Full Name" value="" name="name" required>
                                </div>
                                <div class="row">
                                    <div class="form-group mb-3 col-6 ">
                                        <label class="control-label " for="email">Email</label>
                                        <input type="email" class="form-control" id="email" placeholder="Enter Email" value="" name="email" required>
                                    </div>
                                    <div class="form-group mb-3 col-6 ">
                                        <label class="control-label " for="city">Mobile</label>
                                        <input type="text" class="form-control" id="phone" placeholder="Enter Mobile No" value="" name="phone" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group mb-3 col-6 ">
                                        <label class="control-label " for="city">City</label>
                                        <input type="text" class="form-control" id="city" placeholder="Enter City" name="city">
                                    </div>
                                    <div class="form-group mb-3 col-6 ">
                                        <label class="control-label " for="email">Country</label>
                                        <select class="form-select" class="form-control" id="country" name="country" aria-label="Floating label select example" required>
                                            <option>Select Country</option>
                                            <?php
                                            for ($i = 0; $i < sizeof($countries); $i++) {
                                            ?>
                                                <option value="<?= $countries[$i] ?>"><?= $countries[$i] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="form-group mb-3">
                                <label class="control-label " for="comment">Comment(Optional)</label>
                                <textarea class="form-control" rows="1" placeholder="Write a brief Comment" name="comment" id="comment"></textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label class="control-label " for="comment">Payment Method</label>
                                <select class="form-select" id="payment" aria-label="Default select example" name="method" onchange="GetSelectedTextValue(this)">
                                    <option selected>Select One</option>
                                    <option value="1">Bank Transfer</option>
                                    <option value="2">Debit Card / Credit Card / Wallets / UPI / Net banking</option>
                                </select>
                            </div>
                            <div id="bank-details" style="display: none;">
                                <div class=" bg-info p-3 mb-3 rounded-2">
                                    <h4 class=" fw-bolder"><i class="fas fa-university"></i> Make your payment directly to our bank account.</h4>
                                    <b> Bank</b>: HDFC Bank <br>
                                    <b> Branch</b>: Soura, Srinagar<br>
                                    <b> Account Name: SAHULIYAT KASHMIR KASHMIR ZAKAT</b> <br>
                                    <b> Account Number</b>: 50200079623664 <br>
                                    <!-- <b> Type</b>: Savings Account <br> -->
                                    <b> Branch IFSC Code</b>: HDFC0002559 <br>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="control-label form-floating " for="fname">Transaction Date</label>
                                    <input type="date" class="form-control" id="" value="" name="tran_date" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="control-label form-floating " for="fname">Bank Name</label>
                                    <input type="text" class="form-control" id="" placeholder="Enter Bank Name" value="" name="bank_name" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="control-label form-floating " for="fname">Transaction ID</label>
                                    <input type="text" class="form-control" id="" placeholder="Enter Transaction ID / Reference No. " value="" name="tran_id" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="control-label " for="comment">Other Details(Optional)</label>
                                    <textarea class="form-control" rows="1" placeholder="Write any optional details" name="optional" id="optional"></textarea>
                                </div>
                                <small class=" text-danger">* Bank transfers may take 24 - 48 busniness hours to reflect in the system. Please be patient.</small>
                            </div>
                            <div class="form-check mb-3 mt-2">
                                <input class="form-check-input mb-3" type="checkbox" name="checked" value="yes" id="checked">
                                <label class="form-check-label text-danger" for="checked">
                                    Make anonymous donation
                                </label>
                            </div>
                            <input type="submit" class="btn btn-danger donate btn-lg box-shadow--8dp w-100 mb-3 fs-5" id="bank" name="submit" value="Bank Donate" style="padding: 10px; display:none;">
                            <input type="button" class="btn btn-danger donate btn-lg box-shadow--8dp w-100 mb-3 fs-5" id="upi" value="UPI Donate" style="padding: 10px; display:none;">
                        </form>
                    </div>
                </div>
            </div>

            <!---------------------------------------------------------------------------------------------------------------->

            <div class="col col-lg-4 col-md-4 col-12 mx-lg-0 mx-md-0 ">
                <div class="card p-3">
                    <img src="<?php echo "images/" . $data['profile_pic']; ?>" class=" mt-3 card-img-top rounded-2  profile-img mx-auto mx-auto" alt="profile">
                    <p>
                        <strong class="fs-5 mx-2">₹<?php echo $ramount; ?></strong> of ₹<?php echo $amount; ?> goal
                    </p>
                    <div class="progress">
                        <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo $percent; ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $percent; ?>%</div>
                    </div>

                    <p class="card-text mt-2 text-center"> Raised by <b><?php echo mysqli_num_rows($result1); ?></b> donors</p>
                </div>
                <div class="card mt-3 p-2">
                    <h5 class=" text-secondary fw-bold text-center ">Organiser</h5>
                    <?php
                    $query1 = mysqli_query($db, "SELECT * FROM users where email = '" . $data['email'] . "' ");
                    while ($user1 = mysqli_fetch_array($query1)) {
                        if (!empty($user1['profile_pic'])) { ?>
                            <img src="<?php echo "images/" . $user1['profile_pic']; ?>" class=" mt-2 mx-auto rounded-circle " width="200vh" height="200vh" alt="profile">
                        <?php } ?>
                        <div class="card-body text-center">
                            <h5 class="card-title"><?php echo $user1['name']; ?>
                                <a href="mailto:<?php echo $user1['email']; ?>">
                                    <i class="fas fa-envelope text-info cursor"></i>
                                </a>
                            </h5>
                            <p class="card-text">Created: <?php echo $data['date']; ?></p>
                            <p class="card-text text-uppercase"><i class="fas fa-map-marker-alt"></i> <?php echo $data['location']; ?></p>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php
    }
    include 'assets/footer.php';

    ?>
</body>

</html>
<script>
    $(document).ready(function() {
        $("#amount").keyup(function() {
            var amt = parseInt(document.getElementById('amount').value);
            var selectedval = $("select#select1").children("option:selected").val();
            if (selectedval == 'other') {
                if (camt >= 0)
                    camt = parseInt($('#camount').val());
                else {
                    camt = 0;
                }
                tamt = amt + camt;
                document.getElementById('tamount').value = tamt;
            } else {
                var tip = (selectedval * amt / 100);
                var tamt = tip + amt;
                document.getElementById('tamount').value = tamt;
            }
        });

        $("select#select1").change(function() {
            var selectedval = parseInt($(this).children("option:selected").val());
            var amt = parseInt(document.getElementById('amount').value);
            var tip = (selectedval * amt / 100);
            var tamt = tip + amt;
            document.getElementById('tamount').value = tamt;
        });

        $(".custom-tip").keyup(function() {
            if (camt >= 0)
                camt = parseInt($('#camount').val());
            else
                camt = 0;
            var amt = parseInt(document.getElementById('amount').value);
            tamt = amt + camt;
            document.getElementById('tamount').value = tamt;
        });

        $("select#select1").change(function() {
            var selectedval = ($(this).children("option:selected").val());
            if (selectedval == 'other') {
                $(".custom-tip").show();
                var amt = parseInt(document.getElementById('amount').value);
                camt = parseInt($('#camount').val());
                tamt = amt + camt;
                document.getElementById('tamount').value = tamt;
            }
            if (selectedval == '2' || selectedval == '5' || selectedval == '8' || selectedval == '12' || selectedval == '15' || selectedval == '20') $(".custom-tip").hide();

        });
    });


    function GetSelectedTextValue(select) {
        if (select.value == 1) {
            document.getElementById('bank').style.display = 'block';
            document.getElementById('bank-details').style.display = "block";
            document.getElementById('upi').style.display = 'none';
        } else {
            document.getElementById('upi').style.display = 'block';
            document.getElementById('bank').style.display = 'none';
            document.getElementById('bank-details').style.display = "none";
        }
    }

    function amt() {
        if (document.getElementById('amount').value < 50) {
            document.getElementById('amt').style.display = "block";
        } else {
            document.getElementById('amt').style.display = "none";
        }
    }
</script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    $('body').on('click', '#upi', function(e) {
        let tip = 0;
        let amt = parseInt(document.getElementById('amount').value);
        let selectedval = parseInt($("select#select1").children("option:selected").val());
        if (selectedval == 2 || selectedval == 5 || selectedval == 8 || selectedval == 12 || selectedval == 15 || selectedval == 20)
            tip = parseInt(selectedval * amt / 100);
        else if (selectedval == 0)
            tip = 0;
        else
            tip = parseInt($('#camount').val());
        let totalAmount = 0;
        if (tip > 0)
            totalAmount = amt + tip
        else
            totalAmount = amt
        let select = document.getElementById('select').value;
        let fname = document.getElementById('fname').value;
        let email = document.getElementById('email').value;
        let phone = document.getElementById('phone').value;
        let city = document.getElementById('city').value;
        let country = document.getElementById('country').value;
        let comment = document.getElementById('comment').value;
        let checkebox = document.getElementById('checked');
        let checked = '';
        if (checkebox.checked) {
            checked = 'yes';
        } else {
            checked = 'no';
        }
        if (amt >= 50) {
            if (select != 'none') {

                jQuery.ajax({
                    type: 'POST',
                    url: 'razor-pay.php',
                    data: "totalAmount=" + amt +
                        "&select=" + select +
                        "&fname=" + fname +
                        "&email=" + email +
                        "&phone=" + phone +
                        "&city=" + city +
                        "&country=" + country +
                        "&comment=" + comment +
                        "&checked=" + checked +
                        "&tip=" + tip,

                    success: function(result) {
                        let options = {
                            "key": "rzp_live_9cbtZFPcUcseoE", // secret key id
                            "amount": (totalAmount * 100), // 2000 paise = INR 20
                            "name": "Kashmirzakat",
                            "description": "Payment",
                            "image": "kz_images/logo.jpeg",
                            "prefill ": {
                                "name": fname,
                                "email": email,
                                "contact": phone
                            },
                            "handler": function(response) {
                                $.ajax({
                                    type: 'POST',
                                    url: "razor-pay.php",
                                    data: "payment_id=" + response.razorpay_payment_id,
                                    success: function(msg) {
                                        window.location.href = 'payment-successful.php';
                                    }
                                });
                            }
                        };
                        let rzp1 = new Razorpay(options);
                        rzp1.open();
                    }
                });
            } else
                alert('Please select donation type')
        } else {
            alert('Amount must be greater than 50')
        }
    });
</script>