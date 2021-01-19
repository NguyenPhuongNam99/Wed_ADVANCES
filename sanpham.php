<?php
require("view/func.php");
session_start();
AddToCart($_GET["ID"]);
?>
<!doctype html>
<html lang="en">

<head>
  <title>Sản phẩm</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <script type="text/javascript" src="view/func.js"></script>
  <link rel="stylesheet" href="i.css">
  <link rel="stylesheet" href="tintuc.css">
  <link rel="stylesheet" href="css/style_trangchu.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

  <div class="container">
    <div class="row">
      <div class="col-sm-8">
        <div class="cha1">
          <div class="flex-left mr-0">
            <img src="images/map.png" alt="">
          </div>
          <div class=" ">
            <p>Địa chỉ:</p>

            <p>138 Phú Nghĩa ,Phú Kim ,Thạch Thất ,Hà Nội</p>
          </div>
        </div>
      </div>


      <div class="col-sm-4">
        <div class="cha1">
          <div>
            <img src="images/phone.png" alt="">
          </div>
          <div>
            <p>
              0973.712.797
            </p>
            <p>
              gaosachonline.com@gmail.com
            </p>

          </div>
        </div>
      </div>

    </div>
  </div>

  <div class="header">

    <div class="cha">
      <ul>
        <li>
          <img src="images/logo1.png" alt="">
        </li>
        <li>
          <a href="index.php"> Trang Chủ</a>
        </li>
        <li>
          <a href="cuahang.php">Cửa Hàng</a>
        </li>
        <li>
          <a href="gaotuthien.php"> Gạo Từ Thiện</a>
        </li>
        <li>
          <a href="gaongon.php">Các Loại Gạo Ngon</a>
        </li>
        <li>
          <a href="giagao.php"> Bảng Gía Gạo</a>
        </li>
        <li>
          <a href="daily.php">Dành Cho Đại Lý</a>
        </li>
        <li>
          <a href="tintuc.php">Tin Tức</a>
        </li>
        <li>
          <a href="lienhe.php">Liên Hệ</a>
        </li>
        <li>
          <a href="profile.php">Profile</a>
        </li>
        <li>
          <a href="giohang.php"><i class="fas fa-shopping-cart"></i></a>
        </li>
        <?php
        if (isset($_SESSION["TaiKhoan"])) {
        ?>
          <li>
            <a href="dangxuat.php" onclick="return confirm('Đăng xuất tài khoản')">Đăng xuất</a>
          </li>
        <?php
        }
        ?>
      </ul>
    </div>
  </div>

  <div class="container content">
    <div class="card-title">
      <h5><span class="text-info ml-3">Trang Chủ</span> / Gạo Đóng Túi</h5>

    </div>

  </div>


  <div class="container mh">
    <div class="row">
      <?php
      if (isset($_GET["ID"])) {
        $id = $_GET["ID"];
        $query = "SELECT * from sanpham where ID=$id";
        $data = Select($conn, $query);
        if ($data == null)
          echo ("<h1>Không tồn tại sản phẩm</h1>");
        else {
          $row = $data[0];
          $mota = explode("#", $row["MoTa"]);
      ?>
          <div class="col-sm-6 ">
            <img src="images/<?= $row["Img"] ?>" alt="">
          </div>
          <div class="col-sm-6">
            <h4><?= $row["TenSP"] ?></h4>
            <p><?= $mota[0] ?></p>
            <div id="textship"><i class="fas fa-cart-arrow-down"></i>
              <b>Đặt online giao tận nhà ĐÚNG GIỜ trong vòng 45 phút</b>
            </div>
            <p> <b>(*) Giữ hoá đơn để được đổi sản phẩm trong 48 giờ</b></p>
            <div class="btn btn-success " onclick="GetKL(<?= $id ?>)">Đặt Mua Hàng</div>

            <div class="back" style="height:65%">
              <h5>Thông tin sản phẩm</h5>
              <ul>
                <?php
                $chitiet = explode("#", $row["ChiTiet"]);
                foreach ($chitiet as $li) {
                ?>
                  <li><?= $li ?></li>
                <?php
                }
                ?>
              </ul>
            </div>
            <div class="icon">
              <div class="iconhead">
                <div class="icon1">
                  <i class="fab fa-facebook-f"></i>
                </div>
                <div class="icon1">
                  <i class="fab fa-twitter"></i>
                </div>
                <div class="icon1">
                  <i class="far fa-envelope-open"></i>
                </div>
                <div class="icon1">
                  <i class="fab fa-linkedin"></i>
                </div>
                <div class="icon1">
                  <i class="fab fa-line"></i>
                </div>
              </div>
            </div>
          </div>
    </div>
  </div>
  <div class="container">
    <div class="foot" style="margin-top:210px">
      <h5>Mô Tả</h5>
      <?php
      unset($mota[0]);
      foreach($mota as $i){
        ?>
        <p><?= $i ?></p>
        <?php
      }
      ?>
    </div>
  </div>
<?php
        }
      } else
        echo ("<h1>Chưa có mã sản phẩm</h1>");
