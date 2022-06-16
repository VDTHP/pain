<?php
  if($_POST){
    // include database connection
    include ('../config/config.php');

    try {
      // // insert query
      // $nameErr = $YearErr ='';
      //$id = $_POST['id'];
      $username = $_POST['username'];
      $password = $_POST['password'];
      $fullname = $_POST['full_name'];
      $sex = $_POST['sex'];
      $birthday = $_POST['birthday'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];
      $address = $_POST['address'];
      // if($input_name=='')
      // {
      //     $nameErr = "Name is required";
      // }
      // else if(strlen($input_name)>40||strlen($input_name)<5)
      // {
      //     $nameErr = "Name must be within 5-40 characters";
      // }
      // if($input_name=='')
      // {
      //     $YearErr = "Year is required";
      // }
      // else if(!is_numeric($input_year))
      // {
      //     $YearErr = "Invalid input!";
      // }
      // else if($input_year<1990||$input_year>2022)
      // {
      //     $YearErr = "Year must be within the range of 1990-2022";
      // }
      $query2 = "INSERT INTO user (username, password, full_name, sex, birthday, email, phone, address) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";;
      $stmt = $conn->prepare($query2);
      // prepare query for execution

      // Execute the query
      // if($nameErr==''&&$YearErr==''){
          $stmt->bind_param('ssssssss', $username, $password, $fullname,
          $sex, $birthday, $email, $phone, $address);
          $stmt->execute();
          echo "<div class='alert alert-success'>Record was saved.</div>";
      // }
      // else{
      //     echo "<div class='alert alert-danger'>Unable to save record.</div>";
      //     if($nameErr!='')
      //     {
      //         echo "<div class='alert alert-danger'>'$nameErr'</div>";
      //     }
      //     if($YearErr!='')
      //     {
      //         echo "<div class='alert alert-danger'>'$YearErr'</div>";
      //     }
      // }
      mysqli_close($conn);
    }   
    // show error
    catch(mysqli_sql_exception $exception){
      die('ERROR: ' . $exception->getMessage());
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- jQuery CDN-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <!-- Bootstrap CDN-->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <style>
  .container{ margin: 0 auto; }
  </style>
</head>
<body>
  <!-- container -->
  <div class="container">
    <div class="page-header">
      <h1>Thêm thành viên</h1>
    </div>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
      <table class='table table-hover table-responsive table-bordered'>
        <!-- <tr>
          <td>ID</td>
          <td><input type='text' name='id' class='form-control' required></td>
        </tr> -->
        <tr>
          <td>Username</td>
          <td><input type='text' name='username' class='form-control' required></td>
        </tr>
        <tr>
          <td>Password</td>
          <td><input type='text' name='password' class='form-control' required></td>
        </tr>
        <tr>
          <td>Họ & tên</td>
          <td><input type='text' name='full_name' class='form-control' required></td>
        </tr>
        <tr>
          <td>Giới tính</td>
          <td>
            <select class="select" name="sex" required>
              <option value="male">Nam</option>
              <option value="female">Nữ</option>
              <option value="others">Khác</option>
            </select>
          </td>
        </tr>
        <tr>
          <td>Sinh nhật</td>
          <td><input type='date' name='birthday' class='form-control' required></td>
        </tr>
        <tr>
          <td>Email</td>
          <td><input type='email' name='email' class='form-control' required></td>
        </tr>
        <tr>
          <td>Số điện thoại</td>
          <td><input type='text' name='phone' class='form-control' required></td>
        </tr>
        <tr>
          <td>Địa chỉ</td>
          <td><input type='text' name='address' class='form-control' required></td>
        </tr>
        <tr>
          <td></td>
          <td>
            <input type='submit' value='Lưu' class='btn btn-primary' />
            <a href='memberManagement.php' class='btn btn-danger'>Quay lại bảng thành viên</a>
          </td>
        </tr>
      </table>
    </form>
  </div> 
  <!-- end .container -->
</body>
</html>