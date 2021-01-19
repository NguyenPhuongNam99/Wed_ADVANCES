<?php
if(isset($_POST["submit"])){
  require("view/func.php");
  if(empty($_POST["Name"])||empty($_POST["SDT"])||empty($_POST["DiaChi"])||empty($_POST["MatKhaut"]))
  alert("Điền thiếu thôngt tin",0);
  $user=$_POST["TaiKhoan"];
  $name=$_POST["Name"];
  $email=$_POST["Email"];
  $sdt=$_POST["SDT"];
  $diachi=$_POST["DiaChi"];
  $pass=md5($_POST["MatKhau"]);
  $query="INSERT into khachhang values('$user','$pass','$name','$sdt','$email','$diachi')";
  $exe=$conn->prepare($query);
  // $exe->bindParam(1,$user);
  // $exe->bindParam(2,$pass);
  // $exe->bindParam(3,$ten);
  // $exe->bindParam(4,$sdt);
  // $exe->bindParam(5,$email);
  // $exe->bindParam(6,$diachi);
  $ketqua=$exe->execute();
  if($ketqua==false)
  alert("Không thể tạo tài khoản",0);
  else
  alert("Tạo tài khoản thành công",1);
}
else
header('location: dangky.php');