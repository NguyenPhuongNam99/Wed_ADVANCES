<!DOCTYPE html>
<html>

<head>
	<title>Đăng Ký</title>
	<link rel="stylesheet" type="text/css" href="css/dangky.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<script type="text/javascript" src="view/func.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
	<img class="wave" src="images/wave.png">
	<div class="container">
		<div class="img">
			<img src="images/bg.svg">
		</div>
		<div class="login-content">
			<form action="xulydangky.php" method="POST" name="DangKy">
				<img src="images/avatar.svg">
				<h2 class="title">CREATE YOUR ACOUNT</h2>
				<div class="input-div one">
					<div class="i">
						<i class="fas fa-user"></i>
					</div>
					<div class="div">
						<h5>Tài khoản</h5>
						<input type="text" class="input" name="TaiKhoan">
					</div>
				</div>
				<div class="input-div pass">
					<div class="i">
						<i class="far fa-envelope"></i>
					</div>
					<div class="div">
						<h5>Email</h5>
						<input type="email" class="input" name="Email">
					</div>
				</div>
				<div class="input-div pass">
					<div class="i">
						<i class="far fa-address-card"></i>
					</div>
					<div class="div">
						<h5>Địa Chỉ</h5>
						<input type="text" class="input" name="DiaChi">
					</div>
				</div>
				<div class="input-div pass">
					<div class="i">
						<i class="fas fa-mobile-alt"></i>
					</div>
					<div class="div">
						<h5>SĐT</h5>
						<input type="text" class="input" name="SDT" id="sdt">
					</div>
				</div>
				<div class="input-div pass">
					<div class="i">
						<i class="far fa-user-circle"></i>
					</div>
					<div class="div">
						<h5>Họ tên</h5>
						<input type="text" class="input" name="Name">
					</div>
				</div>
				<div class="input-div pass">
					<div class="i">
						<i class="fas fa-lock"></i>
					</div>
					<div class="div">
						<h5>Password</h5>
						<input type="password" class="input" name="MatKhau">
					</div>
				</div>
				<!-- <a href="#">Forgot Password?</a> -->
				<input type="submit" class="btn" value="CREATE " name="submit" onclick="return Valid('DangKy')">
			</form>
		</div>
	</div>
	<script type="text/javascript" src="main.js"></script>
</body>

</html>