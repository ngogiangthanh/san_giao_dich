<?php

// Load model===================================================================
require_once('backend/models/users.php');

//Title ========================================================================
if (isset($_POST['id_user'])) {
    $id = intval($_POST['id_user']);
    $config = array(
        "ho_ten" => $_POST['hoten'],
        "ngay_sinh" => $_POST['ngaysinh'],
        "gioi_tinh" => $_POST['gioitinh'],
        "dia_chi" => $_POST['diachi'],
        "email" => $_POST['email'],
        "sdt" => $_POST['sdt'],
        "mk" => md5($_POST['matkhau']),
        "mk_goc" => $_POST['matkhau'],
        "trang_thai" => $_POST['trangthai'],
        "cau_noi" => $_POST['caunoi']);
    
    if (userUpdate($conn->app, $id, $config)) {
        $_SESSION['message']['success'] = "Cập nhật thông tin thành viên hoàn tất!";
    } else {
        $_SESSION['message']['error'] = "Cập nhật thông tin thành viên không thành công!";
    }
}

$url = 'admin.php?controller=users&action=list';

header('location:' . $url);

