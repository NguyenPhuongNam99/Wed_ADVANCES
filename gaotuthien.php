<!doctype html>
<html lang="en">

<head>
    <title>Gạo từ thiện</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="i.css">
    <link rel="stylesheet" href="css/style_trangchu.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

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
        if(isset($_SESSION["TaiKhoan"]))
        {
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

    <div class="container mt-5 pt-5 d-block ">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="images/banner.jpg" class="d-block w-100" alt="...">
                    <!-- <div class="carousel-caption d-none d-md-block">
                  <p class="heading animated bounceInLeft">BOOTSTRAP 4 ANIMATED CAROUSEL</p>
                      <p class="sub-heading animated flipInX delay-1s">CODE LINK GIVEN IN VIDEO DESCRIPTION</p>
                      <a class="btn btn-lg btn-danger mt-5 delay-2s animated bounce delay-2s infinite ">LIKE & SHARE</a>
                  
                  </div>  -->
                </div>
                <div class="carousel-item">
                    <img src="images/c.png" class="d-block w-100 " alt="...">

                    <!-- <div class="carousel-caption d-none d-md-block">
                  <p class="heading animated bounceInLeft">BOOTSTRAP 4 ANIMATED CAROUSEL</p>
                      <p class="sub-heading animated flipInX delay-1s">CODE LINK GIVEN IN VIDEO DESCRIPTION</p>
                      <a class="btn btn-lg btn-danger mt-5 delay-2s animated bounce delay-2s infinite ">LIKE & SHARE</a>
                  
                  </div>  -->
                </div>
                <div class="carousel-item">
                    <img src="images/b.jpg" class="d-block w-100" alt="...">
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
    </>
    <?php
    require("ketnoicsdl.php");
    $query = "SELECT * from tintuc where Loai=1 order by ID desc";
    $data = $conn->prepare($query);
    $data->execute();
    $rows = $data->fetchAll();
    ?>
    <div class="container mt-3">
        <div class="row">
            <div class="col-sm-5 ac">
                <img src="images/<?= $rows[0]["Img"] ?>">
            </div>
            <div class="col-sm-7 ac1 ">
                <div class="ac2">
                    <h3><?= $rows[0]["Title"] ?></h3>
                    <p><?= $rows[0]["Content"] ?></p>
                    <?php
                    if ($rows[0]["Note"] != NULL) {
                        echo
                            '<p class="text-info">
                  <i class="text-danger">Đặc biệt: </i>' . $rows[0]["Note"]
                                . '</p>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-3">
        <div class="row">

            <div class="col-sm-6">
                <div class="ac3">
                    <h3><?= $rows[1]["Title"] ?></h3>
                    <p><?= $rows[1]["Content"] ?></p>
                    <?php
                    if ($rows[1]["Note"] != NULL) {
                        echo
                            '<p class="text-info">
                  <i class="text-danger">Đặc biệt: </i>' . $rows[2]["Note"] .
                                '</p>';
                    }
                    ?>
                </div>
            </div>
            <div class="col-sm-6 ac3">
                <img src="images/<?= $rows[1]["Img"] ?>" alt="">
            </div>
        </div>
    </div>

    <div class="container mt-3">
        <div class="row">
            <div class="col-sm-5 ac">
                <img src="images/<?= $rows[2]["Img"] ?>" alt="">
            </div>
            <div class="col-sm-7 ac1 ">
                <div class="ac2">
                    <h3><?= $rows[2]["Title"] ?></h3>
                    <p><?= $rows[2]["Content"] ?></p>
                    <p class="text-info">
                        <?php
                        if ($rows[2]["Note"] != NULL) {
                            echo
                                '<p class="text-info">
                  <i class="text-danger">Đặc biệt: </i>' . $rows[2]["Note"]
                                    . '</p>';
                        }
                        ?>

                    </p>
                </div>
            </div>
        </div>
    </div>


    <div class="container bg">
        <div class="row">
            <div class="col-sm-4 mt-2 text-center">
                <h4 class="text-danger">TƯ VẤN BÁO GIÁ</h4>
                <p>Chúng tôi tiếp nhận thông tin sau đó tư vấn loại gạo phù hợp
                    với ngân sách của cá nhân hoạc tổ chức.
                </p>
                <p>
                    Đảm bảo với nguồn ngân sách hiện có quý khách có thể chọn
                    được loại gạo chất lượng nhất với số lượng nhiều nhất có thể.
                </p>
            </div>
            <div class="col-sm-4 mt-2 text-center">
                <h4 class="text-danger">Quy Trình Thanh Toán</h4>
                <p>Chún tôi nhận thanh toán bằng chuyển khoản hoặc tiền mặt trước 30%-50% giá trị đơn hàng. Vì mặt hàng gạo từ thiện đóng túi không có sẵn nên chúng tôi sẽ tiến hành
                    đóng túi ngay khi nhận được tiền cọc thanh toán. Với biên nhận
                    từ công ty rõ ràng nên quý khách yên tâm.
                </p>

            </div>
            <div class="col-sm-4 mt-2 text-center">
                <h4 class="text-danger">Quy Trình Vận Chuyển</h4>
                <p>Chúng tôi hỗ trợ vận chuyển tận nơi miễn phí. Có hỗ trợ giao nhiều
                    địa chỉ với điều kiện ở mỗi địa chỉ phải có số lượng >=200kg
                </p>
                <p>
                    Đảm bảo vận chuyển đúng ngày giờ mà khách hàng đã đặt ra.
                </p>
            </div>
        </div>
    </div>
    </div>


    <footer class="bg-dark">
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