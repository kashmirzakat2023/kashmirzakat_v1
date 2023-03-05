<?php
include 'assets/nav-links.php'; ?>
<html>

<head>
  <link rel="stylesheet" href="css/success.css">
  <script src="js/success.js"></script>
  <?php
  $id = $_GET['id'];
  include 'assets/connection.php';
  $result = mysqli_query($db, " SELECT * FROM form_data where id = '$id' and status='Accepted'");
  ?>
</head>

<body>
  <?php
  if (isset($_SESSION['username'])) {

  ?> <script src="js/like.js" defer></script>
    <?php
  }
  include 'assets/navbar.php';
  if (isset($_SESSION['username'])) {

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
        <div class="col col-10 mr-0 mx-lg-5 mx-md-3">
          <div class="card border-0">
            <img src="<?php echo "images/" . $data['profile_pic']; ?>" onclick="location.href=this.src;" class="border card-img-top" alt="...">
            <div class="card-body">
              <label for="title">Cause Title</label>
              <h2 class="card-title fw-bold">
                <input type="text" name="" style="width: 100%;" value="<?php echo $data['cause_title']; ?>" id="">
              </h2>
              <hr>

              <!-- Tab panes -->
              <div id="home" class="container tab-pane active"><br>
                <p>
                  <?php echo $data['cause_explain']; ?>
                </p>
                <!-- ----- -->
                <h4>Supporting documents</h4>

                <div class="d-flex">
                  <a type="button" class="rounded-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <img src="<?php echo "images/" . $data['doc1']; ?>" style="width:90%" class="cursor rounded-2 p-1 border border-dark">
                  </a>
                  <a type="button" class="rounded-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <img src="<?php echo "images/" . $data['doc2']; ?>" style="width:90%" class="cursor rounded-2 p-1 border border-dark">
                  </a>
                  <a type="button" class="rounded-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <img src="<?php echo "images/" . $data['doc3']; ?>" style="width:90%" class="cursor rounded-2 p-1 border border-dark">
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
                            <div class="carousel-item">
                              <img src="<?php echo "images/" . $data['doc2']; ?>" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                              <img src="<?php echo "images/" . $data['doc3']; ?>" class="d-block w-100" alt="...">
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
              </div>
            </div>
            <div class=" d-flex justify-content-around p-2 bg-light">
              <a class="btn btn-primary m-2 col-3 fs-5" href="edit.php?edit=<?php echo $data['id']; ?>">Save changes</a>
              <?php
              if ($_SESSION['username'] == "admin") {
              ?>
                <a class="btn btn-Success m-2 col-3 fs-5" href="accept.php?id=<?php echo $data['id']; ?>">Accept</a>
                <a class="btn btn-danger m-2 col-3 fs-5" href="reject.php?id=<?php echo $data['id']; ?>">Reject</a>
              <?php
              }
              ?>
            </div>
          </div>
        <?php
      }
        ?>
        </div>
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