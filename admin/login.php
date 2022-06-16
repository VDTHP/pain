<!DOCTYPE html>
<html lang="en">
<head>
  <!-- include library -->
  <?php include ('../header.php'); ?>
  <!-- CSS -->
  <link rel="stylesheet" href="../styles/form.css">
  <title>Đăng nhập tài khoản admin</title>
</head>

<body>
  <!-- Start Nav bar --> 
  <div>
    <?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/btl-web/admin/";
    include($IPATH."navbar.php");?>
  </div>
  <!-- End Nav bar --> 
  <!-- Start retrieving data -->
  <?php
    require_once('../config/config.php');
    if (session_id() === "")
    {
      session_start();
    }
    if (isset($_POST['login'])) {
      $username =   $_POST['username'];
      $username =   mysqli_real_escape_string($conn, $username);
      $password =   $_POST['password'];
      $password =   mysqli_real_escape_string($conn, $password);

      $query    = "SELECT * FROM `admin` WHERE username='$username' AND password='" . $password. "'";
      $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
      $rows = mysqli_num_rows($result);
      if ($rows == 1) {
        $id = htmlspecialchars(mysqli_fetch_all($result, MYSQLI_ASSOC)[0]['id']);
        $_SESSION['admin_id'] = $id;
        $_SESSION['admin_username'] = $username;
        header('location:../admin/');
        mysqli_free_result($result);
      } else {
        echo "<script>
                Swal.fire({
                  icon: 'warning',
                  title: 'Username or password incorrect',
                  text: 'Please try again!'
                })
              </script>";
      }
    }
    mysqli_close($conn);
  ?>
  <!-- End retrieving data -->
  <!-- Start Register Form -->
  <div class="h-100 h-custom my-container-log">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-8 col-xl-6">
          <div class="card rounded-3">
            <img src="../img/reg-img/regform.jpg" class="w-100" style="border-top-left-radius: .3rem; border-top-right-radius: .3rem;">
            <div class="card-body p-4 p-md-5">
              <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Đăng Nhập</h3>

              <form action="" method="post" class="px-md-2">
                <div class="form-outline mb-4">
                  <label class="form-label" for="username" required>Username</label>
                  <input type="text" name="username" id="username" class="form-control"/>
                </div>
                <div class="form-outline mb-4">
                  <label class="form-label" for="password" required>Mật khẩu</label>
                  <input type="password" name="password" id="password" class="form-control"/>
                </div>
                <div style="display: flex; align-items: center; justify-content: center">
                  <button type="submit" name="login" class="btn btn-success btn-lg mb-1" style="background-color: #ff7f50">Đăng Nhập</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Register Form -->
</body>
</html>