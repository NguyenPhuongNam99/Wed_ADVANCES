<?php
session_start();
if(isset($_SESSION["TaiKhoan"])&&isset($_GET["ID"])){
  $id=$_GET["ID"];
  require("func/func.php");
  $query="UPDATE hoadonxuat set TrangThai=-1 where ID=$id";
  if(Update($query))
  die('<script>alert("Hủy thành công");
  window.location="lichsu_muahang.php";</script>');
}
echo '<script>alert("Hủy thất bại");
window.location="lichsu_muahang.php";</script>';