<?php
session_start();
if (isset($_SESSION["Admin"]) == false) {
  echo '<script type="text/javascript">alert("Bạn chưa đăng nhập");
  window.location="login.php";
  </script>';
}
require("func/func.php");
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin</title>
  <script src="func/jvs.js"></script>

  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/i.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="admin.php" class="nav-link">Trang chủ</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Contact</a>
        </li>
      </ul>

      <!-- SEARCH FORM -->
      <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">15</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> 4 new messages
              <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-users mr-2"></i> 8 friend requests
              <span class="float-right text-muted text-sm">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-file mr-2"></i> 3 new reports
              <span class="float-right text-muted text-sm">2 days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php" role="button" onclick="return confirm('Đăng xuất')">
            <i class="fas fa-power-off"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="admin.php" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Admin</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="images/nam.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">Nam ngu</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <!--sản phẩm-->
            <li class="nav-item has-treeview menu-open">
              <a href="#" class="nav-link active">
                <i class="fas fa-boxes"></i>
                <p>
                  Sản phẩm
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="admin.php" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Danh sách sản phẩm</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="themsp.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Thêm sản phẩm</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="admin.php" class="nav-link">
                <img src="https://img.icons8.com/material-two-tone/20/000000/file.png" />
                <p>
                  Đơn hàng
                </p>
                <i class="fas fa-angle-left right"></i>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="lichsunhap.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Lịch sử nhập hàng</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="donhangmoi.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Đơn hàng mới</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="donxuat.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Đơn hàng xuất</p>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Sửa sản phẩm</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <?php
        if (isset($_GET["Sua"]) == false) {
          if (isset($_GET["Xoa"]) == false)
            echo "<p>Chưa có ID</p>";
          else {
            $id = $_GET["Xoa"];
            if (Del("sanpham", "ID", $id) == false)
              echo '<script type="text/javascript">alert("Khong the xoa");
            window.location="admin.php";
            </script>';
            else {
              echo
                '<script type="text/javascript">alert("Okay");
              window.location="admin.php";
              </script>';
            }
          }
        } else {
        ?>
          <!-- <div class="container-fluid"> -->
          <?php
          $id = $_GET["Sua"];
          $query = "SELECT * from sanpham where ID=$id";
          $data = Select($query);
          if (empty($data))
            echo "<p>Không tồn tại sản phẩm</p>";
          else {
            $row = $data[0];
            $mota = explode("#", $row["MoTa"]);
            $chitiet = explode("#", $row["ChiTiet"]);
          ?>
            <form action="update.php" method="post" name="SP" enctype="multipart/form-data">
            <input type="hidden" name="ID" value="<?=$id?>">
              <div class="form-group">
                <label>Tên sản phẩm</label>
                <input class="form-control" type="text" name="TenSP" value="<?= $row["TenSP"] ?>">
              </div>
              <div class="form-group">
                <label>Tồn kho</label>
                <input class="form-control" type="text" name="TonKho" value="<?= $row["TonKho"] ?>">
              </div>
              <div class="form-group">
                <label>Giá</label>
                <input class="form-control" type="text" name="Gia" value="<?= $row["Gia"] ?>">
              </div>
              <div class="form-group">
                <label>Loại</label>
                <select class="form-control" name="Loai" id="">
                  <?php
                  $query="SELECT * from loaigao";
                    $opt=Select($query);
                    foreach($opt as $loai){
                      ?>
                      <option value="<?=$loai["ID"]?>" <?=$loai["ID"]==$row["Loai"]?"selected":""?>><?=$loai["Ten"]?></option>
                      <?php
                    }
                  ?>
                </select>
              </div>
              <div class="form-group" style="position: relative;">
                <label>Hình ảnh</label>
                <br>
                <input type="hidden" name="Img" value="<?= $row['Img'] ?>">
                <img src="images/<?= $row['Img'] ?>" alt="" width="300px" height="300px">
                <input type="file" name="fileToUpload" id="fileToUpload"
                 style="position: absolute;bottom: 0px;margin-left: 20px;" >
              </div>
              <div class="form-group">
                <label>Mô tả</label>
                <textarea class="form-control" name="MoTa" id=""  style="resize:none" rows="10"><?php
                foreach($mota as $key=>$val){
                echo $val;
                if(next($mota)==true)
                echo "\n";
                }
                ?></textarea>
              </div>
              <div class="form-group">
                <label>Chi tiết</label>
                <textarea name="ChiTiet" id="" style="resize: none;" rows="10" class="form-control"><?php
                foreach($chitiet as $key=>$val){
                echo $val;
                if(next($chitiet)==true)
                echo "\n";
                }
                ?></textarea>
              </div>
              <input type="submit" name="editsp" value="Lưu thay đổi">
            </form>
        <?php
          }
        }
        ?>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.5
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="plugins/moment/moment.min.js"></script>
  <script src="plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="dist/js/pages/dashboard.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
</body>

</html>