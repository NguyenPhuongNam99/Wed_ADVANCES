<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="i.css">
  <link rel="stylesheet" href="tintuc.css">
  <link rel="stylesheet" href="css/style_trangchu.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />


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
        session_start();
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



  <div class="content">
    <div class="content1">

    </div>
    <div class="content2">
      <h4>Tin Tức Mới</h4>
    </div>
    <div class="content1">

    </div>
  </div>

  <div class="container mt-2">
    <div class="row">
      <?php
      require("view/func.php");
      $query = "SELECT * from tintuc order by ThoiGian desc";
      $rows = Select($conn, $query);
      for ($i = 0; $i < 4; $i++) {
      ?>
        <div class="col-sm-3 anh">
          <img src="images/<?= $rows[$i]["Img"] ?>" alt="">
          <h4><?= $rows[$i]["Title"] ?></h4>
          <p><?= substr($rows[$i]["Content"], 0, 100) ?></p>
        </div>
      <?php
      }
      ?>
    </div>
  </div>


  <div class="content b1">
    <div class="content1">

    </div>
    <div class="content2">
      <h4>Cách Chế Biến Món Ăn</h4>
    </div>
    <div class="content1">

    </div>
  </div>

  <div class="container ">
    <div class="row">
      <?php
      $query = "SELECT * from tintuc where Loai=3 order by ThoiGian desc";
      $table = Select($conn, $query);
      for ($i = 0; $i < 4; $i++) {
      ?>
        <div class="col-sm-3 anh">
          <img src="images/<?= $table[$i]["Img"] ?>" alt="">
          <h4><?= $table[$i]["Title"] ?></h4>
          <p><?= $table[$i]["Content"] ?></p>
        </div>
      <?php
      }
      ?>
    </div>
  </div>

  <div class="content b1">
    <div class="content1">

    </div>
    <div class="content2">
      <h4>Thông Tin Các Loại Gạo</h4>
    </div>
    <div class="content1">

    </div>
  </div>

  <div class="container">
    <?php
    $query = "SELECT * from tintuc where Loai=2 order by ThoiGian desc";
    $table = Select($conn, $query);
    for ($i = 0; $i < 7; $i++) {
    ?>
      <div class="row mt-3">
        <div class="col-sm-3 anh">
          <img src="images/<?= $table[$i]["Img"] ?>" alt="">
        </div>
        <div class="col-sm-9">
          <H4><?= $table[$i]["Title"] ?></H4>
          <p><?= $table[$i]["Content"] ?></p>
        </div>
      </div>
    <?php
    }
    ?>
  </div>
  <footer class="bg-dark mt-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12 pt-5"><img src="images/logo1.png" alt="footer image" class="img-fluid footer-image wow slideInDown"></div>
      </div>

      <div class="row text-light mt-5">
        <div class="col-md-3 wow slideInLeft">
          <div class="footer-heading">
            ABOUT
          </div>
          <p class="footer-text mt-3">Cửa Hàng gạo chúng tôi phát triển và kinh doang trong hơn 10 năm qua ,Với đội ngũ và sản phẩm tốt đến từ các vùng nông thôn</p>
          <img src="images/cards.webp" class="img-fluid mt-2" alt="card">
        </div>

        <div class="col-md-3 wow slideInRight">
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