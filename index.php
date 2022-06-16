<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Font Awesome CDN-->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" rel="stylesheet">
  <!-- jQuery CDN-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <!-- jsdelivr CDN / Sweet Alert2-->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- Bootstrap CDN-->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- CSS -->
  <link rel="stylesheet" href="styles/styles.css">
  <title>Trang chủ</title>
</head>

<body>
  <!-- Start conformation message -->
  <?php
    session_start();
    if (isset($_SESSION['user_id'])) {
      $id = $_SESSION['user_id'];
      $username = $_SESSION['username'];
    }
  ?>
  <!-- End Conformation message -->
  <!-- nav bar --> 
  <div>
    <?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/btl-web/";
    include($IPATH."navbar.php");?>
  </div>
  <!-- end nav bar --> 
  <!-- main content --> 
  <div class="main-content">
    <div class=" food-search height d-flex justify-content-center align-items-center">
        <div class="col-md-8">
          <div class="search">
              <i class="fa fa-search"></i>
              <input type="text" name="input-search" class="form-control" placeholder="Bạn đang thèm gì?">
              <button class="btn btn-primary" name="submit-search">Tìm kiếm</button>
          </div>     
        </div>
    </div>
    <div class="container-img">
      <h2 class="text-center">Khám phá danh mục sản phẩm</h2>
        
      <div class="row justify-content-center">
        <div class="col-3">
          <a href="#">
            <img src="img/food-img/ramen-cata.jpg" alt="" class="img-fluid img-curve">
          </a>
        </div>
        <div class="col-3">
            <a href="#">
              <img src="img/food-img/sushi-cata.jpg" alt="" class="img-fluid img-curve">
            </a>
        </div>
        <div class="col-3">
          <a href="#">
            <img src="img/food-img/beverage-cata.jpg" alt="" class="img-fluid img-curve">
          </a>
        </div>
        <div class="col-3">
          <a href="#">
            <img src="img/food-img/rice-cata.jpg" alt="" class="img-fluid img-curve">
            </a>
        </div>
      </div>
    </div>
        <div class="blog bg-dark">
            <div class="headline-container text-center">
                <h3 class="headline">Bảng tin</h3>
            </div>
            <div class="snippet">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit ligula nunc, non consequat lorem aliquam a. Vivamus non consequat urna. Fusce lobortis ultrices tristique. Nullam ante leo, pulvinar et eleifend a, congue quis libero. Mauris nec ullamcorper justo. Etiam sit amet finibus nulla, in ullamcorper sem. Proin quis mauris ac neque tempus ultricies. Etiam suscipit tincidunt metus elementum volutpat.

              Sed interdum hendrerit ante sed gravida. Quisque est augue, mattis ac mi nec, eleifend venenatis lorem. Morbi lobortis placerat commodo. In luctus mi purus. Donec non eros in velit faucibus vulputate. Nam eu est vulputate, congue justo ut, sodales orci. Praesent eu fermentum massa. Phasellus ac volutpat lacus. Sed porttitor lorem non leo placerat, in euismod risus laoreet. Praesent sit amet arcu volutpat, congue est ac, lacinia lacus. In hac habitasse platea dictumst. Suspendisse tempor ornare lorem in lacinia. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Maecenas vel metus eget ex venenatis sagittis eu et turpis. Nunc fermentum est eu odio tincidunt, non dapibus justo cursus. Donec imperdiet convallis nibh, a aliquet odio congue eget.
            </div>
        </div>
  </div>
  <!-- end .main-content -->    
  <!-- footer --> 
  <div>
    <?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/btl-web/";
    include($IPATH."footer.php");?>
  </div>
  <!-- end footer --> 
</body>
</html>