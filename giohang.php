<?php
session_start();
require("view/func.php");
if (isset($_POST["ID"]))
	XoaSP($_POST["ID"]);
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Giỏ hàng</title>
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<script src="js/jquery2.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

	<link rel="stylesheet" type="text/css" href="i.css" />

	<link rel="stylesheet" type="text/css" href="cart.css" />
	<style>
		li {
			font-size: 13px;
		}
	</style>
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
			<div class="collapse navbar-collapse header tiep" id="collapse">
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
						<a href="cart.php"><i class="fas fa-shopping-cart"></i></a>
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
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8" id="cart_msg">
				<!--Cart Message-->
			</div>
			<div class="col-md-2"></div>
		</div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="panel panel-primary">
					<div class="panel-heading">Cart Checkout</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-2 col-xs-2 text-center"><b>Lựa chọn</b></div>
							<div class="col-md-2 col-xs-2 text-center"><b>Hình ảnh</b></div>
							<div class="col-md-2 col-xs-2 text-center"><b>Tên sản phẩm</b></div>
							<div class="col-md-2 col-xs-2 text-center"><b>Khối lượng(kg)</b></div>
							<div class="col-md-2 col-xs-2 text-center"><b>Đơn giá(/1kg)</b></div>
							<div class="col-md-2 col-xs-2 text-center"><b>Giá tiền</b></div>
						</div>
						<?php
						if (isset($_SESSION["cart"])) {
							$data = array();
							foreach ($_SESSION["cart"] as $sp)
								$data[] = json_decode($sp, true);
							foreach ($data as $row) {
						?>
								<!-- <div class="row"> -->
								<hr>
								<form action="" method="post" class="row">
									<input type="hidden" value=<?= $row["ID"] ?> name="ID">
									<div class="col-md-2 col-xs-2 text-center">
										<input type="submit" name=1 value="Xóa" onclick="return confirm('Xóa?')">
									</div>
									<div class="col-md-2 col-xs-2 text-center">
										<a href="sanpham.php?ID=<?= $row["ID"] ?>"><img src="images/<?= $row["Img"] ?>" style="width: 150px;" alt=""></a>
									</div>
									<div class="col-md-2 col-xs-2 text-center">
										<?= $row["Ten"] ?></div>
									<div class="col-md-2 col-xs-2 text-center">
										<p><?= $row["KhoiLuong"] ?></p>
									</div>
									<div class="col-md-2 col-xs-2 text-center">
										<?= $row["Gia"] ?>
									</div>
									<div class="col-md-2 col-xs-2 text-center">
										<?= $row["Gia"] * $row["KhoiLuong"] ?>
									</div>
								</form>
								<!-- </div> -->
						<?php
							}
						} else
							echo "<h3>Chưa có sản phẩm trong giỏ hàng</h3>";
						?>
						<div id="cart_checkout"></div>
						<!--<div class="row">
							<div class="col-md-2">
								<div class="btn-group">
									<a href="#" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
									<a href="" class="btn btn-primary"><span class="glyphicon glyphicon-ok-sign"></span></a>
								</div>
							</div>
							<div class="col-md-2"><img src='product_images/imges.jpg'></div>
							<div class="col-md-2">Product Name</div>
							<div class="col-md-2"><input type='text' class='form-control' value='1' ></div>
							<div class="col-md-2"><input type='text' class='form-control' value='5000' disabled></div>
							<div class="col-md-2"><input type='text' class='form-control' value='5000' disabled></div>
						</div> -->
						<!--<div class="row">
							<div class="col-md-8"></div>
							<div class="col-md-4">
								<b>Total $500000</b>
							</div> -->
					</div>
				</div>
				<div class="panel-footer"></div>
				<a href="thanhtoan.php" class="btn btn-primary" onclick="return confirm('Thanh toán')">Thanh toán</a>
			</div>
		</div>
		<div class="col-md-2"></div>

	</div>


</body>

</html>