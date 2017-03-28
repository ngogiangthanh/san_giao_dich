<?php
// Load model===================================================================
require_once('backend/models/users.php');

//Title ========================================================================
$title = "Trang quản lý thành viên";
$status = array(
    1 => "<span class='badge bg-green'>Đang hoạt động</span>",
    2 => "<span class='badge bg-red'>Bị khóa</span>",
    3 => "<span class='badge bg-yellow'>Chờ kích hoạt</span>"
);

$page = (isset($_GET['page'])) ? intval($_GET['page']) : 1;
$page = ($page > 0) ? $page : 1;
$offset = ($page - 1) * LIMIT_PER_PAGE;

$userCount = userCount($conn->app);
$userLastests = userSelectLastest($conn->app);
$userShorts = userSelect(null, $offset, LIMIT_PER_PAGE, $conn->app);

$url = 'admin.php?controller=users';
$total = ceil($userCount / LIMIT_PER_PAGE);
$pagination = pagination($url, $page, $total);
//load view ====================================================================
require('./backend/views/users/index.php');