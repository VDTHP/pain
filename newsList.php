<?php
    require_once('config/config.php');
    //select data
    $query = "SELECT id, name, price FROM product ORDER BY id";
    $res = mysqli_query($conn, $query);
    $food = mysqli_fetch_all($res, MYSQLI_ASSOC);
    $row_cnt = $res->num_rows;
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
  <link rel="stylesheet" href="../styles/styles.css">
  <script src = "js/script.js"></script>
  <title>Sản phẩm</title>
</head>

<body>
  <!-- nav bar --> 
  <div>
    <?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/btl-web/";
    include($IPATH."navbar.php");?>
  </div>
  <!-- end nav bar -->
  <div class="displayProd">
      <div class="row">
        <?php
          if($row_cnt == 0) {
            echo "<div class='alert alert-danger'>No records found.</div>";
          }
          foreach($food as $dish) { 
        ?>

        <div class="col s-6 md-3">
            <div class="card z-depth-0">
              <div class="card-content center">
                <h6><?php echo htmlspecialchars($dish['name']); ?></h6>
                <div><?php echo htmlspecialchars($dish['price']); ?></div>
              </div>
              <div class="card-action right-align">
                    <a class="brand-text" href="#">More info</a>
              </div>
            </div>
        </div>

        <?php 
          }
          mysqli_close($conn); 
        ?>
      </div>
  </div>
  <!-- footer --> 
  <div>
    <?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/btl-web/";
    include($IPATH."footer.php");?>
  </div>
  <!-- end footer --> 
  
</body>
</html>