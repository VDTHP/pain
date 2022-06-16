<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
  <link rel="stylesheet" href="admin-styles/styles.css">
  <title>Admin Panel</title>
</head>
<body>

  <!-- nav bar --> 
  <div>
    <?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/btl-web/admin/";
    include($IPATH."navbar.php");?>
  </div>
  <!-- end nav bar --> 
    <form method="post" action="memberManagement.php">
      <!--<a href="memberManagement.php"><input type="button" class="p-3 mb-2 bg-primary bg-gradient text-white" name="display" value="Hiển thị danh sách thành viên"></a>-->
      <a href="newMember.php"><input type="button" class="p-3 mb-2 bg-primary bg-gradient text-white" value="Thêm thành viên"></a>
    </form>
      <?php
        include('../config/config.php');
        echo "<table class='table table-bordered'>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Mật khẩu</th>
                    <th>Họ & tên</th>
                    <th>Giới tính</th>
                    <th>Sinh nhật</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Sửa/Xóa thông tin</th>
                </tr>
                <tbody>";
        $sql = "SELECT * from user";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              $id = $row['id'];
              echo "<tr><td>".$row['id']."</td><td>".$row['username']."</td><td>".$row['password'].
              "</td><td>".$row['full_name']."</td><td>".$row['sex']."</td><td>".$row['birthday']
              ."</td><td>".$row['email']."</td><td>".$row['phone']."</td><td>".$row['address']."</td>
              <td><a href='editMember.php?id=$id' class='btn btn-primary m-r-1em' name='edit'>Sửa</a>
              <a href='deleteMember.php?id=$id' class='btn btn-danger'>Xóa</a></td></tr>";
          }
          echo "</tbody></table>";
        }
      ?>
  <!-- footer --> 
  <!-- <footer class="bg-light text-center text-lg-start">
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      Admin Panel!!!
    </div>
  </footer> -->
  <!-- end footer  -->
</body>
</html>