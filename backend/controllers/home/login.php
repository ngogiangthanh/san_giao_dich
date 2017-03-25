<?php

// Load model===================================================================
require_once('backend/models/users.php');
//Title ========================================================================
$title = "Đăng nhập hệ thống";
//xử lý đăng nhập ==============================================================
if (!empty($_POST)) {
    $url = 'location:admin.php';
    $username = escape($_POST['username']);
    $password = md5($_POST['password']);
    if (!adminLogin($username, $password,$conn->dbh)) {
        $url .= "?statuslogin=false";
    }
    header($url);
}
if (isset($_SESSION['login']) && $_SESSION['login']["QUYEN_HAN"] == ADMINISTRATOR) {
    header('location:admin.php');
}
//load view ====================================================================
require('backend/views/home/login.php');