?>

<div class="container">
  <p class="text-center text-info">Xem Thêm</p>

  <div class="row">
    <?php
    $query = "SELECT * from sanpham order by RAND() limit 4 ";
    if (isset($id))
      $query = "SELECT * from sanpham where ID!=$id order by RAND() limit 4 ";
    $data = Select($conn, $query);
    foreach ($data as $row) {
    ?>
      <div class="col-sm-3">
        <img src="images/<?= $row["Img"] ?>" style="width: 100%" alt="">
        <p class="mb-1"><?= $row["TenSP"] ?></p>
        <p class="text-danger"><?= $row["Gia"] ?></p>
      </div>
    <?php
    }
    ?>
  </div>
</div>



<footer class="bg-dark mt-3">
  <div class="container">
    <div class="row">
      <div class="col-md-12 pt-5"><img src="images/logo1.png" alt="footer image" class="img-fluid footer-image wow slideInDown"></div>
    </div>

    <div class="row text-light mt-5">
      <div class="col-md-3 wow slideInLeft">
        <div class="footer-heading ">
          ABOUT
        </div>
        <p class="footer-text mt-3">Cửa Hàng gạo chúng tôi phát triển và kinh doang trong hơn 10 năm qua ,Với đội ngũ và sản phẩm tốt đến từ các vùng nông thôn</p>
        <img src="images/cards.webp" class="img-fluid mt-2" alt="card">
      </div>

      <div class="col-md-3 wow slideInRight ml-5">
        <div class="footer-heading ml-3">
          QUESTIONS
        </div>
        <div class="row">
          <div class="col-md-6">
            <ul class="footer-list mt-3">
              <li><a href="#">About Us</a></li>
              <li><a href="#">Track Orders</a></li>
              <li><a href="#">Returns</a></li>
              <li><a href="#">Jobs</a></li>
              <li><a href="#">Shipping</a></li>
              <li><a href="#">Blog</a></li>
            </ul>
          </div>
          <div class="col-md-6">
            <ul class="footer-list mt-3">
              <li><a href="#">About Us</a></li>
              <li><a href="#">Track Orders</a></li>
              <li><a href="#">Returns</a></li>
              <li><a href="#">Jobs</a></li>
              <li><a href="#">Shipping</a></li>
              <li><a href="#">Blog</a></li>
            </ul>
          </div>
        </div>


      </div>



      <div class="col-md-3 wow slideInUp ml-5">
        <div class="footer-heading">
          CONTACT US
        </div>
        <p class="footer-text mt-3"><i class="fa fa-home" aria-hidden="true"></i> : Thạch Thất - Hà Nội</p>
        <p> <i class="fa fa-envelope-o" aria-hidden="true"></i> : nguyenphuongnam06012000@gmail.com</p>
        <p><i class="fa fa-phone" aria-hidden="true"></i> : 0973.712.797</p>
        <p><i class="fa fa-fax" aria-hidden="true"></i> : 0914.255.114</p>

      </div>


    </div>

    <hr>

    <div class="footer-endline text-center text-light mt-2 pb-4 wow fadeIn">WBSITE DESIGN BY NGUYEN PHUONG NAM -DOAN QUANG HUY DAS @copywrite 2016-2022</div>
  </div>
</footer>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>