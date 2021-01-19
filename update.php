<?php
require("func/func.php");
if (isset($_POST["editsp"])) {
  $id = $_POST["ID"];
  $ten = $_POST["TenSP"];
  $tonkho = $_POST["TonKho"];
  $gia = $_POST["Gia"];
  $loai = $_POST["Loai"];
  $img = $_POST["Img"];
  $mota = str_replace("\n", "#", $_POST["MoTa"]);
  $chitiet = str_replace("\n", "#", $_POST["ChiTiet"]);
  $query = "UPDATE sanpham set TenSP='$ten',TonKho='$tonkho',Gia='$gia',Loai='$loai',MoTa='$mota',ChiTiet='$chitiet'
  where ID=$id";
  $uploadOk = 1;
  if (Update($query) == false) {
    die ("<script>alert('Thay đổi thất bại');
    window.location='editsp.php?Sua=$id'</script>");
  }
  //upload img
  else if (isset($_POST["fileToUpload"])) {
    $uploadOk = 1;
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
      echo "File hợp lệ - " . $check["mime"] . ".";
      $uploadOk = 1;
    } else {
      echo "Không phải là ảnh";
      $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 1000000) {
      echo "Dung lượng file quá lớn";
      $uploadOk = 0;
    }

    // Allow certain file formats
    if (
      $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif"
    ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "Không thể upload";
      // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir . $img)) {
        echo "<script>alert('Thay đổi ảnh thành công');
        window.location='admin.php?Sua=$id';</script>";
      } else {
        die ("<script>alert('Thay đổi ảnh thất bại nhưng những cái khác thì ok');
        window.location='editsp.php?Sua=$id';</script>");
      }
    }
  }
  echo "<script>alert('Thay đổi thành công');
        window.location='admin.php?Sua=$id';</script>";
  //echo "\n$target_file";
} else if (isset($_POST["themsp"])) {

  $ten = $_POST["TenSP"];
  $tonkho = $_POST["TonKho"];
  $gia = $_POST["Gia"];
  $loai = $_POST["Loai"];
  $img = basename($_FILES["Img"]["name"]);
  $mota = str_replace("\n", "#", $_POST["MoTa"]);
  $chitiet = str_replace("\n", "#", $_POST["ChiTiet"]);
  $query = "INSERT into sanpham (TenSP,TonKho,Gia,Loai,Img,MoTa,ChiTiet) values('$ten',$tonkho,$gia,$loai,'$img','$mota','$chitiet')";

  if (isset($_POST["Img"])) {

    $uploadOk = 1;
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["Img"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["Img"]["tmp_name"]);
    if ($check !== false) {
      echo ("File hợp lệ - " . $check["mime"] . ".");
      $uploadOk = 1;
    } else {
      die("Không phải là ảnh");
      $uploadOk = 0;
    }

    //Check if file already exists
    if (file_exists($target_file)) {
      die("Trùng tên file");
      $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["Img"]["size"] > 1000000) {
      die("Dung lượng file quá lớn");
      $uploadOk = 0;
    }

    // Allow certain file formats
    if (
      $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif"
    ) {
      die("Không đúng định dạng JPG, JPEG, PNG & GIF");
      $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      die("Không thể upload");
      // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["Img"]["tmp_name"], $target_file) && (Update($query) == true)) {
        die('<script>alert("Thêm mới thành công");
        window.location="admin.php"</script>');
      } else {
        die('<script>alert("Thêm mới thất bại");
        window.location="admin.php"</script>');
      }
    }
  } 
}
