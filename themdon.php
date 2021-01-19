<?php
if(isset($_POST["submit"]))
{
  require("view/func.php");
  $query="INSERT into hoadonnhap(TongTien) values(0)";
  $id=$_POST["ID"];
  $kl=$_POST["KhoiLuong"];
  $gia=$_POST["DonGia"];
  if(Insert($query))
  {
    $idnhap=$conn->lastInsertId();
    foreach($id as $key=>$val)
    {
      $query="INSERT into chitietnhap(IDHoaDon,IDSP,KhoiLuong,DonGia) values(?,?,?,?)";
      $exe=$conn->prepare($query);
      $exe->bindParam(1,$idnhap);
      $exe->bindParam(2,$val);
      $exe->bindParam(3,$kl[$key]);
      $exe->bindParam(4,$gia[$key]);
      if($exe->execute()==false)
      die("<script>alert('Không thể thêm');
      window.location='donhangmoi.php';</script>");
    }
    die("<script>alert('Thêm mới thành công');
    window.location='lichsunhap.php';</script>");
  }
  echo "<script>alert('Không thể thêm');
  window.location='donhangmoi.php';</script>";
}