<?php
session_start();
// Include file cần thiết ======================================================
include_once './libraries/language.php';
include_once './libraries/functions.php';
include_once './libraries/workwithdb.php';
include_once './backend/models/model.php';
// Ngôn ngữ ====================================================================
$language = new language();
$language->SetLang((isset($_SESSION['language'])) ? $_SESSION['language'] : 'vietnamese');
$language->IncludeLangAdminUI();
//xử lý request từ trình duyệt và gọi controller / action tương ứng ============
//Kết nối đến csdl
$conn = new workwithdb();
$conn->CreateConnection();
// Lấy controller ==============================================================
if (isset($_GET['controller'])) {
    $controller = $_GET['controller'];
} else {
    $controller = 'home'; //mac dinh goi trang home ============================
}
// Lấy action===================================================================
if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'index'; //mac dịnh la trang index=================================
}
// include file controller tương ứng ===========================================
$file = 'backend/controllers/' . $controller . '/' . $action . '.php';
if (file_exists($file)) {
    if (isset($_SESSION['login']) && $_SESSION['login'][11] == 1) {
        require($file);
    } else {
        require('backend/controllers/home/login.php');
    }
} else {
    show_404();
}
// Đóng kết nối ================================================================
$conn->CloseConnection();
