<?php
  if (session_id() === "") {
    session_start();
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSS -->
  <link rel="stylesheet" href="styles/header.css">  
  <title>Document</title>
</head>
<body>
  <nav class="my-navbar-logo navbar navbar-expand-xl navbar-dark bg-dark">
      <div class="my-container container-fluid justify-content-center">
        <a class="navbar-brand" href="index.php">
            <img src="img/logo.png" width="90" height="90" class="d-inline-block align-top" alt="">
        </a>
      </div>
  </nav>
  <nav class="my-navbar navbar navbar-expand-xl navbar-dark bg-dark">
    <div class="my-container container-fluid justify-content-center">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon justify-content-center"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-center"  id="collapsibleNavbar">
          <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="index.php">Trang chủ</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.php">Giới thiệu</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="productsList.php">Sản phẩm</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="news.php">Tin tức</a>
              </li>
          </ul>
      </div>
      <!-- Icon dropdown -->
      <?php if (isset($_SESSION['user_id'])) { ?>

      <div class="dropdown">
          <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="img/logo.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
              <span class="d-none d-sm-inline mx-1"><?php echo $_SESSION['username'];?></span>
          </a>
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
              <!-- <li><a class="dropdown-item" href="#">Your Order</a></li> -->
              <li><a class="dropdown-item" href="#">Cài đặt</a></li>
              <li><a class="dropdown-item" href="#">Tài khoản</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="logout.php">Đăng xuất</a></li>
          </ul>
      </div>

      <?php } else { ?>

      <div class="dropdown user-drop">
          <button type="button" class="user-btn btn btn-dark dropdown-toggle" data-bs-toggle="dropdown">
          <i class="fas fa-user-circle"></i>
          </button>
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark">
            <li><a class="dropdown-item" href="register.php">Đăng ký</a></li>
            <li><a class="dropdown-item" href="login.php">Đăng nhập</a></li>
          </ul>
      </div>
      
      <?php } ?>       
    </div>
  </nav>
</body>
</html>