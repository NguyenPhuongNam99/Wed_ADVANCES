<?php
session_start();
session_destroy();
echo '<script>alert("Đã đăng xuất");
window.location="login.php";</script>';