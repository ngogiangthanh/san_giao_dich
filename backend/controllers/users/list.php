<?php
// Load model===================================================================
require_once('backend/models/users.php');
require_once('libraries/functions.php');

//Title ========================================================================
$title = "Trang danh sách thành viên";
$status = array(
    1 => "<span class='badge bg-green'>Đang hoạt động</span>",
    2 => "<span class='badge bg-red'>Bị khóa</span>",
    3 => "<span class='badge bg-yellow'>Chờ kích hoạt</span>"
);

$page = (isset($_GET['page'])) ? intval($_GET['page']) : 1;
$page = ($page > 0) ? $page : 1;
//$offset = ($page - 1) * LIMIT_PER_PAGE;
$offset = 0;

$userCount = userCount($conn->dbh);
$userLastests = userSelectLastest($conn->dbh);
$userShorts = userSelect(null, $offset, $userCount, $conn->dbh);

$url = 'admin.php?controller=users';
$total = ceil($userCount / LIMIT_PER_PAGE);
//$pagination = pagination($url, $page, $total);
//load view ====================================================================
require('./backend/views/users/list.php');