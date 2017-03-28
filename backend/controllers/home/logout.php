<?php

unset($_SESSION['login']);
$url = 'location:admin.php';
$_SESSION['message']['warning'] = "Đăng xuất thành công!";
header($url);
