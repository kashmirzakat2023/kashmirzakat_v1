<?php
include 'assets/nav-links.php';
if (isset($_SESSION['useremail'])) {
?>
    <html>

    <head>
        <link rel="stylesheet" href="css/success.css">
        <script src="js/success.js"></script>
        <script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>
        <?php
        $id = $_GET['id'];
        include 'assets/connection.php';
        include 'countries.php';
        $result = mysqli_query($db, " SELECT * FROM form_data where id = '$id' and status='Accepted'");
        ?>
    </head>

    <body>
        <script src="js/like.js" defer></script>
        <?php
        include 'assets/navbar.php';

        while ($data = mysqli_fetch_array($result)) {
            $_SESSION['id'] = $data['id'];
            $id = $data['id'];
        ?>
            <title>Edit</title>
            <form method="post" enctype="multipart/form-data" action="save-edit-form.php?id=<?php echo $data['id']; ?>">

                <div class="row row-cols-1 mt-5 mx-lg-3 mx-md-3 mx-2 mb-5" style="margin-right: 0 !important;">
                    <div class="col col-10 mx-auto">
                        <div class="card border-0">
                            <div class="border-right">
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
                            <div class="card-body">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" value="<?php echo $data['cause_title']; ?>" name="cause_title" placeholder="Enter cause title(max-250 letters)" required>
                                    <label for="floatingInput">Title of cause</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <select class="form-select" id="floatingSelect" name="purpose" aria-label="Floating label select example" required>
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
                                    <input type="number" class="form-control" name="amount" value="<?php echo $data['amount']; ?>" id="floatingInput" placeholder="" required>
                                    <label for="floatingInput">Amount Required(in ₹)</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="date" class="form-control" name="date" value="<?php date('Y-m-d', strtotime($data['date'])); ?>" id="floatingInput" placeholder="" required>
                                    <label for="floatingInput">Date</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <select class="form-select" class="form-control" id="floatingSelect" name="location" name="country" aria-label="Floating label select example">
                                        <?php
                                        for ($i = 0; $i < sizeof($countries); $i++) {
                                        ?>
                                            <option <?php if ($data['location'] == $countries[$i]) echo 'selected'; ?> value="<?= $countries[$i] ?>"><?= $countries[$i] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="floatingSelect">Select</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <select class="form-select" id="floatingSelect" name="eligible" aria-label="Floating label select example" required>
                                        <option selected><?php echo $data['eligible']; ?></option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                        <option value="Not sure">Not sure</option>
                                    </select>
                                    <label for="floatingSelect">Select</label>
                                </div>


                                <label for="title" class=" fw-bold ">Explain Cause</label>
                                <!-- Tab panes -->
                                <textarea id="editor" name="cause_explain"><?php echo $data['cause_explain']; ?></textarea>
                                <div class="mb-3"></div>
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" name="cause_summary" style="height: 100px" required><?php echo $data['cause_summary']; ?></textarea>
                                    <label for="floatingTextarea2">Summary</label>
                                </div>
                            </div>

                            <div class=" d-flex justify-content-around p-2 bg-light">
                                <button class="btn btn-primary m-2 col-3 fs-5 px-1" name="submit" type="submit">Save</button>
                            </div>
                        </div>
                    <?php } ?>
                    </div>
                </div>
            </form>
        <?php

        include 'assets/footer.php';
        // }
    } else {
        echo '<script>alert("Unauthenticated Access")</script>';
        echo '<script>window.location = "index.php"</script>';
    }
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

        img {
            display: block;
            margin: 0 auto 15px;
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
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>