<?php
	require("view/func.php");
	if (isset($_POST["submit"])) {
		$tk = $_POST["TaiKhoan"];
		$mk = md5($_POST["MatKhau"]);
		$query = "SELECT TaiKhoan from khachhang where TaiKhoan='$tk' and MatKhau = '$mk'";
		$data = $conn->prepare($query);
		$ketqua = $data->execute();
		
		if ($data->rowCount() == 1) {
      session_start();
			$_SESSION["TaiKhoan"] = $tk;
			header('location: index.php');
    }
    header('location: dangnhap.php');
	}
  ?>
<!-- require("ketnoicsdl.php");
$tk = $_POST["TaiKhoan"];
$mk = md5($_POST["MatKhau"]);
$query = "CALL pr_login($tk,$mk,@c)";
$data = $conn->prepare($query);
$ketqua = $data->execute();
if ($data->{"@c"} == 1) {
  session_start();
  $_SESSION["TaiKhoan"] = $tk;
  header('location: index.php');
} else
  header('location: dangnhap.php'); -->