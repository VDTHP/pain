<?php
  require_once('config/config.php');
  //select data
  $id = "";
  if (isset($_GET['prod_id'])) {
    $id = $_GET['prod_id'];
  }
  $query = "SELECT * FROM product WHERE id = '" . $id . "'";
  $res = mysqli_query($conn, $query);
  $dish = mysqli_fetch_all($res, MYSQLI_ASSOC);
  $row_cnt = $res->num_rows;
  $dish1 = $dish[0];
  mysqli_free_result($res);
  $query1 = "SELECT * FROM prod_comments WHERE prod_id = '" . $id . "'";
  $res = mysqli_query($conn, $query1);
  $cmts = mysqli_fetch_all($res, MYSQLI_ASSOC);
  $cmt_cnt = $res->num_rows;
  mysqli_free_result($res);
  $query2 = "SELECT id,username FROM user";
  $res = mysqli_query($conn, $query2);
  $users = mysqli_fetch_all($res, MYSQLI_ASSOC);
  mysqli_free_result($res);
?> 

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Font Awesome CDN-->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" rel="stylesheet">
  <!-- jQuery CDN-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <!-- Bootstrap CDN-->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- CSS -->
  <link rel="stylesheet" href="styles/productInfo-style.css">
  <script src = "js/script.js"></script>
  <title>Thông tin món ăn</title>
</head>

<body>
  <!-- nav bar --> 
  <div>
    <?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/btl-web/";
    include($IPATH."navbar.php");?>
  </div>
  <!-- end nav bar --> 
  
  <?php
    if($row_cnt==0){
        echo "<div class='alert alert-danger'>No records found.</div>";
    }
  ?>
  <main class="">
    <div class="container dark-grey-text">

      <!--Grid row-->
      <div class="row productDISP">

        <!--Grid column-->
        <div class="col-md-6 mb-4">
          <img src="<?php echo htmlspecialchars($dish1['img_path']); ?>" class="img-fluid" alt="">

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-6 mb-4">

          <!--Content-->
          <div class="p-4">

            <div class="mb-3">
                <h1><?php echo htmlspecialchars($dish1['name']); ?></h1>
            </div>

            <p class="lead">
              <span><h4>Giá:</h4><?php echo htmlspecialchars($dish1['price']); ?>.000 VND</span>
            </p>

            <p class="lead font-weight-bold"><h5>Miêu tả:</h5></p>

            <p><?php echo htmlspecialchars($dish1['description']); ?></p>

            <p><h5>Tình trạng:</h5>
              <?php
                  if ($dish1['status'] == 1) {
                    echo '<p class="stat-ok">Còn hàng<p>';
                  } else {
                    echo '<p class="stat-fail">Hết hàng<p>';
                  }
              ?>
            </p>

            <form class="d-flex justify-content-left">
              <!-- Default input -->
              <!-- <input type="number" value="1" aria-label="Search" class="form-control" style="width: 100px"> -->
              <!-- <button class="btn btn-primary btn-md my-0 p" type="submit">Add to cart -->
              <!-- <i class="fas fa-shopping-cart ml-1"></i> -->
              <!-- </button> -->
            </form>

          </div>
          <!--Content-->

        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->

      <hr>

      <!--Grid row-->
      <div class="row d-flex justify-content-center commentDISP">

        <!--Grid column-->
        <div class="col-md-6 text-center">
          <h4 class="my-4 h4">Comment</h4>
        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->

      <!--Grid row-->

  <div class="container my-5 py-5">
    <div class="row d-flex justify-content-center">
      <div class="col-md-12 col-lg-10 col-xl-8">
        <div class="card">
        <div class="card-header py-3 border-0" style="background-color: #f8f9fa;">
            <div class="d-flex flex-start w-100">
              <img class="rounded-circle shadow-1-strong me-3"
                src="img/logo.png" alt="avatar" width="40"
                height="40" />
              <div class="form-outline w-100">
                <textarea class="form-control" id="textAreaExample" rows="4"
                  style="background: #fff;" placeholder="Comment mới"></textarea>
                <label class="form-label" for="textAreaExample">Message</label>
              </div>
            </div>
            <div class="float-end mt-2 pt-1">
              <button type="button" class="btn-orange btn btn-primary btn-sm">Post comment</button>
              <button type="button" class="btn-orange-out btn btn-outline-primary btn-sm">Cancel</button>
            </div>
          </div>
          <?php 
              if($cmt_cnt == 0)
              {
                 echo "Chưa có bình luận nào";
              }
              foreach($cmts as $comment){
          ?>
           
          <!--cmt-->
          <div class="card-body">
            <div class="d-flex flex-start align-items-center">
              <img class="rounded-circle shadow-1-strong me-3"
                src="img/logo.png" alt="avatar" width="60"
                height="60" />
              <div>
                <h6 class="fw-bold text-primary mb-1">
                  <?php $key = array_search($comment['user_id'], array_column($users, 'id')); 
                  echo ($users[$key]['username']);
                  ?>
                </h6>
                <p class="text-muted small mb-0">
                  <?php echo $comment['datetime'];?>
                </p>
              </div>
            </div>

            <p class="mt-3 mb-4 pb-2">
              <?php echo $comment['content'];?>
            </p>

            <div class="small d-flex justify-content-start">
              <a href="#!" class="d-flex align-items-center me-3">
                <i class="far fa-thumbs-up me-2"></i>
                <p class="mb-0">Like</p>
              </a>
              <a href="#!" class="d-flex align-items-center me-3">
                <i class="far fa-comment-dots me-2"></i>
                <p class="mb-0">Comment</p>
              </a>
              <a href="#!" class="d-flex align-items-center me-3">
                <i class="fas fa-share me-2"></i>
                <p class="mb-0">Share</p>
              </a>
            </div>
          </div>
          <?php }
          mysqli_close($conn);
          ?>
          <!--cmt-->
        </div>
      </div>
    </div>
  </div>
      <!--Grid row-->

    </div>
  </main>
  <!--Main layout-->
  <!-- footer --> 
  <div>
    <?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/btl-web/";
    include($IPATH."footer.php");?>
  </div>
  <!-- end footer --> 
</body>
</html>