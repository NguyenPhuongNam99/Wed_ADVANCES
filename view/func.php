<?php
function ViewSP($ID, $conn)
{
  $select = "SELECT * from sanpham where ID='$ID'";
  $data = $conn->prepare($select);
  $data->execute();
  $row = $data->fetchAll();
}

try {
  $conn = new PDO("mysql:host=localhost;dbname=bangao;charset=utf8", "root", "");
  $conn->query("set names utf8");
} catch (PDOException $ex) {
  echo "<h3>Lỗi kết nối CSDL</h3>";
  echo $ex->getMessage();
}

function Select($conn, $query)
{
  $data = $conn->prepare($query);
  $ketqua = $data->execute();
  $rows = $data->fetchAll();
  if ($ketqua == false)
    die("<h3>Lỗi sql</h3>");
  return $rows;
}

function Insert($query){
  global $conn;
  $exe=$conn->prepare($query);
  return $exe->execute();
}

function AddToCart($id)
{
  if (isset($_COOKIE["kl"]) == false)
    return;
  $kl = $_COOKIE["kl"];
  setcookie("kl", "", time() - 1000);
  $data = Select($GLOBALS["conn"], "SELECT * from sanpham where ID=$id");
  // session_start();
  if(isset($_SESSION["cart"][$id])){
    $data=json_decode($_SESSION["cart"][$id],true);
    $data["KhoiLuong"]+=$kl;
    $_SESSION["cart"][$id]=json_encode($data);
  }
  else{
    $row=$data[0];
    $sp = array("ID" => $row["ID"], "Img" => $row["Img"], "Ten" => $row["TenSP"], "KhoiLuong" => $kl, "Gia" => $row["Gia"]);
    $json = json_encode($sp);
    $_SESSION["cart"][$id] = $json;
  }
}

function XoaSP($id)
{
  // if(isset($_SESSION["cart"][$id])){
  //session_start();
  unset($_SESSION["cart"][$id]);
  // unset($_POST["ID"]);
  header('location: giohang.php');
}

function View($loai)
{
  switch ($loai) {
    case 1:
      return "gaotuthien.php";
    case 2:
      return "gaongon.php";
    case 3:
      return "tintuc.php";
    case 4:
      return "daily.php";
    case 5:
      return "giagao.php";
  }
}

function alert($msg, $bool)
{
  echo "<script type='text/javascript'>alert('$msg');";
  if ($bool == 0)
    echo "window.location='dangky.php'";
  else
    echo "window.location='dangnhap.php'";
  echo "</script>";
}

function Update($query, $type)
{
  $exe = $GLOBALS["conn"]->prepare($query);
  $ketqua = $exe->execute();
  if ($ketqua == false) {
    if ($type == "info")
      echo '<script type="text/javascript">alert("Không cập nhật thông tin không thành công");
    window.location="profile.php";
    </script>';
    else if($type=="pass")
    echo '<script type="text/javascript">alert("Không cập nhật mật khẩu không thành công");
    window.location="profile.php";
    </script>';
  }
  else{
    if ($type == "info")
        echo '<script type="text/javascript">alert("Cập nhật thông tin thành công");
      window.location="profile.php";
      </script>';
      else if($type=="pass")
      echo '<script type="text/javascript">alert("Cập nhật mật khẩu thành công");
      window.location="profile.php";
      </script>';
  }
}
