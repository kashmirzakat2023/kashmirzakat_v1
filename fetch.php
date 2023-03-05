<?php
include 'assets/nav-links.php'; ?>
<html>

<head>
  <link rel="stylesheet" href="css/success.css">
</head>
  <?php
  $id = $_GET['id'];
  include 'assets/connection.php';
  $result = mysqli_query($db, " SELECT * FROM form_data where id = '$id' and status='Accepted'");
  ?>

<body>
  <?php
  if (isset($_SESSION['username']) and $_SESSION['username'] == 'admin') ?>
  <script src="js/like.js" defer></script>
  <?php
  include 'assets/navbar.php';

  while ($data = mysqli_fetch_array($result)) {
    // $today = time();
    $_SESSION['id'] = $data['id'];
    $id = $data['id'];
    $amount = $data['amount'];
    $result1 = mysqli_query($db, " SELECT * FROM payments where raiseid = '$id'and status='complete'");
    $ramount = 0;
    while ($data1 = mysqli_fetch_array($result1)) {
      $ramount += $data1['amount'];
    }
    $percent = floor(($ramount / $amount) * 100);

    $_SESSION['cause'] = $data['cause_title'];
  ?>
    <title><?php echo $data['cause_title']; ?></title>
    <div class="row row-cols-1 mt-5 mx-lg-3 mx-md-3 mx-2 mb-5" style="margin-right: 0 !important;">
      <div class="col col-lg-7 col-md-7 col-12 mr-0 mx-lg-5 mx-md-3">
        <div class="card border-0">
          <img src="<?php echo "images/" . $data['profile_pic']; ?>" onclick="location.href=this.src;" class="border card-img-top" alt="...">
          <div class="card-body">
            <h2 class="card-title fw-bold py-2"><?php echo $data['cause_title']; ?></h2>
            <hr>
            <div class="row mb-3">
              <div class="col-lg-8 col-sm-4 buttons-group w-100">
                <a href="https://twitter.com/share?url=https://indiazakat.com/campaign/7641/help-brother-hafiz-saim-he-is-dire-need-help-for-continue-his-medical-bams-education&text=<?php echo $data['cause_title']; ?>" target="_blank" class="btn btn-info mb-2 px-4 text-light "><i class="fab fa-twitter "></i> Twitter</a>
                <a href="https://www.facebook.com/sharer/sharer.php?u=https://indiazakat.com/campaign/7641/help-brother-hafiz-saim-he-is-dire-need-help-for-continue-his-medical-bams-education" class="btn btn-primary mb-2 px-4 " target="_blank"><i class="fab fa-facebook-f"></i> Facebook</a>
                <a href="https://wa.me/whatsappphonenumber/?text=https://indiazakat.com/campaign/7641/help-brother-hafiz-saim-he-is-dire-need-help-for-continue-his-medical-bams-education" class="btn btn-success mb-2 px-4 " target="_blank"><i class="fab fa-whatsapp"></i> Whatsapp</a>
                <a href="mailto:?subject=<?php echo $data['cause_title']; ?>&body=https://indiazakat.com/campaign/7641/help-brother-hafiz-saim-he-is-dire-need-help-for-continue-his-medical-bams-education" class="btn btn-secondary mb-2 px-4 " target="_blank"><i class="fas fa-at"></i> Mail</a>
                <a href="#" class="btn btn-light mb-2 px-4 " target="_blank"><i class="fas fa-code"></i> Embed</a>
              </div>
            </div>
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item text-center col-4">
                <a class="nav-link active" style="color: black !important; padding:10px 30px !important;" data-bs-toggle="tab" href="#home">Story</a>
              </li>
              <li class="nav-item  text-center col-4">
                <a class="nav-link" style="color: black !important; padding:10px 30px !important;" data-bs-toggle="tab" href="#menu1">Donations</a>
              </li>
              <li class="nav-item  text-center col-4">
                <a class="nav-link" style="color: black !important; padding:10px 30px !important;" data-bs-toggle="tab" href="#menu2">Updates</a>
              </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
              <div id="home" class="container tab-pane active"><br>
                <p>
                  <label class=" fw-bold" for="d">My Story : </label><br>
                  <?php echo $data['cause_explain']; ?> <br>
                  <label class=" fw-bold" for="d">Cause Summary : </label><br>
                  <?php echo $data['cause_summary']; ?>
                </p>
                <!-- ----- -->
                <h4>Supporting documents</h4>
                <div class="d-flex justify-content-start">
                  <a type="button" class="rounded-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <img src="<?php echo "images/" . $data['doc1']; ?>" style="width:10vw; height: 10vh" class="cursor rounded-2 p-1 border border-dark">
                  </a>
                  <?php if ($data['doc2'] != '') { ?>
                    <a type="button" class="rounded-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                      <img src="<?php echo "images/" . $data['doc2']; ?>" style="width:10vw; height: 10vh" class="cursor rounded-2 p-1 border border-dark">
                    </a>
                  <?php }
                  if ($data['doc3'] != '') { ?>
                    <a type="button" class="rounded-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                      <img src="<?php echo "images/" . $data['doc3']; ?>" style="width:10vw; height: 10vh" class="cursor rounded-2 p-1 border border-dark">
                    </a>
                  <?php }
                  if ($data['passbook'] != '') { ?>
                    <a type="button" class="rounded-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                      <img src="<?php echo "images/" . $data['passbook']; ?>" style="width:10vw; height: 10vh" class="cursor rounded-2 p-1 border border-dark">
                    </a>
                  <?php }
                  if ($data['pan_copy'] != '') { ?>
                    <a type="button" class="rounded-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                      <img src="<?php echo "images/" . $data['pan_copy']; ?>" style="width:10vw; height: 10vh" class="cursor rounded-2 p-1 border border-dark">
                    </a>
                  <?php }
                  if ($data['adhaar_copy'] != '') { ?>
                    <a type="button" class="rounded-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                      <img src="<?php echo "images/" . $data['adhaar_copy']; ?>" style="width:10vw; height: 10vh" class="cursor rounded-2 p-1 border border-dark">
                    </a>
                  <?php } ?>

                </div>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog  modal-fullscreen ">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Attachments</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                          <div class="carousel-inner">
                            <div class="carousel-item active">
                              <img src="<?php echo "images/" . $data['doc1']; ?>" class="d-block w-100" alt="...">
                            </div>
                            <?php if ($data['doc2'] != '') { ?>
                              <div class="carousel-item">
                                <img src="<?php echo "images/" . $data['doc2']; ?>" class="d-block w-100" alt="...">
                              </div>
                            <?php }
                            if ($data['doc3'] != '') { ?>
                              <div class="carousel-item">
                                <img src="<?php echo "images/" . $data['doc3']; ?>" class="d-block w-100" alt="...">
                              </div>
                            <?php }
                            if ($data['passbook'] != '') { ?>
                              <div class="carousel-item">
                                <img src="<?php echo "images/" . $data['passbook']; ?>" class="d-block w-100" alt="...">
                              </div>
                            <?php }
                            if ($data['pan_copy'] != '') { ?>
                              <div class="carousel-item">
                                <img src="<?php echo "images/" . $data['pan_copy']; ?>" class="d-block w-100" alt="...">
                              </div>
                            <?php }
                            if ($data['adhaar_copy'] != '') {  ?>
                              <div class="carousel-item">
                                <img src="<?php echo "images/" . $data['adhaar_copy']; ?>" class="d-block w-100" alt="...">
                              </div>
                            <?php } ?>
                          </div>
                          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                          </button>
                          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- ---- -->
              </div>
              <div id="menu1" class="container tab-pane "><br>
                <h3>Donations</h3>
                <?php
                $res = mysqli_query($db, "SELECT * FROM payments where raiseid='$id'and status='complete'");
                if (mysqli_num_rows($res) > 0) {
                  while ($row2 = mysqli_fetch_array($res)) {
                    $date = strtotime($row2['date']);
                    $now = time();
                    $timeleft = $now - $date;
                    $days = round($timeleft / (60 * 60 * 24));
                    $name = $row2['name'];
                    if ($row2['checked'] == 'yes') {
                      $donar = 'Anonymous';
                    } else {
                      $donar = $row2['name'];
                    }
                ?>
                    <div class="media d-flex justify-content-around border  mb-1" style=" padding:10px;">
                      <?php
                      $res2 = mysqli_query($db, "SELECT * FROM users where name='$name'");
                      if (mysqli_num_rows($res2) > 0) {
                        while ($row3 = mysqli_fetch_array($res2)) {
                          if ($row2['checked'] == 'yes') {
                            $image = 'profile.png';
                          } else {
                            $image = $row3['profile_pic'];
                          }
                      ?>
                          <img src="<?php echo "images/" . $image; ?>" height="64px" width="64px" class="rounded-circle " alt="...">
                        <?php
                        }
                      } else { ?>
                        <img src="images/profile.png" height="64px" width="64px" class="rounded-circle " alt="...">
                      <?php
                      } ?>
                      <div class="media-body w-75">
                        <h5 class="mt-0"><?php echo $donar; ?></h5>
                        <div class=" d-flex justify-content-between">
                          <b class="text-success">₹<?php echo $row2['amount']; ?></b>
                          <small class=" text-muted">~ <?php echo $days; ?> days ago</small>
                        </div>
                      </div>
                    </div>
                <?php }
                } ?>
              </div>
              <div id="menu2" class="container tab-pane fade"><br>
                <h3>Update</h3>
                <p>No updates</p>
              </div>
            </div>

          </div>
        </div>
        <div class=" d-flex justify-content-around p-2 bg-light">
          <a class="btn btn-danger m-2 col-3 px-12 fs-5" href="accepted-reject.php?id=<?php echo $data['id']; ?>" name="submit" type="submit">Reject</a>
          <a class="btn btn-primary m-2 col-3 px-12 fs-5" href="user-pending-edit-form.php?id=<?php echo $data['id']; ?>" name="submit" type="submit">Edit</a>
          <a class="btn btn-primary m-2 col-3 px-12 fs-5" href="edit-user-form-kyc.php?id=<?php echo $data['id']; ?>" name="submit" type="submit">Edit Kyc</a>
        </div>
      </div>

      <!---------------------------------------------------------------------------------------------------------------->

      <div class="col col-lg-4 col-md-4 col-12 mx-lg-0 mx-md-0 ">
        <div class="card " style="width:100%;">
          <?php
          $email = $data['email'];
          $query1 = mysqli_query($db, "SELECT * FROM users where email = '$email' ");
          while ($user1 = mysqli_fetch_array($query1)) {
            if (!empty($user1['profile_pic'])) {
          ?>
              <img src="<?php echo "images/" . $user1['profile_pic']; ?>" class=" mt-3 rounded-circle mx-auto" width="200vh" height="200vh" alt="profile">
            <?php } else {
            ?>
              <img src=" images/evenly.jpg" class=" mt-3 rounded-circle mx-auto" width="200vh" height="200vh" alt="profile">
            <?php
            } ?>
            <div class="card-body text-center">
              <h5 class="card-title"><?php echo $user1['name']; ?></h5>
            <?php
          }
            ?>
            <p class="card-text">Created: <?php echo $data['date']; ?></p>
            <p class="card-text text-uppercase"><i class="fas fa-map-marker-alt"></i> <?php echo $data['location']; ?></p>
            <?php if (!($ramount >= $amount)) { ?>
              <a href="donate.php?id=<?php echo $data['id']; ?>" class="btn btn-warning donate  btn-lg box-shadow--8dp w-100 mb-3 fs-5" style="padding: 10px; ">Donate</a>
            <?php } else { ?>
              <a href="#" class="btn btn-secondary donate  btn-lg box-shadow--8dp w-100 mb-3 fs-5" style="padding: 10px; cursor:not-allowed;">
                <small><i class="fas fa-lock"></i> Successfully Completed</small>
              </a>
            <?php
            }
            ?>

            <?php
            $query3 = mysqli_query($db, "select * from `like` where raiseid='" . $_SESSION['id'] . "'");
            if (isset($_SESSION['username'])) {
              $query1 = mysqli_query($db, "select * from `like` where raiseid='" . $_SESSION['id'] . "' and username='" . $_SESSION['username'] . "'");
              if (mysqli_num_rows($query1) > 0) {
            ?>
                <p class="card-text rounded-1 mb-3 border border-danger" style=" font-size: 40px;   padding: 0px; color: red;">
                  <i class="fas fa-heart" value="" style="cursor:pointer;"></i>
                  <span id="likes">
                    <?php
                    echo mysqli_num_rows($query3);
                    ?>
                  </span>
                </p>
              <?php
              } else {
              ?>
                <p class="card-text rounded-1 mb-3 border border-danger" style=" font-size: 40px;padding: 0px; color: red;">
                  <i class="far fa-heart " value="" style="cursor:pointer; "></i>
                  <span id="likes">
                    <?php
                    echo mysqli_num_rows($query3);
                    ?>
                  </span>
                </p>

              <?php
              }
            } else {
              ?>
              <p class="card-text rounded-1 mb-3 border border-danger" style=" font-size: 40px;  padding: 0px; color: red;">
                <i class="far fa-heart " style="cursor:not-allowed; "></i>
                <span id="show_like">
                  <?php
                  echo mysqli_num_rows($query3);
                  ?>
                </span>
              </p>
            <?php
            }
            ?>

            <p class="card-text rounded-1 " style="border: 1px solid black; padding: 10px 10px;">
              <b><i class="fas fa-hourglass-half"></i>
                <?php
                $date = strtotime($data['date']);
                $now = time();
                $timeleft = $now - $date;
                $days = 30 - round($timeleft / (60 * 60 * 24));
                echo $days;
                ?> days left</b>
            </p>
            <div class="card-text rounded-1" style="border: 1px solid black; padding: 10px 10px;">
              <p>
                <strong class="fs-5 ">₹<?php echo $ramount; ?></strong> of ₹<?php echo $amount; ?> goal
              </p>
              <?php if (!($ramount >= $amount)) { ?>
                <div class="progress">
                  <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo $percent; ?>%" aria-valuemin="0" aria-valuemax="100"><?php echo $percent; ?>%</div>
                </div>
              <?php
              } else {
              ?>
                <div class="progress">
                  <div class="progress-bar bg-success " role="progressbar" style="width: <?php echo $percent; ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $percent; ?>%</div>
                </div>
              <?php
              }
              ?>
              <p class="card-text mt-2"> Raised by <b><?php echo mysqli_num_rows($result1); ?></b> donors</p>
            </div>
            </div>
            <div class=" d-flex justify-content-between mx-4 mt-2 mb-3">
              <p class="px-2 rounded-1 card-text" style="color: red;"><small> <?php echo $data['purpose']; ?></small> <i class="fas fa-tag"></i></p>
              <p class="px-2 rounded-1 card-text">
                <?php
                if ($data['eligible'] == "Yes") {

                ?>
                  <i class="fas fa-check" style="color: rgb(50, 133, 50);"></i><small> Zakat Eligible</small>
                <?php
                } else  if ($data['eligible'] == "No") {
                ?>

                  <i class="fa fa-times" style="color: rgb(255,0,0);"></i><small> Zakat Not Eligible</small>

                <?php
                } else {
                ?>

                  <i class="fas fa-not-equal" style="color: rgb(0,0,255);"></i><small> Zakat Eligible Not sure</small>

                <?php
                }
                ?>

              </p>
            </div>
        </div>
        <?php
        if (isset($_SESSION['username'])) {
          $query2 = mysqli_query($db, "select * from `report` where raiseid='" . $_SESSION['id'] . "' and name='" . $_SESSION['username'] . "'");
          if (!mysqli_num_rows($query2) > 0) {
        ?>
            <p type="submit" class="btn btn-outline-danger border border-danger text-center p-2 mt-2 rounded-1 w-100 fw-bold report" id="report" onclick="report();" data-bs-toggle="modal" data-bs-target="#exampleModal1">
              <i class="fal fa-exclamation-triangle fw-bold" value="" style="cursor:pointer;"></i> Report
            </p>
        <?php
          }
        }
        ?>
        <!-- sucess modal -->
        <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <center>
                <div class="modal-body">
                  <div class="check_mark">
                    <div class="sa-icon sa-success animate">
                      <span class="sa-line sa-tip animateSuccessTip"></span>
                      <span class="sa-line sa-long animateSuccessLong"></span>
                      <div class="sa-placeholder"></div>
                      <div class="sa-fix"></div>
                    </div>
                  </div>
                  <h2>Thanks</h3>
                    <p>Submitted Successfully</p>
                </div>
                <button type="button" class="btn btn-success text-center mb-3 px-4" data-bs-dismiss="modal">OK</button>
              </center>
            </div>
          </div>
        </div>
        <!-- --------------------- -->

      </div>
    </div>
  <?php
  }
  include 'assets/footer.php';
  // }
  ?>
</body>

</html>