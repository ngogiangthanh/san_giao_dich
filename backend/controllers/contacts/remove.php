<?php

// Load model===================================================================
require_once('backend/models/contacts.php');

//Title ========================================================================
if (!empty($_POST['checkremove'])) {
    foreach ($_POST['checkremove'] as $id) {
        $id = intval($id);
        $config = array(
            "trang_thai" => 4,
            "da_xem" => 2,
            "quan_trong" => 2,
            "spam" => 2,
            "rac" => 1
            );
        $flag = contactUpdate($conn->app, $id, $config);
    }


    if ($flag) {
        $_SESSION['message']['success'] = "Xóa thông tin liên hệ hoàn tất!";
    } else {
        $_SESSION['message']['error'] = "Xóa thông tin liên hệ không thành công!";
    }
}

$url = 'admin.php?controller=contacts';

header('location:' . $url);
