<?php
try {
    $conn = new PDO("mysql:host=localhost;dbname=bangao;charset=utf8", "root", "");
    $conn->query("set names utf8");
} catch (PDOException $ex) {
    echo "<h3>Loi ket noi csdl</h3>";
    echo $ex->getMessage();
}
