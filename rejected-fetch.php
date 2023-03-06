     <?php include 'assets/nav-links.php'; ?>
<html>

<head>
  <link rel="stylesheet" href="css/success.css">
  <script src="js/success.js"></script>
  <?php
  $id = $_GET['id'];
  include 'assets/connection.php';
  $result = mysqli_query($db, " SELECT * FROM form_data where id = '$id' and status='Rejected'");
  ?>
</head>

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
                  <?php echo htmlspecialchars($data['cause_explain']); ?> <br>
                  <label class=" fw-bold" for="d">Cause Summary : </label><br>
                  <?php echo $data['cause_summary']; ?>
                </p>
                <!-- ----- -->
                <h4>Supporting documents</h4>
                <div class="d-flex">
                  <a type="button" class="rounded-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <img src="<?php echo "images/" . $data['doc1']; ?>" style="width:90%" class="cursor rounded-2 p-1 border border-dark">
                  </a>
                  <?php if ($data['doc2'] != '') { ?>
                    <a type="button" class="rounded-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                      <img src="<?php echo "images/" . $data['doc2']; ?>" style="width:90%" class="cursor rounded-2 p-1 border border-dark">
                    </a>
                  <?php }
                  if ($data['doc3'] != '') { ?>
                    <a type="button" class="rounded-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                      <img src="<?php echo "images/" . $data['doc3']; ?>" style="width:90%" class="cursor rounded-2 p-1 border border-dark">
                    </a>
                  <?php }
                  if ($data['passbook'] != '') { ?>
                    <a type="button" class="rounded-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                      <img src="<?php echo "images/" . $data['passbook']; ?>" style="width:90%" class="cursor rounded-2 p-1 border border-dark">
                    </a>
                  <?php }
                  if ($data['pan_copy'] != '') { ?>
                    <a type="button" class="rounded-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                      <img src="<?php echo "images/" . $data['pan_copy']; ?>" style="width:90%" class="cursor rounded-2 p-1 border border-dark">
                    </a>
                  <?php } ?>
                  <a type="button" class="rounded-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <img src="<?php echo "images/" . $data['adhaar_copy']; ?>" style="width:90%" class="cursor rounded-2 p-1 border border-dark">
                  </a>

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
                            <?php } ?>
                            <div class="carousel-item">
                              <img src="<?php echo "images/" . $data['adhaar_copy']; ?>" class="d-block w-100" alt="...">
                            </div>
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
                    $email = $row2['email'];
                ?>
                    <div class="media d-flex justify-content-around border  mb-1" style=" padding:10px;">
                      <?php
                      $res2 = mysqli_query($db, "SELECT * FROM users where email='$email'");
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
                        <img src="kz_images/profile.png" height="64px" width="64px" class="rounded-circle " alt="...">
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
              <img src="kz_images/evenly.jpg" class=" mt-3 rounded-circle mx-auto" width="200vh" height="200vh" alt="profile">
            <?php
            } ?>
            <div class="card-body text-center">
              <h5 class="card-title"><?php echo $user1['name']; ?> <a href="mailto:<?php echo $user1['email'];?>"><i class="far fa-envelope"></i></a> </h5>
            <?php
          }
            ?>
            <p class="card-text">Created: <?php echo $data['date']; ?></p>
            <p class="card-text text-uppercase"><i class="fas fa-map-marker-alt"></i> <?php echo $data['location']; ?></p>


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