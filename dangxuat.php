<?php
session_start();
if(isset($_SESSION["TaiKhoan"]))
  unset($_SESSION["TaiKhoan"]);
header("location: index.php");