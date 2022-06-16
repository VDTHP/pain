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
    <form method="post" action="productManagement.php">
      <a href="newProduct.php"><input type="button" class="p-3 mb-2 bg-primary bg-gradient text-white" value="Thêm sản phẩm"></a>
    </form>
      <?php
        include('../config/config.php');
        echo "<table class='table table-bordered'>
                <tr>
                    <th>ID</th>
                    <th>Tên sản phẩm</th>
                    <th>Mô tả sản phẩm</th>
                    <th>Giá</th>
                    <th>Hình</th>
                    <th>Trạng thái (còn/hết)</th>
                    <th>Trên tin tức?</th>
                </tr>
                <tbody>";
        $sql = "SELECT * from product";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              $id = $row['id'];
              echo "<tr><td>".$row['id']."</td><td>".$row['name']."</td><td>".$row['description'].
              "</td><td>".$row['price']."</td><td>".$row['img_path']."</td><td>".$row['status']."</td>
              <td>".$row['feature']."</td><td>".
              "<a href='editProduct.php?id=$id' class='btn btn-primary m-r-1em' name='edit'>Sửa</a>
              <a href='deleteProduct.php?id=$id' class='btn btn-danger'>Xóa</a></td></tr>";
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