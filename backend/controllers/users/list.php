<?php

// Load model===================================================================
require_once('backend/models/users.php');

//Title ========================================================================
$title = "Trang danh sách thành viên";
$status = array(
    1 => "<span class='badge bg-green'>Đang hoạt động</span>",
    2 => "<span class='badge bg-red'>Bị khóa</span>",
    3 => "<span class='badge bg-yellow'>Chờ kích hoạt</span>"
);

$page = (isset($_GET['page'])) ? intval($_GET['page']) : 1;
$page = ($page > 0) ? $page : 1;
$offset = ($page - 1) * LIMIT_PER_PAGE;
$url = 'admin.php?controller=users&action=list';
$search = null;
if (isset($_GET['search'])) {
    $search = escape($_GET['search']);
    $url .= "&search=".$search;
}

$userCount = userCount($conn->app, $search);
$userShorts = userSelect($search, $offset, LIMIT_PER_PAGE, $conn->app);

$total = ceil($userCount / LIMIT_PER_PAGE);
$pagination = pagination($url, $page, $total);
//load view ====================================================================
require('./backend/views/users/list.php');
