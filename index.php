<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300&display=swap" rel="stylesheet">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.css">
  <link rel="stylesheet" href="css/style_trangchu.css">
  <link rel="stylesheet" href="css/animate.css">
  <link rel="stylesheet" href="i.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />



  <title>Gạo Online</title>
</head>

<body>
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

  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="images/gao.jpg" class="d-block w-100" alt="...">
        <!-- <div class="carousel-caption d-none d-md-block">
		<p class="heading animated bounceInLeft">BOOTSTRAP 4 ANIMATED CAROUSEL</p>
			<p class="sub-heading animated flipInX delay-1s">CODE LINK GIVEN IN VIDEO DESCRIPTION</p>
			<a class="btn btn-lg btn-danger mt-5 delay-2s animated bounce delay-2s infinite ">LIKE & SHARE</a>
		
		</div>  -->
      </div>
      <div class="carousel-item">
        <img src="images/gao2.jpg" class="d-block w-100" alt="...">

        <!-- <div class="carousel-caption d-none d-md-block">
		<p class="heading animated bounceInLeft">BOOTSTRAP 4 ANIMATED CAROUSEL</p>
			<p class="sub-heading animated flipInX delay-1s">CODE LINK GIVEN IN VIDEO DESCRIPTION</p>
			<a class="btn btn-lg btn-danger mt-5 delay-2s animated bounce delay-2s infinite ">LIKE & SHARE</a>
		
		</div>  -->
      </div>
      <div class="carousel-item">
        <img src="images/gao3.jpg" class="d-block w-100" alt="...">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>





  <div class="container-fluid">
    <div class="row bg-gray wow slideInDown">
      <div class="col-md-4">
        <div class="icon-text"> <i class="fa fa-money" aria-hidden="true"></i> FAST SECURE PAYMENTS</div>
      </div>

      <div class="col-md-4 bg-pink">
        <div class="icon-text"> <i class="fa fa-star" aria-hidden="true"></i> PREMIUM PRODUCTS</div>
      </div>

      <div class="col-md-4">
        <div class="icon-text"> <i class="fa fa-truck" aria-hidden="true"></i> FREE & FAST DELIVERY</div>
      </div>


    </div>
  </div>



  <div class="container mt-5 ">
    <div class="row wow flash">
      <div class="col-md-12 text-center">
        <h1>Sản Phẩm Hot</h1>
      </div>
    </div>



    <div class="row mt-5">
      <?php
      require("ketnoicsdl.php");
      $query = "SELECT * from sanpham order by ID desc";
      $data = $conn->prepare($query);
      $ketqua = $data->execute();
      $rows = $data->fetchAll();
      if ($ketqua == false)
        echo "<h3>Lỗi sql</h3>";
      else
        for ($i = 0; $i < 4; $i++) {
      ?>
        <div class="col-md-3 wow zoomInDown">
          <div class="card">
            <a href="sanpham.php?ID=<?= $rows[$i]["ID"] ?>">
              <img class="card-img-top img-fluid" alt="img1" src="images/<?= $rows[$i]["Img"] ?>">
            </a>
            <div class="card-body">
              <div class="card-title"><?= $rows[$i]["TenSP"] ?></div>
              <p class="card-text text-danger"><?= $rows[$i]["Gia"] ?> VNĐ</p>
              <!-- <a href="sanpham.php?ID=<?= $rows[$i]["ID"] ?>" class="btn btn-pink text-light" onclick="return InputEvent">
                <i class="fa fa-cart-plus" aria-hidden="true"></i> Add To Cart
              </a> -->
            </div>
          </div>
        </div>
      <?php
        }
      ?>
    </div>
  </div>






  <!-- <div class="container-fluid bc">
        <div class="container pt-5 pb-5">
          <div class="row inner-text">
            <div class="col-md-6 text-light">
                <h3 class="wow slideInUp">NEW ARRIVALS</h3>
                <h1 class="mt-4 wow slideInDown">STRIPED  BLUE LINGERIE</h1>
                <a class="btn btn-lg bg-pink text-light mt-3 wow slideInLeft"> SHOP NOW</a>
              </div>
            </div>
          </div>
      </div>
       -->









  <div class="container mt-5">
    <div class="row wow flash">
      <div class="col-md-12 text-center">
        <h1>Sản Phẩm Bán Chạy</h1>
      </div>
    </div>

    <div class="row mt-4 wow bounceIn">
      <div class="col-md-12">
        <div class="col-md-12"> <a class="btn btn-light">Gạo Tám</a> <a class="btn btn-light ml-4">Gạo Thái</a> <a class="btn btn-light ml-4">Gạo Điện Biên</a> <a class="btn btn-light ml-4">Gạo Nếp</a> <a class="btn btn-light ml-4">Gạo Tẻ</a> <a class="btn btn-light ml-4">ST15</a> <a class="btn btn-light ml-4">ST25</a> <a class="btn btn-light ml-4 mt-2">Gạo Khang Dân</a> <a class="btn btn-light ml-4 mt-2">Nếp Nhung</a> </div>
      </div>
    </div>


    <div class="row mt-5">
      <?php
      require("ketnoicsdl.php");
      $query = "SELECT * from sanpham order by ID desc";
      $data = $conn->prepare($query);
      $ketqua = $data->execute();
      $rows = $data->fetchAll();
      if ($ketqua == false)
        echo "<h3>Lỗi sql</h3>";
      else
        for ($i = 0; $i < 12; $i++) {
      ?>
        <div class="col-md-3 wow slideInDown">
          <div class="card">
            <a href="sanpham.php?ID=<?= $rows[$i]["ID"] ?>">
              <img class="card-img-top img-fluid" alt="img1" src="images/<?= $rows[$i]["Img"] ?>">
            </a>
            <div class="card-body">
              <div class="card-title"><?= $rows[$i]["TenSP"] ?></div>
              <p class="card-text text-danger"><?= $rows[$i]["Gia"] ?> VNĐ</p>
              <!-- <a class="btn btn-pink text-light"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add To Cart</a> -->
            </div>
          </div>
        </div>
      <?php
        }
      ?>
    </div>
    </div>
    <footer class="bg-dark">
      <div class="container">
        <div class="row">
          <div class="col-md-12 pt-5"><a href=""> <img src="images/logo1.png" alt="footer image" class="img-fluid footer-image wow slideInDown"></a></div>
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
            <p> <i class="fa fa-envelope-o" aria-hidden="true"></i>Email : nguyenphuongnam06012000@gmail.com</p>
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
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.js"></script>


</body>

</html>