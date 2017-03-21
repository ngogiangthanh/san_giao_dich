<?php
//Hủy session login
unset($_SESSION['login']);
$_SESSION['refresh'] = 'yes_logout';
$url = 'location:admin.php';
$url .= (isset($statuspassword) && $statuspassword == 'true') ? '?statuspassword=true' : '';
//quay ve trang đăng nhập
header($url);
