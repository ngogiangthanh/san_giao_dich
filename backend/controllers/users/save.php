<?php

// Load model===================================================================
require_once('backend/models/users.php');

//Title ========================================================================
if (isset($_POST)) {
    if (isset($_FILES["file"]["type"])) {
        $image_name = $_POST['taikhoan'];
        $configImg = array(
            'name' => $image_name,
            'upload_path' => URL_UPLOAD,
            'allowed_exts' => 'jpg|png|jpeg',
            'type' => 'image',
            'max_size' => 5
        );
        $rs = upload('file', $configImg);
    }

    $config = array(
        "url_dai_dien" => $rs['thumb'],
        "ho_ten" => $_POST['hoten'],
        "ngay_sinh" => $_POST['ngaysinh'],
        "gioi_tinh" => $_POST['gioitinh'],
        "dia_chi" => $_POST['diachi'],
        "email" => $_POST['email'],
        "sdt" => $_POST['sdt'],
        "tk" => $_POST['taikhoan'],
        "mk" => md5($_POST['matkhau']),
        "mk_goc" => $_POST['matkhau'],
        "trang_thai" => $_POST['trangthai'],
        "cau_noi" => $_POST['caunoi']);

    if (userInsert($conn->app, $config)) {
        $_SESSION['message']['success'] = "Thêm thông tin thành viên hoàn tất!";
    } else {
        $_SESSION['message']['error'] = "Thêm thông tin thành viên không thành công!";
    }
}

$url = 'admin.php?controller=users&action=add';

header('location:' . $url);

