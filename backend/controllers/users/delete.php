<?php

// Load model===================================================================
require_once('backend/models/users.php');

//Title ========================================================================
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    if (userDelete($conn->app, $id)) {
        unlink(URL_UPLOAD.$_GET['tk'].".jpg");
        unlink(URL_UPLOAD."org_".$_GET['tk'].".jpg");
        $_SESSION['message']['success'] = "Xóa thông tin thành viên hoàn tất";
    } else {
        $_SESSION['message']['error'] = "Xóa thành viên không thành công";
    }
}

$url = 'admin.php?controller=users&action=list';

header('location:' . $url);

