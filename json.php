<?php
  $arr=array();
  $a=["huy",20];
  $b=["nam",21];
  $arr[0]=$a;
  $arr[1]=$b;
  $json=json_encode($arr);
  $str=json_decode($json);
  echo $str[0][0]."\t".$str[0][1];
?>