<?php
try {
  $conn = new PDO("mysql:host=localhost;dbname=bangao;charset=utf8", "root", "");
  $conn->query("set names utf8");
} catch (PDOException $ex) {
  echo "<h2>Lỗi kết nối CSDL</h2>";
  echo $ex->getMessage();
}

function Select($query)
{
  global $conn;
  $data = $conn->prepare($query);
  if ($data->execute() == false)
    die("Lỗi SQL");
  return $data->fetchAll();
}

function Del($tb,$col,$val){
  global $conn;
  $query="DELETE from $tb where $col='$val'";
  $exe=$conn->prepare($query);
  if($exe->execute()==false)
  return false;
  return true;
}

function Update($query){
  global $conn;
  $exe=$conn->prepare($query);
  if($exe->execute()==false)
  return false;
  return true;
}

function Alert($mes){
  echo "<script type='text/javascript'>alert($mes);
  window.location='admin.php';</script>";
}
function LogOut()
{
  session_start();
  session_destroy();
}
