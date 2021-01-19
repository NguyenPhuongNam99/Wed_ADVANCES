<?php
if(isset($_POST["login"])==false){
  header("login.php");
}
require("func/func.php");
$tk=$_POST["Admin"];
$mk=md5($_POST["AdPass"]);
$query="SELECT * from admin where TaiKhoan='$tk' and MatKhau='$mk'";
$data=Select($query);
if(empty($data))
  echo '<script type="text/javascript">alert("Đăng nhập không thành công");
  window.location="login.php";
  </script>';
  else{
    session_start();
    $_SESSION["Admin"]=$tk;
    header('location: admin.php');
  }