<?php
if(isset($_POST["pass"])==false&&isset($_POST["info"])==false)
header('location: profile.php');
require("view/func.php");
session_start();
$tk=$_SESSION["TaiKhoan"];
if(isset($_POST["info"])){
  $ten=$_POST["Ten"];
  $sdt=$_POST["SDT"];
  $diachi=$_POST["DiaChi"];
  $email=$_POST["Email"];
  $query="UPDATE khachhang set Ten='$ten',SDT='$sdt',Email='$email',DiaChi='$diachi' where TaiKhoan='$tk'";
  Update($query,"info");
}
else if(isset($_POST["pass"])){
  $old=md5($_POST["old"]);
  //$confirm=$_POST["confirm"];
  $new=md5($_POST["new"]);
  $query="SELECT * from khachhang where TaiKhoan='$tk' and MatKhau='$old'";
  $data=Select($conn,$query);
  if(empty($data[0][0])==false){
    $query="UPDATE khachhang set MatKhau='$new' where TaiKhoan='$tk'";
    Update($query,"pass");
  }
  else
  echo '<script type="text/javascript">alert("Sai mật khẩu cũ");
    window.location="profile.php";
    </script>';
}