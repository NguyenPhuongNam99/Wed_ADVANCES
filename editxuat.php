<?php
if(isset($_POST["submit"]))
{
  require("func/func.php");
  $id=$_POST["ID"];
  $tt=$_POST["TT"];
  $query="UPDATE hoadonxuat set TrangThai='$tt' where ID='$id'";
  if(Update($query))
  die('<script>alert("Thay đổi trạng thái thành công");
  window.location="donxuat.php";</script>');
  else
  echo '<script>alert("Thay đổi trạng thái thất bại");
  window.location="donxuat.php";</script>';
}