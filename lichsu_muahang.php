<?php
session_start();
if (isset($_SESSION["TaiKhoan"]))
	$tk = $_SESSION["TaiKhoan"];
else
	header('location: dangnhap.php');
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Đơn hàng</title>
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<script src="js/jquery2.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

	<link rel="stylesheet" type="text/css" href="i.css" />

	<link rel="stylesheet" type="text/css" href="cart.css" />
</head>

<body>

	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse" aria-expanded="false">
					<span class="sr-only">navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>

			</div>
			<div class="collapse navbar-collapse header" id="collapse">
				<ul class="nav navbar-nav">
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
	</div>
	<p><br /></p>
	<p><br /></p>
	<p><br /></p>
	<div class="container-fluid">
		<?php
		require("func/func.php");
		$query = "SELECT hd.ID,TaiKhoan,Tien,ThoiGian,TrangThai,Ten from hoadonxuat as hd inner join trangthai as tt on hd.TrangThai=tt.ID where TaiKhoan='$tk'";
		$data = Select($query);
		foreach ($data as $row) {
		?>
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<div class="panel panel-primary">
						<div class="panel-heading">ID HÓA ĐƠN: <?= $row["ID"] ?></div>
						<div class="panel-body text-center">
							<div class="row">
								<div class="col-md-2 col-xs-2"><b>Lựa Chọn</b></div>
								<div class="col-md-3 col-xs-2"><b>Tên Sản Phẩm</b></div>
								<div class="col-md-2 col-xs-2"><b> Hình Ảnh </b></div>
								<div class="col-md-2 col-xs-2"><b>Số Lượng</b></div>
								<div class="col-md-3 col-xs-2"><b>Gía Tiền</b></div>
							</div>
							<div class="row">
								<div class="col-md-2">
									<a class="btn btn-secondary" href="huyhd.php?ID=<?=$row["ID"]?>" onclick='return <?= $row["TrangThai"] != 0 ? "false" : "confirm(\"Hủy\")"; ?>'>Hủy</a>
								</div>
								<div class="col-md-10">
									<?php
									$id = $row["ID"];
									$gethd = "SELECT * from chitietxuat inner join sanpham on sanpham.ID=chitietxuat.IDSP where IDHoaDon=$id";
									$chitiet = Select($gethd);
									foreach ($chitiet as $ct) {
									?>
										<div class="col-md-12" style="margin-top: 10px;">
											<div class="col-md-3"><?= $ct["TenSP"] ?></div>
											<div class="col-md-3"><img src="images/<?= $ct["Img"] ?>" width="100%"></div>
											<div class="col-md-3"><?= $ct["KhoiLuong"] ?></div>
											<div class="col-md-3"><?= $ct["KhoiLuong"] * $ct["Gia"] ?></div>
										</div>
									<?php
									}
									?>
								</div>
							</div>
						</div>
					</div>
					<div class="panel-footer text-center" style="width: 450px;float: right;">
							<div class="row">
								<div class="col-md-3">Trạng thái</div>
								<div class="col-md-5">Thời gian</div>
								<div class="col-md-3">Tổng tiền</div>
							</div>
							<div class="row ">
								<div class="col-md-3"><?= $row["Ten"] ?></div>
								<div class="col-md-5"><?= $row["ThoiGian"] ?></div>
								<div class="col-md-3"><?= $row["Tien"] ?></div>
							</div>
					</div>
				</div>
			</div>
	</div>
<?php
		}
?>

</div>


</body>

</html>