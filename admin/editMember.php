<?php
  if ($_POST) {
    // include database connection
    include ('../config/config.php');
    try {
      // // insert query
      // $nameErr = $YearErr ='';
      $id = $_GET['id'];
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
      $query3 = "UPDATE user SET username = ?, password = ?, full_name = ?, sex = ?, birthday = ?, email = ?, phone = ?, address = ? WHERE id = ?";
      $stmt = $conn->prepare($query3);
      // prepare query for execution

      // Execute the query
      // if($nameErr==''&&$YearErr==''){
          $stmt->bind_param('sssssssss', $username, $password, $fullname,
          $sex, $birthday, $email, $phone, $address, $id);
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
    .container { margin: 0 auto; }
  </style>
</head>
<body>
  <!-- container -->
  <div class="container">
    <div class="page-header">
      <h1>S???a th??ng tin th??nh vi??n</h1>
    </div>
    <form method="post">
      <table class='table table-hover table-responsive table-bordered'>
        <tr>
          <td>ID</td>
          <td><input type='text' name='id' class='form-control' value="<?php echo $_GET['id']?>" disabled></td>
        </tr>
        <tr>
          <td>Username</td>
          <td><input type='text' name='username' class='form-control' value="<?php echo $_GET['username']?>" required></td>
        </tr>
        <tr>
          <td>Password</td>
          <td><input type='text' name='password' class='form-control' value="<?php echo $_GET['password']?>" required></td>
        </tr>
        <tr>
          <td>H??? & t??n</td>
          <td><input type='text' name='full_name' class='form-control' value="<?php echo $_GET['full_name']?>" required></td>
        </tr>
        <tr>
          <td>Gi???i t??nh</td>
          <td>
            <select class="select" name="sex" required>
            <?php if ($_GET['sex'] == 'male') echo "<option value='male' selected>Nam</option><option value='female'>N???</option><option value='others'>Kh??c</option>";
                  else if ($_GET['sex'] == 'female') echo "<option value='male'>Nam</option><option value='female' selected>N???</option><option value='others'>Kh??c</option>";
                  else if ($_GET['sex'] == 'others') echo "<option value='male'>Nam</option><option value='female'>N???</option><option value='others' selected>Kh??c</option>";
                  ?>
            </select>
          </td>
        </tr>
        <tr>
          <td>Sinh nh???t</td>
          <td><input type='date' name='birthday' class='form-control' value="<?php echo $_GET['birthday']?>" required></td>
        </tr>
        <tr>
          <td>Email</td>
          <td><input type='email' name='email' class='form-control' value="<?php echo $_GET['email']?>" required></td>
        </tr>
        <tr>
          <td>S??? ??i???n tho???i</td>
          <td><input type='text' name='phone' class='form-control' value="<?php echo $_GET['phone']?>" required></td>
        </tr>
        <tr>
          <td>?????a ch???</td>
          <td><input type='text' name='address' class='form-control' value="<?php echo $_GET['address']?>" required></td>
        </tr>
        <tr>
          <td></td>
          <td>
            <input type='submit' value='L??u' class='btn btn-primary' />
            <a href='memberManagement.php' class='btn btn-danger'>Quay l???i b???ng th??nh vi??n</a>
          </td>
        </tr>
      </table>
    </form>
  </div> 
  <!-- end .container -->
</body>
</html>