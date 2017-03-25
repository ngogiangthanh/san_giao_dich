<?php
// Load model===================================================================

//Title ========================================================================
$title = "Trang chủ hồ sơ cá nhân quản trị viên";
$gender = array(
    1 => "Nam",
    2 => "Nữ",
    3 => "Không xác định"
);

$status = array(
    1 => "Đang hoạt động",
    2 => "Bị khóa",
    3 => "Chờ kích hoạt"
);
//load view ====================================================================
require('./backend/views/home/profiles.php');