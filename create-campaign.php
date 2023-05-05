<?php
include 'assets/nav-links.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/create-campaign.css">
    <script src="js/drag-drop.js" defer></script>
    <script src="js/funds.js" defer></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>
    <script>
        var clicked = false
        window.addEventListener('beforeunload', function(e) {
            e.preventDefault();
            e.returnValue = '';
        });
    </script>
    <title>Fund Raise Form</title>

</head>

<body>
    <?php
    if (isset($_SESSION['username'])) {
        include 'countries.php';
        include 'assets/navbar.php';
    ?>

        <form class="col-8 col-sm-8 mb-5 fund-raise " method="post" enctype="multipart/form-data" action="funds-store.php">
            <h2 class="text-center fw-bolder py-2">Basic Information</h2>

            <label for="img" class=" text-danger mb-1" style="display: none;" id="size"> *Image size must be less than 2 MB</label>
            <label for="img" class=" text-danger mb-1" style="display: none;" id="reso"> *Image Image resolution must be more than 800*400 px</label>
            <div id="drop-zone" class="mb-4" style="cursor: pointer;">
                <img src="" id="img" alt="profile image">
                <p class=" text-center card-text p-5" style="opacity: 0.6;" id="para">
                    <i class="fas fa-cloud-upload text-secondary" style="font-size: 150px;"></i> <br><br>
                    <b> Drag and Drop an image / Click to Select an image</b> <br><br>
                    Max file size is 2 MB. Allowed file types : JPEG, PNG and JPG <br> Minimum size 800*400
                </p>
                <input type="file" id="myfile" name="profile_pic" onchange="Filevalidation(this.id); " accept="image/png,image/jpeg,image/jpg" hidden>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="cause_title" placeholder="Enter cause title(max-250 letters)" title="Enter cause title" required>
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
                <input type="number" class="form-control" name="amount" id="floatingInput" placeholder="amount" title="Enter amount" required>
                <label for="floatingInput">Amount (in ₹) <label class=" fw-bold text-danger">*</label></label>
            </div>

            <div class="form-floating mb-3">
                <select class="form-select" id="floatingSelect" name="country" aria-label="Floating label select example">
                    <?php
                    for ($i = 0; $i < sizeof($countries); $i++) {
                    ?>
                        <option value="<?= $countries[$i] ?>"><?= $countries[$i] ?></option>
                    <?php
                    }
                    ?>
                </select>
                <label for="floatingSelect">Select <label class=" fw-bold text-danger">*</label></label>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput city" name="location" placeholder="Enter location">
                <label for="floatingInput">Enter City name <label class=" fw-bold text-danger">*</label></label>
            </div>

            <div class="form-floating mb-3">
                <select class="form-select" id="floatingSelect" name="eligible" aria-label="Floating label select example" required>
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
            <small class=" mb-1">Max file size is 2 MB. Allowed file types : JPEG, PNG and JPG</small>
            <small class=" mb-3">Documents to be uploaded can be medical records, school marksheet, college fee structure etc.</small>
            <hr>
            <center>
                <h2>Beneficiary Details</h2>
            </center>
            <div class="row">
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="beneficiary_phone" id="floatingInput" placeholder="+91 XXXXX XXXXX">
                        <label for="floatingInput">Beneficiary Phone<label class=" fw-bold text-danger">*</label></label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" name="beneficiary_email" id="floatingInput" placeholder="example@gmail.com">
                        <label for="floatingInput">Beneficiary Email<label class=" fw-bold text-danger">*</label></label>
                    </div>
                </div>
            </div>
            <div class="mb-3 ">
                <label for="e"> Raising this cause for: <label class=" fw-bold text-danger">*</label>&nbsp;&nbsp;&nbsp;</label>
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
                <input type="text" class="form-control" name="acc_name" id="floatingInput" placeholder="bank" required>
                <label for="floatingInput">Account Holder Name <label class=" fw-bold text-danger">*</label></label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="acc_num" id="floatingInput" placeholder="bank" required>
                <label for="floatingInput">Beneficiary Account Number <label class=" fw-bold text-danger">*</label></label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="bank_name" id="floatingInput" placeholder="bank" required>
                <label for="floatingInput">Bank Name <label class=" fw-bold text-danger">*</label></label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="ifsc" id="floatingInput" placeholder="bank" required>
                <label for="floatingInput">IFSC Code <label class=" fw-bold text-danger">*</label></label>
            </div>
            <hr>
            <center>
                <h2>KYC Details</h2>
            </center>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="pan_num" id="floatingInput" placeholder="pan" required>
                <label for="floatingInput">PAN Card Number <label class=" fw-bold text-danger">*</label></label>
            </div>
            <label for="exmp">Upload PAN Card Copy <label class=" fw-bold text-danger">*</label></label>
            <div class="form-floating">
                <input accept="image/png,image/jpeg,image/jpg" type="file" class="form-control mb-1" id="file5" onchange="Filevalidation(this.id)" placeholder="" name="pan_copy" style="padding-left: 30px; padding-top: 16px ;" required>
            </div>
            <small class=" mb-3">Max file size is 2 MB. Allowed file types : JPEG, PNG and JPG</small>
            <div class="form-floating mb-3">
                <input type="text" class="form-control mb-1" name="adhaar_num" id="floatingInput" placeholder="adhaar" required>
                <label for="floatingInput">Aadhaar Card Number <label class=" fw-bold text-danger">*</label></label>
            </div>
            <label for="exmp">Upload Adhaar Card Copy <label class=" fw-bold text-danger">*</label></label>
            <div class="form-floating ">
                <input accept="image/png,image/jpeg,image/jpg" type="file" class="form-control mb-1" id="file6" onchange="Filevalidation(this.id)" placeholder="" name="adhaar_copy" style="padding-left: 30px; padding-top: 16px ;" required>
            </div>
            <small class=" mb-3">Max file size is 2 MB. Allowed file types : JPEG, PNG and JPG</small>


            <label for="exmp">Additional details(Optional)</label>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="optional" id="floatingInput" placeholder="max of 250 chars">
                <label for="floatingInput">Enter any optional details</label>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="checkbox" required>
                <label class="form-check-label" for="exampleCheck1">I Agree to share aadhar details with Kashmir Zakat for
                    verfication <label class=" fw-bold text-danger">*</label></label>
            </div>
            <label for="s"><label class=" fw-bold text-danger mb-3">* fields are mandatory</label></label>

            <button type="submit" id="submit" name="submit" class="btn btn-primary mb-3 fs-4">Submit</button>
        </form>
        <?php include 'assets/footer.php'; ?>
</body>

</html>
<style>
    @media (max-width: 800px) {

        label,
        small,
        body,
        input,
        select {
            font-size: 90%;
        }
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