<?php
			session_start();
			if(isset($_SESSION["TaiKhoan"]))
			header('location: index.php');
?>
<!DOCTYPE html>
<html>

<head>
	<title>Đăng nhập</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
	

	<img class="wave" src="images/wave.png">
	<div class="container">
		<div class="img">
			<img src="images/bg.svg">
		</div>
		<div class="login-content">
			<form action="KiemTraLogin.php" method="POST">
				<img src="images/avatar.svg">
				<h2 class="title">Welcome</h2>
				<div class="input-div one">
					<div class="i">
						<i class="fas fa-user"></i>
					</div>
					<div class="div">
						<h5>Username</h5>
						<input type="text" class="input" name="TaiKhoan" value="<?=isset($tk)?$tk:""?>">
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
				<a href="#">Forgot Password?</a>
			
				<input type="submit" class="btn" value="Login" name="submit">
					<a href="dangky.php" style="    text-align: left;">Đăng Ký?       CREATE A NEW ACCOUNT </a>
			</form>
		</div>
	</div>
	<script type="text/javascript" src="main.js"></script>
</body>

</html>