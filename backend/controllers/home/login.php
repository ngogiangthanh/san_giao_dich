<?php

// Load model===================================================================
require_once('backend/models/users.php');
//Title ========================================================================
$title = LOGIN_TITLE;
//xử lý đăng nhập ==============================================================
if (!empty($_POST)) {
    $url = 'location:admin.php';
    $email = escape($_POST['username']);
    $password = md5($_POST['password']);
    if (!admin_login($email, $password)) {//Đăng nhập thành công chuyển hướng vào trang chủ ql
        $url .= "?statuslogin=false";
    }
    header($url);
}
//if (isset($_SESSION['login']) && $_SESSION['login'][11] == 1) {
//    header('location:admin.php');
//}
//load view ====================================================================
require('backend/views/home/login.php');
