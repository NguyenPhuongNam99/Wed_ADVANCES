<?php
session_start();
if (empty($_SESSION["cart"])) {
  die("<script>alert('Giỏ hàng rỗng');
  window.location='index.php';</script>");
}
if (isset($_SESSION["TaiKhoan"]) == false)
  die("<script>alert('Chưa đăng nhập');
window.location='dangnhap.php';</script>");
require("view/func.php");
$tk = $_SESSION["TaiKhoan"];
$query = "INSERT into hoadonxuat(TaiKhoan) values('$tk')";
if (Insert($query) == false)
  die("<script>alert('Thanh toán thất bại');
window.location='giohang.php';</script>");
$id = $conn->lastInsertId();
foreach ($_SESSION["cart"] as $sp) {
  $arr = json_decode($sp, true);
  $idsp = $arr["ID"];
  $kl = $arr["KhoiLuong"];
  $query = "INSERT into chitietxuat(IDHoaDon,IDSP,KhoiLuong) values($id,$idsp,$kl)";
  if (Insert($query) == false)
    die("<script>alert('Thanh toán thất bại');
    window.location='giohang.php';</script>");
}
unset($_SESSION["cart"]);
echo "<script>alert('Thanh toán thành công');
window.location='index.php';</script>";